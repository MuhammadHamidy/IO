<x-layout>
<div class="max-w-6xl mx-auto py-10 px-4 mt-4">
    
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl p-8 mb-8 shadow-2xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Program Application</h1>
                <p class="text-blue-100 text-lg">{{ $program->title ?? $program->name }}</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
            <svg class="w-7 h-7 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Program Information
        </h2>
        
        @if($program->duration)
            <div class="mb-4 flex items-center text-gray-700 bg-blue-50 px-4 py-3 rounded-lg">
                <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-semibold">Duration: {{ $program->duration }}</span>
            </div>
        @endif

        <div class="prose max-w-none text-gray-700 leading-relaxed bg-gray-50 p-6 rounded-xl mb-4">
            {!! nl2br(e($program->description)) !!}
        </div>
        
        @if(!empty($program->requirements))
            <div class="bg-purple-50 p-6 rounded-xl">
                <h3 class="font-bold text-lg text-gray-800 mb-3 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Requirements
                </h3>
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($program->requirements)) !!}
                </div>
            </div>
        @endif
    </div>

    
    <form action="{{ route('user.applications.store', $program->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <svg class="w-7 h-7 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Personal Information
                </h2>
                <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Auto-filled from Profile
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <div class="relative">
                        <input type="text" value="{{ auth()->user()->name }}" class="border-2 border-gray-200 rounded-xl w-full p-3 bg-gray-50 text-gray-600 font-medium" disabled />
                        <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
            </div>
            <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <input type="email" value="{{ auth()->user()->email }}" class="border-2 border-gray-200 rounded-xl w-full p-3 bg-gray-50 text-gray-600 font-medium" disabled />
                        <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
            </div>
            <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                    <div class="relative">
                        <input type="text" value="{{ auth()->user()->phone ?? 'Not provided' }}" class="border-2 border-gray-200 rounded-xl w-full p-3 bg-gray-50 text-gray-600 font-medium" disabled />
                        <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
            </div>
            <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nationality</label>
                    <div class="relative">
                        <input type="text" value="{{ auth()->user()->nationality ?? 'Not provided' }}" class="border-2 border-gray-200 rounded-xl w-full p-3 bg-gray-50 text-gray-600 font-medium" disabled />
                        <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-7 h-7 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Required Documents
            </h2>

            
            <div class="bg-blue-50 border-l-4 border-blue-500 p-5 mb-6 rounded-r-xl">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
        <div>
                        <p class="text-blue-800 font-semibold mb-1">Flexible Document Upload</p>
                        <p class="text-blue-700 text-sm">Documents from your profile will be used automatically. You can replace any document by uploading a new file below.</p>
                    </div>
                </div>
            </div>

            @php
                $documents = [
                    ['name' => 'Curriculum Vitae (CV)', 'field' => 'cv_path', 'input_name' => 'cv'],
                    ['name' => 'Academic Transcript', 'field' => 'transcript_path', 'input_name' => 'transcript'],
                    ['name' => 'English Proficiency (TOEFL/IELTS)', 'field' => 'toefl_path', 'input_name' => 'toefl'],
                    ['name' => 'Letter of Integrity', 'field' => 'integrity_letter_path', 'input_name' => 'integrity_letter']
                ];
            @endphp

            <div class="space-y-4">
                @foreach($documents as $doc)
                    <div class="bg-white border-2 {{ auth()->user()->{$doc['field']} ? 'border-green-200' : 'border-orange-200' }} rounded-xl p-5 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center flex-1">
                                @if(auth()->user()->{$doc['field']})
                                    <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                @else
                                    <div class="flex-shrink-0 w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-900">{{ $doc['name'] }}</h3>
                                    @if(auth()->user()->{$doc['field']})
                                        <p class="text-sm text-green-700 mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Available from profile - Will be used automatically
                                        </p>
                                    @else
                                        <p class="text-sm text-orange-700 mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01"></path>
                                            </svg>
                                            Not in profile - Please upload
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                {{ auth()->user()->{$doc['field']} ? 'Upload New File (Optional - will replace profile document)' : 'Upload File (Required)' }}
                            </label>
                            <input 
                                type="file" 
                                name="{{ $doc['input_name'] }}" 
                                class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer border border-gray-300 rounded-lg p-2 bg-gray-50 hover:bg-gray-100 transition-all"
                                accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                {{ auth()->user()->{$doc['field']} ? '' : 'required' }}
                            />
                            <p class="text-xs text-gray-500 mt-1">PDF, DOC, DOCX, JPG, PNG (Max: 5MB)</p>
                            @error($doc['input_name'])
                                <p class="text-red-600 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>

            
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 p-6 rounded-xl mt-6">
                <label class="block text-lg font-semibold text-gray-800 mb-3 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    Upload Additional Documents (Optional)
                </label>
                <input 
                    type="file" 
                    name="documents[]" 
                    multiple 
                    class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer border-2 border-dashed border-indigo-300 rounded-xl p-4 bg-white hover:bg-indigo-50 transition-all duration-300"
                    accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                />
                <p class="text-sm text-gray-600 mt-3 flex items-start">
                    <svg class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Any other supporting documents (recommendation letters, certificates, etc.)
                </p>
            @error('documents.*')
                    <p class="text-red-600 text-sm mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $message }}
                    </p>
            @enderror
            </div>
        </div>

        
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <label class="block text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-7 h-7 mr-3 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Additional Notes (Optional)
            </label>
            <textarea 
                name="notes" 
                rows="5" 
                class="border-2 border-gray-200 rounded-xl w-full p-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300" 
                placeholder="Any additional information you'd like to share with us..."></textarea>
            @error('notes')
                <p class="text-red-600 text-sm mt-2 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-gray-50 p-6 rounded-2xl">
            <a href="{{ route('user.applications.index') }}" class="w-full sm:w-auto px-8 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300 flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Cancel
            </a>
            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Submit Application
            </button>
        </div>
    </form>
</div>
 </x-layout>