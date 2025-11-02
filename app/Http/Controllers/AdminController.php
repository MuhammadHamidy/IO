<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Models\PageNews;
use App\Models\Events;
use App\Models\PagePartners;
use App\Models\PageTestimonials;
use App\Models\Programs;
use App\Models\User;
use App\Notifications\NewsPublished;
use App\Notifications\EventPublished;
use App\Notifications\NewProgramPublished;

class AdminController extends Controller
{
    public function dashboard()
    {
        
        $stats = [
            'total_news' => PageNews::count(),
            'published_news' => PageNews::where(function($q) {
                $q->where('status', 'published')->orWhereNull('status');
            })->count(),
            'draft_news' => PageNews::where('status', 'draft')->count(),
            'total_events' => Events::count(),
            'published_events' => Events::where(function($q) {
                $q->where('status', 'published')->orWhereNull('status');
            })->count(),
            'draft_events' => Events::where('status', 'draft')->count(),
            'total_partners' => PagePartners::count(),
            'total_testimonials' => PageTestimonials::count(),
            'total_programs' => Programs::count(),
        ];

        
        $recentNews = PageNews::latest()->take(5)->get();
        $recentEvents = Events::latest()->take(5)->get();
        $recentPartners = PagePartners::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentNews', 'recentEvents', 'recentPartners'));
    }

    public function newsIndex(Request $request)
    {
        $filter = $request->get('filter', 'all'); 
        
        $query = PageNews::query();
        
        if ($filter === 'active') {
            $query->active();
        } elseif ($filter === 'archived') {
            $query->archived();
        }
        
        $news = $query->latest()->paginate(10)->appends(['filter' => $filter]);
        
        return view('admin.news.index', compact('news', 'filter'));
    }

    public function newsCreate()
    {
        return view('admin.news.create');
    }

