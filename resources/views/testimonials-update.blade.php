<x-layout>
    <div class="max-w-2xl mx-auto p-6">
    <x-sub-text>{{ __('Edit Testimonial') }}</x-sub-text>
    <div class="max-w-2xl mx-auto p-6">
        
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

        
        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            @csrf
            @method('PUT')
            <div class="flex flex-col mb-4">
                <label for="name" class="mb-2 font-semibold text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $testimonial->name }}" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="title" class="mb-2 font-semibold text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $testimonial->title }}" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="description" class="mb-2 font-semibold text-gray-700">Description</label>
                <textarea name="description" id="description" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none">{{ $testimonial->description }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="photo" class="mb-2 font-semibold text-gray-700">Photo</label>
                <input type="file" name="photo" id="photo" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none">
                @if($testimonial->photo)
                    <img src="{{ Storage::url($testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-16 h-16 object-cover mt-2">
                @endif
                @error('photo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Update Testimonial</button>
            </div>
        </form>
    </div>
</div>
</x-layout>