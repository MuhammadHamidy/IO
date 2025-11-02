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

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-[#1F4894] to-[#2D5F3F] py-20 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6"><?php echo e(__('Partner With Universitas Pertamina')); ?></h1>
            <p class="text-white text-lg md:text-xl opacity-90 max-w-4xl mx-auto leading-relaxed">
                As a dynamic university focusing on Energy, Business, and Technology, Universitas Pertamina is committed to building 
                meaningful international partnerships. With 6 faculties, 15 study programs, and collaborations with over 60 institutions 
                worldwide, we invite you to join our growing global network and create impactful academic experiences together.
            </p>
        </div>
    </div>

    <!-- Why Collaborate Section -->
    <div class="bg-white py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-12 text-center">Why Collaborate with UPER?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Academic Excellence -->
                <div class="bg-gray-50 rounded-lg p-8 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-[#C4D25A] rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Academic Excellence</h3>
                    <p class="text-gray-600">
                        Accredited programs in Energy, Engineering, Business, and Technology with state-of-the-art facilities 
                        and internationally experienced faculty members.
                    </p>
                </div>

                <!-- Global Network -->
                <div class="bg-gray-50 rounded-lg p-8 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-[#C4D25A] rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Extensive Global Network</h3>
                    <p class="text-gray-600">
                        Strategic partnerships with 60+ universities and institutions across Asia, Europe, Australia, 
                        and America for student and faculty mobility.
                    </p>
                </div>

                <!-- Innovation Focus -->
                <div class="bg-gray-50 rounded-lg p-8 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-[#C4D25A] rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Industry Connections</h3>
                    <p class="text-gray-600">
                        Strong ties with leading energy companies and industries, providing unique opportunities 
                        for research collaboration and student internships.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Collaboration Types -->
    <div class="bg-gray-50 py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-12 text-center">Types of Collaboration</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white rounded-lg shadow-md p-8 border-l-4 border-[#1F4894]">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Student Exchange Programs</h3>
                    <p class="text-gray-600 mb-4">
                        Enable students to gain international experience through one or two-semester exchange programs 
                        with seamless credit transfer and comprehensive academic support.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>Inbound and outbound mobility programs</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>English-medium courses for international students</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>Cultural activities and buddy program support</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8 border-l-4 border-[#2D5F3F]">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Joint Research & Innovation</h3>
                    <p class="text-gray-600 mb-4">
                        Engage in collaborative research focusing on energy transition, digital transformation, 
                        sustainable development, and technological innovation.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>State-of-the-art laboratories and research centers</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>Joint publications in reputable international journals</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>Collaborative grant proposals and funding opportunities</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8 border-l-4 border-[#C4D25A]">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Faculty & Staff Mobility</h3>
                    <p class="text-gray-600 mb-4">
                        Strengthen academic capacity through faculty and staff exchange programs, 
                        visiting professorships, and collaborative teaching arrangements.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>Teaching mobility and guest lectures</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>Joint curriculum development and quality assurance</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>Staff training and professional development workshops</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8 border-l-4 border-[#1F4894]">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Double Degree & Joint Programs</h3>
                    <p class="text-gray-600 mb-4">
                        Create integrated academic programs where students can earn degrees from both institutions, 
                        enhancing their global competitiveness and career opportunities.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>2+2 or 3+1 double degree arrangements</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>Joint master and doctoral programs</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C4D25A] font-bold">•</span>
                            <span>International recognition and dual credentials</span>
                        </li>
                </ul>
            </div>
            </div>
        </div>
    </div>

    <!-- Get in Touch Section -->
    <div class="bg-white py-16 px-4">
        <div class="max-w-5xl mx-auto">
            <div class="bg-gradient-to-r from-[#1F4894] to-[#2D5F3F] rounded-2xl shadow-2xl p-12 text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center"><?php echo e(__('Start Your Partnership Journey')); ?></h2>
                <p class="text-center text-lg mb-8 opacity-90">
                    Interested in building a partnership with Universitas Pertamina? 
                    Our International Office team is ready to discuss tailored collaboration opportunities!
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div class="bg-white/10 rounded-lg p-6">
                        <h3 class="font-bold text-xl mb-3">📍 Our Address</h3>
                        <p class="opacity-90 leading-relaxed">
                            Rectorat Building 4th Floor<br>
                            Universitas Pertamina<br>
                            Jalan Teuku Nyak Arief, Simprug<br>
                            Grogol Selatan, Jakarta Selatan, 12220
                        </p>
                    </div>
                    
                    <div class="bg-white/10 rounded-lg p-6">
                        <h3 class="font-bold text-xl mb-3">📧 Contact Information</h3>
                        <p class="opacity-90 leading-relaxed">
                            Email: international.office@universitaspertamina.ac.id<br>
                            WhatsApp: +62 852-1858-2582<br>
                            Instagram: @univpertamina_io
                        </p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="mailto:international.office@universitaspertamina.ac.id" 
                       class="bg-[#C4D25A] text-[#1F4894] font-bold px-8 py-4 rounded-lg hover:bg-[#a8b64a] transition duration-300 shadow-lg w-full sm:w-auto text-center">
                        Email Us
                    </a>
                    <a href="<?php echo e(route('contact-us')); ?>" 
                       class="bg-white text-[#1F4894] font-bold px-8 py-4 rounded-lg hover:bg-gray-100 transition duration-300 shadow-lg w-full sm:w-auto text-center">
                        Contact Form
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Partnership Booklet Section -->
    <div class="bg-gray-50 py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-white rounded-xl shadow-lg p-12">
                <div class="w-20 h-20 bg-[#1F4894] rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                
                <h2 class="text-3xl font-bold text-gray-800 mb-4"><?php echo e(__('Download Partnership Information')); ?></h2>
                <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                    Learn more about Universitas Pertamina's international programs, partnership opportunities, 
                    and collaboration framework. Download our comprehensive information package to explore how we can work together.
                </p>
                
                <a href="#" 
                   class="inline-flex items-center gap-3 bg-[#2D5F3F] text-white font-bold px-8 py-4 rounded-lg hover:bg-[#234a31] transition duration-300 shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Download Booklet (PDF)
                </a>
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
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/collaboration-with-us.blade.php ENDPATH**/ ?>