@extends('components.admin-layout')

@section('page-title', 'Programs Management')

@section('content')
<div class="space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Programs Management</h1>
            <p class="text-gray-600">Manage your educational programs</p>
        </div>
        <a href="{{ route('admin.programs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Create Program
        </a>
    </div>

    
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($programs as $program)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($program->image)
                                <img class="w-10 h-10 rounded-lg object-cover mr-3" src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title ?? $program->name }}">
                                @else
                                <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $program->title ?? $program->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $program->code ?? '' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $program->type ?? 'Not specified' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $program->duration ?? 'Not specified' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form method="POST" action="{{ route('admin.programs.update', $program->id) }}" class="inline" id="status-form-{{ $program->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $program->title }}">
                                <input type="hidden" name="description" value="{{ $program->description }}">
                                <input type="hidden" name="type" value="{{ $program->type }}">
                                <input type="hidden" name="duration" value="{{ $program->duration }}">
                                <input type="hidden" name="requirements" value="{{ $program->requirements }}">
                                <input type="hidden" name="status" value="{{ $program->status === 'published' ? 'draft' : 'published' }}" id="status-input-{{ $program->id }}">
                                <button type="submit" class="inline-flex px-2 py-1 text-xs font-semibold rounded-full transition-colors {{ $program->status === 'published' ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' }}" title="Click to toggle status">
                                    {{ ucfirst($program->status ?? 'draft') }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.programs.edit', $program->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form method="POST" action="{{ route('admin.programs.destroy', $program->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this program?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <p class="text-lg font-medium">No programs found</p>
                                <p class="text-sm">Get started by creating your first program.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        
        @if($programs->hasPages())
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $programs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
