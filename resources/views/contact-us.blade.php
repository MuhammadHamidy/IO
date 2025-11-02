<x-layout>
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-[#1F4894] to-[#2D5F3F] py-16 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Connect With International Office</h1>
            <p class="text-white text-lg md:text-xl opacity-90 max-w-3xl mx-auto">
                Have questions about international programs, partnerships, or student mobility? 
                The International Office team is ready to assist you with comprehensive support for your global academic journey. 
                Reach out to us and let's make your international education dreams come true.
            </p>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="bg-gray-50 py-12 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Mail Section -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="flex items-start gap-4">
                    <div class="bg-[#C4D25A] rounded-lg p-4">
                        <svg class="w-8 h-8 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Email</h3>
                        <a href="mailto:international.office@universitaspertamina.ac.id" 
                           class="text-[#1F4894] hover:underline text-lg">
                            international.office@universitaspertamina.ac.id
                        </a>
                    </div>
                </div>
            </div>

            <!-- Office Location Section -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="flex items-start gap-4">
                    <div class="bg-[#C4D25A] rounded-lg p-4">
                        <svg class="w-8 h-8 text-[#1F4894]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">Our Office Location</h3>
                        <div class="text-gray-600 space-y-1">
                            <p class="font-semibold text-[#1F4894]">International Office</p>
                            <p>Rectorat Building, 4th Floor</p>
                            <p>Universitas Pertamina</p>
                            <p>Jl. Teuku Nyak Arief, Simprug</p>
                            <p>Jakarta Selatan 12220, Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="bg-white py-16 px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Send us a Message</h2>
            
            <form action="#" method="POST" class="space-y-6">
                @csrf
                
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1F4894] focus:border-transparent"
                           placeholder="Enter Your Name">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1F4894] focus:border-transparent"
                           placeholder="Enter a valid email address">
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        Phone Number
                    </label>
                    <input type="tel" 
                           id="phone" 
                           name="phone"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1F4894] focus:border-transparent"
                           placeholder="Enter Your Phone Number">
                </div>

                <!-- Purpose -->
                <div>
                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-2">
                        Purpose <span class="text-red-500">*</span>
                    </label>
                    <select id="purpose" 
                            name="purpose" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1F4894] focus:border-transparent">
                        <option value="">Your Purpose for Contacting Us</option>
                        <option value="program-inquiry">Program Information Inquiry</option>
                        <option value="application">Application Assistance</option>
                        <option value="partnership">Partnership & Collaboration</option>
                        <option value="student-exchange">Student Exchange Program</option>
                        <option value="visa">Visa & Immigration Support</option>
                        <option value="general">General Question</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Upload File -->
                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload file
                    </label>
                    <div class="flex items-center gap-4">
                        <label for="file" 
                               class="px-6 py-3 bg-[#2D5F3F] text-white rounded-lg cursor-pointer hover:bg-[#234a31] transition">
                            Choose File
                        </label>
                        <span id="file-name" class="text-gray-500 text-sm">No file chosen</span>
                        <input type="file" 
                               id="file" 
                               name="file" 
                               class="hidden"
                               onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'No file chosen'">
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Upload Screenshot or File</p>
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                        Message
                    </label>
                    <div class="relative">
                        <textarea id="message" 
                                  name="message" 
                                  rows="5" 
                                  maxlength="180"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1F4894] focus:border-transparent"
                                  placeholder="Enter your message..."
                                  oninput="document.getElementById('char-count').textContent = this.value.length"></textarea>
                        <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                            <span id="char-count">0</span> / 180
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-8 py-3 bg-[#2D5F3F] text-white font-semibold rounded-lg hover:bg-[#234a31] transition duration-300 shadow-lg">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
