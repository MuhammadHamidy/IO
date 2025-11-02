@extends('components.admin-layout')

@section('page-title', 'Admin Dashboard')

@section('content')
<div class="space-y-6">
    
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg p-6 text-white">
        <h1 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="text-blue-100">Manage your website content and monitor your site's performance.</p>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total News</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['total_news'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-sm text-green-600 font-medium">{{ $stats['published_news'] }} published</span>
                <span class="text-sm text-gray-500 ml-2">{{ $stats['draft_news'] }} drafts</span>
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Events</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['total_events'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-sm text-green-600 font-medium">{{ $stats['published_events'] }} published</span>
                <span class="text-sm text-gray-500 ml-2">{{ $stats['draft_events'] }} drafts</span>
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Partners</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['total_partners'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.partners.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Manage Partners →</a>
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Programs</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['total_programs'] }}</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.programs.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Manage Programs →</a>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="{{ route('admin.news.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Create News</p>
                    <p class="text-sm text-gray-500">Add new news article</p>
                </div>
            </a>

            <a href="{{ route('admin.events.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Create Event</p>
                    <p class="text-sm text-gray-500">Add new event</p>
                </div>
            </a>

            <a href="{{ route('admin.partners.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Add Partner</p>
                    <p class="text-sm text-gray-500">Add new partner</p>
                </div>
            </a>

            <a href="{{ route('admin.testimonials.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Add Testimonial</p>
                    <p class="text-sm text-gray-500">Add new testimonial</p>
                </div>
            </a>

            <a href="{{ route('admin.programs.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Create Program</p>
                    <p class="text-sm text-gray-500">Add new program</p>
                </div>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">View Website</p>
                    <p class="text-sm text-gray-500">Preview live site</p>
                </div>
            </a>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Recent News</h3>
                <a href="{{ route('admin.news.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
            </div>
            <div class="space-y-3">
                @forelse($recentNews as $news)
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 rounded-full {{ $news->status === 'published' ? 'bg-green-500' : 'bg-yellow-500' }}"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $news->title }}</p>
                        <p class="text-xs text-gray-500">{{ $news->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500">No news articles yet.</p>
                @endforelse
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Recent Events</h3>
                <a href="{{ route('admin.events.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
            </div>
            <div class="space-y-3">
                @forelse($recentEvents as $event)
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 rounded-full {{ $event->status === 'published' ? 'bg-green-500' : 'bg-yellow-500' }}"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $event->title }}</p>
                        <p class="text-xs text-gray-500">{{ $event->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500">No events yet.</p>
                @endforelse
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Recent Partners</h3>
                <a href="{{ route('admin.partners.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
            </div>
            <div class="space-y-3">
                @forelse($recentPartners as $partner)
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 rounded-full {{ $partner->status === 'published' ? 'bg-green-500' : 'bg-yellow-500' }}"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $partner->name }}</p>
                        <p class="text-xs text-gray-500">{{ $partner->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500">No partners yet.</p>
                @endforelse
            </div>
        </div>
    </div>

    
    @if($stats['draft_news'] > 0 || $stats['draft_events'] > 0)
    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-yellow-800">You have draft content</h3>
                <p class="text-yellow-700">You have {{ $stats['draft_news'] + $stats['draft_events'] }} draft items that are not yet published to the live website.</p>
            </div>
            <button onclick="togglePreviewMode()" class="ml-4 bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition-colors">
                Preview Changes
            </button>
        </div>
    </div>
    @endif
</div>
@endsection
