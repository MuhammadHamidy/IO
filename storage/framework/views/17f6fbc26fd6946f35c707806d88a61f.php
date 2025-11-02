<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="flex flex-col align-center justify-center gap-20 p-10">
        <?php if(isset($highlightedNews)): ?>
            <?php if(count($highlightedNews) > 0): ?>
                    
                    <div x-data="{
                        slides: [
                            <?php if(isset($highlightedNews)): ?>
                                <?php $__currentLoopData = $highlightedNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    {
                                        id: <?php echo e($news->id); ?>,
                                        img: '<?php echo e($news->cover ? asset('storage/' . $news->cover) : ($news->image ? asset('storage/' . $news->image) : asset('img/default-news.png'))); ?>',
                                        title: <?php echo e(json_encode($news->title)); ?>,
                                        excerpt: <?php echo e(json_encode(\Illuminate\Support\Str::limit(strip_tags($news->content), 350, '...'))); ?>

                                    },
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
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
                                if (val < -1) {
                                    this.update(this.slides.length + val);
                                } else if (val > this.slides.length) {
                                    this.update(val - this.slides.length);
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
                        <div class="relative">
                            <div class="overflow-hidden relative w-full rounded-lg shadow-xl">
                                <div
                                    class="flex"
                                    :class="{ 'transition-transform duration-700 ease-in-out': !(last >= slides.length || last < 0) }"
                                    :style="`transform: translateX(${(current + 1) * -100}%)`"
                                    @transitionend="if (current === -1) update(slides.length - 1); else if (current === slides.length) update(0)"
                                >
                                    <template x-for="slide in [slides[slides.length - 1], ...slides, slides[0]]">
                                        <div class="w-full flex-shrink-0">
                                            <div class="flex flex-col bg-white">
                                                <img 
                                                    :src="slide.img" 
                                                    class="w-full h-[500px] object-cover object-center"
                                                    alt="News Image"
                                                    loading="eager"
                                                >
                                                <div class="bg-[#1F4894] text-white p-6">
                                                    <div class="text-[20px] text-[#C4D25A] mb-2 font-semibold">News Highlight</div>
                                                    <a 
                                                        :href="'/news/' + slide.id" 
                                                        class="text-[28px] lg:text-[36px] font-semibold underline hover:text-blue-200 transition duration-500 leading-tight block mb-3"
                                                        x-text="slide.title"
                                                    ></a>
                                                    <p class="text-gray-300 text-sm leading-relaxed excerpt" x-html="slide.excerpt"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <button
                                @click="update(current - 1)"
                                class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-300 text-blue-800 h-12 w-12 rounded-full flex items-center justify-center shadow-lg"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>

                            <button
                                @click="update(current + 1)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-300 text-blue-800 h-12 w-12 rounded-full flex items-center justify-center shadow-lg"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <button
                                        @click="update(index)"
                                        :class="{'bg-white w-8': current === index, 'bg-white/60 w-2': current !== index}"
                                        class="h-2 rounded-full transition-all duration-300"
                                    ></button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(isset($recentNews) && count($recentNews) > 0): ?>
        <div class="w-full bg-gradient-to-b from-white to-gray-50 py-16">
            <div class="max-w-full mx-auto px-4">
                <div class="flex items-center justify-between mb-10 max-w-7xl mx-auto">
                    <div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-2">News</h2>
                        <div class="h-1 w-24 bg-red-600"></div>
                    </div>
                    <a href="<?php echo e(route('news')); ?>" class="px-6 py-3 bg-[#1F4894] text-white rounded-lg hover:bg-[#163872] transition-all duration-300 font-semibold flex items-center gap-2 shadow-lg hover:shadow-xl">
                        <span>View All News</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <div class="max-w-full mx-auto relative">
                    <div x-data="{
                        slides: [
                            <?php $__currentLoopData = $recentNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                {
                                    id: <?php echo e(json_encode($news->id)); ?>,
                                    image: '<?php echo e($news->cover ? asset('storage/' . $news->cover) : ($news->image ? asset('storage/' . $news->image) : '')); ?>',
                                    title: <?php echo e(json_encode($news->title)); ?>,
                                    excerpt: <?php echo e(json_encode(\Illuminate\Support\Str::limit(strip_tags($news->content), 120, '...'))); ?>,
                                    date: '<?php echo e($news->created_at->format('M d, Y')); ?>',
                                    isHighlight: <?php echo e($news->is_highlight ? 'true' : 'false'); ?>

                                },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        current: 0,
                        last: null,
                        visibleSlides: 3,
                        
                        get totalPages() {
                            return Math.ceil(this.slides.length / this.visibleSlides);
                        },
                        
                        update(val) {
                            this.last = this.current;
                            this.current = val;
                        },
                        
                        next() {
                            if (this.current < this.totalPages - 1) {
                                this.update(this.current + 1);
                            }
                        },
                        
                        prev() {
                            if (this.current > 0) {
                                this.update(this.current - 1);
                            }
                        },
                        
                        init() {
                            const updateVisibleSlides = () => {
                                if (window.innerWidth < 768) {
                                    this.visibleSlides = 1;
                                } else if (window.innerWidth < 1024) {
                                    this.visibleSlides = 2;
                                } else {
                                    this.visibleSlides = 3;
                                }
                            };
                            
                            updateVisibleSlides();
                            window.addEventListener('resize', updateVisibleSlides);
                        }
                    }" x-init="init()">
                        <div class="flex items-center justify-between">
                            <button
                                @click="prev()"
                                :disabled="current === 0"
                                :class="{'opacity-50 cursor-not-allowed': current === 0}"
                                class="absolute left-0 z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-300 text-blue-800 -ml-4 h-16 w-8 rounded-none flex items-center justify-center shadow-lg disabled:hover:bg-[#C4D25A] disabled:hover:text-blue-800"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>

                            <div class="overflow-hidden relative w-full px-10">
                                <div
                                    class="flex transition-transform duration-500 ease-in-out"
                                    :style="`transform: translateX(-${current * 100}%)`"
                                >
                                    <template x-for="(slide, index) in slides" :key="index">
                                        <div class="flex-shrink-0 px-3" :style="`width: ${100 / visibleSlides}%`">
                                            <a :href="(typeof slide.id === 'string' && slide.id.startsWith('event-')) ? `/events/${slide.id.replace('event-','')}` : `/news/${slide.id}`" class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-[#C4D25A] block h-full">
                                                <div class="relative overflow-hidden h-48">
                                                    <template x-if="slide.image">
                                                        <img 
                                                            :src="slide.image" 
                                                            :alt="slide.title"
                                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                                        >
                                                    </template>
                                                    <template x-if="!slide.image">
                                                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                                            </svg>
                                                        </div>
                                                    </template>
                                                    
                                                    <div class="absolute top-4 left-4">
                                                        <span class="inline-block px-4 py-1 bg-red-600 text-white text-xs font-bold rounded uppercase shadow-lg">
                                                            NEW
                                                        </span>
                                                    </div>
                                                    
                                                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full flex items-center gap-1 shadow-lg">
                                                        <svg class="w-4 h-4 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <span class="text-xs font-semibold text-gray-700" x-text="slide.date"></span>
                                                    </div>
                                                </div>

                                                <div class="p-6">
                                                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#1F4894] transition-colors duration-300 line-clamp-2" x-text="slide.title"></h3>
                                                    <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3" x-text="slide.excerpt"></p>
                                                    <div class="flex items-center text-[#1F4894] font-semibold text-sm group-hover:gap-2 transition-all">
                                                        <span>Read More</span>
                                                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <button
                                @click="next()"
                                :disabled="current >= totalPages - 1"
                                :class="{'opacity-50 cursor-not-allowed': current >= totalPages - 1}"
                                class="absolute right-0 z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-300 text-blue-800 -mr-4 h-16 w-8 rounded-none flex items-center justify-center shadow-lg disabled:hover:bg-[#C4D25A] disabled:hover:text-blue-800"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex justify-center mt-6 space-x-2">
                            <template x-for="(page, index) in totalPages" :key="index">
                                <button
                                    @click="update(index)"
                                    :class="{'bg-[#1F4894]': current === index, 'bg-gray-300': current !== index}"
                                    class="h-2 w-2 rounded-full transition-colors duration-300"
                                ></button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="flex lg:flex-row flex-col align-center justify-center py-12 bg-[#F8FBFB] w-full gap-10">
            <div class=" gap-4 flex flex-col items-center">
                <div class="self-start px-5">
                    <?php if (isset($component)) { $__componentOriginal0977f807d82871bbce3fb5f96f4babc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sub-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Calendar and Event <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0977f807d82871bbce3fb5f96f4babc6)): ?>
<?php $attributes = $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6; ?>
<?php unset($__attributesOriginal0977f807d82871bbce3fb5f96f4babc6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0977f807d82871bbce3fb5f96f4babc6)): ?>
<?php $component = $__componentOriginal0977f807d82871bbce3fb5f96f4babc6; ?>
<?php unset($__componentOriginal0977f807d82871bbce3fb5f96f4babc6); ?>
<?php endif; ?>
                </div>
                <div class="min-w-max min-h-max m-4 p-4 bg-white h-[480px] shadow-md rounded-xl flex flex-col relative">
                    <script>
                        const event = <?php echo json_encode($event ?? []); ?>

                    </script>
                    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/calendar.js']); ?>
                    <div class="flex justify-between w-full mb-4">
                        <button id="previous" class="text-lg font-semibold"><</button>
                        <a id="Month" href="" class="text-lg text-[#333333] font-semibold hover:text-purple-800 transition duration-500"></a>
                        <button id="next" class="text-lg font-semibold">></button>
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-start px-4" style="padding-bottom: 120px;">
                        <div id="Calendar" class="grid grid-rows-5 grid-cols-7 gap-y-[4px] sm:gap-y-[8px] justify-items-center w-full"></div>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4 space-y-3">
                        <button id="Today" class="p-2 bg-[#C4D25A] text-[#1F4894] font-medium rounded-md hover:bg-[#e5f573] transition duration-500 w-full text-sm">Today</button>
                        <div id="Event" class="text-[#242424] flex flex-col text-xs h-[60px] overflow-y-auto"></div>
                    </div>
                </div>
            </div>
            <div class="gap-4 flex flex-col items-center w-full">
                <div class="self-start px-5">
                    <?php if (isset($component)) { $__componentOriginal0977f807d82871bbce3fb5f96f4babc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sub-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Discover Our Program <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0977f807d82871bbce3fb5f96f4babc6)): ?>
