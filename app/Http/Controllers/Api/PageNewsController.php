<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageNews;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PageNewsController extends Controller
{
    public function index(){
        // Fetch events to include alongside news
        $events = Events::where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->orderBy('date', 'desc')
            ->get();

        $breakingNews = PageNews::where('is_publish', true)
            ->where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->active()
            ->get();
        
        // Map events into news-like objects for display
        $eventNewsItems = $events->map(function($e){
            return (object) [
                'id' => 'event-' . $e->id,
                'cover' => null,
                'image' => null,
                'title' => $e->title ?: $e->name,
                'content' => $e->description ?? '',
                'created_at' => $e->date ?? now(),
                'is_publish' => true,
                'is_highlight' => false,
            ];
        });
            
        $highlightedNews = PageNews::where('is_highlight', true)
            ->where('is_publish', true)
            ->where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->active()
            ->get();
        
        
        $oldNews = PageNews::where('is_publish', true)
                            ->where(function($q){
                                $q->where('status', 'published')->orWhereNull('status');
                            })
                            ->active()
                            ->where('created_at', '<', Carbon::now()->subWeeks(2))
                            ->get();
        
        $allNews = PageNews::where('is_publish', true)
            ->where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->active()
            ->get()
            ->concat($eventNewsItems)
            ->sortByDesc('created_at')
            ->values();

        if ($highlightedNews->isEmpty()) {
            $highlightedNews = collect([
                (object)[
                    'id' => 0,
                    'cover' => 'assets/img/1.png', 
                    'title' => 'Default News Title',
                    'content' => 'This is a default news content. No highlighted news available at the moment.',
                ]
            ]);
        }

        return view('news', compact('breakingNews', 'allNews', 'highlightedNews', 'oldNews', 'events'));
    }

    public function show($id){
        $pageNews = PageNews::findOrFail($id);
        return view('news-detail', compact('pageNews'));
    }

    public function edit($id){
        $pageNews = PageNews::findOrFail($id);
        return view('news-update', compact('pageNews'));
    }

    public function create(){
        return view('regist-news');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:page_news,slug',
            'content' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_publish' => 'boolean',
            'is_highlight' => 'boolean',
        ]);

        try {
            $coverPath = null;
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('covers', 'public');
            }

            $pageNews = PageNews::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->input('content'),
                'cover' => $coverPath,
                'is_publish' => $request->boolean('is_publish'),
                'is_highlight' => $request->boolean('is_highlight'),
                'created_by' => Auth::id(), 
            ]);

            return redirect()->route('news')->with('success', 'News created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'News creation failed: ' . $e->getMessage());
        }
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:page_news,slug,' . $id,
            'content' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_publish' => 'boolean',
            'is_highlight' => 'boolean',
        ]);

        try {
            $pageNews = PageNews::findOrFail($id);

            $coverPath = $pageNews->cover;
            if ($request->hasFile('cover')) {
                if ($coverPath) {
                    Storage::disk('public')->delete($coverPath);
                }
                $coverPath = $request->file('cover')->store('covers', 'public');
            }

            $pageNews->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->input('content'),
                'cover' => $coverPath,
                'is_publish' => $request->boolean('is_publish'),
                'is_highlight' => $request->boolean('is_highlight'),
                'updated_by' => Auth::id(), 
            ]);

            return redirect()->route('news')->with('success', 'News updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'News update failed: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pageNews = PageNews::findOrFail($id);
            if ($pageNews->cover) {
                Storage::disk('public')->delete($pageNews->cover);
            }
            $pageNews->delete();
            return redirect()->route('news')->with('success', 'News deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete news: ' . $e->getMessage());
        }
    }
}