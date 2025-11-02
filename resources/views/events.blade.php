<x-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="mb-3">
            <x-sub-text>{{ __('Events') }}</x-sub-text>
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    @if($event->image)
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title ?? $event->name }}" class="w-full h-full object-cover">
                        </div>
                    @endif
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2">{{ $event->title ?? $event->name }}</h2>
                        <p class="text-gray-700 mb-4">{{ optional($event->date)->format('d M Y') }}</p>
                        <div class="flex justify-end mt-4">
                            <a href="{{ route('events.show', $event->id) }}" class="text-blue-600 font-semibold">Read More →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center mt-4">
            <a href="{{ route('regist-events') }}" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Add Event</a>
        </div>
    </div>

    
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 id="modalMessage" class="text-xl font-bold mb-4">Are you sure to delete this event?</h2>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-600 text-white rounded-md px-4 py-2 mr-2 hover:bg-gray-700 transition duration-300">Cancel</button>
                    <button type="submit" class="bg-red-600 text-white rounded-md px-4 py-2 hover:bg-red-700 transition duration-300">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('deleteForm').action = '/events/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</x-layout>