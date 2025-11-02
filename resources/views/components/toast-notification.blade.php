
@if(session('success') || session('error') || session('warning') || session('info'))
<div 
    x-data="{ show: true }" 
    x-show="show"
    x-init="setTimeout(() => show = false, 6000)"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 transform translate-y-8 scale-95"
    x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 transform -translate-y-8 scale-95"
    class="fixed inset-0 flex items-center justify-center z-[9999] pointer-events-none px-4"
    style="display: none;"
>
    <div class="pointer-events-auto max-w-lg w-full">
        @if(session('success'))
        <div class="bg-gradient-to-br from-white to-green-50 rounded-3xl shadow-2xl overflow-hidden border-2 border-green-200 backdrop-blur-sm">
            <div class="p-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center shadow-lg animate-bounce-slow">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2 flex items-center">
                            Success! 
                            <svg class="w-5 h-5 ml-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </h3>
                        <p class="text-gray-700 text-base leading-relaxed">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="ml-4 text-gray-400 hover:text-gray-700 transition-colors p-2 hover:bg-gray-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="h-1.5 bg-gradient-to-r from-green-400 to-green-600 animate-shrink-6s"></div>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-gradient-to-br from-white to-red-50 rounded-3xl shadow-2xl overflow-hidden border-2 border-red-200 backdrop-blur-sm">
            <div class="p-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center shadow-lg animate-shake">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2 flex items-center">
                            Error!
                            <svg class="w-5 h-5 ml-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </h3>
                        <p class="text-gray-700 text-base leading-relaxed">{{ session('error') }}</p>
                    </div>
                    <button @click="show = false" class="ml-4 text-gray-400 hover:text-gray-700 transition-colors p-2 hover:bg-gray-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="h-1.5 bg-gradient-to-r from-red-400 to-red-600 animate-shrink-6s"></div>
        </div>
        @endif

        @if(session('warning'))
        <div class="bg-gradient-to-br from-white to-yellow-50 rounded-3xl shadow-2xl overflow-hidden border-2 border-yellow-200 backdrop-blur-sm">
            <div class="p-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2 flex items-center">
                            Warning!
                            <svg class="w-5 h-5 ml-2 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </h3>
                        <p class="text-gray-700 text-base leading-relaxed">{{ session('warning') }}</p>
                    </div>
                    <button @click="show = false" class="ml-4 text-gray-400 hover:text-gray-700 transition-colors p-2 hover:bg-gray-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="h-1.5 bg-gradient-to-r from-yellow-400 to-yellow-600 animate-shrink-6s"></div>
        </div>
        @endif

        @if(session('info'))
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-3xl shadow-2xl overflow-hidden border-2 border-blue-200 backdrop-blur-sm">
            <div class="p-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2 flex items-center">
                            Info
                            <svg class="w-5 h-5 ml-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </h3>
                        <p class="text-gray-700 text-base leading-relaxed">{{ session('info') }}</p>
                    </div>
                    <button @click="show = false" class="ml-4 text-gray-400 hover:text-gray-700 transition-colors p-2 hover:bg-gray-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="h-1.5 bg-gradient-to-r from-blue-400 to-blue-600 animate-shrink-6s"></div>
        </div>
        @endif
    </div>
</div>

<style>
    @keyframes shrink-6s {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
    
    @keyframes bounce-slow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    @keyframes shake {
        0%, 100% {
            transform: translateX(0);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: translateX(-5px);
        }
        20%, 40%, 60%, 80% {
            transform: translateX(5px);
        }
    }
    
    .animate-shrink-6s {
        animation: shrink-6s 6s linear forwards;
    }
    
    .animate-bounce-slow {
        animation: bounce-slow 2s ease-in-out infinite;
    }
    
    .animate-shake {
        animation: shake 0.5s ease-in-out;
    }
</style>
@endif

