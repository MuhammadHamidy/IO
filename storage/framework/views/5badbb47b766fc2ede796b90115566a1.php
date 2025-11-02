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
    <!-- Hero Section - Redesigned with Pattern & Animation -->
    <div class="relative bg-gradient-to-br from-[#1F4894] via-[#275DCB] to-[#2D5F3F] py-24 md:py-32 overflow-hidden">
        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2 animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-[#C4D25A] rounded-full -translate-x-1/2 -translate-y-1/2 animate-pulse" style="animation-delay: 0.5s;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full mb-6 border border-white/30 animate-fade-in">
                    <svg class="w-5 h-5 text-[#C4D25A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-white font-semibold text-sm">International Partnerships</span>
                </div>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Global Network
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 max-w-4xl mx-auto leading-relaxed font-light mb-10">
                    Building bridges across continents through <span class="text-[#C4D25A] font-semibold">academic excellence</span> and <span class="text-[#C4D25A] font-semibold">institutional partnerships</span>
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#our-partners-by-region" class="inline-flex items-center justify-center gap-2 bg-[#C4D25A] text-[#1F4894] font-bold px-8 py-4 rounded-xl hover:bg-[#d4e068] transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                        <span>Explore Partners</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <a href="#collaborate" class="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur-sm text-white font-bold px-8 py-4 rounded-xl border-2 border-white/30 hover:bg-white/20 transition-all duration-300">
                        <span>Partner With Us</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Who We Work With Section - Partner Slider -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 bg-green-50 border-2 border-dashed border-[#2D5F3F] px-6 py-3 rounded-full mb-6">
                    <svg class="w-6 h-6 text-[#2D5F3F]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path>
                    </svg>
                    <span class="text-[#2D5F3F] font-bold text-sm uppercase tracking-wider">OUR PARTNERS</span>
                </div>
                
                <h2 class="text-4xl md:text-5xl font-bold mb-6" style="color: #2D5F3F;">Who We Work With</h2>
                <p class="text-gray-700 text-lg max-w-4xl mx-auto leading-relaxed">
                    Here's a glimpse of the institutions and organizations we've collaborated with to advance sustainability and innovation.
                </p>
                
                <!-- Statistics -->
                <div class="flex flex-wrap justify-center gap-8 mt-10">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-[#1F4894] mb-2"><?php echo e($pagePartners->flatten()->count()); ?>+</div>
                        <div class="text-gray-600 font-medium">Global Partners</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-[#2D5F3F] mb-2"><?php echo e(count($continents)); ?></div>
                        <div class="text-gray-600 font-medium">Regions Worldwide</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-[#C4D25A] mb-2">25+</div>
                        <div class="text-gray-600 font-medium">Countries</div>
                    </div>
                </div>
            </div>

            <!-- Partners Slider -->
            <div class="relative mb-12">
                <!-- Slider Container -->
                <div class="overflow-hidden">
                    <div class="partner-slider-wrapper flex gap-6 animate-slide hover:pause-animation" id="partner-slider">
                        <!-- First Set -->
                        <?php $__currentLoopData = $pagePartners->flatten(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('partners.detail', ['id' => $partner->id])); ?>" class="flex-shrink-0 w-64 group">
                                <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-gray-100 hover:border-[#C4D25A] h-full">
                                    <div class="aspect-w-1 aspect-h-1 bg-gray-50 p-6 flex items-center justify-center min-h-[180px]">
                                        <?php if($partner->logo): ?>
                                            <img src="<?php echo e(asset('storage/' . $partner->logo)); ?>" 
                                                 alt="<?php echo e($partner->name); ?>" 
                                                 class="max-w-full max-h-[140px] object-contain group-hover:scale-110 transition-transform duration-300">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 border-t border-gray-100">
                                        <p class="text-xs text-center text-gray-600 font-medium truncate"><?php echo e($partner->name); ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- Second Set (for seamless loop) -->
                        <?php $__currentLoopData = $pagePartners->flatten(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('partners.detail', ['id' => $partner->id])); ?>" class="flex-shrink-0 w-64 group" aria-hidden="true">
                                <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-gray-100 hover:border-[#C4D25A] h-full">
                                    <div class="aspect-w-1 aspect-h-1 bg-gray-50 p-6 flex items-center justify-center min-h-[180px]">
                                        <?php if($partner->logo): ?>
                                            <img src="<?php echo e(asset('storage/' . $partner->logo)); ?>" 
                                                 alt="<?php echo e($partner->name); ?>" 
                                                 class="max-w-full max-h-[140px] object-contain group-hover:scale-110 transition-transform duration-300">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 border-t border-gray-100">
                                        <p class="text-xs text-center text-gray-600 font-medium truncate"><?php echo e($partner->name); ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- Explore More Button -->
            <div class="text-center">
                <a href="<?php echo e(route('partners-by-region')); ?>" class="inline-flex items-center gap-3 bg-[#2D5F3F] text-white font-bold px-10 py-5 rounded-xl hover:bg-[#234a31] transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <span class="text-lg">Explore More</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- CSS for Slider -->
    <style>
        html {
            scroll-behavior: smooth;
        }
        
        @keyframes slide {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        .animate-slide {
            animation: slide 60s linear infinite;
            will-change: transform;
        }
        
        .pause-animation:hover {
            animation-play-state: paused;
        }
        
        .partner-slider-wrapper a {
            position: relative;
            z-index: 10;
            pointer-events: auto;
        }
        
        /* Ensure smooth scrolling with offset for fixed header */
        .scroll-mt-20 {
            scroll-margin-top: 5rem;
        }
    </style>

    

    
    <!-- Partner With Us Section - Redesigned -->
    <div id="collaborate" class="relative bg-gradient-to-br from-[#1F4894] via-[#275DCB] to-[#2D5F3F] py-24 px-4 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#C4D25A] rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full mb-6 border border-white/30">
                <svg class="w-5 h-5 text-[#C4D25A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-white font-semibold text-sm">Join Our Network</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6"><?php echo e(__('Partner With Universitas Pertamina')); ?></h1>
            <p class="text-white text-lg md:text-xl opacity-90 max-w-4xl mx-auto leading-relaxed">
                As a dynamic university focusing on Energy, Business, and Technology, Universitas Pertamina is committed to building 
                meaningful international partnerships. With <span class="font-bold text-[#C4D25A]">6 faculties, 15 study programs</span>, and collaborations with over <span class="font-bold text-[#C4D25A]">60 institutions</span> 
                worldwide, we invite you to join our growing global network and create impactful academic experiences together.
            </p>
        </div>
    </div>

    <!-- Why Collaborate Section - Redesigned with Better Cards -->
    <div class="bg-white py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center mb-4">
                    <div class="h-1 w-12 bg-[#C4D25A] rounded-full mr-3"></div>
                    <span class="text-[#1F4894] font-semibold text-sm uppercase tracking-wider">Benefits</span>
                    <div class="h-1 w-12 bg-[#C4D25A] rounded-full ml-3"></div>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Why Collaborate with UPER?</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Discover the advantages of partnering with one of Indonesia's leading energy-focused universities
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Academic Excellence -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#1F4894] to-[#275DCB] rounded-2xl transform rotate-3 group-hover:rotate-6 transition-transform duration-300 opacity-10"></div>
                    <div class="relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 group-hover:border-[#1F4894]">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#C4D25A] to-[#a8b64a] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-[#1F4894] transition-colors">Academic Excellence</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Accredited programs in Energy, Engineering, Business, and Technology with state-of-the-art facilities 
                            and internationally experienced faculty members.
                        </p>
                    </div>
                </div>

                <!-- Global Network -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#2D5F3F] to-[#1e4a31] rounded-2xl transform rotate-3 group-hover:rotate-6 transition-transform duration-300 opacity-10"></div>
                    <div class="relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 group-hover:border-[#2D5F3F]">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#C4D25A] to-[#a8b64a] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-[#2D5F3F] transition-colors">Extensive Global Network</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Strategic partnerships with 60+ universities and institutions across Asia, Europe, Australia, 
                            and America for student and faculty mobility.
                        </p>
                                </div>
                            </div>

                <!-- Innovation Focus -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#275DCB] to-[#1F4894] rounded-2xl transform rotate-3 group-hover:rotate-6 transition-transform duration-300 opacity-10"></div>
                    <div class="relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-gray-100 group-hover:border-[#275DCB]">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#C4D25A] to-[#a8b64a] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-[#275DCB] transition-colors">Industry Connections</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Strong ties with leading energy companies and industries, providing unique opportunities 
                            for research collaboration and student internships.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Collaboration Types - Redesigned with Icons -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center mb-4">
                    <div class="h-1 w-12 bg-[#C4D25A] rounded-full mr-3"></div>
                    <span class="text-[#1F4894] font-semibold text-sm uppercase tracking-wider">Partnership Models</span>
                    <div class="h-1 w-12 bg-[#C4D25A] rounded-full ml-3"></div>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Types of Collaboration</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Explore various partnership opportunities tailored to your institution's goals and expertise
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Student Exchange -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-[#1F4894] hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-[#1F4894] to-[#275DCB] rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Student Exchange Programs</h3>
                            <div class="flex items-center gap-2 text-sm text-[#1F4894] font-semibold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span>Most Popular</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Enable students to gain international experience through one or two-semester exchange programs 
                        with seamless credit transfer and comprehensive academic support.
                    </p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Inbound and outbound mobility programs</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>English-medium courses for international students</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Cultural activities and buddy program support</span>
                        </li>
                    </ul>
                </div>

                <!-- Joint Research -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-[#2D5F3F] hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-[#2D5F3F] to-[#1e4a31] rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Joint Research & Innovation</h3>
                            <div class="flex items-center gap-2 text-sm text-[#2D5F3F] font-semibold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                <span>Innovation Focus</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Engage in collaborative research focusing on energy transition, digital transformation, 
                        sustainable development, and technological innovation.
                    </p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>State-of-the-art laboratories and research centers</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Joint publications in reputable international journals</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Collaborative grant proposals and funding opportunities</span>
                        </li>
                    </ul>
                </div>

                <!-- Faculty Mobility -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-[#C4D25A] hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-[#C4D25A] to-[#a8b64a] rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Faculty & Staff Mobility</h3>
                            <div class="flex items-center gap-2 text-sm text-[#C4D25A] font-semibold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <span>Professional Development</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Strengthen academic capacity through faculty and staff exchange programs, 
                        visiting professorships, and collaborative teaching arrangements.
                    </p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Teaching mobility and guest lectures</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Joint curriculum development and quality assurance</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Staff training and professional development workshops</span>
                        </li>
                    </ul>
                </div>

                <!-- Double Degree -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-[#275DCB] hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-[#275DCB] to-[#1F4894] rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                                                </svg>
                                                            </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Double Degree & Joint Programs</h3>
                            <div class="flex items-center gap-2 text-sm text-[#275DCB] font-semibold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                </svg>
                                <span>Premium Program</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Create integrated academic programs where students can earn degrees from both institutions, 
                        enhancing their global competitiveness and career opportunities.
                    </p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>2+2 or 3+1 double degree arrangements</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Joint master and doctoral programs</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>International recognition and dual credentials</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Get in Touch Section - Redesigned -->
    <div class="bg-white py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="relative bg-gradient-to-br from-[#1F4894] via-[#275DCB] to-[#2D5F3F] rounded-3xl shadow-2xl overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute -top-20 -right-20 w-80 h-80 bg-white rounded-full"></div>
                    <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-[#C4D25A] rounded-full"></div>
                </div>
                
                <div class="relative z-10 p-8 md:p-12 lg:p-16 text-white">
                    <div class="text-center mb-10">
                        <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full mb-6 border border-white/30">
                            <svg class="w-5 h-5 text-[#C4D25A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <span class="font-semibold text-sm">Get In Touch</span>
                        </div>
                        <h2 class="text-3xl md:text-5xl font-bold mb-4"><?php echo e(__('Start Your Partnership Journey')); ?></h2>
                        <p class="text-lg md:text-xl opacity-90 max-w-3xl mx-auto">
                            Interested in building a partnership with Universitas Pertamina? 
                            Our International Office team is ready to discuss tailored collaboration opportunities!
                        </p>
                                                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-[#C4D25A] rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            </svg>
                                                        </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-2">📍 Our Address</h3>
                                    <p class="opacity-90 leading-relaxed text-sm">
                                        Rectorat Building 4th Floor<br>
                                        Universitas Pertamina<br>
                                        Jalan Teuku Nyak Arief, Simprug<br>
                                        Grogol Selatan, Jakarta Selatan, 12220
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-[#C4D25A] rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-2">📧 Contact Information</h3>
                                    <p class="opacity-90 leading-relaxed text-sm">
                                        Email: international.office@universitaspertamina.ac.id<br>
                                        WhatsApp: +62 852-1858-2582<br>
                                        Instagram: @univpertamina_io
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="mailto:international.office@universitaspertamina.ac.id" 
                           class="inline-flex items-center justify-center gap-2 bg-[#C4D25A] text-[#1F4894] font-bold px-8 py-4 rounded-xl hover:bg-[#a8b64a] transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 w-full sm:w-auto">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Email Us</span>
                        </a>
                        <a href="<?php echo e(route('contact-us')); ?>" 
                           class="inline-flex items-center justify-center gap-2 bg-white text-[#1F4894] font-bold px-8 py-4 rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 w-full sm:w-auto">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Contact Form</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partnership Booklet Section - Redesigned -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-20 px-4">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="grid md:grid-cols-2 gap-0">
                    <!-- Left Side - Visual -->
                    <div class="bg-gradient-to-br from-[#1F4894] to-[#275DCB] p-12 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
                            <div class="absolute bottom-0 right-0 w-64 h-64 bg-[#C4D25A] rounded-full translate-x-1/2 translate-y-1/2"></div>
                        </div>
                        <div class="relative z-10 text-center">
                            <div class="inline-flex items-center justify-center w-32 h-32 bg-white/20 backdrop-blur-sm rounded-3xl mb-6 shadow-2xl">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">Partnership Booklet</h3>
                            <p class="text-blue-100 text-sm">PDF Format • Comprehensive Guide</p>
                        </div>
                    </div>
                    
                    <!-- Right Side - Content -->
                    <div class="p-12 flex items-center">
                        <div>
                            <div class="inline-flex items-center gap-2 bg-blue-50 text-[#1F4894] px-4 py-2 rounded-lg mb-6">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="font-semibold text-sm">Free Resource</span>
                            </div>
                            
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4"><?php echo e(__('Download Partnership Information')); ?></h2>
                            <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                                Learn more about Universitas Pertamina's international programs, partnership opportunities, 
                                and collaboration framework. Download our comprehensive information package to explore how we can work together.
                            </p>
                            
                            <a href="#" 
                               class="inline-flex items-center gap-3 bg-[#2D5F3F] text-white font-bold px-8 py-4 rounded-xl hover:bg-[#234a31] transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                                <span>Download Booklet (PDF)</span>
            </a>
                        </div>
                    </div>
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
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/international-collaboration.blade.php ENDPATH**/ ?>