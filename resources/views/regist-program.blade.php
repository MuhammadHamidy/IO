<x-layout>
    <div class="max-w-2xl mx-auto p-6">
        <x-sub-text>{{ __('Input New Programs') }}</x-sub-text>
        
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

        
        <form action="{{ route('program-types.store') }}" method="POST" class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="type_name" class="mb-2 font-semibold text-gray-700">Program Type Name</label>
                <input type="text" name="type_name" id="type_name" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('type_name') }}">
                @error('type_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Add Program Type</button>
            </div>
        </form>

        
        <div class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Program Types</h2>
            <div class="overflow-y-auto max-h-48">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300">Name</th>
                            <th class="py-2 px-4 border-b border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programTypes as $programType)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $programType->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 text-center">
                                    
                                    <form action="{{ route('program-types.destroy', $programType->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
        <form action="{{ route('programs.store') }}" method="POST" class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="code" class="mb-2 font-semibold text-gray-700">Program Code</label>
                <input type="text" name="code" id="code" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('code') }}">
                @error('code')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="name" class="mb-2 font-semibold text-gray-700">Program Name</label>
                <input type="text" name="name" id="name" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center mb-4">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value= "1" class="mr-2 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" value="{{ old('is_active') }}">
                <label for="is_active" class="font-semibold text-gray-700">Active</label>
            </div>
            <div class="flex flex-col mb-4">
                <label for="type_id" class="mb-2 font-semibold text-gray-700">Program Type</label>
                <div class="relative">
                    <select name="type_id" id="type_id" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none w-full mb-4" value="{{ old('type_id') }}">
                        @foreach($programTypes as $programType)
                            <option value="{{ $programType->id }}">{{ $programType->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('type_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Add Program</button>
            </div>
        </form>
    </div>
</x-layout>