<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <style>
        * {
            border: 0px solid red;
        }
        
        /* Navbar solid background - no transparency */
        navbar {
            background-color: #ffffff !important;
            opacity: 1 !important;
            backdrop-filter: none !important;
        }
        
        navbar * {
            background-color: transparent;
        }
        
        navbar > div {
            background-color: #ffffff !important;
        }
        
        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
        }
        .nav-button.left {
            left: 0;
        }
        .nav-button.right {
            right: 0;
        }
        .scroll-content {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
        }
        
        /* Sidebar Styles */
        #admin-sidebar {
            scrollbar-width: thin;
            scrollbar-color: #4a5568 #2d3748;
        }
        
        #admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        #admin-sidebar::-webkit-scrollbar-track {
            background: #2d3748;
        }
        
        #admin-sidebar::-webkit-scrollbar-thumb {
            background: #4a5568;
            border-radius: 3px;
        }
        
        #admin-sidebar::-webkit-scrollbar-thumb:hover {
            background: #718096;
        }
        
        /* Smooth transitions for sidebar */
        #admin-sidebar * {
            transition: all 0.2s ease-in-out;
        }
        
        /* Mobile responsive adjustments */
        @media (max-width: 768px) {
            #admin-sidebar {
                width: 100%;
                max-width: 280px;
            }
        }
    </style>
</head>
<body class="font-poppins">
  <?php if(!Request::routeIs(['regist-inbound', 'login-inbound', 'login-outbound'])): ?>
    <?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e = $attributes; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $attributes = $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
    
    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role_id === 1): ?>
            <?php if (isset($component)) { $__componentOriginal6fc2d165f80d597f34aa0f8014c366d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6fc2d165f80d597f34aa0f8014c366d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6fc2d165f80d597f34aa0f8014c366d2)): ?>
<?php $attributes = $__attributesOriginal6fc2d165f80d597f34aa0f8014c366d2; ?>
<?php unset($__attributesOriginal6fc2d165f80d597f34aa0f8014c366d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6fc2d165f80d597f34aa0f8014c366d2)): ?>
<?php $component = $__componentOriginal6fc2d165f80d597f34aa0f8014c366d2; ?>
<?php unset($__componentOriginal6fc2d165f80d597f34aa0f8014c366d2); ?>
<?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var containers = document.querySelectorAll('.scroll-container');
            containers.forEach(function (container) {
                var leftButton = container.querySelector('.nav-button.left');
                var rightButton = container.querySelector('.nav-button.right');
                var content = container.querySelector('.scroll-content');

                leftButton.addEventListener('click', function () {
                    content.scrollBy({
                        left: -content.clientWidth,
                        behavior: 'smooth'
                    });
                });

                rightButton.addEventListener('click', function () {
                    content.scrollBy({
                        left: content.clientWidth,
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
  <?php endif; ?>

    <?php if (! empty(trim($__env->yieldContent('content')))): ?>
      <?php echo $__env->yieldContent('content'); ?>
    <?php else: ?>
      <?php echo e($slot ?? ''); ?>

    <?php endif; ?>
    <?php if(!Request::routeIs(['regist-inbound', 'login-inbound', 'login-outbound'])): ?>
     <?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
    <?php endif; ?>
    
    
    <?php if (isset($component)) { $__componentOriginalf98a32c06d8462f5513d0fb3554f9141 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf98a32c06d8462f5513d0fb3554f9141 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.toast-notification','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toast-notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf98a32c06d8462f5513d0fb3554f9141)): ?>
<?php $attributes = $__attributesOriginalf98a32c06d8462f5513d0fb3554f9141; ?>
<?php unset($__attributesOriginalf98a32c06d8462f5513d0fb3554f9141); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf98a32c06d8462f5513d0fb3554f9141)): ?>
<?php $component = $__componentOriginalf98a32c06d8462f5513d0fb3554f9141; ?>
<?php unset($__componentOriginalf98a32c06d8462f5513d0fb3554f9141); ?>
<?php endif; ?>
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/nav.js', 'resources/js/sidebar.js']); ?>
</body>
</html><?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/components/layout.blade.php ENDPATH**/ ?>