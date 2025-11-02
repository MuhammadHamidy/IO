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
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Notifications</h1>
                <p class="text-gray-600 mt-1">Click on a notification to view details</p>
            </div>
            <?php if($notifications->where('read_at', null)->count() > 0): ?>
                <form method="POST" action="<?php echo e(route('notifications.mark-all')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium gap-2 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Mark All as Read
                    </button>
                </form>
            <?php endif; ?>
        </div>

        
        <div class="space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $isUnread = !$notif->read_at;
                    $programName = data_get($notif->data, 'program_name', 'Program');
                    $message = data_get($notif->data, 'message', 'You have a new notification');
                    $status = data_get($notif->data, 'status', '');
                ?>
                
                <button 
                    onclick="openNotificationModal<?php echo e($loop->index); ?>()" 
                    class="w-full text-left bg-white rounded-lg shadow hover:shadow-md transition-all duration-200 p-4 border-l-4 <?php echo e($isUnread ? 'border-blue-500 bg-blue-50' : 'border-gray-300'); ?>">
                <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3 flex-1">
                            <div class="w-10 h-10 rounded-full <?php echo e($isUnread ? 'bg-blue-500' : 'bg-gray-400'); ?> flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C8.67 6.165 8 7.388 8 8.75V14.16c0 .538-.214 1.055-.595 1.436L6 17h5m4 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0 overflow-hidden">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h3 class="font-semibold text-gray-900 break-words line-clamp-1"><?php echo e($programName); ?></h3>
                                    <?php if($isUnread): ?>
                                        <span class="inline-block px-2 py-0.5 text-xs font-semibold bg-blue-500 text-white rounded-full flex-shrink-0">New</span>
                        <?php endif; ?>
                                </div>
                                <p class="text-sm text-gray-600 mt-1 break-words line-clamp-2"><?php echo e($message); ?></p>
                                <p class="text-xs text-gray-500 mt-1"><?php echo e($notif->created_at->diffForHumans()); ?></p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </button>

                
                <div id="notificationModal<?php echo e($loop->index); ?>" class="fixed inset-0 bg-black bg-opacity-50 z-[200] flex items-center justify-center p-4" style="display: none;">
                    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                        
                        <div class="sticky top-0 bg-gradient-to-r from-blue-600 to-purple-600 text-white p-6 rounded-t-2xl">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h2 class="text-2xl font-bold"><?php echo e($programName); ?></h2>
                                    <p class="text-blue-100 mt-1"><?php echo e($notif->created_at->format('F d, Y - H:i')); ?></p>
                                </div>
                                <button onclick="closeNotificationModal<?php echo e($loop->index); ?>()" class="text-white hover:text-gray-200 transition">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        
                        <div class="p-6 space-y-6">
                            <?php
                                $status = data_get($notif->data, 'status', '');
                                $stageLabel = data_get($notif->data, 'stage_label', '');
                                $adminNotes = data_get($notif->data, 'admin_notes', '');
                                $message = data_get($notif->data, 'message', 'You have a new notification');
                            ?>

                            
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Message</h3>
                                <p class="text-gray-800 text-lg leading-relaxed break-words whitespace-pre-wrap"><?php echo e($message); ?></p>
                            </div>

                            
                            <?php if($status): ?>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Status</h3>
                                <div class="flex items-center gap-2">
                                    <?php if($status === 'accepted'): ?>
                                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-800 rounded-lg font-semibold">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <?php echo e(ucfirst(str_replace('_', ' ', $status))); ?>

                                        </span>
                                    <?php elseif($status === 'rejected'): ?>
                                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-red-100 text-red-800 rounded-lg font-semibold">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <?php echo e(ucfirst(str_replace('_', ' ', $status))); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-800 rounded-lg font-semibold">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <?php echo e(ucfirst(str_replace('_', ' ', $status))); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            
                            <?php if($stageLabel): ?>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Current Stage</h3>
                                <span class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100 text-indigo-800 rounded-lg font-medium">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <?php echo e($stageLabel); ?>

                                </span>
                            </div>
                            <?php endif; ?>

                            
                            <?php if($adminNotes): ?>
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                                <h3 class="text-sm font-semibold text-yellow-800 uppercase mb-2 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                    Message from Admin
                                </h3>
                                <p class="text-yellow-900 break-words whitespace-pre-wrap"><?php echo e($adminNotes); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="bg-gray-50 px-6 py-4 rounded-b-2xl flex items-center justify-between gap-3">
                            <?php if($isUnread): ?>
                            <form method="POST" action="<?php echo e(route('notifications.mark-read', $notif->id)); ?>" class="flex-1">
                        <?php echo csrf_field(); ?>
                                <input type="hidden" name="redirect" value="notifications">
                                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Mark as Read
                                </button>
                    </form>
                            <?php endif; ?>
                            
                            <?php
                                $applicationId = data_get($notif->data, 'application_id');
                            ?>
                            <?php if($applicationId): ?>
                            <a href="<?php echo e(route('user.applications.show', $applicationId)); ?>?back=notifications" class="flex-1 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium text-center flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Application
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <script>
                    function openNotificationModal<?php echo e($loop->index); ?>() {
                        document.getElementById('notificationModal<?php echo e($loop->index); ?>').style.display = 'flex';
                        document.body.style.overflow = 'hidden';
                    }
                    
                    function closeNotificationModal<?php echo e($loop->index); ?>() {
                        document.getElementById('notificationModal<?php echo e($loop->index); ?>').style.display = 'none';
                        document.body.style.overflow = 'auto';
                    }

                    document.getElementById('notificationModal<?php echo e($loop->index); ?>').addEventListener('click', function(e) {
                        if (e.target === this) {
                            closeNotificationModal<?php echo e($loop->index); ?>();
                        }
                    });
                </script>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="bg-white rounded-lg shadow p-12 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">No Notifications</h3>
                    <p class="text-gray-600">You're all caught up!</p>
            </div>
        <?php endif; ?>
    </div>

        
        <?php if($notifications->hasPages()): ?>
            <div class="mt-6">
                <?php echo e($notifications->links()); ?>

            </div>
        <?php endif; ?>
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


<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/user/notifications/index.blade.php ENDPATH**/ ?>