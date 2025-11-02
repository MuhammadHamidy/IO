<x-layout>
    <p class="text-3xl text-center m-12 font-bold text-[#255a7b]">
        All News
    </p>

    <div id="news-container" class="news-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @foreach($pageNews as $item)
            <div class="news-item bg-white shadow-md rounded-lg p-6 mb-6">
                <a href="/news/{{ $item->id }}" class="block">
                    <h2 class="text-2xl font-bold mb-2">{{ $item->title }}</h2>
                    <p class="mb-4">
                        @php
                            $sentences = explode('. ', $item->content);
                            $firstTwoSentences = implode('. ', array_slice($sentences, 0, 2)) . (count($sentences) > 2 ? '...' : '');
                        @endphp
                        {{ $firstTwoSentences }}
                    </p>
                    <p class="text-sm text-gray-500">Created at: {{ $item->created_at->format('d M Y') }}</p>
                </a>
                
            </div>
        @endforeach
    </div>
</x-layout>
</x-layout>