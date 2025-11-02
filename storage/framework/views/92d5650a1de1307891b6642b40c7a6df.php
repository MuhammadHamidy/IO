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
<div class="max-w-6xl mx-auto py-10 px-4 mt-4">
    
    <?php if(request()->get('back') === 'notifications'): ?>
        <div class="mb-4">
            <a href="<?php echo e(route('notifications.index')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Notifications
            </a>
        </div>
    <?php else: ?>
        <div class="mb-4">
            <a href="<?php echo e(route('user.applications.index')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to My Applications
            </a>
        </div>
    <?php endif; ?>

    
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl p-8 mb-8 shadow-2xl">
        <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
                <h1 class="text-3xl font-bold mb-2">Application Details</h1>
                <p class="text-blue-100 text-lg"><?php echo e($application->program->title ?? 'Program'); ?></p>
            </div>
            <div class="text-right">
                <div class="text-sm text-blue-100 mb-1">Application Progress</div>
                <div class="text-4xl font-bold"><?php echo e($application->getProgressPercentage()); ?>%</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-8">
            
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-7 h-7 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    Application Progress
                </h2>

                
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold text-gray-700">Overall Progress</span>
                        <span class="text-sm font-bold text-blue-600"><?php echo e($application->getProgressPercentage()); ?>%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-3 rounded-full transition-all duration-500" style="width: <?php echo e($application->getProgressPercentage()); ?>%"></div>
                    </div>
                </div>

                
                <div class="space-y-4">
                    <?php
                        $stages = \App\Models\ProgramApplication::getStages();
                        $currentStageIndex = array_search($application->current_stage, array_keys($stages));
                    ?>

                    <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stageKey => $stageLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $stageIndex = array_search($stageKey, array_keys($stages));
                            $isCompleted = $stageIndex < $currentStageIndex;
                            $isCurrent = $stageIndex === $currentStageIndex;
                            $isPending = $stageIndex > $currentStageIndex;
                        ?>

                        <div class="flex items-start">
                            
                            <div class="flex-shrink-0 mr-4">
                                <?php
                                    $isCompletedStageIcon = $stageKey === 'completed' && $isCurrent;
                                ?>
                                <?php if($isCompleted || $isCompletedStageIcon): ?>
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                <?php elseif($isCurrent): ?>
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                        <div class="w-4 h-4 bg-white rounded-full"></div>
                                    </div>
                                <?php else: ?>
                                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                        <div class="w-4 h-4 bg-gray-400 rounded-full"></div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            
                            <div class="flex-1 pb-8 <?php echo e(!$isPending ? 'border-l-2 border-gray-200 pl-4 ml-5' : 'pl-4 ml-5'); ?>">
                                <div class="flex items-center justify-between mb-1">
                                    <?php
                                        $isCompletedStage = $stageKey === 'completed' && $isCurrent;
                                        $displayText = $isCompleted ? 'Completed' : ($isCompletedStage ? 'Completed' : ($isCurrent ? 'In Progress' : 'Pending'));
                                        $badgeClass = $isCompleted || $isCompletedStage ? 'bg-green-100 text-green-700' : ($isCurrent ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-500');
                                        $titleClass = $isCurrent && !$isCompletedStage ? 'text-blue-700' : ($isCompleted || $isCompletedStage ? 'text-green-700' : 'text-gray-500');
                                    ?>
                                    <h4 class="font-bold text-lg <?php echo e($titleClass); ?>">
                                        <?php echo e($stageLabel); ?>

                                    </h4>
                                    <span class="text-xs font-semibold px-3 py-1 rounded-full <?php echo e($badgeClass); ?>">
                                        <?php echo e($displayText); ?>

                                    </span>
                                </div>
                                
                                <?php if($isCurrent): ?>
                                    <p class="text-sm text-gray-600 mt-2">
                                        <?php if(in_array($stageKey, ['submitted', 'waiting_approval_1', 'waiting_approval_2'])): ?>
                                            Your application is currently under review. Please wait for the admin's decision.
                                        <?php elseif($stageKey === 'upload_requirements'): ?>
                                            Please upload all required documents to proceed.
                                        <?php elseif($stageKey === 'globalization_announcement'): ?>
                                            Check your email for globalization program announcement.
                                        <?php elseif($stageKey === 'upload_transcript'): ?>
                                            Upload your transcript and related documentation.
                                        <?php elseif($stageKey === 'survey'): ?>
                                            Please complete the survey form.
                                        <?php elseif($stageKey === 'completed'): ?>
                                            🎉 Congratulations! Your application process is complete.
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-7 h-7 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Program Information
                </h2>
                
                <?php if($application->program->description): ?>
                    <div class="prose max-w-none text-gray-700 leading-relaxed mb-4">
                        <?php echo nl2br(e($application->program->description)); ?>

            </div>
        <?php endif; ?>

                <?php if($application->program->duration): ?>
                    <div class="flex items-center text-gray-700 bg-purple-50 px-4 py-3 rounded-lg">
                        <svg class="w-5 h-5 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-semibold">Duration: <?php echo e($application->program->duration); ?></span>
            </div>
        <?php endif; ?>
    </div>

            
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-7 h-7 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Documents
                </h2>

                
                <div class="mb-6">
                    <h3 class="font-bold text-gray-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Profile Documents
                    </h3>
                    <ul class="space-y-2">
                        <?php
                            $profileDocs = [
                                ['label' => 'Curriculum Vitae (CV)', 'field' => 'cv_path'],
                                ['label' => 'Academic Transcript', 'field' => 'transcript_path'],
                                ['label' => 'English Proficiency Certificate', 'field' => 'toefl_path'],
                                ['label' => 'Letter of Integrity', 'field' => 'integrity_letter_path'],
                            ];
                        ?>

                        <?php $__currentLoopData = $profileDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(auth()->user()->{$doc['field']}): ?>
                                <li class="flex items-center justify-between bg-green-50 border-2 border-green-200 p-3 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium text-gray-700"><?php echo e($doc['label']); ?></span>
                                    </div>
                                    <a href="<?php echo e(asset('storage/' . auth()->user()->{$doc['field']})); ?>" target="_blank" class="text-blue-600 hover:text-blue-700 font-semibold flex items-center text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                
                <?php if(!empty($application->documents) && count($application->documents) > 0): ?>
                    <?php
                        $additionalDocs = array_filter($application->documents, function($doc) {
                            $user = auth()->user();
                            return !in_array($doc, [
                                $user->cv_path,
                                $user->transcript_path,
                                $user->toefl_path,
                                $user->integrity_letter_path
                            ]);
                        });
                    ?>

                    <?php if(count($additionalDocs) > 0): ?>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Additional Documents
                            </h3>
                            <ul class="space-y-2">
                                <?php $__currentLoopData = $additionalDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="flex items-center justify-between bg-blue-50 border-2 border-blue-200 p-3 rounded-lg">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="font-medium text-gray-700"><?php echo e(basename($doc)); ?></span>
                                        </div>
                                        <a href="<?php echo e(asset('storage/' . $doc)); ?>" target="_blank" class="text-blue-600 hover:text-blue-700 font-semibold flex items-center text-sm">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            View
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="space-y-6">
            
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Application Summary</h3>
                <div class="space-y-3">
                    <div>
                        <div class="text-sm text-gray-500">Status</div>
                        <div class="font-semibold text-gray-900">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                <?php echo e($application->status === 'submitted' ? 'bg-blue-100 text-blue-800' : ''); ?>

                                <?php echo e($application->status === 'under_review' ? 'bg-yellow-100 text-yellow-800' : ''); ?>

                                <?php echo e($application->status === 'documents_verified' ? 'bg-purple-100 text-purple-800' : ''); ?>

                                <?php echo e($application->status === 'accepted' ? 'bg-green-100 text-green-800' : ''); ?>

                                <?php echo e($application->status === 'rejected' ? 'bg-red-100 text-red-800' : ''); ?>">
                                <?php echo e(ucfirst(str_replace('_',' ', $application->status))); ?>

                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Submitted Date</div>
                        <div class="font-semibold text-gray-900"><?php echo e($application->submitted_at ? $application->submitted_at->format('d M Y, H:i') : '-'); ?></div>
                    </div>
                    <?php if($application->reviewed_at): ?>
                        <div>
                            <div class="text-sm text-gray-500">Last Reviewed</div>
                            <div class="font-semibold text-gray-900"><?php echo e($application->reviewed_at->format('d M Y, H:i')); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if($application->stage_updated_at): ?>
                        <div>
                            <div class="text-sm text-gray-500">Stage Updated</div>
                            <div class="font-semibold text-gray-900"><?php echo e($application->stage_updated_at->format('d M Y, H:i')); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <?php if($application->admin_notes): ?>
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 border-l-4 border-yellow-500 rounded-r-2xl shadow-xl p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                        Admin Notes
                    </h3>
                    <p class="text-gray-700 leading-relaxed"><?php echo e($application->admin_notes); ?></p>
                </div>
            <?php endif; ?>

            
            <?php if($application->notes): ?>
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Your Notes
                    </h3>
                    <p class="text-gray-700 leading-relaxed"><?php echo e($application->notes); ?></p>
                </div>
            <?php endif; ?>

            
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                <a href="<?php echo e(route('user.applications.index')); ?>" class="block w-full text-center bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-700 transition-all duration-300 shadow-lg">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Applications
                </a>
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
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/user/applications/show.blade.php ENDPATH**/ ?>