<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(){
        $events = Events::where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->orderBy('date', 'desc')
            ->get();
        return view('events', compact('events'));
    }

    public function show($id)
    {
        $event = Events::where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->findOrFail($id);
        return view('event-detail', compact('event'));
    }

    public function edit($id){
        $events = Events::findOrFail($id);
        return view('events-update', compact('events'));
    }

    public function create(){
        return view('regist-events');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'nullable|date',
            'open_date' => 'nullable|date',
            'close_date' => 'nullable|date|after_or_equal:open_date',
            'description' => 'nullable|string',
        ]);

        try{
            $events = Events::create([
                'name' => $request->name,
                'date' => $request->date,
                'open_date' => $request->open_date,
                'close_date' => $request->close_date,
                'description' => $request->description,
            ]);

            return redirect()->route('events')->with('success', 'Events created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create events: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'nullable|date',
            'open_date' => 'nullable|date',
            'close_date' => 'nullable|date|after_or_equal:open_date',
            'description' => 'nullable|string',
        ]);

        try{
            $events = Events::findOrFail($id);
            $events->update([
                'name' => $request->name,
                'date' => $request->date,
                'open_date' => $request->open_date,
                'close_date' => $request->close_date,
                'description' => $request->description,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update events: ' . $e->getMessage());
        }

        return redirect()->route('events')->with('success', 'Events updated successfully.');
    }

    public function destroy($id){
        try{
            $events = Events::findOrFail($id);
            $events->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete events: ' . $e->getMessage());
        }
        return redirect()->route('events')->with('success', 'Events deleted successfully.');
    }
}