    public function newsStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'supporting_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'is_highlight' => 'required|in:0,1'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();
        
        
        $data['is_publish'] = ($request->status === 'published');
        
        
        $data['is_highlight'] = (bool)$request->is_highlight;
        $data['featured'] = (bool)$request->is_highlight; 
        
        
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('news/covers', 'public');
            $data['cover'] = $coverPath;
            $data['image'] = $coverPath; 
        }

        
        $supportingImagesPaths = [];
        if ($request->hasFile('supporting_images')) {
            foreach ($request->file('supporting_images') as $image) {
                $path = $image->store('news/supporting', 'public');
                $supportingImagesPaths[] = $path;
            }
        }
        $data['supporting_images'] = $supportingImagesPaths;

        $news = PageNews::create($data);

        
        if ($request->status === 'published') {
            $users = User::where('role_id', '!=', 1)->get(); 
            Notification::send($users, new NewsPublished($news));
        }

        return redirect()->route('admin.news.index')->with('success', 'News created successfully!');
    }

    public function newsEdit($id)
    {
        $news = PageNews::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function newsUpdate(Request $request, $id)
    {
        $news = PageNews::findOrFail($id);
        $oldStatus = $news->status;
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'supporting_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'is_highlight' => 'required|in:0,1'
        ]);

        $data = $request->except(['remove_supporting_images']);
        
        
        $data['is_publish'] = ($request->status === 'published');
        
        
        $data['is_highlight'] = (bool)$request->is_highlight;
        $data['featured'] = (bool)$request->is_highlight; 
        
        
        if ($request->hasFile('cover')) {
            
            if ($news->cover) {
                Storage::disk('public')->delete($news->cover);
            } elseif ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            
            $coverPath = $request->file('cover')->store('news/covers', 'public');
            $data['cover'] = $coverPath;
            $data['image'] = $coverPath; 
        }

        
        $existingSupportingImages = $news->supporting_images ?? [];
        
        
        if ($request->has('remove_supporting_images')) {
            $indexesToRemove = $request->input('remove_supporting_images');
            foreach ($indexesToRemove as $index) {
                if (isset($existingSupportingImages[$index])) {
                    Storage::disk('public')->delete($existingSupportingImages[$index]);
                    unset($existingSupportingImages[$index]);
                }
            }
            $existingSupportingImages = array_values($existingSupportingImages); 
        }
        
        
        if ($request->hasFile('supporting_images')) {
            foreach ($request->file('supporting_images') as $image) {
                $path = $image->store('news/supporting', 'public');
                $existingSupportingImages[] = $path;
            }
        }
        
        $data['supporting_images'] = $existingSupportingImages;

        $news->update($data);

        
        if ($oldStatus === 'draft' && $request->status === 'published') {
            $users = User::where('role_id', '!=', 1)->get(); 
            Notification::send($users, new NewsPublished($news));
        }

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully!');
    }

    public function newsDestroy($id)
    {
        $news = PageNews::findOrFail($id);
        
        
        if ($news->cover) {
            Storage::disk('public')->delete($news->cover);
        } elseif ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        
        
        if ($news->supporting_images && is_array($news->supporting_images)) {
            foreach ($news->supporting_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully!');
    }

    public function newsArchive($id)
    {
        $news = PageNews::findOrFail($id);
        $news->archive();

        return redirect()->back()->with('success', 'News archived successfully!');
    }

    public function newsUnarchive($id)
    {
        $news = PageNews::findOrFail($id);
        $news->unarchive();

        return redirect()->back()->with('success', 'News restored successfully!');
    }

    public function eventsIndex()
    {
        $events = Events::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function eventsCreate()
    {
        return view('admin.events.create');
    }

    public function eventsStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event = Events::create($data);

        
        if ($request->status === 'published') {
            $users = User::where('role_id', '!=', 1)->get(); 
            Notification::send($users, new EventPublished($event));
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function eventsEdit($id)
    {
        $event = Events::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function eventsUpdate(Request $request, $id)
    {
        $event = Events::findOrFail($id);
        $oldStatus = $event->status;
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        
        if ($oldStatus === 'draft' && $request->status === 'published') {
            $users = User::where('role_id', '!=', 1)->get(); 
            Notification::send($users, new EventPublished($event));
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function eventsDestroy($id)
    {
        $event = Events::findOrFail($id);
        
        
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    public function partnersIndex()
    {
        $partners = PagePartners::latest()->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    public function partnersCreate()
    {
        return view('admin.partners.create');
    }

    public function partnersStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:2',
            'regional' => 'required|string|max:255',
            'category' => 'required|in:University,Organization,Embassy,Government Agency,Company',
            'website' => 'required|url',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();
        
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        PagePartners::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully!');
    }

    public function partnersEdit($id)
    {
        $partner = PagePartners::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function partnersUpdate(Request $request, $id)
    {
        $partner = PagePartners::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:2',
            'regional' => 'required|string|max:255',
            'category' => 'required|in:University,Organization,Embassy,Government Agency,Company',
            'website' => 'required|url',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        $data['updated_by'] = Auth::id();
        
        if ($request->hasFile('logo')) {
            
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully!');
    }

    public function partnersDestroy($id)
    {
        $partner = PagePartners::findOrFail($id);
        
        
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }
        
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully!');
    }

    public function testimonialsIndex()
    {
        $testimonials = PageTestimonials::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function testimonialsCreate()
    {
        return view('admin.testimonials.create');
    }

    public function testimonialsStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        PageTestimonials::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully!');
    }

    public function testimonialsEdit($id)
    {
        $testimonial = PageTestimonials::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function testimonialsUpdate(Request $request, $id)
    {
        $testimonial = PageTestimonials::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    public function testimonialsDestroy($id)
    {
        $testimonial = PageTestimonials::findOrFail($id);
        
        
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully!');
    }

    public function programsIndex()
    {
        $programs = Programs::latest()->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function programsCreate()
    {
        return view('admin.programs.create');
    }

    public function programsStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'program_type' => 'nullable|in:inbound,outbound',
            'category' => 'nullable|string|max:100',
            'duration' => 'required|string|max:255',
            'requirements' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();
        $data['is_featured'] = $request->has('is_featured') ? true : false;
        
        // Generate program code and name
        $data['code'] = strtoupper(substr($data['type'], 0, 3)) . '-' . time();
        $data['name'] = $data['title'];
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        $program = Programs::create($data);

        
        if ($request->status === 'published') {
            $users = User::where('role_id', '!=', 1)->get(); 
            Notification::send($users, new NewProgramPublished($program));
        }

        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully!');
    }

    public function programsEdit($id)
    {
        $program = Programs::findOrFail($id);
        return view('admin.programs.edit', compact('program'));
    }

    public function programsUpdate(Request $request, $id)
    {
        $program = Programs::findOrFail($id);
        $oldStatus = $program->status;
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'program_type' => 'nullable|in:inbound,outbound',
            'category' => 'nullable|string|max:100',
            'duration' => 'required|string|max:255',
            'requirements' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        $data['is_featured'] = $request->has('is_featured') ? true : false;
        
        // Update code if type changed or code doesn't exist
        if (!$program->code || $program->type !== $data['type']) {
            $data['code'] = strtoupper(substr($data['type'], 0, 3)) . '-' . time();
        }
        $data['name'] = $data['title'];
        
        if ($request->hasFile('image')) {
            
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($data);

        
        if ($oldStatus === 'draft' && $request->status === 'published') {
            $users = User::where('role_id', '!=', 1)->get(); 
            Notification::send($users, new NewProgramPublished($program));
        }

        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully!');
    }

    public function programsDestroy($id)
    {
        $program = Programs::findOrFail($id);
        
        
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }
        
        $program->delete();

        return redirect()->route('admin.programs.index')->with('success', 'Program deleted successfully!');
    }

    public function togglePreview(Request $request)
    {
        $previewMode = session('preview_mode', false);
        session(['preview_mode' => !$previewMode]);
        
        
        if ($request->has('redirect')) {
            return redirect($request->redirect)->with('success', 'Preview mode ' . (!$previewMode ? 'enabled' : 'disabled'));
        }
        
        return redirect()->back()->with('success', 'Preview mode ' . (!$previewMode ? 'enabled' : 'disabled'));
    }

    public function publishChanges()
    {
        
        try {
            $users = User::where('role_id', '!=', 1)->get(); 
            
            
            $draftNews = PageNews::where('status', 'draft')->get();
            PageNews::where('status', 'draft')->update([
                'status' => 'published',
                'is_publish' => true
            ]);
            foreach ($draftNews as $news) {
                Notification::send($users, new NewsPublished($news));
            }
            
            
            $draftEvents = Events::where('status', 'draft')->get();
            Events::where('status', 'draft')->update(['status' => 'published']);
            foreach ($draftEvents as $event) {
                Notification::send($users, new EventPublished($event));
            }
            
            
            PagePartners::where('status', 'draft')->update(['status' => 'published']);
            
            
            PageTestimonials::where('status', 'draft')->update(['status' => 'published']);
            
            
            $draftPrograms = Programs::where('status', 'draft')->get();
            Programs::where('status', 'draft')->update(['status' => 'published']);
            foreach ($draftPrograms as $program) {
                Notification::send($users, new NewProgramPublished($program));
            }

            return response()->json(['success' => true, 'message' => 'All changes have been published successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to publish changes: ' . $e->getMessage()]);
        }
    }
}
