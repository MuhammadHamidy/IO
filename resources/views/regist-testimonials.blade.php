<x-layout>
    <div class="max-w-2xl mx-auto p-6">
        <x-sub-text>{{ __('Input New Testimonial') }}</x-sub-text>
        
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

        
        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="name" class="mb-2 font-semibold text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="title" class="mb-2 font-semibold text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('title') }}">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="description" class="mb-2 font-semibold text-gray-700">Description</label>
                <textarea name="description" id="description" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('description') }}"></textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="photo" class="mb-2 font-semibold text-gray-700">Photo</label>
                <input type="file" name="photo" id="photo" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('photo') }}">
                @error('photo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Add Testimonial</button>
            </div>
        </form>
    </div>
</x-layout>