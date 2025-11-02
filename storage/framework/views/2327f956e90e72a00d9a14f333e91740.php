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
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">My Applications</h1>
                <p class="text-blue-100">Track your program application progress</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-5 rounded-r-xl shadow-sm">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-800 font-semibold"><?php echo e(session('success')); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="mb-6 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 p-5 rounded-r-xl shadow-sm">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-red-800 font-semibold"><?php echo e(session('error')); ?></p>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="mb-6" x-data="{ activeTab: 'active' }">
        <div class="flex gap-4 border-b-2 border-gray-200">
            <button @click="activeTab = 'active'" 
                    :class="activeTab === 'active' ? 'border-b-4 border-blue-600 text-blue-600' : 'text-gray-500 hover:text-gray-700'"
                    class="px-6 py-3 font-semibold transition-all duration-200 -mb-0.5">
                Active Applications
                <span class="ml-2 px-2 py-1 text-xs rounded-full" :class="activeTab === 'active' ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600'">
                    <?php echo e(count($activeApplications)); ?>

                </span>
            </button>
            <button @click="activeTab = 'completed'" 
                    :class="activeTab === 'completed' ? 'border-b-4 border-green-600 text-green-600' : 'text-gray-500 hover:text-gray-700'"
                    class="px-6 py-3 font-semibold transition-all duration-200 -mb-0.5">
                Completed Applications
                <span class="ml-2 px-2 py-1 text-xs rounded-full" :class="activeTab === 'completed' ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-600'">
                    <?php echo e(count($completedApplications)); ?>

                </span>
            </button>
        </div>

        
        <div x-show="activeTab === 'active'" class="space-y-6 mt-6">
            <?php $__empty_1 = true; $__currentLoopData = $activeApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2"><?php echo e($app->program->title ?? 'Program'); ?></h3>
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Submitted: <?php echo e($app->submitted_at ? $app->submitted_at->format('d M Y') : '-'); ?>

                                </span>
                                <?php if($app->stage_updated_at): ?>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Last Update: <?php echo e($app->stage_updated_at->format('d M Y')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <div class="text-sm font-semibold text-gray-600">Progress</div>
                                <div class="text-2xl font-bold text-blue-600"><?php echo e($app->getProgressPercentage()); ?>%</div>
                            </div>
                            <a href="<?php echo e(route('user.applications.show', $app->id)); ?>" 
                               class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                
                <div class="p-8">
                    <div class="relative">
                        
                        <div class="absolute top-5 left-0 right-0 h-1 bg-gray-200 rounded" style="z-index: 0;"></div>
                        
                        <div class="absolute top-5 left-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded transition-all duration-500" 
                             style="width: <?php echo e($app->getProgressPercentage()); ?>%; z-index: 1;"></div>
                        
                        
                        <div class="relative flex justify-between" style="z-index: 2;">
                            <?php
                                $stages = \App\Models\ProgramApplication::getStages();
                                $currentStageIndex = array_search($app->current_stage, array_keys($stages));
                                $totalStages = count($stages);
                            ?>

                            <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stageKey => $stageLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $stageIndex = array_search($stageKey, array_keys($stages));
                                    $isCompleted = $stageIndex < $currentStageIndex;
                                    $isCurrent = $stageIndex === $currentStageIndex;
                                    $isPending = $stageIndex > $currentStageIndex;
                                ?>

                                <div class="flex flex-col items-center" style="flex: 1;">
                                    
                                    <div class="relative">
                                        <?php if($isCompleted): ?>
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        <?php elseif($isCurrent): ?>
                                            <div class="w-10 h-10 bg-white border-4 border-blue-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                                <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                                            </div>
                                        <?php else: ?>
                                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                                <div class="w-4 h-4 bg-gray-400 rounded-full"></div>
                                            </div>
                                        <?php endif; ?>

                                        
                                        <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 text-xs font-bold <?php echo e($isCurrent ? 'text-blue-600' : ($isCompleted ? 'text-green-600' : 'text-gray-400')); ?>">
                                            <?php echo e($stageIndex + 1); ?>

                                        </div>
                                    </div>
                                    
                                    
                                    <div class="mt-8 text-center max-w-[120px]">
                                        <div class="text-xs font-semibold <?php echo e($isCurrent ? 'text-blue-700' : ($isCompleted ? 'text-green-700' : 'text-gray-500')); ?>">
                                            <?php echo e($stageLabel); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    
                    <div class="mt-12 bg-blue-50 border-l-4 border-blue-500 p-5 rounded-r-xl">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                <div>
                                <h4 class="text-blue-900 font-bold mb-1">Current Stage: <?php echo e($stages[$app->current_stage]); ?></h4>
                                <?php if($app->current_stage === 'submitted' || $app->current_stage === 'waiting_approval_1' || $app->current_stage === 'waiting_approval_2'): ?>
                                    <p class="text-blue-700 text-sm">
                                        Your application is under review. Announcement of approval will be announced via email. Please check regularly to see the announcement of passing the first stage of approval.
                                    </p>
                                <?php elseif($app->current_stage === 'upload_requirements' || $app->current_stage === 'upload_transcript'): ?>
                                    <p class="text-blue-700 text-sm">
                                        Please upload the required documents to proceed to the next stage.
                                    </p>
                                <?php elseif($app->current_stage === 'completed'): ?>
                                    <p class="text-green-700 text-sm font-semibold">
                                        🎉 Congratulations! Your application has been completed successfully.
                                    </p>
                                <?php else: ?>
                                    <p class="text-blue-700 text-sm">
                                        <?php echo e($stages[$app->current_stage]); ?>

                                    </p>
                                <?php endif; ?>

                                <?php if($app->admin_notes): ?>
                                    <div class="mt-3 p-3 bg-white rounded-lg border border-blue-200">
                                        <p class="text-sm font-semibold text-gray-700 mb-1">Admin Notes:</p>
                                        <p class="text-sm text-gray-600"><?php echo e($app->admin_notes); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-12 text-center">
                    <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Active Applications</h3>
                    <p class="text-gray-500 mb-6">You don't have any ongoing applications.</p>
                    <a href="<?php echo e(route('program')); ?>" class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Browse Programs
                    </a>
                </div>
            <?php endif; ?>
        </div>

        
        <div x-show="activeTab === 'completed'" class="space-y-6 mt-6">
            <?php $__empty_1 = true; $__currentLoopData = $completedApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                
                <div class="p-6 border-b border-gray-200 <?php echo e($app->status === 'accepted' ? 'bg-gradient-to-r from-green-50 to-emerald-50' : ($app->status === 'rejected' ? 'bg-gradient-to-r from-red-50 to-rose-50' : 'bg-gradient-to-r from-blue-50 to-indigo-50')); ?>">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($app->program->title ?? 'Program'); ?></h3>
                                <?php if($app->status === 'accepted'): ?>
                                    <span class="px-4 py-1.5 bg-green-500 text-white rounded-full text-sm font-bold flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        ACCEPTED
                                    </span>
                                <?php elseif($app->status === 'rejected'): ?>
                                    <span class="px-4 py-1.5 bg-red-500 text-white rounded-full text-sm font-bold flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        REJECTED
                                    </span>
                                <?php else: ?>
                                    <span class="px-4 py-1.5 bg-blue-500 text-white rounded-full text-sm font-bold flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        COMPLETED
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Submitted: <?php echo e($app->submitted_at ? $app->submitted_at->format('d M Y') : '-'); ?>

                                </span>
                                <?php if($app->reviewed_at): ?>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Completed: <?php echo e($app->reviewed_at->format('d M Y')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <a href="<?php echo e(route('user.applications.show', $app->id)); ?>" 
                           class="bg-gray-800 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-900 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            View Details
                        </a>
                    </div>
                </div>

                
                <div class="p-8">
                    <h4 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Application History
                    </h4>

                    <?php if($app->stage_history && count($app->stage_history) > 0): ?>
                        <div class="relative">
                            
                            <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-200 via-purple-200 to-green-200"></div>
                            
                            
                            <div class="space-y-6">
                                <?php $__currentLoopData = array_reverse($app->stage_history); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $isLast = $index === count($app->stage_history) - 1;
                                        $stages = \App\Models\ProgramApplication::getStages();
                                        $stageLabel = $stages[$history['stage']] ?? ucfirst(str_replace('_', ' ', $history['stage']));
                                        
                                        $colorClass = match($history['status']) {
                                            'accepted' => 'bg-green-500 border-green-600',
                                            'rejected' => 'bg-red-500 border-red-600',
                                            'under_review' => 'bg-yellow-500 border-yellow-600',
                                            'documents_verified' => 'bg-blue-500 border-blue-600',
                                            default => 'bg-gray-400 border-gray-500'
                                        };
                                        
                                        $bgClass = match($history['status']) {
                                            'accepted' => 'bg-green-50 border-green-200',
                                            'rejected' => 'bg-red-50 border-red-200',
                                            'under_review' => 'bg-yellow-50 border-yellow-200',
                                            'documents_verified' => 'bg-blue-50 border-blue-200',
                                            default => 'bg-gray-50 border-gray-200'
                                        };
                                    ?>
                                    
                                    <div class="relative pl-12">
                                        
                                        <div class="absolute left-0 w-8 h-8 <?php echo e($colorClass); ?> border-4 rounded-full flex items-center justify-center shadow-lg <?php echo e($isLast ? 'animate-pulse' : ''); ?>">
                                            <?php if($history['status'] === 'accepted'): ?>
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            <?php elseif($history['status'] === 'rejected'): ?>
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            <?php else: ?>
                                                <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        
                                        <div class="border-2 <?php echo e($bgClass); ?> rounded-xl p-4 shadow-md">
                                            <div class="flex items-center justify-between mb-2">
                                                <h5 class="font-bold text-gray-900"><?php echo e($stageLabel); ?></h5>
                                                <span class="text-xs text-gray-500">
                                                    <?php echo e(\Carbon\Carbon::parse($history['updated_at'])->format('d M Y, H:i')); ?>

                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full <?php echo e($history['status'] === 'accepted' ? 'bg-green-100 text-green-700' : ($history['status'] === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700')); ?>">
                                                    <?php echo e(ucfirst(str_replace('_', ' ', $history['status']))); ?>

                                                </span>
                                            </div>
                                            
                                            <?php if(isset($history['notes']) && $history['notes']): ?>
                                                <p class="text-sm text-gray-700 mt-2 bg-white p-3 rounded-lg border border-gray-200">
                                                    <span class="font-semibold">Note:</span> <?php echo e($history['notes']); ?>

                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-8 text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p>No history available</p>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($app->admin_notes): ?>
                        <?php
                            $notesBg = $app->status === 'accepted' ? 'bg-green-50 border-l-4 border-green-500' : ($app->status === 'rejected' ? 'bg-red-50 border-l-4 border-red-500' : 'bg-blue-50 border-l-4 border-blue-500');
                            $notesIconColor = $app->status === 'accepted' ? 'text-green-600' : ($app->status === 'rejected' ? 'text-red-600' : 'text-blue-600');
                            $notesTitleColor = $app->status === 'accepted' ? 'text-green-900' : ($app->status === 'rejected' ? 'text-red-900' : 'text-blue-900');
                            $notesTextColor = $app->status === 'accepted' ? 'text-green-700' : ($app->status === 'rejected' ? 'text-red-700' : 'text-blue-700');
                        ?>
                        <div class="mt-6 p-5 <?php echo e($notesBg); ?> rounded-r-xl">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 <?php echo e($notesIconColor); ?> mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                <div>
                                    <h5 class="font-bold <?php echo e($notesTitleColor); ?> mb-1">Final Message from Admin</h5>
                                    <p class="text-sm <?php echo e($notesTextColor); ?>"><?php echo e($app->admin_notes); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-12 text-center">
                    <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Completed Applications</h3>
                    <p class="text-gray-500">Your completed applications will appear here.</p>
                </div>
        <?php endif; ?>
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
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/user/applications/index.blade.php ENDPATH**/ ?>