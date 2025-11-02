<x-layout>
    <div class="px-44 pt-12">
        <x-sub-text>{{ __('Study at Universitas Pertamina for International Students') }}</x-sub-text>
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

    <div class="px-44 pt-12 flex flex-col gap-5">
        <x-sub-text>{{ __('Explore the World with Universitas Pertamina\'s Inbound Mobility Programs!') }}</x-sub-text>
        <p>Immerse yourself in a global learning experience like never before. Our Inbound Mobility Programs open doors to a diverse range of academic and cultural opportunities, providing students with a unique chance to broaden their horizons and gain a global perspective. Are you ready to elevate your academic experience and broaden your horizons? Look no further than Universitas Pertamina's Inbound Mobility Programs! Our dynamic and immersive programs are designed to provide students from around the world with a unique opportunity to engage in a diverse learning environment, foster cross-cultural understanding, and gain invaluable insights into the energy industry.</p>
    </div>

    <div class="px-44 pt-12 flex flex-col gap-5">
        <x-sub-text>{{ __('Why Choose Universitas Pertamina\'s Inbound Mobility Programs?') }}</x-sub-text>
        <p>Experience the rich cultural tapestry of Indonesia while studying in the vibrant city of Jakarta. At Universitas Pertamina, we believe in providing top-notch academic programs that blend theory with real-world applications in the energy sector. Tailor your experience with a range of program options, including Student Exchange Program, Internship or Research Attachment and Short-term Program. Choose the program that aligns with your academic and personal goals. </p>
        <p>Unlock your potential at Universitas Pertamina.</p>
        <div class="flex flex-col gap-6 items-center justify-center">
            <div class="flex gap-6 py-8 items-center justify-center">
                <a href="{{route('student-exchange-program-inbound')}}" class="bg-white text-black flex items-center justify-center shadow-xl px-16 py-8 rounded-xl border-black border-[1px]">Student Exchange Program</a>
                <a href="{{route('internship-research-attachment-inbound')}}" class="bg-white text-black flex items-center justify-center shadow-xl px-16 py-8 rounded-xl border-black border-[1px]">Internship/Research Attachment</a>
            </div>
            <div class="flex flex-col gap-6">
                <a href="" class="bg-white text-black flex items-center justify-center shadow-xl px-16 w-max py-8 rounded-xl border-black border-[1px]">Short-term Program</a>
            </div>
        </div>
    </div>

    <div class="mb-[364px]">

    </div>

</x-layout>
