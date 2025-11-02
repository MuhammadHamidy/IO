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
    
    <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20 px-6 mt-0">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Discover Our Programs</h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto">
                Explore academic opportunities at Universitas Pertamina. Choose between degree and non-degree programs tailored to your educational goals.
            </p>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto">
                <path fill="#ffffff" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    
    <div class="max-w-7xl mx-auto px-6 py-16 -mt-12">
        
        
        <?php if(isset($featuredPrograms) && $featuredPrograms->count() > 0): ?>
            <div class="mb-16 relative" x-data="{
                currentSlide: 0,
                totalSlides: <?php echo e($featuredPrograms->count()); ?>,
                autoSlideInterval: null,
                nextSlide() {
                    this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                },
                prevSlide() {
                    this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
                },
                goToSlide(index) {
                    this.currentSlide = index;
                },
                startAutoSlide() {
                    this.autoSlideInterval = setInterval(() => {
                        this.nextSlide();
                    }, 6000);
                },
                init() {
                    this.startAutoSlide();
                }
            }" x-init="init()">
                <!-- Slider Container -->
                <div class="overflow-hidden rounded-3xl shadow-2xl">
                    <div class="relative">
                        <?php $__currentLoopData = $featuredPrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div x-show="currentSlide === <?php echo e($index); ?>" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform translate-x-full"
                             x-transition:enter-end="opacity-100 transform translate-x-0"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 transform translate-x-0"
                             x-transition:leave-end="opacity-0 transform -translate-x-full"
                             class="bg-gradient-to-r from-[#1F4894] via-[#275DCB] to-[#3B82F6]">
                            <div class="relative">
                                <?php if($program->image): ?>
                                    <div class="h-64 md:h-96 overflow-hidden">
                                        <img src="<?php echo e(asset('storage/' . $program->image)); ?>" alt="<?php echo e($program->title); ?>" class="w-full h-full object-cover opacity-20">
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-r from-[#1F4894]/90 via-[#275DCB]/90 to-[#3B82F6]/90"></div>
                                <?php else: ?>
                                    <div class="h-64 md:h-96 bg-gradient-to-br from-[#1F4894] via-[#275DCB] to-[#3B82F6]"></div>
                                <?php endif; ?>
                                
                                <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-between">
                                    <div>
                                        <div class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-900 px-4 py-2 rounded-full text-sm font-bold mb-4">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                                            FEATURED PROGRAM
                        </div>
                                        <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4"><?php echo e($program->title); ?></h2>
                                        <p class="text-white/90 text-lg md:text-xl max-w-3xl">
                                            <?php echo e(Str::limit($program->description, 180)); ?>

                                        </p>
                            </div>
                                    
                                    <div class="flex flex-wrap items-center gap-3 mt-6">
                                        <?php if($program->program_type): ?>
                                            <div class="bg-purple-500/90 backdrop-blur-sm px-4 py-2 rounded-lg">
                                                <span class="text-white font-semibold text-sm"><?php echo e(ucfirst($program->program_type)); ?></span>
                        </div>
                                        <?php endif; ?>

                                        <?php if($program->category): ?>
                                            <div class="bg-indigo-500/90 backdrop-blur-sm px-4 py-2 rounded-lg">
                                                <span class="text-white font-semibold text-sm"><?php echo e($program->category); ?></span>
                    </div>
                                        <?php endif; ?>
                                        
                                        <?php if($program->duration): ?>
                                            <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg flex items-center gap-2">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                                                <span class="text-white font-semibold text-sm"><?php echo e($program->duration); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if($program->open_date && $program->close_date && $program->isOpen()): ?>
                                            <div class="bg-green-500/90 backdrop-blur-sm px-4 py-2 rounded-lg flex items-center gap-2">
                                                <span class="relative flex h-3 w-3">
                                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                                                </span>
                                                <span class="text-white font-semibold text-sm">Registration Open</span>
                        </div>
                                        <?php endif; ?>
                                        
                                        <div class="flex-1"></div>
                                        
                                        <div class="flex gap-3 flex-wrap">
                                            <?php
                                                $routeName = 'programs.non-degree';
                                                if($program->type === 'degree') {
                                                    $routeName = 'programs.degree';
                                                }
                                            ?>
                                            <a href="<?php echo e(route($routeName)); ?>" 
                                               class="px-5 py-2.5 bg-white text-[#1F4894] font-bold rounded-xl hover:bg-[#C4D25A] hover:text-[#1F4894] transition-all duration-300 shadow-lg flex items-center gap-2 text-sm">
                                                <span>Explore</span>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                                </svg>
                                            </a>
                                            
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(Auth::user()->role_id !== 1 && $program->isOpen()): ?>
                                                    <a href="<?php echo e(route('user.applications.create', $program->id)); ?>" 
                                                       class="px-5 py-2.5 bg-[#C4D25A] text-[#1F4894] font-bold rounded-xl hover:bg-white hover:text-[#1F4894] transition-all duration-300 shadow-lg flex items-center gap-2 text-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                        </svg>
                                                        <span>Apply Now</span>
                                                    </a>
                                                <?php elseif(Auth::user()->role_id === 1): ?>
                                                    <div class="px-5 py-2.5 bg-gray-300 text-gray-600 rounded-xl cursor-not-allowed flex items-center gap-2 text-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                        <span>Preview Only</span>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('regist-inbound')); ?>" 
                                                   class="px-5 py-2.5 bg-[#C4D25A] text-[#1F4894] font-bold rounded-xl hover:bg-white hover:text-[#1F4894] transition-all duration-300 shadow-lg text-sm">
                                                    Login to Apply
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <?php if($featuredPrograms->count() > 1): ?>
                <button @click="prevSlide()" 
                        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-[#1F4894] p-3 rounded-full shadow-xl transition-all duration-300 z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button @click="nextSlide()" 
                        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-[#1F4894] p-3 rounded-full shadow-xl transition-all duration-300 z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Dots Indicator -->
                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2 z-10">
                    <?php $__currentLoopData = $featuredPrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button @click="goToSlide(<?php echo e($index); ?>)" 
                            :class="currentSlide === <?php echo e($index); ?> ? 'bg-white w-8' : 'bg-white/50 w-3'"
                            class="h-3 rounded-full transition-all duration-300"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Explore Our Programs</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="<?php echo e(asset('/img/program-img-1.png')); ?>" alt="Degree Programs" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <div class="inline-block bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-2">
                            Academic Excellence
                        </div>
                        <h2 class="text-3xl font-bold text-white">Degree Programs</h2>
                    </div>
                </div>
                
                <div class="p-8">
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                        Universitas Pertamina welcomes international students who want to obtain a bachelor's degree. We offer undergraduate programs spread across <span class="font-bold text-blue-600">6 Faculties and 15 study programs</span> for you to choose from.
                    </p>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600">Full Bachelor's Degree Program</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600">Multiple Faculties & Study Programs</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600">International Recognition</span>
                        </div>
                    </div>
                    
                    <a href="<?php echo e(route('programs.degree')); ?>" class="block w-full text-center bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-4 px-6 rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Explore Degree Programs
                        <svg class="inline-block w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>

            
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                <div class="relative h-64 overflow-hidden">
                    <img src="<?php echo e(asset('/img/program-people.png')); ?>" alt="Non-Degree Programs" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <div class="inline-block bg-purple-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-2">
                            Flexible Learning
                        </div>
                        <h2 class="text-3xl font-bold text-white">Non-Degree Programs</h2>
        </div>
    </div>

                <div class="p-8">
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                        We offer flexible non-degree programs designed for both <span class="font-bold text-purple-600">inbound and outbound students</span>. Perfect for exchange programs, internships, and research attachments.
                    </p>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600">Student Exchange Programs</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600">Internship & Research Opportunities</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600">Short-term Programs Available</span>
                        </div>
            </div>
                    
                    <a href="<?php echo e(route('programs.non-degree')); ?>" class="block w-full text-center bg-gradient-to-r from-purple-600 to-purple-700 text-white font-bold py-4 px-6 rounded-xl hover:from-purple-700 hover:to-purple-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Choose Your Program
                        <svg class="inline-block w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        
        <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-8 md:p-12">
            <div class="text-center max-w-4xl mx-auto">
                <h3 class="text-3xl font-bold text-gray-800 mb-4">Why Choose Universitas Pertamina?</h3>
                <p class="text-gray-600 text-lg mb-8">
                    Join our diverse international community and experience world-class education in the heart of Indonesia.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <div class="text-4xl font-bold text-blue-600 mb-2">15+</div>
                        <div class="text-gray-700 font-semibold">Study Programs</div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <div class="text-4xl font-bold text-purple-600 mb-2">6</div>
                        <div class="text-gray-700 font-semibold">Faculties</div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <div class="text-4xl font-bold text-green-600 mb-2">100+</div>
                        <div class="text-gray-700 font-semibold">Partner Universities</div>
                    </div>
            </div>
            </div>
    </div>
    </div>

    <div class="mb-24"></div>
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
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/program.blade.php ENDPATH**/ ?>