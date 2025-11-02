<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramsType;

class ProgramsTypeController extends Controller
{
    public function index(){
        $programTypes = ProgramsType::all();
        return view('program-types', compact('programTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string|max:255|unique:program_types,name',
        ]);

        try {
            ProgramsType::create([
                'name' => $request->type_name,
            ]);

            return redirect()->back()->with('success', 'Program type created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Program type created failed ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try{
            $programType = ProgramsType::findOrFail($id);
            $programType->update([
                'name' => $request->name,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Program type updated failed ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Program type updated successfully.');
    }

    public function destroy($id){
        try{
            $programType = ProgramsType::findOrFail($id);
            $programType->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Program type deleted failed. Please delete the program that uses this type first.');
        }
        return redirect()->back()->with('success', 'Program type deleted successfully.');
    }
}
