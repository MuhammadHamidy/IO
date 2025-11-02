@extends('components.admin-layout')

@section('page-title', 'Program Applicants')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    
    <div class="mb-6">
        <div class="flex items-center mb-4">
            <a href="{{ route('admin.applications.index') }}" class="text-blue-600 hover:text-blue-800 mr-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $program->title }}</h1>
                <p class="text-gray-600">{{ $program->type }} Program</p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-600 text-sm font-medium">Total</p>
                    <p class="text-2xl font-bold text-blue-700">{{ $stats['total'] }}</p>
                </div>
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-r-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-600 text-sm font-medium">Pending</p>
                    <p class="text-2xl font-bold text-yellow-700">{{ $stats['pending'] }}</p>
                </div>
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-medium">Accepted</p>
                    <p class="text-2xl font-bold text-green-700">{{ $stats['accepted'] }}</p>
                </div>
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-600 text-sm font-medium">Rejected</p>
                    <p class="text-2xl font-bold text-red-700">{{ $stats['rejected'] }}</p>
                </div>
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-6">
        <form method="GET" action="{{ route('admin.applications.program', $program->id) }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full border-2 border-gray-200 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Status</option>
                        <option value="submitted" {{ request('status') === 'submitted' ? 'selected' : '' }}>Submitted</option>
                        <option value="under_review" {{ request('status') === 'under_review' ? 'selected' : '' }}>Under Review</option>
                        <option value="documents_verified" {{ request('status') === 'documents_verified' ? 'selected' : '' }}>Documents Verified</option>
                        <option value="accepted" {{ request('status') === 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Current Stage</label>
                    <select name="stage" class="w-full border-2 border-gray-200 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Stages</option>
                        @foreach(\App\Models\ProgramApplication::getStages() as $key => $label)
                            <option value="{{ $key }}" {{ request('stage') === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Sort By</label>
                    <select name="sort_by" class="w-full border-2 border-gray-200 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Submit Date</option>
                        <option value="gpa" {{ request('sort_by') === 'gpa' ? 'selected' : '' }}>GPA</option>
                        <option value="toefl" {{ request('sort_by') === 'toefl' ? 'selected' : '' }}>TOEFL Score</option>
                        <option value="updated_at" {{ request('sort_by') === 'updated_at' ? 'selected' : '' }}>Last Updated</option>
                    </select>
                </div>

                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Order</label>
                    <select name="sort_order" class="w-full border-2 border-gray-200 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Highest First</option>
                        <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Lowest First</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Apply Filters
                </button>
                <a href="{{ route('admin.applications.program', $program->id) }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-400 transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase">Applicant</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase">Academic Info</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase">Stage</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase">Progress</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if($applications->count() > 0)
                        @foreach($applications as $app)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($app->user->avatar)
                                        <img src="{{ asset('storage/' . $app->user->avatar) }}" alt="avatar" class="w-10 h-10 rounded-full mr-3 object-cover">
                                    @else
                                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                            {{ substr($app->user->name ?? 'U', 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $app->user->name ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-500">{{ $app->user->email }}</div>
                                        <div class="text-xs text-gray-400">{{ $app->user->nationality ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    <div class="flex items-center mb-1">
                                        <span class="font-semibold text-gray-700 mr-2">GPA:</span>
                                        <span class="text-gray-900">{{ $app->user->gpa ?? 'N/A' }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="font-semibold text-gray-700 mr-2">TOEFL:</span>
                                        <span class="text-gray-900">{{ $app->user->toefl_score ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $stages = \App\Models\ProgramApplication::getStages();
                                    $stageLabel = $stages[$app->current_stage] ?? 'Unknown';
                                @endphp
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                    {{ in_array($app->current_stage, ['submitted', 'waiting_approval_1', 'waiting_approval_2']) ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ in_array($app->current_stage, ['upload_requirements', 'upload_transcript']) ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $app->current_stage === 'completed' ? 'bg-green-100 text-green-800' : '' }}">
                                    {{ $stageLabel }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $app->status === 'submitted' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $app->status === 'under_review' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $app->status === 'documents_verified' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $app->status === 'accepted' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $app->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst(str_replace('_', ' ', $app->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-1 bg-gray-200 rounded-full h-2 mr-2" style="width: 80px;">
                                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2 rounded-full" style="width: {{ $app->getProgressPercentage() }}%"></div>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-700">{{ $app->getProgressPercentage() }}%</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.applications.show', $app->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded text-xs font-semibold hover:bg-blue-700 transition">
                                        View Detail
                                    </a>
                                    <button onclick="openStageModal({{ $app->id }}, '{{ $app->current_stage }}', '{{ $app->status }}')" 
                                            class="bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold hover:bg-green-700 transition">
                                        Update
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="text-xl font-bold text-gray-700 mb-2">No Applications Yet</p>
                                <p class="text-gray-500">This program has not received any applications.</p>
                                <p class="text-sm text-gray-400 mt-2">Applications will appear here once students start applying.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    
    @if($applications->count() > 0)
        <div class="mt-6">
            {{ $applications->appends(request()->query())->links() }}
        </div>
    @endif
</div>


<div id="stageModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[200] items-center justify-center p-4 hidden">
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
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Admin Notes (Optional)</label>
                    <textarea name="admin_notes" rows="4" class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add notes for the applicant..."></textarea>
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
    modal.classList.add('flex');
}

function closeStageModal() {
    const modal = document.getElementById('stageModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

document.getElementById('stageModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeStageModal();
    }
});
</script>
@endsection