<?php $attributes = $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6; ?>
<?php unset($__attributesOriginal0977f807d82871bbce3fb5f96f4babc6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0977f807d82871bbce3fb5f96f4babc6)): ?>
<?php $component = $__componentOriginal0977f807d82871bbce3fb5f96f4babc6; ?>
<?php unset($__componentOriginal0977f807d82871bbce3fb5f96f4babc6); ?>
<?php endif; ?>
                </div>
                
                <?php if(isset($programs) && count($programs) > 0): ?>
                    <div class="max-w-full mx-auto relative w-full">
                        <div x-data="{
                            slides: [
                                <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    {
                                        id: <?php echo e($program->id); ?>,
                                        image: '<?php echo e($program->image ? asset('storage/' . $program->image) : ''); ?>',
                                        title: '<?php echo e(addslashes($program->title)); ?>',
                                        description: '<?php echo e(addslashes(\Illuminate\Support\Str::limit(strip_tags($program->description), 150, '...'))); ?>',
                                        type: '<?php echo e(ucfirst($program->type ?? 'Program')); ?>',
                                        duration: '<?php echo e($program->duration ?? ''); ?>',
                                        route: '<?php echo e(route($program->type === 'degree' ? 'programs.degree' : 'programs.non-degree')); ?>'
                                    },
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    if (val < -1) {
                                        this.update(this.slides.length + val);
                                    } else if (val > this.slides.length) {
                                        this.update(val - this.slides.length);
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
                                <button
                                    @click="update(current - 1)"
                                    class="absolute left-0 z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-700 text-blue-800 -ml-4 h-16 w-8 rounded-none flex items-center justify-center shadow-lg"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <div class="overflow-hidden relative w-full">
                                    <div
                                        class="flex"
                                        :class="{ 'transition-transform duration-700 ease-in-out': !(last >= slides.length || last < 0) }"
                                        :style="`transform: translateX(${(current + 1) * -100}%)`"
                                        @transitionend="if (current === -1) update(slides.length - 1); else if (current === slides.length) update(0)"
                                    >
                                        <template x-for="slide in [slides[slides.length - 1], ...slides, slides[0]]">
                                            <div class="w-full flex-shrink-0 px-4">
                                                <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition-all duration-300">
                                                    <div class="relative w-full h-48 overflow-hidden bg-gradient-to-br from-blue-100 to-purple-100">
                                                        <template x-if="slide.image">
                                                            <img :src="slide.image" class="h-full w-full object-cover" :alt="slide.title" />
                                                        </template>
                                                        <template x-if="!slide.image">
                                                            <div class="h-full w-full flex items-center justify-center">
                                                                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                                </svg>
                                                            </div>
                                                        </template>
                                                        <div class="absolute top-3 left-3">
                                                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-[#1F4894] font-bold rounded-full text-xs shadow-md" x-text="slide.type"></span>
                                                        </div>
                                                        
                                                        <template x-if="slide.duration">
                                                            <div class="absolute top-3 right-3">
                                                                <span class="px-2 py-1 bg-[#C4D25A]/90 backdrop-blur-sm text-gray-800 font-semibold rounded-full text-xs shadow-md flex items-center gap-1">
                                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                    </svg>
                                                                    <span x-text="slide.duration"></span>
                                                                </span>
                                                            </div>
                                                        </template>
                                                    </div>

                                                    <div class="p-4">
                                                        <h3 class="text-lg xl:text-xl font-bold text-gray-900 mb-2 hover:text-[#1F4894] transition-colors duration-300 line-clamp-2" x-text="slide.title"></h3>
                                                        
                                                        <p class="text-sm text-[#4D607D] leading-relaxed mb-4 line-clamp-2" x-text="slide.description"></p>

                                                        <div class="flex items-center justify-between">
                                                            <a :href="slide.route" class="inline-flex items-center gap-2 bg-[#275DCB] px-4 py-2 rounded-lg text-white text-sm font-semibold hover:bg-blue-800 transition-all duration-300 shadow-sm hover:shadow-md group">
                                                                <span>View Details</span>
                                                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <button
                                    @click="update(current + 1)"
                                    class="absolute right-0 z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-700 text-blue-800 -mr-4 h-16 w-8 rounded-none flex items-center justify-center shadow-lg"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>

                            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <button
                                        @click="update(index)"
                                        :class="{'bg-[#1F4894]': current === index, 'bg-gray-300': current !== index}"
                                        class="h-1.5 w-1.5 rounded-full transition-colors duration-300"
                                    ></button>
                                </template>
                            </div>
                        </div>
                    </div>

                    
                    <div class="w-full mt-6">
                        <a href="<?php echo e(route('program')); ?>" class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-[#1F4894] to-[#275DCB] text-white px-6 py-3 rounded-lg font-semibold hover:from-[#163872] hover:to-[#1e4da3] transition-all duration-300 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span>Explore All Programs</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                <?php else: ?>
                    
                    <div class="w-full bg-white shadow-md rounded-xl flex flex-col gap-5 p-8 text-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">No Programs Available</h3>
                        <p class="text-gray-600">Check back soon for exciting program opportunities!</p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if(isset($testimonials)): ?>
            <?php if(count($testimonials) > 0): ?>
                <div class="mb-20 flex flex-col gap-10 max-w-5xl mx-auto px-4">
                    <?php if (isset($component)) { $__componentOriginal0977f807d82871bbce3fb5f96f4babc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sub-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Testimonials <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0977f807d82871bbce3fb5f96f4babc6)): ?>
<?php $attributes = $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6; ?>
<?php unset($__attributesOriginal0977f807d82871bbce3fb5f96f4babc6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0977f807d82871bbce3fb5f96f4babc6)): ?>
<?php $component = $__componentOriginal0977f807d82871bbce3fb5f96f4babc6; ?>
<?php unset($__componentOriginal0977f807d82871bbce3fb5f96f4babc6); ?>
<?php endif; ?>
                    <div x-data="{
                        slides: [
                            <?php if(isset($testimonials)): ?>
                                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    {
                                        id: <?php echo e($testimonial->id); ?>,
                                        photo: '<?php echo e($testimonial->image ? asset('storage/' . $testimonial->image) : ($testimonial->photo ? asset('storage/' . $testimonial->photo) : asset('assets/img/default-avatar.png'))); ?>',
                                        name: `<?php echo e($testimonial->name); ?>`,
                                        title: `<?php echo e(trim(($testimonial->position ? $testimonial->position : '') . (($testimonial->position && $testimonial->company) ? ' · ' : '') . ($testimonial->company ? $testimonial->company : ''))); ?>`,
                                        description: `<?php echo str_replace("`", "'", 
                                                preg_replace('/\s+/', ' ', e(strip_tags($testimonial->content ?: $testimonial->description ?: ''))) 
                                            ); ?>`
                                    },
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
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
                                if (val < -1) {
                                    this.update(this.slides.length + val);
                                } else if (val > this.slides.length) {
                                    this.update(val - this.slides.length);
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
                            
                            <button
                                @click="update(current - 1)"
                                class="z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-700 text-blue-800 -ml-4 h-16 w-8 rounded-none flex items-center justify-center"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>

                            
                            <div class="overflow-hidden relative w-full">
                                <div
                                    class="flex py-3"
                                    :class="{ 'transition-transform duration-700 ease-in-out': !(last >= slides.length || last < 0) }"
                                    :style="`transform: translateX(${(current + 1) * -100}%)`"
                                    @transitionend="if (current === -1) update(slides.length - 1); else if (current === slides.length) update(0)"
                                >
                                    <template x-for="slide in [slides[slides.length - 1], ...slides, slides[0]]">
                                        <div class="w-full flex-shrink-0 px-2">
                                            <div class="bg-white rounded-xl shadow-lg flex flex-col sm:flex-row mx-auto p-5 gap-5 max-w-2xl">
                                                <div class="w-full sm:w-[180px] flex items-center justify-center flex-shrink-0">
                                                    <img :src="slide.photo" class="w-full h-[180px] sm:h-[200px] object-cover rounded-lg hover:opacity-75 transition duration-300">
                                                </div>
                                                <div class="flex-1 flex flex-col justify-center">
                                                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 hover:text-[#1F4894] transition duration-300 mb-2" x-text="slide.name"></h3>
                                                    <p class="text-sm sm:text-base font-medium text-[#4D607D] mb-3" x-text="slide.title"></p>
                                                    <p class="text-[#4D607D] text-xs sm:text-sm leading-relaxed mb-4 line-clamp-4" x-text="slide.description"></p>
                                                    <div class="flex justify-end">
                                                        <button class="bg-[#C4D25A] text-[#1F4894] font-semibold rounded-lg hover:bg-[#e5f573] transition duration-300 px-4 py-2 text-xs sm:text-sm">Read More →</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            
                            <button
                                @click="update(current + 1)"
                                class="z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-700 text-blue-800 -mr-4 h-16 w-8 rounded-none flex items-center justify-center"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>

                        
                        <div class="flex justify-center mt-6 space-x-2">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button
                                    @click="update(index)"
                                    :class="{'bg-[#1F4894] w-6': current === index, 'bg-gray-300 w-2': current !== index}"
                                    class="h-2 rounded-full transition-all duration-300"
                                ></button>
                            </template>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="bg-[#F8FBFB] w-full h-max pb-20">
            <div class="pt-16">
                <div class="flex">
                    <img src="./img/Instagram.png" class="w-[41px] h-[41px] ml-auto mr-2 mt-1">
                    <p class="text-[#1F4894] text-[36px] font-semibold mr-auto w-fit ml-2">Instagram</p>
                </div>
                <div class="h-1 w-36 bg-[#C4D25A] mt-2 m-auto"></div>
            </div>
            <div class="flex flex-col sm:flex-row max-sm:items-center max-sm:justify-center">
                <div class="w-full m-20">
                    <img src="./img/ig-mockup.png">
                </div>
                <div class="w-full flex flex-col items-center justify-center max-sm:mb-12">
                    <p class="font-semibold text-xl sm:text-base md:text-xl md:m-4">Follow us on :</p>
                    <a href="https://instagram.com/univpertamina_io" class="text-[#1F4894] md:m- 4 rounded-md text-2xl sm:text-lg md:text-2xl font-bold py-3 px-12 sm:py-1 sm:px-6 md:py-3 md:px-12 bg-[#c4d25a] hover:bg-[#dbe885] transition duration-500">@univpertamina_io</a>
                </div>
            </div>
            <div>
                <p class="text-[#1F4894] text-center text-4xl font-semibold mb-6">Video Profile of Universitas Pertamina</p>
            </div>
            <div class="w-90 flex justify-center rounded-xl overflow-hidden">
                <div class="w-2/3 ">
                    <iframe
                    src="https://www.youtube.com/embed/rvB5LsROYbQ"
                    class="w-full h- rounded-xl"
                    width="575" height="450"
                    title="Universitas Pertamina Profile Video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/home.blade.php ENDPATH**/ ?>