<x-layout>
    <div class="max-w-4xl mx-auto p-6 my-8">
        <div class="mb-6 flex items-center gap-3">
            <a href="{{ route('news') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-[#1F4894] hover:text-[#1F4894] hover:shadow-md transition-all duration-300 font-semibold group">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to News</span>
            </a>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-all duration-300 font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>Home</span>
            </a>
        </div>

        <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
            @if($pageNews->cover || $pageNews->image)
            <div class="w-full h-96 overflow-hidden">
                <img src="{{ asset('storage/' . ($pageNews->cover ?? $pageNews->image)) }}" alt="{{ $pageNews->title }}" class="w-full h-full object-cover">
            </div>
            @endif

            <div class="p-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $pageNews->created_at->format('F d, Y') }}
                    </span>
                    @if($pageNews->is_highlight)
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-semibold rounded-full">
                        ⭐ Highlighted
                    </span>
                    @endif
                </div>

                <h1 class="text-4xl font-bold text-gray-900 mb-6 leading-tight">{{ $pageNews->title }}</h1>

                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! $pageNews->content !!}
                </div>
            </div>
        </article>
    </div>
</x-layout>