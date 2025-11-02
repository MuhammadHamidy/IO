@extends('components.admin-layout')

@section('page-title', 'Applicant Details')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <a href="{{ route('admin.applications.program', $application->program_id) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $application->user->name }}</h1>
                    <p class="text-gray-600">Application for {{ $application->program->title }}</p>
                </div>
            </div>
            <button onclick="openStageModal({{ $application->id }}, '{{ $application->current_stage }}', '{{ $application->status }}')" 
                    class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-lg">
                Update Status
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Personal Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center">
                        @if($application->user->avatar)
                            <img src="{{ asset('storage/' . $application->user->avatar) }}" alt="avatar" class="w-20 h-20 rounded-full mr-4 object-cover border-4 border-blue-100">
                        @else
                            <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mr-4">
                                {{ substr($application->user->name, 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <p class="font-semibold text-gray-900">{{ $application->user->name }}</p>
                            <p class="text-sm text-gray-600">{{ $application->user->email }}</p>
                        </div>
                    </div>
                    <div></div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs text-gray-500 mb-1">Phone Number</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->phone ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs text-gray-500 mb-1">Date of Birth</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->date_of_birth ? $application->user->date_of_birth->format('d M Y') : 'Not provided' }}</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs text-gray-500 mb-1">Place of Birth</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->place_of_birth ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs text-gray-500 mb-1">Nationality</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->nationality ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs text-gray-500 mb-1">Religion</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->religion ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs text-gray-500 mb-1">Passport Number</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->passport_number ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs text-gray-500 mb-1">Passport Expiration</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->passport_expiration_date ? $application->user->passport_expiration_date->format('d M Y') : 'Not provided' }}</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">Current Address</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->address ?? 'Not provided' }}</p>
                    </div>

                    @if($application->user->mailing_address)
                        <div class="bg-gray-50 p-3 rounded-lg md:col-span-2">
                            <p class="text-xs text-gray-500 mb-1">Mailing Address</p>
                            <p class="font-semibold text-gray-900">{{ $application->user->mailing_address }}</p>
                        </div>
                    @endif
                </div>
            </div>

            
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Academic Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-purple-50 p-4 rounded-lg border-l-4 border-purple-500">
                        <p class="text-xs text-purple-600 mb-1">Program Study</p>
                        <p class="font-bold text-purple-900">{{ $application->user->program_study ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-purple-50 p-4 rounded-lg border-l-4 border-purple-500">
                        <p class="text-xs text-purple-600 mb-1">Faculty</p>
                        <p class="font-bold text-purple-900">{{ $application->user->faculty ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                        <p class="text-xs text-blue-600 mb-1">Student ID / NIM</p>
                        <p class="font-bold text-blue-900">{{ $application->user->student_id ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-500">
                        <p class="text-xs text-green-600 mb-1">GPA</p>
                        <p class="font-bold text-green-900 text-2xl">{{ $application->user->gpa ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-xs text-gray-500 mb-1">Year / Semester</p>
                        <p class="font-semibold text-gray-900">{{ $application->user->year_semester ?? 'Not provided' }}</p>
                    </div>

                    <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-500">
                        <p class="text-xs text-yellow-600 mb-1">TOEFL/IELTS Score</p>
                        <p class="font-bold text-yellow-900 text-2xl">{{ $application->user->toefl_score ?? 'Not provided' }}</p>
                        @if($application->user->toefl_test_date)
                            <p class="text-xs text-yellow-700 mt-1">Test Date: {{ $application->user->toefl_test_date->format('d M Y') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Documents
                </h2>

                
                <div class="mb-6">
                    <h3 class="font-bold text-gray-800 mb-3">Profile Documents</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @php
                            $documents = [
                                ['label' => 'Curriculum Vitae (CV)', 'field' => 'cv_path'],
                                ['label' => 'Academic Transcript', 'field' => 'transcript_path'],
                                ['label' => 'English Proficiency Certificate', 'field' => 'toefl_path'],
                                ['label' => 'Letter of Integrity', 'field' => 'integrity_letter_path'],
                            ];
                        @endphp

                        @foreach($documents as $doc)
                            <div class="flex items-center justify-between {{ $application->user->{$doc['field']} ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200' }} p-3 rounded-lg">
                                <div class="flex items-center">
                                    @if($application->user->{$doc['field']})
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-green-800">{{ $doc['label'] }}</span>
                                    @else
                                        <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-red-800">{{ $doc['label'] }}</span>
                                    @endif
                                </div>
                                @if($application->user->{$doc['field']})
                                    <a href="{{ asset('storage/' . $application->user->{$doc['field']}) }}" target="_blank" 
                                       class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                        View
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                
                @if(!empty($application->documents) && count($application->documents) > 0)
                    <div>
                        <h3 class="font-bold text-gray-800 mb-3">Additional Application Documents</h3>
                        <ul class="space-y-2">
                            @foreach($application->documents as $doc)
                                @if(!in_array($doc, [$application->user->cv_path, $application->user->transcript_path, $application->user->toefl_path, $application->user->integrity_letter_path]))
                                    <li class="flex items-center justify-between bg-blue-50 p-3 rounded-lg">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-blue-900">{{ basename($doc) }}</span>
                                        </div>
                                        <a href="{{ asset('storage/' . $doc) }}" target="_blank" 
                                           class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                            View
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            
            @if($application->user->parent_name)
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Parent/Guardian Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Name</p>
                            <p class="font-semibold text-gray-900">{{ $application->user->parent_name }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Relationship</p>
                            <p class="font-semibold text-gray-900">{{ $application->user->parental_relationship ?? 'Not specified' }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Phone</p>
                            <p class="font-semibold text-gray-900">{{ $application->user->parent_telephone ?? 'Not provided' }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Mobile</p>
                            <p class="font-semibold text-gray-900">{{ $application->user->parent_mobile ?? 'Not provided' }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Email</p>
                            <p class="font-semibold text-gray-900">{{ $application->user->parent_email ?? 'Not provided' }}</p>
                        </div>
                        @if($application->user->parent_address)
                            <div class="bg-gray-50 p-3 rounded-lg md:col-span-2">
                                <p class="text-xs text-gray-500 mb-1">Address</p>
                                <p class="font-semibold text-gray-900">{{ $application->user->parent_address }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            
            @if($application->notes)
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-3">Applicant's Notes</h2>
                    <p class="text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-lg">{{ $application->notes }}</p>
                </div>
            @endif
        </div>

        
        <div class="space-y-6">
            
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Application Status</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Current Stage</p>
                        @php
                            $stages = \App\Models\ProgramApplication::getStages();
                            $stageLabel = $stages[$application->current_stage] ?? 'Unknown';
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                            {{ in_array($application->current_stage, ['submitted', 'waiting_approval_1', 'waiting_approval_2']) ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ in_array($application->current_stage, ['upload_requirements', 'upload_transcript']) ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $application->current_stage === 'completed' ? 'bg-green-100 text-green-800' : '' }}">
                            {{ $stageLabel }}
                        </span>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 mb-1">Status</p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                            {{ $application->status === 'submitted' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $application->status === 'under_review' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $application->status === 'documents_verified' ? 'bg-purple-100 text-purple-800' : '' }}
                            {{ $application->status === 'accepted' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $application->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                        </span>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 mb-1">Progress</p>
                        <div class="flex items-center">
                            <div class="flex-1 bg-gray-200 rounded-full h-3 mr-3">
                                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-3 rounded-full" style="width: {{ $application->getProgressPercentage() }}%"></div>
                            </div>
                            <span class="text-lg font-bold text-gray-900">{{ $application->getProgressPercentage() }}%</span>
                        </div>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 mb-1">Submitted</p>
                        <p class="font-semibold text-gray-900">{{ $application->submitted_at ? $application->submitted_at->format('d M Y, H:i') : 'N/A' }}</p>
                    </div>

                    @if($application->stage_updated_at)
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Last Updated</p>
                            <p class="font-semibold text-gray-900">{{ $application->stage_updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            
            <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-r-xl shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Admin Notes</h3>
                <p class="text-gray-700 leading-relaxed">{{ $application->admin_notes ?? 'No notes yet' }}</p>
            </div>
        </div>
    </div>
</div>


<div id="stageModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[200] flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full">
        <form id="stageForm" method="POST" action="">
            @csrf
            @method('PUT')
            
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-2xl font-bold text-gray-900">Update Application</h3>
            </div>

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Current Stage</label>
                    <select name="current_stage" id="stageSelect" class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach(\App\Models\ProgramApplication::getStages() as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" id="statusSelect" class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="submitted">Submitted</option>
                        <option value="under_review">Under Review</option>
                        <option value="documents_verified">Documents Verified</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Admin Notes</label>
                    <textarea name="admin_notes" id="adminNotes" rows="4" class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add notes for the applicant...">{{ $application->admin_notes }}</textarea>
                </div>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-200 flex gap-3">
                <button type="button" onclick="closeStageModal()" class="flex-1 bg-gray-300 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-400 transition">
                    Cancel
                </button>
                <button type="submit" class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                    Update Application
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openStageModal(appId, currentStage, currentStatus) {
    const modal = document.getElementById('stageModal');
    const form = document.getElementById('stageForm');
    const stageSelect = document.getElementById('stageSelect');
    const statusSelect = document.getElementById('statusSelect');
    
    form.action = `/admin/applications/${appId}/status`;
    stageSelect.value = currentStage;
    statusSelect.value = currentStatus;
    
    modal.classList.remove('hidden');
}

function closeStageModal() {
    document.getElementById('stageModal').classList.add('hidden');
}

document.getElementById('stageModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeStageModal();
    }
});
</script>
@endsection

