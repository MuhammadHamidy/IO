@extends('components.admin-layout')

@section('page-title', 'News Management')

@section('content')
<div class="space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">News Management</h1>
            <p class="text-gray-600">Manage your news articles and publications</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Create News
        </a>
    </div>

    
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center gap-2">
                <span class="text-sm font-medium text-gray-700">Filter:</span>
                <a href="{{ route('admin.news.index', ['filter' => 'all']) }}" 
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $filter === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    All News
                </a>
                <a href="{{ route('admin.news.index', ['filter' => 'active']) }}" 
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $filter === 'active' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Active Only
                </a>
                <a href="{{ route('admin.news.index', ['filter' => 'archived']) }}" 
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $filter === 'archived' ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                    Archived
                </a>
            </div>
            <div>
                <input type="text" id="search" placeholder="Search news..." class="border border-gray-300 rounded-md px-3 py-2 text-sm w-64">
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archive Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Display Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($news as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($item->image)
                                <img class="w-10 h-10 rounded-lg object-cover mr-3" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                @else
                                <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($item->content, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $item->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->isArchived())
                            <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                                Archived
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Active
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->is_highlight)
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                ⭐ Highlight
                            </span>
                            @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                📰 Update
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                @if(!$item->isArchived())
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form method="POST" action="{{ route('admin.news.archive', $item->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to archive this news?')">
                                    @csrf
                                    <button type="submit" class="text-orange-600 hover:text-orange-900 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                        </svg>
                                        Archive
                                    </button>
                                </form>
                                @else
                                <form method="POST" action="{{ route('admin.news.unarchive', $item->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-900 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Restore
                                    </button>
                                </form>
                                @endif
                                <form method="POST" action="{{ route('admin.news.destroy', $item->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to permanently delete this news?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                                <p class="text-lg font-medium">No news articles found</p>
                                <p class="text-sm">Get started by creating your first news article.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        
        @if($news->hasPages())
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $news->links() }}
        </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusFilter = document.getElementById('status-filter');
    const searchInput = document.getElementById('search');

    function filterTable() {
        const statusValue = statusFilter.value.toLowerCase();
        const searchValue = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const statusCell = row.querySelector('td:nth-child(2) span');
            const titleCell = row.querySelector('td:first-child div:first-child');
            
            const status = statusCell ? statusCell.textContent.toLowerCase() : '';
            const title = titleCell ? titleCell.textContent.toLowerCase() : '';
            
            const statusMatch = !statusValue || status.includes(statusValue);
            const searchMatch = !searchValue || title.includes(searchValue);
            
            row.style.display = (statusMatch && searchMatch) ? '' : 'none';
        });
    }

    statusFilter.addEventListener('change', filterTable);
    searchInput.addEventListener('input', filterTable);
});
</script>
@endsection
