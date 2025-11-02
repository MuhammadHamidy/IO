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

    <div class="bg-[#F8FBFB] pt-12">
        <div class="px-56">
            <?php if (isset($component)) { $__componentOriginal0977f807d82871bbce3fb5f96f4babc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0977f807d82871bbce3fb5f96f4babc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sub-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Global Network')); ?> <?php echo $__env->renderComponent(); ?>
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
        <div class="flex justify-center my-12 flex-col items-center">
            <div class="bg-white w-[70vw] h-[66vh] min-h-max shadow-2xl rounded-3xl flex flex-col sm:flex-row z-10 sm:items-start items-center sm:justify-start justify-center">
                <div class="w-full sm:w-1/2 h-full">
                    <img src="<?php echo e(asset('/img/global-network-people-1.png')); ?>" class="h-full w-full object-cover object-center">
                </div>
                <div class="w-1/2 h-full my-10 mx-[64px] text-justify">
                    <p class="text-[14px] md:text-[18px] xl:text-[24px] font-[500px] text-[#4D607D]">To support the internationalization of UPER, the International Partnership Division has actively partnered with universities and institutions through Southeast Asia, East Asia, Europe, and American Region. We keep expanding our network throughout the globe as seen by the increasing numbers of partners each year.</p>
                </div>
            </div>
            
        </div>
        <div class="flex justify-center my-12 flex-col items-center">
            <div class="h-[832px] w-[70vw] bg-cover flex items-center justify-center" style="background-image: url('<?php echo e('/img/global-network-people-2.png'); ?>')">
                <div class="z-10 flex flex-col gap-10 sm:gap-5 sm:flex-row justify-items-center items-center">
                    <?php if (isset($component)) { $__componentOriginalefd756cb8802101ab7e115bc14fccbd8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalefd756cb8802101ab7e115bc14fccbd8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.white-card','data' => ['href' => route('international-collaboration')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('white-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('international-collaboration'))]); ?><?php echo e(__('International Collaboration')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalefd756cb8802101ab7e115bc14fccbd8)): ?>
<?php $attributes = $__attributesOriginalefd756cb8802101ab7e115bc14fccbd8; ?>
<?php unset($__attributesOriginalefd756cb8802101ab7e115bc14fccbd8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalefd756cb8802101ab7e115bc14fccbd8)): ?>
<?php $component = $__componentOriginalefd756cb8802101ab7e115bc14fccbd8; ?>
<?php unset($__componentOriginalefd756cb8802101ab7e115bc14fccbd8); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalefd756cb8802101ab7e115bc14fccbd8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalefd756cb8802101ab7e115bc14fccbd8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.white-card','data' => ['href' => route('collaboration-with-us')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('white-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('collaboration-with-us'))]); ?><?php echo e(__('Collaboration With Us')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalefd756cb8802101ab7e115bc14fccbd8)): ?>
<?php $attributes = $__attributesOriginalefd756cb8802101ab7e115bc14fccbd8; ?>
<?php unset($__attributesOriginalefd756cb8802101ab7e115bc14fccbd8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalefd756cb8802101ab7e115bc14fccbd8)): ?>
<?php $component = $__componentOriginalefd756cb8802101ab7e115bc14fccbd8; ?>
<?php unset($__componentOriginalefd756cb8802101ab7e115bc14fccbd8); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="pb-[151px] bg-[#F8FBFB]"></div>

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
<?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/global-network.blade.php ENDPATH**/ ?>