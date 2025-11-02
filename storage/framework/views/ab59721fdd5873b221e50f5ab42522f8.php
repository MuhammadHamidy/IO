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
    <div class="max-w-7xl mx-auto p-6">
        <div class="mb-8">
            <?php if (isset($component)) { $__componentOriginal0977f807d82871bbce3fb5f96f4babc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sub-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Programs and Update')); ?> <?php echo $__env->renderComponent(); ?>
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
        
        <?php if(session('success')): ?>
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        
        <?php
            $featuredPrograms = $activePrograms->where('is_featured', true);
        ?>
        
        <?php if($featuredPrograms->count() > 0): ?>
            <div class="mb-12 relative" x-data="{
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

        
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Other Programs</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <?php $__currentLoopData = $activePrograms->where('is_featured', '!=', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-[#1F4894]">
                    <?php if($program->image): ?>
                        <div class="relative w-full h-48 overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . $program->image)); ?>" alt="<?php echo e($program->name); ?>" class="w-full h-full object-cover">
                            
                            
                            <?php if($program->open_date && $program->close_date && $program->isOpen()): ?>
                                <div class="absolute top-3 left-3">
                                    <span class="px-3 py-1 bg-green-500/90 backdrop-blur-sm text-white text-xs font-semibold rounded-full flex items-center gap-1 shadow-lg">
                                        <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                        OPEN
                                    </span>
                                </div>
                            <?php endif; ?>

                            
                            <?php if($program->program_type): ?>
                                <div class="absolute top-3 right-3">
                                    <span class="bg-purple-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                        <?php echo e(ucfirst($program->program_type)); ?>

                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="relative w-full h-48 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                            <span class="text-white text-4xl font-bold"><?php echo e(substr($program->title ?? $program->name, 0, 2)); ?></span>
                            
                            
                            <?php if($program->program_type): ?>
                                <div class="absolute top-3 right-3">
                                    <span class="bg-purple-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                        <?php echo e(ucfirst($program->program_type)); ?>

                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2 text-gray-800 line-clamp-2 min-h-[3.5rem]"><?php echo e($program->title ?? $program->name); ?></h2>
                        <p class="text-gray-600 mb-3 text-sm"><?php echo e($program->code); ?></p>
                        
                        <?php if($program->description): ?>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3"><?php echo e(Str::limit($program->description, 120)); ?></p>
                        <?php endif; ?>
                        
                        
                        <div class="space-y-3 mb-4">
                            <?php if($program->duration): ?>
                                <div class="flex items-center text-gray-600 bg-gray-50 px-3 py-2 rounded-lg">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="font-medium text-sm"><?php echo e($program->duration); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if($program->category): ?>
                                <div class="flex items-center text-gray-600 bg-indigo-50 px-3 py-2 rounded-lg">
                                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <span class="font-medium text-sm text-indigo-700"><?php echo e($program->category); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    
                    <div class="mt-4 flex gap-2">
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(Auth::user()->role_id === 1): ?>
                                <div class="flex-1 bg-gray-300 text-gray-600 rounded-lg px-4 py-2.5 text-center font-semibold cursor-not-allowed flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Preview Only
                                </div>
                            <?php elseif($program->isOpen()): ?>
                                <a href="<?php echo e(route('user.applications.create', $program->id)); ?>" 
                                   class="flex-1 bg-gradient-to-r from-[#1F4894] to-[#275DCB] text-white rounded-lg px-4 py-2.5 hover:from-[#163872] hover:to-[#1e4da3] transition-all duration-300 text-center font-semibold">
                                    Apply Now
                                </a>
                            <?php else: ?>
                                <div class="flex-1 bg-gray-300 text-gray-600 rounded-lg px-4 py-2.5 text-center font-semibold cursor-not-allowed">
                                    <?php echo e($program->isClosed() ? 'Closed' : 'Coming Soon'); ?>

                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="<?php echo e(route('regist-inbound')); ?>" 
                               class="flex-1 bg-gradient-to-r from-[#C4D25A] to-[#e5f573] text-[#1F4894] rounded-lg px-4 py-2.5 hover:from-[#e5f573] hover:to-[#C4D25A] transition-all duration-300 text-center font-semibold">
                                Login to Apply
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div> 

    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role_id === 1): ?>
        <div class="max-w-7xl mx-auto p-6">
                <div class="mb-5">
                    <?php if (isset($component)) { $__componentOriginal0977f807d82871bbce3fb5f96f4babc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sub-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('All Programs')); ?> <?php echo $__env->renderComponent(); ?>
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $allPrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-2xl font-bold mb-2"><?php echo e($program->name); ?></h2>
                            <p class="text-gray-700 mb-4"><?php echo e($program->code); ?></p>
                            <p class="text-sm text-gray-500">Type: <?php echo e($program->type->name); ?></p>
                            <p class="text-sm text-gray-500">Active: <?php echo e($program->is_active ? 'Yes' : 'No'); ?></p>
                            <div class="flex justify-end mt-4">
                                <a href="<?php echo e(route('programs-update', $program->id)); ?>" class="text-blue-500 mr-4">Edit</a>
                                <button onclick="openModal(<?php echo e($program->id); ?>)" class="text-red-500">Delete</button>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="flex justify-center mt-4">
                    <a href="<?php echo e(route('regist-program')); ?>" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Add Program</a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 id="modalMessage" class="text-xl font-bold mb-4">Apakah Anda yakin untuk menghapus program ini?</h2>
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
            document.getElementById('deleteForm').action = '/programs/' + id;
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
<?php endif; ?><?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/programs.blade.php ENDPATH**/ ?>