@extends('components.admin-layout')

@section('page-title', 'Edit Testimonial')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h1 class="text-xl font-semibold text-gray-900 mb-6">Edit Testimonial</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 rounded-md bg-red-50 border border-red-200 text-red-700">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                    <input type="text" name="position" value="{{ old('position', $testimonial->position) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                    <input type="text" name="company" value="{{ old('company', $testimonial->company) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title (optional)</label>
                <input type="text" name="title" value="{{ old('title', $testimonial->title) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea name="content" rows="6" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('content', $testimonial->content ?? $testimonial->description) }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Jika Anda sebelumnya memakai field description, isi akan otomatis terisi dari sana.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                </div>
                <div class="flex items-center space-x-4">
                    @php
                        $img = $testimonial->image ? asset('storage/' . $testimonial->image) : ($testimonial->photo ? asset('storage/' . $testimonial->photo) : asset('assets/img/default-avatar.png'));
                    @endphp
                    <img src="{{ $img }}" class="w-24 h-24 object-cover rounded-md border" alt="Current image">
                    <span class="text-sm text-gray-600">Current image</span>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="draft" {{ old('status', $testimonial->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $testimonial->status) === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-2">
                <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 rounded-md border text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection



