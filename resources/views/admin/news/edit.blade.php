@extends('components.admin-layout')

@section('page-title', 'Edit News')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit News Article</h1>
            <p class="text-gray-600">Update your news article</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to News
        </a>
    </div>

    
    <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 space-y-6">
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                       placeholder="Enter news title">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">
                    Cover Image *
                    <span class="text-xs text-gray-500 font-normal">(Main image for the news article)</span>
                </label>
                @if($news->cover || $news->image)
                <div class="mb-3">
                    <p class="text-sm text-gray-600 mb-2">Current cover image:</p>
                    <img src="{{ asset('storage/' . ($news->cover ?? $news->image)) }}" alt="{{ $news->title }}" class="w-48 h-32 object-cover rounded-lg border border-gray-200">
                </div>
                @endif
                <div class="flex items-center space-x-4">
                    <input type="file" id="cover" name="cover" accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('cover') border-red-500 @enderror">
                </div>
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current image. Upload new image to replace.</p>
                @error('cover')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="supporting_images" class="block text-sm font-medium text-gray-700 mb-2">
                    Supporting Images
                    <span class="text-xs text-gray-500 font-normal">(Additional images for the article content)</span>
                </label>
                @if($news->supporting_images && count($news->supporting_images) > 0)
                <div class="mb-3">
                    <p class="text-sm text-gray-600 mb-2">Current supporting images:</p>
                    <div class="grid grid-cols-4 gap-2">
                        @foreach($news->supporting_images as $index => $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image) }}" alt="Supporting image {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                            <label class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer rounded-lg">
                                <input type="checkbox" name="remove_supporting_images[]" value="{{ $index }}" class="w-5 h-5">
                                <span class="ml-2 text-white text-sm">Remove</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Check images you want to remove</p>
                </div>
                @endif
                <div class="flex items-center space-x-4">
                    <input type="file" id="supporting_images" name="supporting_images[]" accept="image/*" multiple
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 @error('supporting_images.*') border-red-500 @enderror">
                </div>
                <p class="mt-1 text-sm text-gray-500">Add new supporting images (will be added to existing ones)</p>
                @error('supporting_images.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                <textarea id="content" name="content" rows="10" required
                          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror"
                          placeholder="Write your news content here...">{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Publication Settings</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Publication Status *</label>
                    <select id="status" name="status" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                        <option value="">Select Status</option>
                        <option value="draft" {{ old('status', $news->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $news->status) === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                
                <div>
                    <label for="is_highlight" class="block text-sm font-medium text-gray-700 mb-2">Display Type *</label>
                    <select id="is_highlight" name="is_highlight" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('is_highlight') border-red-500 @enderror">
                        <option value="0" {{ old('is_highlight', $news->is_highlight ? 1 : 0) == 0 ? 'selected' : '' }}>📰 News Update (Regular)</option>
                        <option value="1" {{ old('is_highlight', $news->is_highlight ? 1 : 0) == 1 ? 'selected' : '' }}>⭐ News Highlight (Featured)</option>
                    </select>
                    <p class="mt-1 text-sm text-gray-500">
                        <span class="font-semibold">News Highlight:</span> Featured news shown in main carousel<br>
                        <span class="font-semibold">News Update:</span> Regular news shown in the updates section
                    </p>
                    @error('is_highlight')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.news.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                Update News Article
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">

<style>
    /* Fix Summernote toolbar z-index to not cover navbar */
    .note-editor .note-toolbar {
        z-index: 40 !important;
    }
    .note-popover {
        z-index: 40 !important;
    }
    .note-modal {
        z-index: 100 !important;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#content').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                for (let i = 0; i < files.length; i++) {
                    uploadImage(files[i]);
                }
            }
        }
    });

    function uploadImage(file) {
        const formData = new FormData();
        formData.append('image', file);
        
        fetch('/upload-image', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                $('#content').summernote('insertImage', data.url);
            } else {
                alert('Failed to upload image');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to upload image');
        });
    }
});
</script>
@endsection
