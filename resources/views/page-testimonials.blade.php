<x-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="mb-5">
            <x-sub-text>{{ __('Testimonials') }}</x-sub-text>
        </div>
        
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

        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b text-left">Name</th>
                        <th class="py-2 px-4 border-b text-left">Title</th>
                        <th class="py-2 px-4 border-b text-left">Description</th>
                        <th class="py-2 px-4 border-b text-left">Photo</th>
                        <th class="py-2 px-4 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pageTestimonials as $testimonial)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $testimonial->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $testimonial->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $testimonial->description }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($testimonial->photo)
                                    <img src="{{ Storage::url($testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-16 h-16 object-cover">
                                @else
                                    No Photo
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="text-yellow-500 hover:underline mr-2">Edit</a>
                                <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-center mt-4">
                <a href="{{ route('regist-testimonials') }}" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Add Testimonial</a>
            </div>
        </div>
    </div>
</x-layout>