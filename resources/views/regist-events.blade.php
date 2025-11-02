<x-layout>
    <div class="max-w-2xl mx-auto p-6">
        <x-sub-text>{{ __('Input New Events') }}</x-sub-text>
        
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

        
        <form action="{{ route('events.store') }}" method="POST" class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="name" class="mb-2 font-semibold text-gray-700">Event Name</label>
                <input type="text" name="name" id="name" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="date" class="mb-2 font-semibold text-gray-700">Event Date</label>
                <input type="date" name="date" id="date" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('date') }}">
                @error('date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col">
                    <label for="open_date" class="mb-2 font-semibold text-gray-700">Open Date (optional)</label>
                    <input type="date" name="open_date" id="open_date" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('open_date') }}">
                    @error('open_date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="close_date" class="mb-2 font-semibold text-gray-700">Close Date (optional)</label>
                    <input type="date" name="close_date" id="close_date" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('close_date') }}">
                    @error('close_date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Add Event</button>
            </div>
        </form>
    </div>
</x-layout>