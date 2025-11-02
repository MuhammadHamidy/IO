<x-layout>

    <div class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen">
        
    <div class="px-4 sm:px-8 lg:px-44 pt-12 pb-20">
        
        <div class="bg-gradient-to-r from-[#1F4894] via-[#275DCB] to-[#3B82F6] rounded-3xl shadow-2xl p-8 md:p-12 mb-12 text-white">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm md:text-base font-semibold text-white/80 uppercase tracking-wider">Student Mobility Scholarship</p>
                    <h1 class="text-2xl md:text-4xl lg:text-5xl font-extrabold">IISMA Program</h1>
                    <p class="text-base md:text-lg text-white/90 mt-2">Indonesian International Student Mobility Awards</p>
                </div>
            </div>
            <div class="h-1 w-32 bg-[#C4D25A] rounded-full mb-6"></div>
            <p class="text-lg md:text-xl text-white/95 leading-relaxed max-w-4xl">
                🌍 Your Gateway to Global Education Excellence
            </p>
    </div>

        <div class="flex flex-col gap-6 mb-12">
            
            @if($program->image)
                <div class="w-full h-[400px] rounded-xl overflow-hidden shadow-lg mb-6">
                    <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-xl p-8 border-l-8 border-[#C4D25A]">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-gradient-to-br from-[#1F4894] to-[#275DCB] p-3 rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-[#1F4894] to-[#275DCB] bg-clip-text text-transparent">Hello UPER Students!</h2>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed mb-4">🚀 Unlock the door to <strong class="text-[#1F4894]">global opportunities</strong> with the Student Mobility Scholarship offered by Indonesian International Student Mobility Awards (IISMA)!</p>
                
                @if($program->description)
                    <div class="mt-4 text-gray-700 leading-relaxed">
                        {!! nl2br(e($program->description)) !!}
                    </div>
                @else
                    <p class="text-lg text-gray-700 leading-relaxed mt-4">Indonesian International Student Mobility Awards is the Government of Indonesia scholarship scheme to fund Indonesian students for mobility program at top universities overseas.</p>
                    <p class="text-lg text-gray-700 leading-relaxed mt-4">This scholarships program aims to make international education more accessible, providing financial support to deserving students pursuing studies abroad.</p>
                @endif
            </div>

            @if($program->duration)
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 border-2 border-[#1F4894] p-6 rounded-2xl shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="bg-gradient-to-br from-[#1F4894] to-[#275DCB] p-3 rounded-xl">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase">Program Duration</p>
                            <p class="text-xl font-bold text-[#1F4894]">{{ $program->duration }}</p>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>

        @if($program->requirements)
            <div class="mb-12">
                <div class="bg-white rounded-2xl shadow-xl border-2 border-[#1F4894]/20 overflow-hidden">
                    {{-- Header --}}
                    <div class="bg-gradient-to-r from-[#1F4894] to-[#275DCB] px-8 py-6">
                        <div class="flex items-center gap-4">
                            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Program Requirements</h3>
                                <p class="text-white/80 text-sm mt-1">What you need to apply for IISMA</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Content - Always Visible --}}
                    <div class="p-8 bg-gradient-to-br from-white to-blue-50">
                        <div class="prose prose-lg max-w-none">
                            <div class="text-gray-700 leading-relaxed space-y-4">
                                {!! nl2br(e($program->requirements)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($program->open_date && $program->close_date)
            <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border border-yellow-300 rounded-lg p-6 mb-8">
                <h3 class="font-bold text-lg text-yellow-900 mb-3 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Registration Period
                </h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="flex items-center text-yellow-900">
                        <span class="font-semibold mr-2">Opens:</span>
                        <span>{{ \Carbon\Carbon::parse($program->open_date)->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center text-yellow-900">
                        <span class="font-semibold mr-2">Closes:</span>
                        <span>{{ \Carbon\Carbon::parse($program->close_date)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="flex flex-col items-center gap-4 mt-12">
            @if($program->id)
                @auth
                    @if(Auth::user()->role_id === 1)
                        <div class="px-12 py-4 bg-gradient-to-r from-gray-400 to-gray-500 text-white text-lg font-bold rounded-lg cursor-not-allowed opacity-75">
                            <svg class="inline-block w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            PREVIEW MODE - Admin View Only
                        </div>
                        <p class="text-sm text-gray-500 italic">You are viewing as admin. Application feature is disabled in preview mode.</p>
                    @elseif($program->isOpen())
                        <a href="{{ route('user.applications.create', $program->id) }}" 
                           class="px-12 py-4 bg-gradient-to-r from-[#1F4894] to-[#275DCB] text-white text-lg font-bold rounded-lg hover:from-[#163872] hover:to-[#1e4da3] transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            APPLY NOW!
                        </a>
                        <p class="text-sm text-gray-600">Start your application for {{ $program->title }}</p>
                    @elseif($program->isClosed())
                        <div class="px-12 py-4 bg-gray-400 text-white text-lg font-bold rounded-lg cursor-not-allowed">
                            REGISTRATION CLOSED
                        </div>
                        <p class="text-sm text-red-600">Registration period has ended</p>
                    @else
                        <div class="px-12 py-4 bg-yellow-500 text-white text-lg font-bold rounded-lg cursor-not-allowed">
                            COMING SOON
                        </div>
                        <p class="text-sm text-gray-600">Registration will open on {{ \Carbon\Carbon::parse($program->open_date)->format('d M Y') }}</p>
                    @endif
                @else
                    <a href="{{ route('regist-inbound') }}" 
                       class="px-12 py-4 bg-gradient-to-r from-[#C4D25A] to-[#e5f573] text-[#1F4894] text-lg font-bold rounded-lg hover:from-[#e5f573] hover:to-[#C4D25A] transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        LOGIN TO APPLY
                    </a>
                    <p class="text-sm text-gray-600">Please login first to submit your application</p>
                @endauth
            @else
                <div class="text-center p-8 bg-yellow-50 border border-yellow-300 rounded-lg">
                    <svg class="w-16 h-16 text-yellow-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-yellow-900 mb-2">Program Coming Soon</h3>
                    <p class="text-yellow-800">IISMA program details will be available soon. Please check back later or contact the International Office for more information.</p>
                </div>
            @endif
        </div>

    </div>

    </div>
    </div>

</x-layout>
