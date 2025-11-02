<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PageNews;
use Illuminate\Http\Request;
use App\Models\ProgramsType;
use App\Models\Programs;
use Illuminate\Support\Facades\Auth;

class ProgramsController extends Controller
{
    public function index(){
        $query = Programs::where('status', 'published');
        
        // Filter by user_type if user is logged in
        if (Auth::check() && Auth::user()->user_type) {
            $query->where('program_type', Auth::user()->user_type);
        }
        
        $activePrograms = $query->latest()->get();
        $allPrograms = Programs::latest()->get();
        return view('programs', compact('activePrograms', 'allPrograms'));
    }

    public function degreeList(Request $request)
    {
        $query = Programs::where('status', 'published')
            ->where(function($q){
                $q->whereRaw("LOWER(type) = 'degree'");
            });

        // Filter by program_type (inbound/outbound)
        // Priority: manual request filter > user_type filter > show all (guest)
        if ($request->has('program_type') && $request->program_type != '') {
            $query->where('program_type', $request->program_type);
        } elseif (Auth::check() && Auth::user()->user_type) {
            // Auto-filter by user_type if user is logged in and no manual filter
            $query->where('program_type', Auth::user()->user_type);
        }

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $programs = $query->latest()->get();
        
        // Get available categories for filter dropdown
        $categoriesQuery = Programs::where('status', 'published')
            ->where(function($q){
                $q->whereRaw("LOWER(type) = 'degree'");
            })
            ->whereNotNull('category');
            
        // Also filter categories by user_type if logged in
        if (Auth::check() && Auth::user()->user_type && !$request->has('program_type')) {
            $categoriesQuery->where('program_type', Auth::user()->user_type);
        }
        
        $categories = $categoriesQuery->distinct()->pluck('category');

        $title = 'Degree Programs';
        return view('programs-list', compact('programs', 'title', 'categories'));
    }

    public function nonDegreeList(Request $request)
    {
        $query = Programs::where('status', 'published')
            ->where(function($q){
                $q->whereRaw("LOWER(type) = 'non-degree'");
            });

        // Filter by program_type (inbound/outbound)
        // Priority: manual request filter > user_type filter > show all (guest)
        if ($request->has('program_type') && $request->program_type != '') {
            $query->where('program_type', $request->program_type);
        } elseif (Auth::check() && Auth::user()->user_type) {
            // Auto-filter by user_type if user is logged in and no manual filter
            $query->where('program_type', Auth::user()->user_type);
        }

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $programs = $query->latest()->get();
        
        // Get available categories for filter dropdown
        $categoriesQuery = Programs::where('status', 'published')
            ->where(function($q){
                $q->whereRaw("LOWER(type) = 'non-degree'");
            })
            ->whereNotNull('category');
            
        // Also filter categories by user_type if logged in
        if (Auth::check() && Auth::user()->user_type && !$request->has('program_type')) {
            $categoriesQuery->where('program_type', Auth::user()->user_type);
        }
        
        $categories = $categoriesQuery->distinct()->pluck('category');

        $title = 'Non-Degree Programs';
        return view('programs-list', compact('programs', 'title', 'categories'));
    }

    public function iismaList()
    {
        $programs = Programs::where('status', 'published')
            ->where(function($q){
                $q->whereRaw("LOWER(type) = 'iisma'");
            })
            ->latest()
            ->get();
        $title = 'IISMA Programs';
        return view('programs-list', compact('programs','title'));
    }

    public function outbound() {
        $highlightedNews = PageNews::where('is_highlight', true)->get();

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
        return view('outbound', [
            'highlightedNews' => $highlightedNews
        ]);
    }

    public function inbound() {
        $highlightedNews = PageNews::where('is_highlight', true)->get();

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
        return view('inbound', [
            'highlightedNews' => $highlightedNews
        ]);
    }

    public function iisma() {
        $program = Programs::where('status', 'published')
            ->where('code', 'IISMA')
            ->first();

        if (!$program) {
            $program = (object)[
                'id' => null,
                'title' => 'Indonesian International Student Mobility Awards (IISMA)',
                'description' => 'Indonesian International Student Mobility Awards is the Government of Indonesia scholarship scheme to fund Indonesian students for mobility program at top universities overseas.',
                'requirements' => null,
                'image' => null,
                'duration' => null,
                'open_date' => null,
                'close_date' => null,
            ];
        }

        return view('iisma', compact('program'));
    }

    

    public function edit($id){
        $program = Programs::findOrFail($id);
        $programTypes = ProgramsType::all();
        return view('programs-update', compact('program', 'programTypes'));
    }

    public function create(){
        $programTypes = ProgramsType::all();
        return view('regist-program', compact('programTypes'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'type_id' => 'required|exists:program_types,id',
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
        $request['is_active'] = isset($request->is_active) && $request->is_active === 'on' ? true : false;
        try{
            Programs::create([
                'type_id' => $request->type_id,
                'code' => $request->code,
                'name' => $request->name,
                'is_active' => $request->is_active,
            ]);

            return redirect()->route('programs')->with('success', 'Program created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Program created failed ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'type_id' => 'required|exists:program_types,id',
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        try{
            $programs = Programs::findOrFail($id);
            $programs->update([
                'type_id' => $request->type_id,
                'code' => $request->code,
                'name' => $request->name,
                'is_active' => $request->is_active,
            ]);

            return redirect()->route('programs')->with('success', 'Program updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Program update failed ' . $e->getMessage());
        }
    }

    public function destroy($id){
        $programs = Programs::findOrFail($id);
        
        if ($programs->is_active) {
            $programs->is_active = false;
            $programs->save();

            return redirect()->route('programs')->with('success', 'Program deactivated successfully.');
        }

        $programs->delete();
        return redirect()->route('programs')->with('success', 'Program deleted successfully.');
    }
}
