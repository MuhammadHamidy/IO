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
<div class="max-w-7xl mx-auto py-10 px-4 mt-4">
    
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl p-8 mb-8 shadow-2xl">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center gap-6">
                <img src="<?php echo e($user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.png')); ?>" 
                     alt="avatar" 
                     class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg" />
                <div>
                    <h1 class="text-3xl font-bold mb-2"><?php echo e($user->name); ?></h1>
                    <p class="text-blue-100 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <?php echo e($user->email); ?>

                    </p>
                    <?php if($user->student_id): ?>
                        <p class="text-blue-100 mt-1">Student ID: <?php echo e($user->student_id); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <a href="<?php echo e(route('user.profile.edit')); ?>" class="bg-white text-blue-700 px-6 py-3 rounded-xl font-semibold hover:bg-blue-50 transition-all duration-300 shadow-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Profile
            </a>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
        <div class="flex items-center mb-6 pb-4 border-b-2 border-blue-100">
            <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800">Personal Information</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Name</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->name ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Student ID</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->student_id ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Date of Birth</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->date_of_birth ? $user->date_of_birth->format('d F Y') : '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Place of Birth</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->place_of_birth ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Nationality</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->nationality ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Religion</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->religion ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Phone</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->phone ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Email</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->email); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Passport Number</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->passport_number ?? '-'); ?></div>
            </div>
            <div class="md:col-span-2 lg:col-span-3">
                <div class="text-sm font-semibold text-gray-500 mb-1">Passport Expiration Date</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->passport_expiration_date ? $user->passport_expiration_date->format('d F Y') : '-'); ?></div>
            </div>
            <div class="md:col-span-2 lg:col-span-3">
                <div class="text-sm font-semibold text-gray-500 mb-1">Address</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->address ?? '-'); ?></div>
            </div>
            <div class="md:col-span-2 lg:col-span-3">
                <div class="text-sm font-semibold text-gray-500 mb-1">Mailing Address</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->mailing_address ?? '-'); ?></div>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
        <div class="flex items-center mb-6 pb-4 border-b-2 border-purple-100">
            <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800">Academic Information</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Department/Faculty</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->faculty ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Program Study</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->program_study ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">GPA</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->gpa ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Year/Semester</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->year_semester ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">TOEFL/IELTS Score</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->toefl_score ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Test Date</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->toefl_test_date ? $user->toefl_test_date->format('d F Y') : '-'); ?></div>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
        <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
            <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800">Parent Information</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Parent's Name</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->parent_name ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Parental Relationship</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->parental_relationship ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Parent's Telephone</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->parent_telephone ?? '-'); ?></div>
            </div>
            <div>
                <div class="text-sm font-semibold text-gray-500 mb-1">Parent's Mobile</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->parent_mobile ?? '-'); ?></div>
            </div>
            <div class="md:col-span-2">
                <div class="text-sm font-semibold text-gray-500 mb-1">Parent's Email</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->parent_email ?? '-'); ?></div>
            </div>
            <div class="md:col-span-2 lg:col-span-3">
                <div class="text-sm font-semibold text-gray-500 mb-1">Parent's Address</div>
                <div class="text-gray-800 font-medium"><?php echo e($user->parent_address ?? '-'); ?></div>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        <div class="flex items-center mb-6 pb-4 border-b-2 border-indigo-100">
            <svg class="w-8 h-8 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800">Documents</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-center justify-between p-4 <?php echo e($user->cv_path ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200'); ?> rounded-xl">
                <div class="flex items-center">
                    <?php if($user->cv_path): ?>
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php else: ?>
                        <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php endif; ?>
                    <span class="font-medium <?php echo e($user->cv_path ? 'text-green-800' : 'text-red-800'); ?>">Curriculum Vitae (CV)</span>
                </div>
                <?php if($user->cv_path): ?>
                    <a href="<?php echo e(asset('storage/' . $user->cv_path)); ?>" target="_blank" class="text-indigo-700 hover:text-indigo-900 font-semibold">View</a>
                <?php else: ?>
                    <span class="text-red-700 font-semibold">Not Uploaded</span>
                <?php endif; ?>
            </div>

            <div class="flex items-center justify-between p-4 <?php echo e($user->transcript_path ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200'); ?> rounded-xl">
                <div class="flex items-center">
                    <?php if($user->transcript_path): ?>
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php else: ?>
                        <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php endif; ?>
                    <span class="font-medium <?php echo e($user->transcript_path ? 'text-green-800' : 'text-red-800'); ?>">Academic Transcript</span>
                </div>
                <?php if($user->transcript_path): ?>
                    <a href="<?php echo e(asset('storage/' . $user->transcript_path)); ?>" target="_blank" class="text-indigo-700 hover:text-indigo-900 font-semibold">View</a>
                <?php else: ?>
                    <span class="text-red-700 font-semibold">Not Uploaded</span>
                <?php endif; ?>
            </div>

            <div class="flex items-center justify-between p-4 <?php echo e($user->toefl_path ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200'); ?> rounded-xl">
                <div class="flex items-center">
                    <?php if($user->toefl_path): ?>
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php else: ?>
                        <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php endif; ?>
                    <span class="font-medium <?php echo e($user->toefl_path ? 'text-green-800' : 'text-red-800'); ?>">TOEFL/IELTS Certificate</span>
                </div>
                <?php if($user->toefl_path): ?>
                    <a href="<?php echo e(asset('storage/' . $user->toefl_path)); ?>" target="_blank" class="text-indigo-700 hover:text-indigo-900 font-semibold">View</a>
                <?php else: ?>
                    <span class="text-red-700 font-semibold">Not Uploaded</span>
                <?php endif; ?>
            </div>

            <div class="flex items-center justify-between p-4 <?php echo e($user->integrity_letter_path ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200'); ?> rounded-xl">
                <div class="flex items-center">
                    <?php if($user->integrity_letter_path): ?>
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php else: ?>
                        <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php endif; ?>
                    <span class="font-medium <?php echo e($user->integrity_letter_path ? 'text-green-800' : 'text-red-800'); ?>">Letter of Integrity</span>
                </div>
                <?php if($user->integrity_letter_path): ?>
                    <a href="<?php echo e(asset('storage/' . $user->integrity_letter_path)); ?>" target="_blank" class="text-indigo-700 hover:text-indigo-900 font-semibold">View</a>
                <?php else: ?>
                    <span class="text-red-700 font-semibold">Not Uploaded</span>
                <?php endif; ?>
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
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/user/profile/show.blade.php ENDPATH**/ ?>