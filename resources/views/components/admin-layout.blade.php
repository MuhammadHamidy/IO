<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - {{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <style>
        * {
            border: 0px solid red;
        }
        
        .admin-sidebar {
            transition: all 0.3s ease-in-out, top 0.3s ease-in-out, height 0.3s ease-in-out;
        }
        
        .admin-main-content {
            transition: all 0.3s ease-in-out, padding-top 0.3s ease-in-out;
        }
        
        .sidebar-collapsed .admin-sidebar {
            transform: translateX(-100%);
        }
        
        .sidebar-collapsed .admin-main-content {
            margin-left: 0;
        }
        
        .admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .admin-sidebar::-webkit-scrollbar-track {
            background: #1f2937;
        }
        
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: #374151;
            border-radius: 3px;
        }
        
        .admin-sidebar::-webkit-scrollbar-thumb:hover {
            background: #4b5563;
        }
        
        .preview-mode {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            background: linear-gradient(90deg, #f59e0b, #d97706);
            color: white;
            padding: 8px 0;
            text-align: center;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease-in-out;
        }
        
        #preview-banner.preview-hidden {
            transform: translateY(-100%);
            pointer-events: none;
        }
        
        body.preview-mode-active .admin-sidebar {
            top: 45px;
            height: calc(100% - 45px);
        }
        
        body.preview-mode-active .admin-main-content {
            padding-top: 45px;
        }
        
        .preview-mode button {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            margin-left: 10px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .preview-mode button:hover {
            background: rgba(255,255,255,0.3);
        }
    </style>
</head>
<body class="font-poppins bg-gray-100">
    
    <div id="preview-banner" class="preview-mode preview-hidden">
        <span>🔍 Preview Mode - Changes are not published yet</span>
        <button onclick="exitPreviewMode()">Exit Preview</button>
        <button onclick="publishChanges()">Publish Changes</button>
    </div>

    <div class="admin-sidebar fixed top-0 left-0 h-full w-64 bg-gray-800 text-white z-50 overflow-y-auto flex flex-col" id="admin-sidebar">
        <div class="flex items-center justify-between p-4 border-b border-gray-700 flex-shrink-0">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h2 class="text-lg font-semibold">Admin Panel</h2>
            </div>
            <button id="sidebar-toggle" class="text-gray-400 hover:text-white focus:outline-none lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <nav class="mt-4 flex-1 overflow-y-auto">
            <div class="px-4 py-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                    </svg>
                    Dashboard
                </a>
            </div>

            <div class="px-4 py-2">
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Content Management</h3>
            </div>
            
            <div class="space-y-1 px-2">
                <a href="{{ route('admin.news.index') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.news.*') ? 'bg-gray-700 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    News Management
                </a>
                
                <a href="{{ route('admin.events.index') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.events.*') ? 'bg-gray-700 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Events Management
                </a>
                
                <a href="{{ route('admin.partners.index') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.partners.*') ? 'bg-gray-700 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Partners Management
                </a>
                
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.testimonials.*') ? 'bg-gray-700 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                    Testimonials Management
                </a>

                <a href="{{ route('admin.programs.index') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.programs.*') ? 'bg-gray-700 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Programs Management
                </a>

                <a href="{{ route('admin.applications.index') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.applications.*') ? 'bg-gray-700 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Applications Management
                </a>
            </div>

            <div class="px-4 py-2 mt-6">
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Website</h3>
            </div>
            
            <div class="space-y-1 px-2 mb-4">
                <a href="{{ route('admin.toggle-preview') }}?redirect={{ urlencode(route('home')) }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View Website
                </a>
                
                <button onclick="togglePreviewMode()" class="flex items-center w-full px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Preview Mode
                </button>
            </div>
        </nav>
        
        
        <div class="border-t border-gray-700 bg-gray-800 flex-shrink-0">
            <div class="px-4 py-2">
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Account</h3>
            </div>
            
            <div class="space-y-1 px-2 pb-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-3 py-2 text-left text-sm font-medium text-gray-300 rounded-md hover:bg-red-700 hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="admin-main-content ml-64 min-h-screen" id="main-content">
        <nav class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <button id="mobile-sidebar-toggle" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h1 class="ml-3 text-xl font-semibold text-gray-900">@yield('page-title', 'Admin Dashboard')</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                </div>
            </div>
        </nav>

        <main class="p-6">
            @yield('content')
        </main>
    </div>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    @vite(['resources/js/nav.js', 'resources/js/sidebar.js'])
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const mobileSidebarToggle = document.getElementById('mobile-sidebar-toggle');
            const sidebar = document.getElementById('admin-sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const mainContent = document.getElementById('main-content');
            const body = document.body;

            if (mobileSidebarToggle) {
                mobileSidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarOverlay.classList.toggle('hidden');
                });
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                });
            }

            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                }
            });
        });

        let previewMode = false;

        function togglePreviewMode() {
            previewMode = !previewMode;
            const banner = document.getElementById('preview-banner');
            
            if (previewMode) {
                banner.classList.remove('preview-hidden');
                document.body.classList.add('preview-mode-active');
            } else {
                banner.classList.add('preview-hidden');
                document.body.classList.remove('preview-mode-active');
            }
        }

        function exitPreviewMode() {
            previewMode = false;
            const banner = document.getElementById('preview-banner');
            banner.classList.add('preview-hidden');
            document.body.classList.remove('preview-mode-active');
        }

        function publishChanges() {
            if (confirm('Are you sure you want to publish these changes to the live website?')) {
                fetch('/admin/publish-changes', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Changes published successfully!');
                        exitPreviewMode();
                    } else {
                        alert('Failed to publish changes: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to publish changes. Please try again.');
                });
            }
        }
    </script>
    
    
    <x-toast-notification />
</body>
</html>
