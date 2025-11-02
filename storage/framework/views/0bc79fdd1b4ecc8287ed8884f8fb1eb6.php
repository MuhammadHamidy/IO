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
        <div class="mb-3">
            <?php if (isset($component)) { $__componentOriginal0977f807d82871bbce3fb5f96f4babc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sub-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Events')); ?> <?php echo $__env->renderComponent(); ?>
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-2"><?php echo e($event->name); ?></h2>
                    <p class="text-gray-700 mb-4"><?php echo e($event->date->format('d M Y')); ?></p>
                    <div class="flex justify-end mt-4">
                        <a href="<?php echo e(route('events-update', $event->id)); ?>" class="text-blue-500 mr-4">Edit</a>
                        <button onclick="openModal(<?php echo e($event->id); ?>)" class="text-red-500">Delete</button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="flex justify-center mt-4">
            <a href="<?php echo e(route('regist-events')); ?>" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Add Event</a>
        </div>
    </div>

    
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 id="modalMessage" class="text-xl font-bold mb-4">Are you sure to delete this event?</h2>
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
            document.getElementById('deleteForm').action = '/events/' + id;
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
<?php endif; ?><?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/events.blade.php ENDPATH**/ ?>