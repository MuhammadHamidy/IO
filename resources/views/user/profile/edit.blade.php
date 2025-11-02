<x-layout>
<div class="max-w-7xl mx-auto py-10 px-4 mt-4">
    
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl p-8 mb-8 shadow-2xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Edit Profile</h1>
                <p class="text-blue-100">Update your personal information and documents</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-5 rounded-r-xl shadow-sm">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-800 font-semibold">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf

        
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="flex items-center mb-6 pb-4 border-b-2 border-blue-100">
                <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h2 class="text-2xl font-bold text-gray-800">Personal Information</h2>
            </div>

            
            <div class="mb-6 bg-gray-50 p-6 rounded-xl">
                <div class="flex items-center gap-6">
                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.png') }}" 
                         alt="avatar" 
                         class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg" />
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Profile Photo</label>
                        <input type="file" 
                               name="avatar" 
                               accept="image/*"
                               class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer" />
                        <p class="text-xs text-gray-500 mt-2">Recommended: Square image, at least 400x400px</p>
                        @error('avatar')<p class="text-sm text-red-600 mt-1 flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</p>@enderror
            </div>
        </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Name *</label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name', $user->name) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
            @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Student ID *</label>
                    <input type="text" 
                           name="student_id" 
                           value="{{ old('student_id', $user->student_id) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('student_id')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth *</label>
                    <input type="date" 
                           name="date_of_birth" 
                           value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : '') }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('date_of_birth')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Place of Birth *</label>
                    <input type="text" 
                           name="place_of_birth" 
                           value="{{ old('place_of_birth', $user->place_of_birth) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('place_of_birth')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Department *</label>
                    <input type="text" 
                           name="faculty" 
                           value="{{ old('faculty', $user->faculty) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('faculty')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nationality *</label>
                    <input type="text" 
                           name="nationality" 
                           value="{{ old('nationality', $user->nationality) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('nationality')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Religion *</label>
                    <input type="text" 
                           name="religion" 
                           value="{{ old('religion', $user->religion) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('religion')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Passport Number *</label>
                    <input type="text" 
                           name="passport_number" 
                           value="{{ old('passport_number', $user->passport_number) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('passport_number')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Passport Expiration Date *</label>
                    <input type="date" 
                           name="passport_expiration_date" 
                           value="{{ old('passport_expiration_date', $user->passport_expiration_date ? $user->passport_expiration_date->format('Y-m-d') : '') }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('passport_expiration_date')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

            <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone *</label>
                    <input type="text" 
                           name="phone" 
                           value="{{ old('phone', $user->phone) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                @error('phone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email', $user->email) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Address *</label>
                    <textarea name="address" 
                              rows="2" 
                              required
                              class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('address', $user->address) }}</textarea>
                @error('address')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Mailing Address *</label>
                    <textarea name="mailing_address" 
                              rows="2" 
                              required
                              class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('mailing_address', $user->mailing_address) }}</textarea>
                    @error('mailing_address')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="flex items-center mb-6 pb-4 border-b-2 border-purple-100">
                <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h2 class="text-2xl font-bold text-gray-800">Academic Information</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">GPA *</label>
                    <input type="number" 
                           name="gpa" 
                           value="{{ old('gpa', $user->gpa) }}" 
                           placeholder="e.g., 3.5"
                           step="0.01"
                           min="2.5"
                           max="4.0"
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
                    <p class="text-xs text-gray-500 mt-1">Minimum GPA required: 2.5</p>
                    @error('gpa')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Year/Semester *</label>
                    <input type="text" 
                           name="year_semester" 
                           value="{{ old('year_semester', $user->year_semester) }}" 
                           placeholder="e.g., 2021/04"
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
                    @error('year_semester')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Program Study *</label>
                    <input type="text" 
                           name="program_study" 
                           value="{{ old('program_study', $user->program_study) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
                    @error('program_study')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">TOEFL/IELTS Score *</label>
                    <input type="text" 
                           name="toefl_score" 
                           value="{{ old('toefl_score', $user->toefl_score) }}" 
                           placeholder="e.g., 570 or 6.5"
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
                    @error('toefl_score')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Test Date *</label>
                    <input type="date" 
                           name="toefl_test_date" 
                           value="{{ old('toefl_test_date', $user->toefl_test_date ? $user->toefl_test_date->format('Y-m-d') : '') }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
                    @error('toefl_test_date')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <h2 class="text-2xl font-bold text-gray-800">Parent Information</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Parent's Name *</label>
                    <input type="text" 
                           name="parent_name" 
                           value="{{ old('parent_name', $user->parent_name) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                    @error('parent_name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Parental Relationship *</label>
                    <select name="parental_relationship" 
                            required
                            class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Select Relationship</option>
                        <option value="Father" {{ old('parental_relationship', $user->parental_relationship) == 'Father' ? 'selected' : '' }}>Father</option>
                        <option value="Mother" {{ old('parental_relationship', $user->parental_relationship) == 'Mother' ? 'selected' : '' }}>Mother</option>
                        <option value="Guardian" {{ old('parental_relationship', $user->parental_relationship) == 'Guardian' ? 'selected' : '' }}>Guardian</option>
                        <option value="Other" {{ old('parental_relationship', $user->parental_relationship) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('parental_relationship')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Parent's Address *</label>
                    <textarea name="parent_address" 
                              rows="2" 
                              required
                              class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('parent_address', $user->parent_address) }}</textarea>
                    @error('parent_address')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Parent's Telephone Number *</label>
                    <input type="text" 
                           name="parent_telephone" 
                           value="{{ old('parent_telephone', $user->parent_telephone) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                    @error('parent_telephone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Parent's Mobile Number *</label>
                    <input type="text" 
                           name="parent_mobile" 
                           value="{{ old('parent_mobile', $user->parent_mobile) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                    @error('parent_mobile')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Parent's Email Address *</label>
                    <input type="email" 
                           name="parent_email" 
                           value="{{ old('parent_email', $user->parent_email) }}" 
                           required
                           class="w-full border-2 border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                    @error('parent_email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="flex items-center mb-6 pb-4 border-b-2 border-indigo-100">
                <svg class="w-8 h-8 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h2 class="text-2xl font-bold text-gray-800">Documents</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Curriculum Vitae (CV)</label>
                    <input type="file" 
                           name="cv" 
                           accept=".pdf,.doc,.docx"
                           class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer border-2 border-dashed border-indigo-300 rounded-xl p-4 bg-white hover:bg-indigo-50 transition-all duration-300" />
                    @if($user->cv_path)
                        <a class="text-indigo-700 text-sm mt-2 inline-flex items-center hover:text-indigo-900" target="_blank" href="{{ asset('storage/' . $user->cv_path) }}">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            View Current CV
                        </a>
                    @endif
                    @error('cv')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Academic Transcript</label>
                    <input type="file" 
                           name="transcript" 
                           accept=".pdf,.jpg,.jpeg,.png"
                           class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer border-2 border-dashed border-indigo-300 rounded-xl p-4 bg-white hover:bg-indigo-50 transition-all duration-300" />
                    @if($user->transcript_path)
                        <a class="text-indigo-700 text-sm mt-2 inline-flex items-center hover:text-indigo-900" target="_blank" href="{{ asset('storage/' . $user->transcript_path) }}">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            View Current Transcript
                        </a>
                    @endif
                    @error('transcript')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">TOEFL/IELTS Certificate</label>
                    <input type="file" 
                           name="toefl" 
                           accept=".pdf,.jpg,.jpeg,.png"
                           class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer border-2 border-dashed border-indigo-300 rounded-xl p-4 bg-white hover:bg-indigo-50 transition-all duration-300" />
                    @if($user->toefl_path)
                        <a class="text-indigo-700 text-sm mt-2 inline-flex items-center hover:text-indigo-900" target="_blank" href="{{ asset('storage/' . $user->toefl_path) }}">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            View Current Certificate
                        </a>
                    @endif
                    @error('toefl')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Letter of Integrity</label>
                    <input type="file" 
                           name="integrity_letter" 
                           accept=".pdf,.jpg,.jpeg,.png"
                           class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer border-2 border-dashed border-indigo-300 rounded-xl p-4 bg-white hover:bg-indigo-50 transition-all duration-300" />
                    @if($user->integrity_letter_path)
                        <a class="text-indigo-700 text-sm mt-2 inline-flex items-center hover:text-indigo-900" target="_blank" href="{{ asset('storage/' . $user->integrity_letter_path) }}">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            View Current Letter
                        </a>
                    @endif
                    @error('integrity_letter')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            
            <div class="mt-8 bg-yellow-50 border-l-4 border-yellow-400 p-5 rounded-r-xl">
                <div class="flex">
                    <svg class="w-6 h-6 text-yellow-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div>
                        <h3 class="text-yellow-800 font-semibold mb-2">Note:</h3>
                        <ul class="list-decimal list-inside text-yellow-700 text-sm space-y-1">
                            <li>Your GPA must be at least 2.5</li>
                            <li>You need to be in at least the 3rd semester</li>
                            <li>All documents must be in PDF format (max 5MB)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-gray-50 p-6 rounded-2xl">
            <a href="{{ route('user.profile.show') }}" class="w-full sm:w-auto px-8 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300 flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Cancel
            </a>
            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Save Profile
            </button>
        </div>
    </form>
</div>
</x-layout>
