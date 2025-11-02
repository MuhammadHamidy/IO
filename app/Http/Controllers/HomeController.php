<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Events;
use \App\Models\PageNews;
use \App\Models\PageTestimonials;
use \App\Models\Programs;

class HomeController extends Controller
{
    

    
    public function index()
    {
        $testimonials = PageTestimonials::where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        $events = Events::where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->orderBy('date', 'desc')
            ->take(6)
            ->get();
        
        // Merge program open/close date ranges into calendar events
        $programDateEvents = Programs::whereNotNull('open_date')
            ->orWhereNotNull('close_date')
            ->get()
            ->map(function($program) {
                return (object) [
                    'name' => ($program->title ?? $program->name),
                    'open_date' => optional($program->open_date)->toDateString(),
                    'close_date' => optional($program->close_date)->toDateString(),
                    'type' => 'program',
                ];
            });
        
        // Combine and limit events shown on home calendar
        $combinedEvents = $programDateEvents
            ->map(function($e){ return (array)$e; })
            ->concat($events->map(function($e){ return [
                'name' => ($e->title ?: $e->name) ?: 'Event',
                'date' => $e->date ? $e->date->toDateString() : null,
                'open_date' => $e->open_date ? $e->open_date->toDateString() : null,
                'close_date' => $e->close_date ? $e->close_date->toDateString() : null,
                'type' => 'event',
            ]; }))
            ->sortByDesc('date')
            ->values();
        $highlightedNews = PageNews::where('is_highlight', true)
            ->where('is_publish', true)
            ->where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->active()
            ->get();

        if ($highlightedNews->isEmpty()) {
            $highlightedNews = collect([
                (object)[
                    'id' => 0,
                    'cover' => null,
                    'image' => null,
                    'title' => 'Default News Title',
                    'content' => 'This is a default news content. No highlighted news available at the moment.',
                ]
            ]);
        }

        
        $recentNews = PageNews::where('is_publish', true)
            ->where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->active()
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Include recent events as breaking items on home
        $recentEvents = Events::where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->orderBy('date', 'desc')
            ->take(6)
            ->get()
            ->map(function($e){
                return (object) [
                    'id' => 'event-' . $e->id,
                    'cover' => null,
                    'image' => $e->image,
                    'title' => $e->title ?: $e->name,
                    'content' => $e->description ?? '',
                    'created_at' => $e->date ?? now(),
                    'is_highlight' => false,
                ];
            });

        $recentNews = $recentEvents->concat($recentNews)->sortByDesc('created_at')->values();

        
        $programsQuery = Programs::where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->where('is_active', true);
        
        // Filter by user_type if user is logged in
        if (Auth::check() && Auth::user()->user_type) {
            $programsQuery->where('program_type', Auth::user()->user_type);
        }
        
        $programs = $programsQuery->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Featured Programs
        $featuredProgramsQuery = Programs::where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->where('is_active', true)
            ->where('is_featured', true);
        
        // Filter by user_type if user is logged in
        if (Auth::check() && Auth::user()->user_type) {
            $featuredProgramsQuery->where('program_type', Auth::user()->user_type);
        }
        
        $featuredPrograms = $featuredProgramsQuery->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('home', [
            'testimonials' => $testimonials,
            'event' => $combinedEvents->toArray(),
            'highlightedNews' => $highlightedNews,
            'recentNews' => $recentNews,
            'programs' => $programs,
            'featuredPrograms' => $featuredPrograms
        ]);
    }
}
