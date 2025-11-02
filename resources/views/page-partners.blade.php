<x-layout>
    <div class="max-w-6xl mx-auto p-6">
        <div class="mb-4">
            <x-sub-text>{{ __('Partners List') }}</x-sub-text>
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
                        <th class="py-2 px-4 border-b text-left">Regional</th>
                        <th class="py-2 px-4 border-b text-left">Website</th>
                        <th class="py-2 px-4 border-b text-left">Country</th>
                        <th class="py-2 px-4 border-b text-left">Address</th>
                        <th class="py-2 px-4 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagePartners as $partner)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $partner->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $partner->regional }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{"https://www.".str_replace("https://", "", str_replace("www.", "", $partner->website))}}" class="text-blue-500 hover:underline" target="_blank">{{"www.".rtrim(str_replace("https://", "", str_replace("www.", "", $partner->website)), "/")}}</a>
                            </td>
                            <td class="py-2 px-4 border-b">{{ $partner->country }}</td>
                            <td class="py-2 px-4 border-b">{{ $partner->address }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('partners-edit', $partner->id) }}" class="text-yellow-500 hover:underline mr-2">Edit</a>
                                <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" class="inline-block">
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
                <a href="{{ route('regist-partners') }}" class="bg-blue-500 text-white py-2 px-4 rounded mt-4 inline-block">Add Partner</a>
            </div>
        </div>
    </div>
</x-layout>