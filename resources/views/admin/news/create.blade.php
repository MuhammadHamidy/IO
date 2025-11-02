@extends('components.admin-layout')

@section('page-title', 'Create News')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create News Article</h1>
            <p class="text-gray-600">Add a new news article to your website</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to News
        </a>
    </div>

    
    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 space-y-6">
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
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
                <div class="flex items-center space-x-4">
                    <input type="file" id="cover" name="cover" accept="image/*" required
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('cover') border-red-500 @enderror">
                </div>
                <p class="mt-1 text-sm text-gray-500">This image will be displayed as the main cover of the news</p>
                @error('cover')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="supporting_images" class="block text-sm font-medium text-gray-700 mb-2">
                    Supporting Images
                    <span class="text-xs text-gray-500 font-normal">(Additional images for the article content)</span>
                </label>
                <div class="flex items-center space-x-4">
                    <input type="file" id="supporting_images" name="supporting_images[]" accept="image/*" multiple
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 @error('supporting_images.*') border-red-500 @enderror">
                </div>
                <p class="mt-1 text-sm text-gray-500">You can select multiple images to support your article (optional)</p>
                @error('supporting_images.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                <textarea id="content" name="content" rows="10" required
                          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror"
                          placeholder="Write your news content here...">{{ old('content') }}</textarea>
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
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                
                <div>
                    <label for="is_highlight" class="block text-sm font-medium text-gray-700 mb-2">Display Type *</label>
                    <select id="is_highlight" name="is_highlight" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('is_highlight') border-red-500 @enderror">
                        <option value="0" {{ old('is_highlight') === '0' || old('is_highlight') === 0 ? 'selected' : '' }}>📰 News Update (Regular)</option>
                        <option value="1" {{ old('is_highlight') === '1' || old('is_highlight') === 1 ? 'selected' : '' }}>⭐ News Highlight (Featured)</option>
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
                Create News Article
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
