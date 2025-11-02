<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramApplication;
use Illuminate\Http\Request;
use App\Notifications\ApplicationStatusUpdated;
use Illuminate\Support\Facades\Auth;

class ApplicationAdminController extends Controller
{
    public function index()
    {
        
        $totalApplications = ProgramApplication::count();
        $pendingApplications = ProgramApplication::whereIn('status', ['submitted', 'under_review'])->count();
        $acceptedApplications = ProgramApplication::where('status', 'accepted')->count();
        $activePrograms = \App\Models\Programs::where('status', 'published')->count();
        
        
        $programs = \App\Models\Programs::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $programStats = $programs->map(function($program) {
            $applications = ProgramApplication::where('program_id', $program->id);
            
            return (object)[
                'program' => $program,
                'total' => $applications->count(),
                'pending' => (clone $applications)->whereIn('status', ['submitted', 'under_review'])->count(),
                'accepted' => (clone $applications)->where('status', 'accepted')->count(),
                'rejected' => (clone $applications)->where('status', 'rejected')->count(),
            ];
        });
        
        return view('admin.applications.index', compact(
            'programStats',
            'totalApplications',
            'pendingApplications',
            'acceptedApplications',
            'activePrograms'
        ));
    }

    public function programApplicants($programId)
    {
        $program = \App\Models\Programs::findOrFail($programId);
        
        
        $query = ProgramApplication::with(['user', 'program'])
            ->where('program_id', $programId);
        
        
        if (request('status')) {
            $query->where('status', request('status'));
        }
        
        if (request('stage')) {
            $query->where('current_stage', request('stage'));
        }
        
        
        $sortBy = request('sort_by', 'created_at');
        $sortOrder = request('sort_order', 'desc');
        
        if ($sortBy === 'gpa') {
            $query->join('users', 'program_applications.user_id', '=', 'users.id')
                  ->select('program_applications.*')
                  ->orderBy('users.gpa', $sortOrder);
        } elseif ($sortBy === 'toefl') {
            $query->join('users', 'program_applications.user_id', '=', 'users.id')
                  ->select('program_applications.*')
                  ->orderBy('users.toefl_score', $sortOrder);
        } else {
            $query->orderBy($sortBy, $sortOrder);
        }
        
        $applications = $query->paginate(20);
        
        
        $stats = [
            'total' => ProgramApplication::where('program_id', $programId)->count(),
            'pending' => ProgramApplication::where('program_id', $programId)->whereIn('status', ['submitted', 'under_review'])->count(),
            'accepted' => ProgramApplication::where('program_id', $programId)->where('status', 'accepted')->count(),
            'rejected' => ProgramApplication::where('program_id', $programId)->where('status', 'rejected')->count(),
        ];
        
        return view('admin.applications.program', compact('program', 'applications', 'stats'));
    }

    public function showApplicant($id)
    {
        $application = ProgramApplication::with(['user', 'program'])->findOrFail($id);
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:draft,submitted,under_review,documents_verified,accepted,rejected'],
            'current_stage' => ['nullable', 'string'],
            'admin_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $application = ProgramApplication::findOrFail($id);
        
        
        $newStage = $validated['current_stage'] ?? $application->current_stage;
        
        
        if (in_array($validated['status'], ['accepted', 'rejected'])) {
            $newStage = 'transcript_issuance';
        }
        
        
        $stageHistory = $application->stage_history ?? [];
        $stageHistory[] = [
            'stage' => $newStage,
            'status' => $validated['status'],
            'updated_by' => Auth::id(),
            'updated_at' => now()->toDateTimeString(),
            'notes' => $validated['admin_notes'] ?? null,
        ];
        
        $application->status = $validated['status'];
        $application->current_stage = $newStage;
        
        $application->admin_notes = $validated['admin_notes'] ?? $application->admin_notes;
        $application->stage_history = $stageHistory;
        $application->stage_updated_at = now();
        
        if (in_array($validated['status'], ['under_review', 'documents_verified', 'accepted', 'rejected'])) {
            $application->reviewed_at = now();
        }
        
        $application->save();
        
        
        $application->user->notify(new ApplicationStatusUpdated($application));

        $statusMessage = match($validated['status']) {
            'accepted' => 'Application ACCEPTED! The applicant has been notified via email.',
            'rejected' => 'Application REJECTED. The applicant has been notified via email.',
            'under_review' => 'Application is now under review. The applicant has been notified.',
            'documents_verified' => 'Documents verified successfully. The applicant has been notified.',
            default => 'Application status updated successfully! The applicant has been notified via email.'
        };

        return redirect()->back()->with('success', $statusMessage);
    }
}


