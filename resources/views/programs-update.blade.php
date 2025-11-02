<x-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-4xl font-bold mb-4">Edit Program</h1>

        
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

        
        <form action="{{ route('programs.update', $program->id) }}" method="POST" class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            @csrf
            @method('PUT')
            <div class="flex flex-col mb-4">
                <label for="code" class="mb-2 font-semibold text-gray-700">Program Code</label>
                <input type="text" name="code" id="code" value="{{ $program->code }}" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('code') }}">
                @error('code')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="name" class="mb-2 font-semibold text-gray-700">Program Name</label>
                <input type="text" name="name" id="name" value="{{ $program->name }}" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center mb-4">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" class="mr-2 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" value="1" {{ $program->is_active ? 'checked' : '' }}>
                <label for="is_active" class="font-semibold text-gray-700">Active</label>
            </div>
            <div class="flex flex-col mb-4">
                <label for="type_id" class="mb-2 font-semibold text-gray-700">Program Type</label>
                <select name="type_id" id="type_id" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('type_id') }}">
                    @foreach($programTypes as $programType)
                        <option value="{{ $programType->id }}" {{ $program->type_id == $programType->id ? 'selected' : '' }}>{{ $programType->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Update Program</button>
            </div>
        </form>
    </div>
</x-layout>