@extends('components.admin-layout')

@section('page-title', 'Program Applications')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Program Applications Management</h1>
        <p class="text-gray-600">View and manage applications by program</p>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Applications</p>
                    <p class="text-3xl font-bold mt-2">{{ $totalApplications }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Pending Review</p>
                    <p class="text-3xl font-bold mt-2">{{ $pendingApplications }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Accepted</p>
                    <p class="text-3xl font-bold mt-2">{{ $acceptedApplications }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Active Programs</p>
                    <p class="text-3xl font-bold mt-2">{{ $activePrograms }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    
    <div>
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Applications by Program</h2>
        
        @if(count($programStats) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($programStats as $stat)
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                        
                        <div class="bg-gradient-to-r {{ $stat->total > 0 ? 'from-blue-500 to-indigo-600' : 'from-gray-400 to-gray-500' }} p-5 text-white">
                            <div class="flex items-start justify-between gap-3 mb-2">
                                <h3 class="text-lg font-bold leading-tight flex-1 line-clamp-2">{{ $stat->program->title ?? 'Unknown Program' }}</h3>
                                <span class="bg-white/20 text-white px-2.5 py-1 rounded-full text-xs font-semibold whitespace-nowrap flex-shrink-0">
                                    {{ $stat->program->type ?? 'N/A' }}
                                </span>
                            </div>
                            @if($stat->program->duration)
                                <p class="{{ $stat->total > 0 ? 'text-blue-100' : 'text-gray-200' }} text-sm font-medium">
                                    Duration: {{ $stat->program->duration }}
                                </p>
                            @endif
                        </div>

                        
                        <div class="p-5 flex-1 flex flex-col">
                            @if($stat->total > 0)
                                <div class="grid grid-cols-2 gap-3 mb-5 flex-1">
                                    <div class="bg-blue-50 rounded-lg p-4 text-center border border-blue-100">
                                        <p class="text-3xl font-bold text-blue-600">{{ $stat->total }}</p>
                                        <p class="text-xs text-gray-600 mt-1 font-medium">Total Applicants</p>
                                    </div>
                                    <div class="bg-yellow-50 rounded-lg p-4 text-center border border-yellow-100">
                                        <p class="text-3xl font-bold text-yellow-600">{{ $stat->pending }}</p>
                                        <p class="text-xs text-gray-600 mt-1 font-medium">Pending</p>
                                    </div>
                                    <div class="bg-green-50 rounded-lg p-4 text-center border border-green-100">
                                        <p class="text-3xl font-bold text-green-600">{{ $stat->accepted }}</p>
                                        <p class="text-xs text-gray-600 mt-1 font-medium">Accepted</p>
                                    </div>
                                    <div class="bg-red-50 rounded-lg p-4 text-center border border-red-100">
                                        <p class="text-3xl font-bold text-red-600">{{ $stat->rejected }}</p>
                                        <p class="text-xs text-gray-600 mt-1 font-medium">Rejected</p>
                                    </div>
                                </div>
                            @else
                                <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg p-8 mb-5 text-center flex-1 flex flex-col items-center justify-center">
                                    <div class="bg-gray-200 rounded-full p-4 mb-3">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 font-bold text-base mb-1">No Applications Yet</p>
                                    <p class="text-xs text-gray-500">This program has not received any applications</p>
                                </div>
                            @endif

                            
                            <a href="{{ route('admin.applications.program', $stat->program->id) }}" 
                               class="block w-full {{ $stat->total > 0 ? 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-800' : 'bg-gray-600 hover:bg-gray-700' }} text-white text-center py-3 px-4 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center group">
                                <span>{{ $stat->total > 0 ? 'View Applicants' : 'View Program Details' }}</span>
                                <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-12 text-center">
                <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">No Applications Yet</h3>
                <p class="text-gray-500">There are no program applications submitted yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection
