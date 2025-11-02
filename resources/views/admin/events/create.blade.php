@extends('components.admin-layout')

@section('page-title', 'Create Event')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Event</h1>
            <p class="text-gray-600">Add a new event</p>
        </div>
        <a href="{{ route('admin.events.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Events
        </a>
    </div>

    
    <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 space-y-6">
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Event Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                       placeholder="Enter event title">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                          placeholder="Enter event description...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Event Date *</label>
                <input type="datetime-local" id="date" name="date" value="{{ old('date') }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('date') border-red-500 @enderror">
                @error('date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('location') border-red-500 @enderror"
                       placeholder="Enter event location">
                @error('location')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Event Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload event image (optional)</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select id="status" name="status" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                    <option value="">Select Status</option>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.events.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                Create Event
            </button>
        </div>
    </form>
</div>
@endsection
