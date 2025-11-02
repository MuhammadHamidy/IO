<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = \App\Models\User::query()->findOrFail(Auth::id());
        return view('user.profile.show', compact('user'));
    }

    public function account()
    {
        $user = \App\Models\User::query()->findOrFail(Auth::id());
        return view('user.profile.account', compact('user'));
    }

    public function education()
    {
        $user = \App\Models\User::query()->findOrFail(Auth::id());
        return view('user.profile.education', compact('user'));
    }

    public function documents()
    {
        $user = \App\Models\User::query()->findOrFail(Auth::id());
        return view('user.profile.documents', compact('user'));
    }
    public function edit()
    {
        $user = \App\Models\User::query()->findOrFail(Auth::id());
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = \App\Models\User::query()->findOrFail(Auth::id());

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'student_id' => ['required', 'string', 'max:100'],
            'date_of_birth' => ['required', 'date'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'faculty' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:100'],
            'religion' => ['required', 'string', 'max:100'],
            'passport_number' => ['required', 'string', 'max:100'],
            'passport_expiration_date' => ['required', 'date', 'after:today'],
            'phone' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string'],
            'mailing_address' => ['required', 'string'],
            'gpa' => ['required', 'numeric', 'min:3.0', 'max:4.0'],
            'year_semester' => ['required', 'string', 'max:50'],
            'program_study' => ['required', 'string', 'max:255'],
            'toefl_score' => ['required', 'string', 'max:50'],
            'toefl_test_date' => ['required', 'date'],
            'parent_name' => ['required', 'string', 'max:255'],
            'parental_relationship' => ['required', 'string', 'max:100'],
            'parent_address' => ['required', 'string'],
            'parent_telephone' => ['required', 'string', 'max:50'],
            'parent_mobile' => ['required', 'string', 'max:50'],
            'parent_email' => ['required', 'email', 'max:255'],
            'password' => ['sometimes', 'nullable', 'confirmed', 'min:6'],
            'avatar' => ['sometimes', 'nullable', 'image', 'max:2048'],
            'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'],
            'transcript' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'toefl' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'integrity_letter' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
        ];

        $validated = $request->validate($rules, [
            'gpa.min' => 'Your GPA must be at least 3.0 to be eligible for international programs.',
            'gpa.numeric' => 'GPA must be a valid number (e.g., 3.5).',
            'passport_expiration_date.after' => 'Your passport must be valid for at least 6 months.',
            'date_of_birth.required' => 'Date of birth is required.',
            'place_of_birth.required' => 'Place of birth is required.',
            'student_id.required' => 'Student ID is required.',
            'faculty.required' => 'Department/Faculty is required.',
            'nationality.required' => 'Nationality is required.',
            'religion.required' => 'Religion is required.',
            'passport_number.required' => 'Passport number is required.',
            'phone.required' => 'Phone number is required.',
            'address.required' => 'Address is required.',
            'mailing_address.required' => 'Mailing address is required.',
            'year_semester.required' => 'Year/Semester is required.',
            'program_study.required' => 'Program of study is required.',
            'toefl_score.required' => 'TOEFL/IELTS score is required.',
            'toefl_test_date.required' => 'TOEFL/IELTS test date is required.',
            'parent_name.required' => 'Parent\'s name is required.',
            'parental_relationship.required' => 'Parental relationship is required.',
            'parent_address.required' => 'Parent\'s address is required.',
            'parent_telephone.required' => 'Parent\'s telephone number is required.',
            'parent_mobile.required' => 'Parent\'s mobile number is required.',
            'parent_email.required' => 'Parent\'s email is required.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        
        if (!empty($validated['password'] ?? null)) {
            $user->password = $validated['password'];
        }
        
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('avatars/'.Auth::id(), 'public');
        }
        
        foreach ([
            'phone', 'address', 'mailing_address', 'date_of_birth', 'place_of_birth',
            'nationality', 'religion', 'passport_number', 'passport_expiration_date',
            'program_study', 'faculty', 'student_id', 'gpa', 'year_semester',
            'toefl_score', 'toefl_test_date', 'parent_name', 'parental_relationship',
            'parent_address', 'parent_telephone', 'parent_mobile', 'parent_email'
        ] as $f) {
            if (array_key_exists($f, $validated)) {
                $user->{$f} = $validated[$f];
            }
        }

        if ($request->hasFile('cv')) {
            $user->cv_path = $request->file('cv')->store('profiles/'.Auth::id(), 'public');
        }
        if ($request->hasFile('transcript')) {
            $user->transcript_path = $request->file('transcript')->store('profiles/'.Auth::id(), 'public');
        }
        if ($request->hasFile('toefl')) {
            $user->toefl_path = $request->file('toefl')->store('profiles/'.Auth::id(), 'public');
        }
        if ($request->hasFile('integrity_letter')) {
            $user->integrity_letter_path = $request->file('integrity_letter')->store('profiles/'.Auth::id(), 'public');
        }
        
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}


