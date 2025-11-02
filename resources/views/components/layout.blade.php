<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
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
  @if(!Request::routeIs(['regist-inbound', 'login-inbound', 'login-outbound']))
    <x-navbar></x-navbar>
    
    @auth
        @if(Auth::user()->role_id === 1)
            <x-admin-sidebar></x-admin-sidebar>
        @endif
    @endauth
    
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
  @endif

    @hasSection('content')
      @yield('content')
    @else
      {{ $slot ?? '' }}
    @endif
    @if(!Request::routeIs(['regist-inbound', 'login-inbound', 'login-outbound']))
     <x-footer></x-footer>
    @endif
    
    
    <x-toast-notification />
    
    @vite(['resources/js/nav.js', 'resources/js/sidebar.js'])
</body>
</html>