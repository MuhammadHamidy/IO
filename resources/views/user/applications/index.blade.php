<x-layout>
<div class="max-w-7xl mx-auto py-10 px-4 mt-4">
    
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl p-8 mb-8 shadow-2xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">My Applications</h1>
                <p class="text-blue-100">Track your program application progress</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-5 rounded-r-xl shadow-sm">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-800 font-semibold">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 p-5 rounded-r-xl shadow-sm">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-red-800 font-semibold">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    
    <div class="mb-6" x-data="{ activeTab: 'active' }">
        <div class="flex gap-4 border-b-2 border-gray-200">
            <button @click="activeTab = 'active'" 
                    :class="activeTab === 'active' ? 'border-b-4 border-blue-600 text-blue-600' : 'text-gray-500 hover:text-gray-700'"
                    class="px-6 py-3 font-semibold transition-all duration-200 -mb-0.5">
                Active Applications
                <span class="ml-2 px-2 py-1 text-xs rounded-full" :class="activeTab === 'active' ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600'">
                    {{ count($activeApplications) }}
                </span>
            </button>
            <button @click="activeTab = 'completed'" 
                    :class="activeTab === 'completed' ? 'border-b-4 border-green-600 text-green-600' : 'text-gray-500 hover:text-gray-700'"
                    class="px-6 py-3 font-semibold transition-all duration-200 -mb-0.5">
                Completed Applications
                <span class="ml-2 px-2 py-1 text-xs rounded-full" :class="activeTab === 'completed' ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-600'">
                    {{ count($completedApplications) }}
                </span>
            </button>
        </div>

        
        <div x-show="activeTab === 'active'" class="space-y-6 mt-6">
            @forelse($activeApplications as $app)
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $app->program->title ?? 'Program' }}</h3>
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Submitted: {{ $app->submitted_at ? $app->submitted_at->format('d M Y') : '-' }}
                                </span>
                                @if($app->stage_updated_at)
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Last Update: {{ $app->stage_updated_at->format('d M Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <div class="text-sm font-semibold text-gray-600">Progress</div>
                                <div class="text-2xl font-bold text-blue-600">{{ $app->getProgressPercentage() }}%</div>
                            </div>
                            <a href="{{ route('user.applications.show', $app->id) }}" 
                               class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                
                <div class="p-8">
                    <div class="relative">
                        
                        <div class="absolute top-5 left-0 right-0 h-1 bg-gray-200 rounded" style="z-index: 0;"></div>
                        
                        <div class="absolute top-5 left-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded transition-all duration-500" 
                             style="width: {{ $app->getProgressPercentage() }}%; z-index: 1;"></div>
                        
                        
                        <div class="relative flex justify-between" style="z-index: 2;">
                            @php
                                $stages = \App\Models\ProgramApplication::getStages();
                                $currentStageIndex = array_search($app->current_stage, array_keys($stages));
                                $totalStages = count($stages);
                            @endphp

                            @foreach($stages as $stageKey => $stageLabel)
                                @php
                                    $stageIndex = array_search($stageKey, array_keys($stages));
                                    $isCompleted = $stageIndex < $currentStageIndex;
                                    $isCurrent = $stageIndex === $currentStageIndex;
                                    $isPending = $stageIndex > $currentStageIndex;
                                @endphp

                                <div class="flex flex-col items-center" style="flex: 1;">
                                    
                                    <div class="relative">
                                        @if($isCompleted)
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        @elseif($isCurrent)
                                            <div class="w-10 h-10 bg-white border-4 border-blue-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                                <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                                            </div>
                                        @else
                                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                                <div class="w-4 h-4 bg-gray-400 rounded-full"></div>
                                            </div>
                                        @endif

                                        
                                        <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 text-xs font-bold {{ $isCurrent ? 'text-blue-600' : ($isCompleted ? 'text-green-600' : 'text-gray-400') }}">
                                            {{ $stageIndex + 1 }}
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="mt-8 text-center max-w-[120px]">
                                        <div class="text-xs font-semibold {{ $isCurrent ? 'text-blue-700' : ($isCompleted ? 'text-green-700' : 'text-gray-500') }}">
                                            {{ $stageLabel }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    
                    <div class="mt-12 bg-blue-50 border-l-4 border-blue-500 p-5 rounded-r-xl">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                <div>
                                <h4 class="text-blue-900 font-bold mb-1">Current Stage: {{ $stages[$app->current_stage] }}</h4>
                                @if($app->current_stage === 'submitted' || $app->current_stage === 'waiting_approval_1' || $app->current_stage === 'waiting_approval_2')
                                    <p class="text-blue-700 text-sm">
                                        Your application is under review. Announcement of approval will be announced via email. Please check regularly to see the announcement of passing the first stage of approval.
                                    </p>
                                @elseif($app->current_stage === 'upload_requirements' || $app->current_stage === 'upload_transcript')
                                    <p class="text-blue-700 text-sm">
                                        Please upload the required documents to proceed to the next stage.
                                    </p>
                                @elseif($app->current_stage === 'completed')
                                    <p class="text-green-700 text-sm font-semibold">
                                        🎉 Congratulations! Your application has been completed successfully.
                                    </p>
                                @else
                                    <p class="text-blue-700 text-sm">
                                        {{ $stages[$app->current_stage] }}
                                    </p>
                                @endif

                                @if($app->admin_notes)
                                    <div class="mt-3 p-3 bg-white rounded-lg border border-blue-200">
                                        <p class="text-sm font-semibold text-gray-700 mb-1">Admin Notes:</p>
                                        <p class="text-sm text-gray-600">{{ $app->admin_notes }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-12 text-center">
                    <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Active Applications</h3>
                    <p class="text-gray-500 mb-6">You don't have any ongoing applications.</p>
                    <a href="{{ route('program') }}" class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Browse Programs
                    </a>
                </div>
            @endforelse
        </div>

        
        <div x-show="activeTab === 'completed'" class="space-y-6 mt-6">
            @forelse($completedApplications as $app)
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                
                <div class="p-6 border-b border-gray-200 {{ $app->status === 'accepted' ? 'bg-gradient-to-r from-green-50 to-emerald-50' : ($app->status === 'rejected' ? 'bg-gradient-to-r from-red-50 to-rose-50' : 'bg-gradient-to-r from-blue-50 to-indigo-50') }}">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $app->program->title ?? 'Program' }}</h3>
                                @if($app->status === 'accepted')
                                    <span class="px-4 py-1.5 bg-green-500 text-white rounded-full text-sm font-bold flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        ACCEPTED
                                    </span>
                                @elseif($app->status === 'rejected')
                                    <span class="px-4 py-1.5 bg-red-500 text-white rounded-full text-sm font-bold flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        REJECTED
                                    </span>
                                @else
                                    <span class="px-4 py-1.5 bg-blue-500 text-white rounded-full text-sm font-bold flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        COMPLETED
                                    </span>
                                @endif
                            </div>
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Submitted: {{ $app->submitted_at ? $app->submitted_at->format('d M Y') : '-' }}
                                </span>
                                @if($app->reviewed_at)
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Completed: {{ $app->reviewed_at->format('d M Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('user.applications.show', $app->id) }}" 
                           class="bg-gray-800 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-900 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            View Details
                        </a>
                    </div>
                </div>

                
                <div class="p-8">
                    <h4 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Application History
                    </h4>

                    @if($app->stage_history && count($app->stage_history) > 0)
                        <div class="relative">
                            
                            <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-200 via-purple-200 to-green-200"></div>
                            
                            
                            <div class="space-y-6">
                                @foreach(array_reverse($app->stage_history) as $index => $history)
                                    @php
                                        $isLast = $index === count($app->stage_history) - 1;
                                        $stages = \App\Models\ProgramApplication::getStages();
                                        $stageLabel = $stages[$history['stage']] ?? ucfirst(str_replace('_', ' ', $history['stage']));
                                        
                                        $colorClass = match($history['status']) {
                                            'accepted' => 'bg-green-500 border-green-600',
                                            'rejected' => 'bg-red-500 border-red-600',
                                            'under_review' => 'bg-yellow-500 border-yellow-600',
                                            'documents_verified' => 'bg-blue-500 border-blue-600',
                                            default => 'bg-gray-400 border-gray-500'
                                        };
                                        
                                        $bgClass = match($history['status']) {
                                            'accepted' => 'bg-green-50 border-green-200',
                                            'rejected' => 'bg-red-50 border-red-200',
                                            'under_review' => 'bg-yellow-50 border-yellow-200',
                                            'documents_verified' => 'bg-blue-50 border-blue-200',
                                            default => 'bg-gray-50 border-gray-200'
                                        };
                                    @endphp
                                    
                                    <div class="relative pl-12">
                                        
                                        <div class="absolute left-0 w-8 h-8 {{ $colorClass }} border-4 rounded-full flex items-center justify-center shadow-lg {{ $isLast ? 'animate-pulse' : '' }}">
                                            @if($history['status'] === 'accepted')
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            @elseif($history['status'] === 'rejected')
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            @else
                                                <div class="w-2 h-2 bg-white rounded-full"></div>
                                            @endif
                                        </div>
                                        
                                        
                                        <div class="border-2 {{ $bgClass }} rounded-xl p-4 shadow-md">
                                            <div class="flex items-center justify-between mb-2">
                                                <h5 class="font-bold text-gray-900">{{ $stageLabel }}</h5>
                                                <span class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($history['updated_at'])->format('d M Y, H:i') }}
                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $history['status'] === 'accepted' ? 'bg-green-100 text-green-700' : ($history['status'] === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700') }}">
                                                    {{ ucfirst(str_replace('_', ' ', $history['status'])) }}
                                                </span>
                                            </div>
                                            
                                            @if(isset($history['notes']) && $history['notes'])
                                                <p class="text-sm text-gray-700 mt-2 bg-white p-3 rounded-lg border border-gray-200">
                                                    <span class="font-semibold">Note:</span> {{ $history['notes'] }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p>No history available</p>
                        </div>
                    @endif

                    
                    @if($app->admin_notes)
                        @php
                            $notesBg = $app->status === 'accepted' ? 'bg-green-50 border-l-4 border-green-500' : ($app->status === 'rejected' ? 'bg-red-50 border-l-4 border-red-500' : 'bg-blue-50 border-l-4 border-blue-500');
                            $notesIconColor = $app->status === 'accepted' ? 'text-green-600' : ($app->status === 'rejected' ? 'text-red-600' : 'text-blue-600');
                            $notesTitleColor = $app->status === 'accepted' ? 'text-green-900' : ($app->status === 'rejected' ? 'text-red-900' : 'text-blue-900');
                            $notesTextColor = $app->status === 'accepted' ? 'text-green-700' : ($app->status === 'rejected' ? 'text-red-700' : 'text-blue-700');
                        @endphp
                        <div class="mt-6 p-5 {{ $notesBg }} rounded-r-xl">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 {{ $notesIconColor }} mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                <div>
                                    <h5 class="font-bold {{ $notesTitleColor }} mb-1">Final Message from Admin</h5>
                                    <p class="text-sm {{ $notesTextColor }}">{{ $app->admin_notes }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @empty
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-12 text-center">
                    <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Completed Applications</h3>
                    <p class="text-gray-500">Your completed applications will appear here.</p>
                </div>
        @endforelse
        </div>
    </div>
</div>
 </x-layout>
