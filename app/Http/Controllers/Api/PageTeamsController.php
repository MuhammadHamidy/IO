<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTeams;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageTeamsController extends Controller
{
    public function index(){
        $pageTeams = PageTeams::all();
        return view('page-teams', compact('pageTeams'));
    }

    public function show($id){
        $pageTeams = PageTeams::findOrFail($id);
        return view('page-teams-detail', compact('pageTeams'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $pageTeams = PageTeams::create([
            'code' => $request->code,
            'name' => $request->name,
            'title' => $request->title,
            'photo' => $photoPath,
            'created_by' => Auth::id(), 
        ]);

        return response()->json($pageTeams, 201);
    }

    
    public function update(Request $request, $id){
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pageTeams = PageTeams::findOrFail($id);

        $photoPath = $pageTeams->photo;
        if ($request->hasFile('photo')) {
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $pageTeams->update([
            'code' => $request->code,
            'name' => $request->name,
            'title' => $request->title,
            'photo' => $photoPath,
            'updated_by' => Auth::id(), 
        ]);

        return response()->json($pageTeams, 200);
    }

    public function destroy($id)
    {
        $pageTeams = PageTeams::findOrFail($id);
        if ($pageTeams->photo) {
            Storage::disk('public')->delete($pageTeams->photo);
        }
        $pageTeams->delete();

        return response()->json(null, 204);
    }
}
