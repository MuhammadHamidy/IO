<navbar class="sticky top-0 z-[100] bg-white shadow-md shadow-slate-200" style="background-color: #ffffff !important; opacity: 1 !important;">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 bg-white" style="background-color: #ffffff !important;">
        <div class="flex items-center justify-between h-16">
            
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('../img/io.png') }}" alt="Logo" class="h-16 sm:h-18 w-auto">
                </a>
            </div>

            
            <nav class="hidden lg:flex items-center space-x-1">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>

                <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                    {{ __('About Us') }}
                </x-nav-link>

                <x-nav-link :href="route('global-network')" :active="request()->routeIs('global-network')">
                    {{ __('Global Network') }}
                </x-nav-link>

                <x-nav-link :href="route('program')" :active="request()->routeIs(['program', 'programs.degree', 'programs.non-degree', 'degree', 'non-degree', 'inbound-page', 'outbound-page', 'student-exchange-program-inbound', 'internship-research-attachment-inbound', 'uper-sa-outbound', 'internship-research-attachment-outbound'])">
                    {{ __('Program') }}
                </x-nav-link>

                <x-nav-link :href="route('contact-us')" :active="request()->routeIs('contact-us')">
                    {{ __('Contact Us') }}
                </x-nav-link>
            </nav>

            
            <div class="flex items-center gap-2 sm:gap-3">
                @auth
                    @if(Auth::user()->role_id === 1 && !request()->routeIs('admin.*'))
                        
                        <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-flex items-center text-xs sm:text-sm bg-[#1F4894] text-white font-semibold px-3 py-2 rounded-md hover:bg-blue-700 transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span class="hidden md:inline">Back to Dashboard</span>
                            <span class="md:hidden">Dashboard</span>
                        </a>
                    @elseif(Auth::user()->role_id !== 1 || request()->routeIs('admin.*'))
                        @php
                            $avatarUrl = Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.png');
                            $unread = Auth::user()->role_id !== 1 ? Auth::user()->unreadNotifications()->count() : 0;
                        @endphp
                        
                        
                        @if(Auth::user()->role_id !== 1)
                            <a href="{{ route('notifications.index') }}" class="relative inline-flex items-center justify-center w-10 h-10 rounded-full border border-[#1F4894] text-[#1F4894] hover:bg-[#1F4894] hover:text-white transition">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C8.67 6.165 8 7.388 8 8.75V14.16c0 .538-.214 1.055-.595 1.436L6 17h5m4 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                @if($unread > 0)
                                    <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full px-1.5">{{ $unread }}</span>
                                @endif
                            </a>
                        @endif

                        
                        <div class="relative">
                            <button id="profile-menu-btn" class="inline-flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">
                                <img src="{{ $avatarUrl }}" alt="avatar" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover border-2 border-gray-200" />
                                <span class="hidden lg:inline-block max-w-[120px] xl:max-w-[160px] truncate text-sm text-gray-800 font-semibold">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-gray-600 transition-transform duration-200" id="profile-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="profile-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-xl z-[110]">
                                @if(Auth::user()->role_id !== 1)
                                    <a href="{{ route('user.applications.index') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        My Applications
                                    </a>
                                @endif
                                <a href="{{ route('user.profile.show') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profile
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @else
                    
                    <a href="{{ route('regist-inbound') }}" class="inline-flex items-center bg-[#1F4894] text-white font-medium px-3 sm:px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm sm:text-base">
                        Apply
                    </a>
                @endauth

                
                <button id="mobile-menu-btn" class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    
    <div id="mobile-menu" class="hidden lg:hidden bg-white" style="background-color: #ffffff !important;">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-gray-50 border-t border-gray-200" style="background-color: #f9fafb !important;">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                Home
            </a>
            <a href="{{ route('about-us') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about-us') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                About Us
            </a>
            <a href="{{ route('global-network') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('global-network') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                Global Network
            </a>
            <a href="{{ route('program') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('program') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                Program
            </a>
            <a href="{{ route('contact-us') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact-us') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                Contact Us
            </a>

            @auth
                @if(Auth::user()->role_id === 1 && !request()->routeIs('admin.*'))
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-700 hover:bg-blue-50 border-t border-gray-200 mt-2 pt-3">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Dashboard
                    </a>
                @endif
            @endauth
        </div>
    </div>
</navbar>
