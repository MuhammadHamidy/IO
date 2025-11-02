<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTestimonials;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PageTestimonialsController extends Controller
{
    public function index(){
        $pageTestimonials = PageTestimonials::orderBy('created_at', 'desc')->get();
        return view('page-testimonials', compact('pageTestimonials'));
    }

    public function show($id){
        $pageTestimonials = PageTestimonials::findOrFail($id);
        return view('page-testimonials-detail', compact('pageTestimonials'));
    }

    public function create(){
        return view('regist-testimonials');
    }

    private function limit_words($string, $word_limit) {
        $words = explode(' ', $string);
        return implode(' ', array_slice($words, 0, $word_limit));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $wordLimit = 5; 
        $descriptionWords = str_word_count($request->description);
        if ($descriptionWords > $wordLimit) {
            return redirect()->back()->withErrors(['description' => 'Description should not exceed ' . $wordLimit . ' words.'])->withInput();
        }

        try {
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('testimonials', 'public');
            }

            $pageTestimonials = PageTestimonials::create([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $photoPath,
                'created_by' => Auth::id(), 
            ]);

            return redirect()->route('page-testimonials')->with('success', 'Testimonials created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create testimonial: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $testimonial = PageTestimonials::findOrFail($id);
        return view('testimonials-update', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $wordLimit = 5; 
        $descriptionWords = str_word_count($request->description);
        if ($descriptionWords > $wordLimit) {
            return redirect()->back()->withErrors(['description' => 'Description should not exceed ' . $wordLimit . ' words.'])->withInput();
        }

        try {
            $pageTestimonials = PageTestimonials::findOrFail($id);

            $photoPath = $pageTestimonials->photo;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('testimonials', 'public');
            }

            $pageTestimonials->update([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $photoPath,
            ]);

            return redirect()->route('page-testimonials')->with('success', 'Testimonials updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update testimonial: ' . $e->getMessage());
        }
    }

    public function destroy($id){
        $pageTestimonials = PageTestimonials::findOrFail($id);
        $pageTestimonials->delete();

        return redirect()->route('page-testimonials')->with('success', 'Testimonials deleted successfully.');
    }

}
