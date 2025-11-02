<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProgramApplication;
use App\Models\Programs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewProgramApplication;
use Illuminate\Support\Facades\Notification;

class ApplicationController extends Controller
{
    public function index()
    {
        $activeApplications = ProgramApplication::with('program')
            ->where('user_id', Auth::id())
            ->whereNotIn('status', ['accepted', 'rejected'])
            ->where(function($query) {
                $query->where('current_stage', '!=', 'transcript_issuance')
                      ->orWhereNull('current_stage');
            })
            ->latest()
            ->get();
        
        $completedApplications = ProgramApplication::with('program')
            ->where('user_id', Auth::id())
            ->where(function($query) {
                $query->whereIn('status', ['accepted', 'rejected'])
                      ->orWhere('current_stage', 'transcript_issuance');
            })
            ->latest()
            ->get();
        
        return view('user.applications.index', compact('activeApplications', 'completedApplications'));
    }

    public function create($programId)
    {
        $program = Programs::findOrFail($programId);
        
        if ($program->isClosed()) {
            return redirect()->route('programs')->with('error', 'Sorry, the application period for this program has ended.');
        }
        
        if ($program->open_date && now()->lessThan($program->open_date)) {
            return redirect()->route('programs')->with('error', 'Applications for this program will open on ' . $program->open_date->format('F d, Y \a\t H:i'));
        }
        
        $u = Auth::user();
        if (!$u->phone || !$u->address || !$u->nationality) {
            return redirect()->route('user.profile.edit')->with('error', 'Please complete your profile (phone, address, nationality) before applying to a program.');
        }
        return view('user.applications.create', compact('program'));
    }

    public function store(Request $request, $programId)
    {
        $program = Programs::findOrFail($programId);
        $u = Auth::user();
        
        if ($program->isClosed()) {
            return redirect()->route('programs')->with('error', 'Sorry, the application period for this program has ended.');
        }
        
        if ($program->open_date && now()->lessThan($program->open_date)) {
            return redirect()->route('programs')->with('error', 'Applications for this program haven\'t opened yet.');
        }

        if (!$u->phone || !$u->address || !$u->nationality) {
            return redirect()->route('user.profile.edit')->with('error', 'Please complete your profile (phone, address, nationality) before applying to a program.');
        }

        $validated = $request->validate([
            'cv' => ['nullable', 'file', 'max:5120', 'mimes:pdf,doc,docx,jpg,jpeg,png'],
            'transcript' => ['nullable', 'file', 'max:5120', 'mimes:pdf,doc,docx,jpg,jpeg,png'],
            'toefl' => ['nullable', 'file', 'max:5120', 'mimes:pdf,doc,docx,jpg,jpeg,png'],
            'integrity_letter' => ['nullable', 'file', 'max:5120', 'mimes:pdf,doc,docx,jpg,jpeg,png'],
            'documents.*' => ['file', 'max:5120', 'mimes:pdf,doc,docx,jpg,jpeg,png'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $documents = [];
        $missingDocuments = [];
        
        $requiredDocs = [
            'cv' => ['field' => 'cv_path', 'label' => 'CV/Resume'],
            'transcript' => ['field' => 'transcript_path', 'label' => 'Academic Transcript'],
            'toefl' => ['field' => 'toefl_path', 'label' => 'TOEFL/IELTS Certificate'],
            'integrity_letter' => ['field' => 'integrity_letter_path', 'label' => 'Letter of Integrity']
        ];

        foreach ($requiredDocs as $inputName => $docInfo) {
            $profileField = $docInfo['field'];
            if ($request->hasFile($inputName)) {
                $documents[] = $request->file($inputName)->store('applications/'.Auth::id(), 'public');
            } elseif (!empty($u->{$profileField})) {
                $documents[] = $u->{$profileField};
            } else {
                $missingDocuments[] = $docInfo['label'];
            }
        }

        if (!empty($missingDocuments)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Cannot submit application. Missing required documents: ' . implode(', ', $missingDocuments) . '. Please upload them or add them to your profile first.');
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $documents[] = $file->store('applications/'.Auth::id(), 'public');
            }
        }

        $application = ProgramApplication::create([
            'user_id' => Auth::id(),
            'program_id' => $program->id,
            'status' => 'submitted',
            'current_stage' => 'submitted',
            'documents' => $documents,
            'notes' => $validated['notes'] ?? null,
            'submitted_at' => now(),
            'stage_updated_at' => now(),
            'stage_history' => [[
                'stage' => 'submitted',
                'status' => 'submitted',
                'updated_at' => now()->toDateTimeString(),
                'notes' => 'Application submitted',
            ]],
        ]);
        
        $admins = \App\Models\User::where('role_id', 1)->get();
        Notification::send($admins, new NewProgramApplication($application));

        return redirect()->route('user.applications.index')->with('success', 'Thank you for applying! Your application for ' . $program->title . ' has been submitted successfully. We will review your application and notify you of any updates.');
    }

    public function show($id)
    {
        $application = ProgramApplication::with('program')
            ->where('user_id', Auth::id())
            ->findOrFail($id);
        return view('user.applications.show', compact('application'));
    }
}


