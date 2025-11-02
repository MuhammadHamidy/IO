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
    <div class="w-full bg-gradient-to-b from-gray-50 to-white">
        
        <div class="max-w-screen-2xl mx-auto px-6 py-10">
            
            <div class="mb-6">
                <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-[#1F4894] hover:text-[#1F4894] hover:shadow-md transition-all duration-300 font-semibold group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Home</span>
                </a>
            </div>

            <div class="mb-8">
                <h2 class="text-4xl font-bold text-gray-900 mb-2">Highlight News</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>
            </div>
            
            <div class="max-w-full mx-auto relative">
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
                <div class="flex items-center justify-between">
                    
                    <button
                        @click="update(current - 1)"
                        class="absolute left-0 z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-700 text-blue-800 -ml-4 h-16 w-8 rounded-none flex items-center justify-center"
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
                                <div class="w-full flex-shrink-0">
                                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                                        <img :src="slide.img" class="w-full h-[600px] object-cover object-center">
                                        <div class="absolute inset-0 bg-gradient-to-t from-[#1F4894] via-[#1F4894]/80 to-transparent"></div>
                                        <div class="absolute bottom-0 left-0 right-0 text-white p-10">
                                            <div class="inline-block bg-[#C4D25A] text-[#1F4894] px-4 py-2 rounded-full text-sm font-semibold mb-4">
                                                FEATURED NEWS
                                            </div>
                                            <a :href="'/news/' + slide.id" class="text-4xl lg:text-5xl font-bold block hover:text-[#C4D25A] transition duration-300 leading-tight mb-4" x-text="slide.title"></a>
                                            <p class="text-gray-200 text-lg leading-relaxed excerpt max-w-4xl" x-html="slide.excerpt"></p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    
                    <button
                        @click="update(current + 1)"
                        class="absolute right-0 z-10 bg-[#C4D25A] hover:bg-green-800 hover:text-white transition duration-700 text-blue-800 -mr-4 h-16 w-8 rounded-none flex items-center justify-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button
                            @click="update(index)"
                            :class="{'bg-white w-8': current === index, 'bg-gray-400 w-3': current !== index}"
                            class="h-3 rounded-full transition-all duration-300"
                        ></button>
                    </template>
                </div>
            </div>
        </div>
        
        
        <div class="max-w-screen-2xl mx-auto px-6 py-12">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-gray-900 mb-2">Breaking News</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-red-600 to-orange-600 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <?php $__currentLoopData = $breakingNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative h-72 overflow-hidden">
                        <?php if($news->cover || $news->image): ?>
                            <img src="<?php echo e($news->cover ? asset('storage/' . $news->cover) : asset('storage/' . $news->image)); ?>" alt="<?php echo e($news->title); ?>" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                        <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                        <div class="absolute top-4 left-4">
                            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">BREAKING</span>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <?php echo e($news->created_at->format('d M Y')); ?>

                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gray-900 hover:text-blue-600 transition-colors">
                            <a href="<?php echo e(route('news-detail', $news->id)); ?>"><?php echo e($news->title); ?></a>
                        </h2>
                        <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3"><?php echo \Illuminate\Support\Str::limit(strip_tags($news->content, '<b><i><strong><em>'), 200, '...'); ?></p>
                        <a href="<?php echo e(route('news-detail', $news->id)); ?>" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                            Read More 
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        
        
        <?php if(isset($events) && count($events) > 0): ?>
        <div class="bg-white py-12">
            <div class="max-w-screen-2xl mx-auto px-6">
                <div class="mb-8">
                    <h2 class="text-4xl font-bold text-gray-900 mb-2">Events</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-emerald-400 rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                            <?php if($event->image): ?>
                                <div class="relative h-44 overflow-hidden">
                                    <img src="<?php echo e(asset('storage/' . $event->image)); ?>" alt="<?php echo e($event->title ?? $event->name); ?>" class="w-full h-full object-cover">
                                </div>
                            <?php endif; ?>
                            <div class="p-6">
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <?php echo e(optional($event->date)->format('d M Y')); ?>

                                </div>
                                <h3 class="text-xl font-bold mb-3 text-gray-900 line-clamp-2"><?php echo e($event->title ?? $event->name); ?></h3>
                                <?php if($event->description): ?>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($event->description), 120, '...')); ?></p>
                                <?php endif; ?>
                                <a href="<?php echo e(route('events.show', $event->id)); ?>" class="text-green-700 text-sm font-semibold hover:text-green-900 transition-colors">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="bg-gray-50 py-12">
            <div class="max-w-screen-2xl mx-auto px-6">
                <div class="mb-8">
                    <h2 class="text-4xl font-bold text-gray-900 mb-2">News Archive</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-gray-600 to-gray-400 rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <?php $__currentLoopData = $oldNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <?php if($news->cover || $news->image): ?>
                                    <img src="<?php echo e($news->cover ? asset('storage/' . $news->cover) : asset('storage/' . $news->image)); ?>" alt="<?php echo e($news->title); ?>" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
                                <?php else: ?>
                                    <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    <?php echo e($news->created_at->format('d M Y')); ?>

                                </div>
                                <h3 class="text-xl font-bold mb-3 text-gray-900 hover:text-blue-600 transition-colors line-clamp-2">
                                    <a href="<?php echo e(route('news-detail', $news->id)); ?>"><?php echo e($news->title); ?></a>
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?php echo \Illuminate\Support\Str::limit(strip_tags($news->content, '<b><i><strong><em>'), 120, '...'); ?></p>
                                <a href="<?php echo e(route('news-detail', $news->id)); ?>" class="text-blue-600 text-sm font-semibold hover:text-blue-800 transition-colors">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role_id === 1): ?>
        <div class="bg-blue-50 py-12">
            <div class="max-w-screen-2xl mx-auto px-6">
                <div class="mb-8 flex justify-between items-center">
                    <div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-2">All News (Admin)</h2>
                        <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>
                    </div>
                    <a href="<?php echo e(route('regist-news')); ?>" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl px-6 py-3 hover:shadow-lg transform hover:scale-105 transition-all duration-300 font-semibold flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add News
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $allNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                            <?php if($news->cover): ?>
                                <div class="relative h-48 overflow-hidden">
                                    <img src="<?php echo e(asset('storage/' . $news->cover)); ?>" alt="<?php echo e($news->title); ?>" class="w-full h-full object-cover">
                                    <div class="absolute top-3 right-3 flex gap-2">
                                        <?php if($news->is_publish): ?>
                                            <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Published</span>
                                        <?php else: ?>
                                            <span class="bg-gray-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Draft</span>
                                        <?php endif; ?>
                                        <?php if($news->is_highlight): ?>
                                            <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-semibold">⭐ Featured</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-3 text-gray-900 line-clamp-2"><?php echo e($news->title); ?></h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?php echo \Illuminate\Support\Str::limit(strip_tags($news->content, '<b><i><strong><em>'), 120, '...'); ?></p>
                                <div class="flex gap-2 mt-4">
                                    <a href="<?php echo e(route('news-update', $news->id)); ?>" class="flex-1 bg-blue-500 text-white text-center rounded-lg px-4 py-2 hover:bg-blue-600 transition-colors font-medium">
                                        Edit
                                    </a>
                                    <button onclick="openModal(<?php echo e($news->id); ?>)" class="flex-1 bg-red-500 text-white rounded-lg px-4 py-2 hover:bg-red-600 transition-colors font-medium">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 id="modalMessage" class="text-xl font-bold mb-4">Are you sure to delete this news?</h2>
            <form id="deleteForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-600 text-white rounded-md px-4 py-2 mr-2 hover:bg-gray-700 transition duration-300">Cancel</button>
                    <button type="submit" class="bg-red-600 text-white rounded-md px-4 py-2 hover:bg-red-700 transition duration-300">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('deleteForm').action = '/news/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?><?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/news.blade.php ENDPATH**/ ?>