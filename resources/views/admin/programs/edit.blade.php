@extends('components.admin-layout')

@section('page-title', 'Edit Program')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Program</h1>
            <p class="text-gray-600">Update program information</p>
        </div>
        <a href="{{ route('admin.programs.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Programs
        </a>
    </div>

    
    <form method="POST" action="{{ route('admin.programs.update', $program->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 space-y-6">
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Program Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $program->title) }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                       placeholder="Enter program title">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                          placeholder="Enter program description...">{{ old('description', $program->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Program Level *</label>
                <select id="type" name="type" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('type') border-red-500 @enderror">
                    <option value="">Select Level</option>
                    <option value="degree" {{ old('type', $program->type) === 'degree' ? 'selected' : '' }}>Degree</option>
                    <option value="non-degree" {{ old('type', $program->type) === 'non-degree' ? 'selected' : '' }}>Non-Degree</option>
                </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="program_type" class="block text-sm font-medium text-gray-700 mb-2">Direction</label>
                    <select id="program_type" name="program_type" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('program_type') border-red-500 @enderror">
                        <option value="">Select Direction</option>
                        <option value="inbound" {{ old('program_type', $program->program_type) === 'inbound' ? 'selected' : '' }}>Inbound</option>
                        <option value="outbound" {{ old('program_type', $program->program_type) === 'outbound' ? 'selected' : '' }}>Outbound</option>
                    </select>
                    <p class="mt-1 text-sm text-gray-500">For international students coming in or going out</p>
                    @error('program_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select id="category" name="category" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror">
                        <option value="">Select Category</option>
                        <option value="UPER-SA" {{ old('category', $program->category) === 'UPER-SA' ? 'selected' : '' }}>UNIVERSITAS PERTAMINA STUDY ABROAD (UPER-SA)</option>
                        <option value="Student Exchange Program" {{ old('category', $program->category) === 'Student Exchange Program' ? 'selected' : '' }}>Student Exchange Program</option>
                        <option value="Internship/Research Attachment" {{ old('category', $program->category) === 'Internship/Research Attachment' ? 'selected' : '' }}>Internship/Research Attachment</option>
                        <option value="Short-term Program" {{ old('category', $program->category) === 'Short-term Program' ? 'selected' : '' }}>Short-term Program</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            
            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Duration *</label>
                <input type="text" id="duration" name="duration" value="{{ old('duration', $program->duration) }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('duration') border-red-500 @enderror"
                       placeholder="e.g., 4 years, 2 semesters">
                @error('duration')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="requirements" class="block text-sm font-medium text-gray-700 mb-2">Requirements *</label>
                <textarea id="requirements" name="requirements" rows="4" required
                          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('requirements') border-red-500 @enderror"
                          placeholder="Enter program requirements...">{{ old('requirements', $program->requirements) }}</textarea>
                @error('requirements')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="open_date" class="block text-sm font-medium text-gray-700 mb-2">Application Open Date</label>
                    <input type="datetime-local" id="open_date" name="open_date" 
                           value="{{ old('open_date', $program->open_date ? $program->open_date->format('Y-m-d\TH:i') : '') }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('open_date') border-red-500 @enderror">
                    <p class="mt-1 text-sm text-gray-500">When students can start applying</p>
                    @error('open_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="close_date" class="block text-sm font-medium text-gray-700 mb-2">Application Close Date</label>
                    <input type="datetime-local" id="close_date" name="close_date" 
                           value="{{ old('close_date', $program->close_date ? $program->close_date->format('Y-m-d\TH:i') : '') }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('close_date') border-red-500 @enderror">
                    <p class="mt-1 text-sm text-gray-500">Last date students can apply</p>
                    @error('close_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Program Image</label>
                
                @if($program->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                    <p class="mt-1 text-sm text-gray-500">Current image</p>
                </div>
                @endif
                
                <input type="file" id="image" name="image" accept="image/*"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload new image to replace current one (optional)</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>
            
            <div class="space-y-4">
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                    <select id="status" name="status" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                        <option value="">Select Status</option>
                        <option value="draft" {{ old('status', $program->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $program->status) === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" 
                           {{ old('is_featured', $program->is_featured) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                        <span class="font-medium">Featured Program</span>
                        <span class="block text-gray-500 text-xs">Highlight this program on the homepage and programs page</span>
                    </label>
                </div>
            </div>
        </div>

        
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.programs.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                Update Program
            </button>
        </div>
    </form>
</div>
@endsection

