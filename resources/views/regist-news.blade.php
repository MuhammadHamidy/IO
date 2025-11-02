<x-layout>
<div class="max-w-2xl mx-auto p-6">
        <x-sub-text>{{ __('Input New News') }}</x-sub-text>
        
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        
        <form action="{{ route('page-news.store') }}" method="POST" enctype="multipart/form-data" class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            @csrf
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-semibold text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" oninput="generateSlug()" value="{{ old('title') }}">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-semibold text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('slug') }}">
                @error('slug')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-semibold text-gray-700">Content</label>
                <textarea name="content" id="content" class="summernote"></textarea>
                @error('content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-semibold text-gray-700">Cover</label>
                <input type="file" name="cover" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('cover') }}">
                @error('cover')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center mb-4">
                <input type="hidden" name="is_publish" value="0">
                <input type="checkbox" name="is_publish" id="is_publish" value="1" class="mr-2 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="is_publish" class="font-semibold text-gray-700">Publish</label>
            </div>
            <div class="flex items-center mb-4">
                <input type="hidden" name="is_highlight" value="0">
                <input type="checkbox" name="is_highlight" id="is_highlight" value="1" class="mr-2 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="is_highlight" class="font-semibold text-gray-700">Highlight</label>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function generateSlug() {
            const title = document.getElementById('title').value;
            const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
            document.getElementById('slug').value = slug;
        }
        $(document).ready(function() {
                $('#content').summernote({
                    placeholder: 'Input content here',
                    height: 300, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: true // set focus to editable area after initializing summernote
                });
            });
    </script>
</x-layout>