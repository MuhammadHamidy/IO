<x-layout>
    <div class="px-44 pt-12">
        <x-sub-text>{{ __('Study Abroad for UPER Students') }}</x-sub-text>
    </div>

    <div class="max-w-full mx-auto relative px-44 py-10">
        <div x-data="{
            slides: [
                @isset($highlightedNews)
                    @foreach($highlightedNews as $news)
                        {
                            id: {{ $news->id }},
                            img: '{{ asset('storage/' . $news->cover) }}',
                            title: '{{ $news->title }}',
                            excerpt: '{{ \Illuminate\Support\Str::limit(strip_tags($news->content), 200, '...') }}'
                        },
                    @endforeach
                @endisset
            ],
            current: 0,
            last: null,
            autoSlideInterval: null,

            update(val) {
                this.last = this.current;
                this.current = val;
            },

            init() {
                this.$watch('current', (val) => {
                    if (val < 0) {
                        this.update(this.slides.length - 1);
                    } else if (val >= this.slides.length) {
                        this.update(0);
                    }
                });

                if (!this.autoSlideInterval) {
                    this.startAutoSlide();
                }
            },

            startAutoSlide() {
                const slideInterval = 5000;
                this.autoSlideInterval = setInterval(() => {
                    this.update(this.current + 1);
                }, slideInterval);
            }
        }" x-init="init()">
            <div class="flex items-center justify-between">
                {{-- Previous button --}}
                <button
                    @click="update(current - 1)"
                    class="absolute left-40 z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-700 text-blue-800 -ml-4 h-16 w-8 rounded-none flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                {{-- Slides --}}
                <div class="overflow-hidden relative w-full">
                    <div
                        class="flex"
                        :class="{ 'transition-transform duration-700 ease-in-out': !(last >= slides.length || last < 0) }"
                        :style="`transform: translateX(${(current + 1) * -100}%)`"
                        @transitionend="if (current === -1) update(slides.length - 1); else if (current === slides.length) update(0)"
                    >
                        <template x-for="slide in [slides[slides.length - 1], ...slides, slides[0]]">
                            <div class="w-full flex-shrink-0">
                                <img :src="slide.img" class="sm:w-[500px] lg:w-full min-w-[1000px] sm:h-[250px] lg:h-[500px] object-cover object-center">
                                <div class="bg-[#1F4894] text-white p-6 min-h-[240px]">
                                    <div class="text-[25px] text-[#C4D25A] mb-2">News</div>
                                    <a :href="'/news/' + slide.id" class="text-[36px] font-semibold underline w-fit mb-3 block hover:text-blue-200 transition duration-500 leading-tight" x-text="slide.title"></a>
                                    <p class="text-gray-300 text-sm mt-6 excerpt" x-html="slide.excerpt"></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Next button --}}
                <button
                    @click="update(current + 1)"
                    class="absolute right-40 z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-700 text-blue-800 -mr-4 h-16 w-8 rounded-none flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            {{-- Indicators --}}
            <div class="absolute bottom-[270px] left-1/2 transform -translate-x-1/2 flex space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button
                        @click="update(index)"
                        :class="{'bg-white': current === index, 'bg-gray-300': current !== index}"
                        class="h-2 w-2 rounded-full"
                    ></button>
                </template>
            </div>
        </div>
    </div>

    <div class="px-44 pt-12 flex flex-col gap-12">
        <x-sub-text>{{ __('Halo UPER Students!') }}</x-sub-text>
        <p>Embark on a global academic adventure with Universitas Pertamina Study Abroad, your dedicated gateway to international education. Tailored for the ambitious students of Universitas Pertamina, our platform is designed to guide you through a seamless process of exploring, applying, and thriving in renowned institutions around the world.</p>
        <p>We proudly introduce a range of exciting programs tailored to elevate your academic journey </p>
        <div class="flex flex-col gap-6">
            <a href="{{route('uper-sa-outbound')}}" class="bg-white text-black flex items-center justify-center shadow-xl py-8 rounded-xl border-black border-[1px]">UNIVERSITAS PERTAMINA STUDY ABROAD (UPER-SA)</a>
            <a href="{{route('iisma-outbound')}}" class="bg-white text-black flex items-center justify-center shadow-xl py-8 rounded-xl border-black border-[1px]">STUDENT MOBILITY SCHOLARSHIP (IISMA)</a>
            <a href="{{route('internship-research-attachment-outbound')}}" class="bg-white text-black flex items-center justify-center shadow-xl py-8 rounded-xl border-black border-[1px]">INTERNSHIP / RESEARCH ATTACHMENT</a>
            <a href="" class="bg-white text-black flex items-center justify-center shadow-xl py-8 rounded-xl border-black border-[1px]">SHORT-PROGRAM</a>
        </div>
    </div>

    <div class="mb-[364px]">

    </div>

</x-layout>
