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
        <div class="mb-6">
            <a href="<?php echo e(route('news')); ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-[#1F4894] hover:text-[#1F4894] transition-all duration-300 font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to News
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <?php if($event->image): ?>
                <div class="h-72 w-full overflow-hidden">
                    <img src="<?php echo e(asset('storage/' . $event->image)); ?>" alt="<?php echo e($event->title ?? $event->name); ?>" class="w-full h-full object-cover">
                </div>
            <?php endif; ?>

            <div class="p-6">
                <div class="flex items-center text-sm text-gray-500 mb-3">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <?php echo e(optional($event->date)->format('d M Y')); ?>

                </div>

                <h1 class="text-3xl font-bold mb-4 text-gray-900"><?php echo e($event->title ?? $event->name); ?></h1>

                <?php if($event->description): ?>
                    <div class="prose max-w-none text-gray-800">
                        <?php echo nl2br(e($event->description)); ?>

                    </div>
                <?php else: ?>
                    <p class="text-gray-600">No description provided.</p>
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


<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/event-detail.blade.php ENDPATH**/ ?>