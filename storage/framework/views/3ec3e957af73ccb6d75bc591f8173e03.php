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
    <!-- Hero Section with Back Button -->
    <div class="relative bg-gradient-to-br from-[#1F4894] via-[#275DCB] to-[#2D5F3F] py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#C4D25A] rounded-full translate-x-1/2 translate-y-1/2 animate-pulse" style="animation-delay: 1s;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="<?php echo e(route('global-network')); ?>" class="inline-flex items-center gap-2 text-white hover:text-[#C4D25A] transition-colors group">
                    <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="font-semibold text-lg">Back to Global Network</span>
                </a>
            </div>

            <div class="text-center">
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full mb-6 border border-white/30">
                    <svg class="w-5 h-5 text-[#C4D25A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-white font-semibold text-sm">Partners by Region</span>
                </div>

                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Explore Our Global Network
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 max-w-4xl mx-auto leading-relaxed font-light">
                    Discover our partnership institutions across different continents. Click on any region to view partners and select a partner to see detailed information about the collaboration.
                </p>
            </div>
        </div>
    </div>

    <!-- Partners By Region Section -->
    <div class="bg-gradient-to-b from-white via-gray-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Partners by Region -->
            <div class="space-y-5">
                <?php $__currentLoopData = $continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $continent => $countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $partnerCount = isset($pagePartners[$continent]) ? $pagePartners[$continent]->count() : 0;
                    ?>
                    
                    <div x-data="{ open: false }" class="group">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:border-[#C4D25A] transition-all duration-300 hover:shadow-2xl">
                            <button @click="open = !open" class="w-full px-6 md:px-8 py-6 flex items-center justify-between bg-gradient-to-r from-white to-gray-50 hover:from-gray-50 hover:to-white transition-all duration-300">
                                <div class="flex items-center space-x-4 md:space-x-6">
                                    <div class="relative">
                                        <div class="bg-gradient-to-br from-[#1F4894] to-[#275DCB] p-4 rounded-xl group-hover:scale-110 transition-transform duration-300 shadow-md">
                                            <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <?php if($partnerCount > 0): ?>
                                            <div class="absolute -top-2 -right-2 bg-[#C4D25A] text-[#1F4894] text-xs font-bold rounded-full w-7 h-7 flex items-center justify-center shadow-lg border-2 border-white">
                                                <?php echo e($partnerCount); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-left">
                                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 group-hover:text-[#1F4894] transition-colors"><?php echo e($continent); ?></h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <span class="font-semibold text-[#2D5F3F]"><?php echo e($partnerCount); ?></span> 
                                            <?php echo e($partnerCount === 1 ? 'Partnership Institution' : 'Partnership Institutions'); ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span x-show="!open" class="hidden md:inline-block text-sm font-medium text-[#1F4894] bg-blue-50 px-4 py-2 rounded-lg">View Partners</span>
                                    <span x-show="open" class="hidden md:inline-block text-sm font-medium text-[#2D5F3F] bg-green-50 px-4 py-2 rounded-lg">Hide Partners</span>
                                    <div class="bg-gray-100 group-hover:bg-[#1F4894] rounded-full p-2 transition-colors">
                                        <svg x-bind:class="{ 'rotate-180': open }" class="w-5 h-5 md:w-6 md:h-6 text-gray-600 group-hover:text-white transform transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </button>
                            
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-400"
                                 x-transition:enter-start="opacity-0 max-h-0"
                                 x-transition:enter-end="opacity-100 max-h-screen"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="opacity-100 max-h-screen"
                                 x-transition:leave-end="opacity-0 max-h-0"
                                 class="overflow-hidden">
                                <div class="p-6 md:p-8 bg-gradient-to-br from-gray-50 to-white border-t border-gray-100">
                                    <?php if(isset($pagePartners[$continent]) && $pagePartners[$continent]->isNotEmpty()): ?>
                                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6">
                                            <?php $__currentLoopData = $pagePartners[$continent]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $countries_list = include base_path('vendor/umpirsky/country-list/data/en/country.php');
                                                    $countryName = $countries_list[$partner->country] ?? $partner->country;
                                                ?>
                                                <div class="group/card">
                                                    <a href="<?php echo e(route('partners.detail', ['id' => $partner->id])); ?>" class="block h-full">
                                                        <div class="bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-transparent group-hover/card:border-[#C4D25A] h-full flex flex-col transform hover:-translate-y-2">
                                                            <!-- Logo Container -->
                                                            <div class="relative bg-gradient-to-br from-gray-50 to-white p-6 flex-shrink-0">
                                                                <?php if($partner->logo): ?>
                                                                    <div class="relative overflow-hidden rounded-lg">
                                                                        <img src="<?php echo e(asset('storage/' . $partner->logo)); ?>" 
                                                                             alt="<?php echo e($partner->name); ?>" 
                                                                             class="w-full h-32 object-contain group-hover/card:scale-110 transition-transform duration-500">
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="w-full h-32 flex items-center justify-center bg-gray-100 rounded-lg">
                                                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                                        </svg>
                                                                    </div>
                                                                <?php endif; ?>
                                                                
                                                                <!-- Category Badge -->
                                                                <?php if($partner->category): ?>
                                                                    <div class="absolute top-2 right-2">
                                                                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-white shadow-md text-xs font-semibold rounded-full border border-gray-200">
                                                                            <?php if($partner->category === 'University'): ?> 
                                                                                <span class="text-lg">🎓</span>
                                                                            <?php elseif($partner->category === 'Organization'): ?> 
                                                                                <span class="text-lg">🏢</span>
                                                                            <?php elseif($partner->category === 'Embassy'): ?> 
                                                                                <span class="text-lg">🏛️</span>
                                                                            <?php elseif($partner->category === 'Government Agency'): ?> 
                                                                                <span class="text-lg">🏛️</span>
                                                                            <?php else: ?> 
                                                                                <span class="text-lg">💼</span>
                                                                            <?php endif; ?>
                                                                        </span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            
                                                            <!-- Info Container -->
                                                            <div class="p-4 bg-gradient-to-br from-[#1F4894] to-[#275DCB] flex-grow flex flex-col justify-between">
                                                                <div>
                                                                    <h4 class="text-sm font-bold text-white line-clamp-2 mb-2 leading-snug group-hover/card:text-[#C4D25A] transition-colors min-h-[40px]">
                                                                        <?php echo e($partner->name); ?>

                                                                    </h4>
                                                                </div>
                                                                
                                                                <div class="space-y-2 mt-2">
                                                                    <div class="flex items-center text-xs text-blue-100">
                                                                        <svg class="w-3.5 h-3.5 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                        </svg>
                                                                        <span class="line-clamp-1 font-medium"><?php echo e($countryName); ?></span>
                                                                    </div>
                                                                    
                                                                    <!-- View Details Link -->
                                                                    <div class="pt-2 border-t border-white/20">
                                                                        <span class="text-xs text-white font-semibold group-hover/card:text-[#C4D25A] transition-colors flex items-center">
                                                                            View Details
                                                                            <svg class="w-3 h-3 ml-1 group-hover/card:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-center py-16 px-4">
                                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                            <p class="text-gray-600 text-lg font-semibold mb-2">No partners available in this region yet</p>
                                            <p class="text-gray-500 text-sm">We're constantly expanding our global network of partnerships</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <a href="<?php echo e(route('global-network')); ?>" class="inline-flex items-center gap-3 bg-gradient-to-r from-[#1F4894] to-[#275DCB] text-white font-bold px-10 py-5 rounded-xl hover:from-[#163872] hover:to-[#1e4da3] transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="text-lg">Back to Global Network</span>
            </a>
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

<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/partners-by-region.blade.php ENDPATH**/ ?>