<x-layout>
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-[#1F4894] via-[#275DCB] to-[#2D5F3F] py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#C4D25A] rounded-full translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <a href="{{ route('global-network') }}" class="inline-flex items-center gap-2 text-white hover:text-[#C4D25A] transition-colors mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="font-semibold">Back to Global Network</span>
                </a>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Partner Details</h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">Comprehensive information about our partnership</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-16 relative z-10">
        <!-- Partner Info Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 mb-8">
            <div class="grid lg:grid-cols-3 gap-0">
                <!-- Logo & Basic Info Section -->
                <div class="lg:col-span-1 bg-gradient-to-br from-gray-50 to-white p-8 md:p-12 flex flex-col items-center justify-center border-r border-gray-100">
                    @if($pagePartner->logo)
                        <div class="w-48 h-48 rounded-2xl overflow-hidden shadow-lg mb-6 bg-white p-4">
                            <img src="{{ asset('storage/' . $pagePartner->logo) }}" alt="{{ $pagePartner->name }}" class="w-full h-full object-contain">
                        </div>
                    @else
                        <div class="w-48 h-48 rounded-2xl bg-gradient-to-br from-[#1F4894] to-[#275DCB] flex items-center justify-center shadow-lg mb-6">
                            <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    @endif
                    
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 text-center">{{ $pagePartner->name }}</h2>
                    
                    @php
                        $countries_list = include base_path('vendor/umpirsky/country-list/data/en/country.php');
                        $countryName = $countries_list[$pagePartner->country] ?? $pagePartner->country;
                    @endphp
                    
                    <div class="flex items-center gap-2 text-gray-600 mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="font-medium">{{ $pagePartner->regional }}, {{ $countryName }}</span>
                    </div>
                    
                    @if($pagePartner->category)
                        <div class="inline-flex items-center gap-2 bg-blue-50 text-[#1F4894] px-4 py-2 rounded-lg mb-6">
                            @if($pagePartner->category === 'University') 
                                <span class="text-lg">🎓</span>
                            @elseif($pagePartner->category === 'Organization') 
                                <span class="text-lg">🏢</span>
                            @elseif($pagePartner->category === 'Embassy') 
                                <span class="text-lg">🏛️</span>
                            @elseif($pagePartner->category === 'Government Agency') 
                                <span class="text-lg">🏛️</span>
                            @else 
                                <span class="text-lg">💼</span>
                            @endif
                            <span class="font-semibold text-sm">{{ $pagePartner->category }}</span>
                        </div>
                    @endif
                    
                    @if($pagePartner->website)
                        <a href="{{ $pagePartner->website }}" target="_blank" class="inline-flex items-center gap-2 bg-[#C4D25A] text-[#1F4894] font-bold px-8 py-4 rounded-xl hover:bg-[#d4e068] transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 w-full justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                            <span>Visit Website</span>
                        </a>
                    @endif
                </div>
                
                <!-- Description Section -->
                <div class="lg:col-span-2 p-8 md:p-12">
                    @if($pagePartner->description)
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#1F4894] to-[#275DCB] rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                About Partner
                            </h3>
                            <div class="space-y-3 text-gray-700 leading-relaxed">
                                @foreach($pagePartner->description as $description)
                                    <p>{{ $description }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <!-- Partnership Duration -->
                    @if($pagePartner->partnership_start_date || $pagePartner->partnership_end_date)
                        <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-2xl p-6 mb-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-6 h-6 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Partnership Duration
                            </h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                @if($pagePartner->partnership_start_date)
                                    <div class="bg-white rounded-xl p-4 shadow-sm">
                                        <p class="text-sm text-gray-600 mb-1">Start Date</p>
                                        <p class="text-lg font-bold text-[#1F4894]">{{ \Carbon\Carbon::parse($pagePartner->partnership_start_date)->format('F d, Y') }}</p>
                                    </div>
                                @endif
                                @if($pagePartner->partnership_end_date)
                                    <div class="bg-white rounded-xl p-4 shadow-sm">
                                        <p class="text-sm text-gray-600 mb-1">End Date</p>
                                        <p class="text-lg font-bold text-[#2D5F3F]">{{ \Carbon\Carbon::parse($pagePartner->partnership_end_date)->format('F d, Y') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    
                    <!-- Partnership Type -->
                    @if($pagePartner->partnership_type && count($pagePartner->partnership_type) > 0)
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <svg class="w-6 h-6 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                                Partnership Type
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($pagePartner->partnership_type as $type)
                                    <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#1F4894] to-[#275DCB] text-white rounded-lg text-sm font-semibold shadow-md">
                                        {{ $type }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <!-- Cooperation Fields -->
                    @if($pagePartner->cooperation_fields && count($pagePartner->cooperation_fields) > 0)
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <svg class="w-6 h-6 text-[#2D5F3F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Fields of Cooperation
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($pagePartner->cooperation_fields as $field)
                                    <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#2D5F3F] to-[#1e4a31] text-white rounded-lg text-sm font-semibold shadow-md">
                                        {{ $field }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Additional Information Accordion -->
        <div class="space-y-4">
            <!-- English Proficiency -->
            @if($pagePartner->english_profiency)
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all">
                    <button @click="open = !open" class="w-full px-6 py-5 flex items-center justify-between bg-gradient-to-r from-white to-gray-50 hover:from-gray-50 hover:to-white transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#1F4894] to-[#275DCB] rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="text-xl font-bold text-gray-900">English Proficiency Requirements</h3>
                                <p class="text-sm text-gray-600">Required language skills and certifications</p>
                            </div>
                        </div>
                        <svg x-bind:class="{ 'rotate-180': open }" class="w-6 h-6 text-gray-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="p-6 bg-gray-50 border-t border-gray-100">
                        <ul class="space-y-3">
                            @foreach($pagePartner->english_profiency as $proficiency)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $proficiency }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Eligible Department -->
            @if($pagePartner->eligible_departement)
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all">
                    <button @click="open = !open" class="w-full px-6 py-5 flex items-center justify-between bg-gradient-to-r from-white to-gray-50 hover:from-gray-50 hover:to-white transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#2D5F3F] to-[#1e4a31] rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="text-xl font-bold text-gray-900">Eligible Departments</h3>
                                <p class="text-sm text-gray-600">Academic departments and faculties accepted</p>
                            </div>
                        </div>
                        <svg x-bind:class="{ 'rotate-180': open }" class="w-6 h-6 text-gray-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="p-6 bg-gray-50 border-t border-gray-100">
                        <ul class="space-y-3">
                            @foreach($pagePartner->eligible_departement as $department)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $department }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Study Period -->
            @if($pagePartner->study_periode)
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all">
                    <button @click="open = !open" class="w-full px-6 py-5 flex items-center justify-between bg-gradient-to-r from-white to-gray-50 hover:from-gray-50 hover:to-white transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#C4D25A] to-[#a8b64a] rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="text-xl font-bold text-gray-900">Study Period Options</h3>
                                <p class="text-sm text-gray-600">Available program durations and schedules</p>
                            </div>
                        </div>
                        <svg x-bind:class="{ 'rotate-180': open }" class="w-6 h-6 text-gray-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="p-6 bg-gray-50 border-t border-gray-100">
                        <ul class="space-y-3">
                            @foreach($pagePartner->study_periode as $period)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#C4D25A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $period }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Contact Information -->
            @if($pagePartner->contact_person || $pagePartner->contact_email || $pagePartner->contact_phone)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="px-6 py-5 bg-gradient-to-r from-white to-gray-50">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#275DCB] to-[#1F4894] rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Contact Information</h3>
                                <p class="text-sm text-gray-600">Get in touch with partner representatives</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50 border-t border-gray-100">
                        <div class="grid md:grid-cols-3 gap-4">
                            @if($pagePartner->contact_person)
                                <div class="bg-white rounded-xl p-4 shadow-sm">
                                    <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Contact Person
                                    </p>
                                    <p class="font-semibold text-gray-900">{{ $pagePartner->contact_person }}</p>
                                </div>
                            @endif
                            @if($pagePartner->contact_email)
                                <div class="bg-white rounded-xl p-4 shadow-sm">
                                    <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        Email
                                    </p>
                                    <a href="mailto:{{ $pagePartner->contact_email }}" class="font-semibold text-[#1F4894] hover:text-[#275DCB] transition-colors">{{ $pagePartner->contact_email }}</a>
                                </div>
                            @endif
                            @if($pagePartner->contact_phone)
                                <div class="bg-white rounded-xl p-4 shadow-sm">
                                    <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        Phone
                                    </p>
                                    <a href="tel:{{ $pagePartner->contact_phone }}" class="font-semibold text-[#1F4894] hover:text-[#275DCB] transition-colors">{{ $pagePartner->contact_phone }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Fact Sheet -->
            @if($pagePartner->fact_sheet)
                <div class="bg-gradient-to-br from-[#1F4894] via-[#275DCB] to-[#2D5F3F] rounded-2xl shadow-lg p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold mb-2 flex items-center gap-3">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                Partnership Fact Sheet
                            </h3>
                            <p class="text-blue-100 text-lg">Download detailed information about this partnership</p>
                        </div>
                        <a href="{{ asset('storage/'.$pagePartner->fact_sheet) }}" target="_blank" class="inline-flex items-center gap-2 bg-[#C4D25A] text-[#1F4894] font-bold px-8 py-4 rounded-xl hover:bg-[#d4e068] transition-all duration-300 shadow-lg hover:scale-105">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Download PDF</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @vite(['resources/js/see-detail.js'])
</x-layout>
