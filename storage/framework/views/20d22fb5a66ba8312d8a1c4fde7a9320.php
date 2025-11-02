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
    
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-12 mt-0">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold mb-2"><?php echo e(__($title)); ?></h1>
                    <p class="text-blue-100">Choose from our carefully curated programs</p>
                </div>
                <a href="<?php echo e(route('program')); ?>" class="flex items-center bg-white/20 hover:bg-white/30 px-6 py-3 rounded-lg transition-all duration-300 backdrop-blur-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Programs
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <!-- Filter Section -->
        

        <!-- Results Count -->
        <div class="mb-6">
            <p class="text-gray-600 text-sm">
                Showing <span class="font-bold text-gray-900"><?php echo e(count($programs)); ?></span> program<?php echo e(count($programs) != 1 ? 's' : ''); ?>

            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-gray-100">
                    
                    <div class="relative h-56 overflow-hidden">
                        <?php if($program->image): ?>
                            <img src="<?php echo e(asset('storage/' . $program->image)); ?>" alt="<?php echo e($program->title ?? $program->name); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-white text-5xl font-bold mb-2"><?php echo e(substr($program->title ?? $program->name, 0, 2)); ?></div>
                                    <div class="text-blue-200 text-sm"><?php echo e($program->type ?? 'Program'); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($program->is_featured): ?>
                            <div class="absolute top-4 left-4">
                                <span class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-900 px-3 py-1 rounded-full text-xs font-bold shadow-lg flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    FEATURED
                                </span>
                            </div>
                        <?php endif; ?>
                        
                        
                        <?php if($program->program_type): ?>
                            <div class="absolute top-4 right-4">
                                <span class="bg-purple-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                    <?php echo e(ucfirst($program->program_type)); ?>

                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 min-h-[3.5rem]">
                            <?php echo e($program->title ?? $program->name); ?>

                        </h2>
                        
                        <div class="space-y-3 mb-4">
                            <?php if($program->duration): ?>
                                <div class="flex items-center text-gray-600 bg-gray-50 px-3 py-2 rounded-lg">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="font-medium text-sm"><?php echo e($program->duration); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if($program->open_date || $program->close_date): ?>
                                <a href="<?php echo e(route('home')); ?>#Calendar" class="flex items-center text-gray-700 bg-gray-50 px-3 py-2 rounded-lg hover:bg-gray-100">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="font-medium text-sm">
                                        <?php if($program->open_date): ?> Open: <?php echo e($program->open_date->format('d M Y')); ?> <?php endif; ?>
                                        <?php if($program->open_date && $program->close_date): ?> — <?php endif; ?>
                                        <?php if($program->close_date): ?> Close: <?php echo e($program->close_date->format('d M Y')); ?> <?php endif; ?>
                                    </span>
                                </a>
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

                        <?php if($program->description): ?>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                <?php echo e(Str::limit(strip_tags($program->description), 120)); ?>

                            </p>
                        <?php endif; ?>

                        
                        <div class="flex gap-3">
                            <button onclick="openProgramModal(<?php echo e($program->id); ?>)" class="flex-1 bg-blue-600 text-white rounded-lg px-4 py-2.5 font-semibold hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Details
                            </button>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(Auth::user()->role_id === 1): ?>
                                    <div class="flex-1 bg-gray-300 text-gray-600 rounded-lg px-4 py-2.5 font-semibold cursor-not-allowed flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Preview Only
                                    </div>
                                <?php else: ?>
                                    <button onclick="checkDocuments(<?php echo e($program->id); ?>)" class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg px-4 py-2.5 font-semibold hover:from-green-700 hover:to-green-800 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Apply
                                    </button>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(route('regist-inbound')); ?>" class="flex-1 text-center bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg px-4 py-2.5 font-semibold hover:from-green-700 hover:to-green-800 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                                    Login
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                
                <div id="program-modal-<?php echo e($program->id); ?>" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[200] flex items-center justify-center p-4">
                    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                        
                        <div class="sticky top-0 bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-6 rounded-t-2xl">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="text-3xl font-bold mb-2"><?php echo e($program->title ?? $program->name); ?></h3>
                                    <?php if($program->duration): ?>
                                        <div class="flex items-center text-blue-100">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Duration: <?php echo e($program->duration); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <button onclick="closeProgramModal(<?php echo e($program->id); ?>)" class="text-white/80 hover:text-white bg-white/20 hover:bg-white/30 rounded-full p-2 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        
                        <div class="p-8 space-y-6">
                            <?php if($program->image): ?>
                                <div class="rounded-xl overflow-hidden shadow-lg">
                                    <img src="<?php echo e(asset('storage/' . $program->image)); ?>" alt="<?php echo e($program->title ?? $program->name); ?>" class="w-full h-64 object-cover">
                                </div>
                            <?php endif; ?>

                            <?php if($program->description): ?>
                                <div class="bg-blue-50 p-6 rounded-xl">
                                    <h4 class="font-bold text-xl text-gray-800 mb-3 flex items-center">
                                        <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Program Description
                                    </h4>
                                    <div class="text-gray-700 leading-relaxed">
                                        <?php echo nl2br(e($program->description)); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($program->requirements): ?>
                                <div class="bg-purple-50 p-6 rounded-xl">
                                    <h4 class="font-bold text-xl text-gray-800 mb-3 flex items-center">
                                        <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Program Requirements
                                    </h4>
                                    <div class="text-gray-700 leading-relaxed">
                                        <?php echo nl2br(e($program->requirements)); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="bg-green-50 p-6 rounded-xl">
                                <h4 class="font-bold text-xl text-gray-800 mb-4 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Required Documents
                                </h4>
                                <ul class="space-y-3">
                                    <li class="flex items-center text-gray-700 bg-white p-3 rounded-lg shadow-sm">
                                        <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Curriculum Vitae (CV)</span>
                                    </li>
                                    <li class="flex items-center text-gray-700 bg-white p-3 rounded-lg shadow-sm">
                                        <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Academic Transcript</span>
                                    </li>
                                    <li class="flex items-center text-gray-700 bg-white p-3 rounded-lg shadow-sm">
                                        <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>English Proficiency Certificate (TOEFL/IELTS)</span>
                                    </li>
                                    <li class="flex items-center text-gray-700 bg-white p-3 rounded-lg shadow-sm">
                                        <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Letter of Integrity</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        
                        <div class="sticky bottom-0 bg-gray-50 p-6 rounded-b-2xl border-t border-gray-200">
                            <div class="flex gap-4">
                                <button onclick="closeProgramModal(<?php echo e($program->id); ?>)" class="flex-1 bg-gray-300 text-gray-700 rounded-lg px-6 py-3 font-semibold hover:bg-gray-400 transition-all duration-300">
                                    Close
                                </button>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(Auth::user()->role_id === 1): ?>
                                        <div class="flex-1 bg-gray-300 text-gray-600 rounded-lg px-6 py-3 font-semibold cursor-not-allowed flex items-center justify-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Preview Mode - Admin Only
                                        </div>
                                    <?php else: ?>
                                        <button onclick="closeProgramModal(<?php echo e($program->id); ?>); checkDocuments(<?php echo e($program->id); ?>);" class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-lg px-6 py-3 font-semibold hover:from-blue-700 hover:to-indigo-800 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Apply Now
                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(route('regist-inbound')); ?>" class="flex-1 text-center bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-lg px-6 py-3 font-semibold hover:from-blue-700 hover:to-indigo-800 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center">
                                        Login to Apply
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-3 text-center py-20">
                    <div class="inline-block p-8 bg-gray-50 rounded-2xl">
                        <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-2xl font-semibold text-gray-600 mb-2">No programs available</p>
                        <p class="text-gray-500">Check back later for new programs</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(auth()->guard()->check()): ?>
    
    <div id="documentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[200] flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-gray-800">Document Verification</h3>
                    <button onclick="closeModal()" class="text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div id="documentStatus" class="space-y-3">
                    
                </div>

                <div class="mt-6 flex gap-3">
                    <button onclick="closeModal()" class="flex-1 bg-gray-300 text-gray-700 rounded-md px-6 py-3 font-bold hover:bg-gray-400 transition">
                        Cancel
                    </button>
                    <button id="proceedButton" onclick="proceedToApplication()" class="flex-1 bg-green-600 text-white rounded-md px-6 py-3 font-bold hover:bg-green-700 transition">
                        Proceed to Application
                    </button>
                    <a id="uploadButton" href="<?php echo e(route('user.profile.documents')); ?>" class="flex-1 text-center bg-blue-600 text-white rounded-md px-6 py-3 font-bold hover:bg-blue-700 transition">
                        Upload Documents
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script>
        let currentProgramId = null;

        function openProgramModal(programId) {
            document.getElementById(`program-modal-${programId}`).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProgramModal(programId) {
            document.getElementById(`program-modal-${programId}`).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('bg-black/60')) {
                const modals = document.querySelectorAll('[id^="program-modal-"]');
                modals.forEach(modal => {
                    modal.classList.add('hidden');
                });
                document.body.style.overflow = 'auto';
            }
        });

        <?php if(auth()->guard()->check()): ?>
        async function checkDocuments(programId) {
            currentProgramId = programId;
            
            try {
                const response = await fetch('<?php echo e(route('user.check-documents')); ?>', {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    }
                });
                
                const data = await response.json();
                
                const documents = [
                    { name: 'Curriculum Vitae (CV)', field: 'cv_path', uploaded: data.cv_path },
                    { name: 'Academic Transcript', field: 'transcript_path', uploaded: data.transcript_path },
                    { name: 'English Proficiency Certificate', field: 'toefl_path', uploaded: data.toefl_path },
                    { name: 'Letter of Integrity', field: 'integrity_letter_path', uploaded: data.integrity_letter_path }
                ];
                
                let allUploaded = true;
                let html = '<div class="space-y-3">';
                
                documents.forEach(doc => {
                    const status = doc.uploaded ? 'text-green-600' : 'text-red-600';
                    const icon = doc.uploaded 
                        ? '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>'
                        : '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>';
                    
                    html += `
                        <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow-sm border ${doc.uploaded ? 'border-green-200' : 'border-red-200'}">
                            <span class="font-medium text-gray-700">${doc.name}</span>
                            <div class="flex items-center ${status}">
                                ${icon}
                                <span class="ml-2 font-bold">${doc.uploaded ? 'Uploaded' : 'Missing'}</span>
                            </div>
                        </div>
                    `;
                    
                    if (!doc.uploaded) allUploaded = false;
                });
                
                html += '</div>';
                
                if (!allUploaded) {
                    html = '<div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-l-4 border-yellow-500 p-5 mb-6 rounded-r-xl shadow-sm"><div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg><p class="text-yellow-800 font-semibold">Some required documents are missing. Please upload all documents before applying.</p></div></div>' + html;
                    document.getElementById('proceedButton').classList.add('hidden');
                    document.getElementById('uploadButton').classList.remove('hidden');
                } else {
                    html = '<div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-5 mb-6 rounded-r-xl shadow-sm"><div class="flex items-start"><svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><p class="text-green-800 font-semibold">All required documents have been uploaded! You can proceed with your application.</p></div></div>' + html;
                    document.getElementById('proceedButton').classList.remove('hidden');
                    document.getElementById('uploadButton').classList.add('hidden');
                }
                
                document.getElementById('documentStatus').innerHTML = html;
                document.getElementById('documentModal').classList.remove('hidden');
                
            } catch (error) {
                console.error('Error checking documents:', error);
                alert('Error checking documents. Please try again.');
            }
        }

        function closeModal() {
            document.getElementById('documentModal').classList.add('hidden');
            currentProgramId = null;
        }

        function proceedToApplication() {
            if (currentProgramId) {
                window.location.href = `/user/applications/create/${currentProgramId}`;
            }
        }
        <?php endif; ?>
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
<?php endif; ?>



<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/programs-list.blade.php ENDPATH**/ ?>