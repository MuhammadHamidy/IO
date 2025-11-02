<x-layout>
    <div class="max-w-2xl mx-auto p-6">
        <x-sub-text>{{ __('Update Partner') }}</x-sub-text>
        
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        
        <form action="{{ route('partners.update', $pagePartners->id) }}" method="POST" enctype="multipart/form-data" class="w-full shadow-xl rounded-2xl my-8 p-8 bg-white">
            @csrf
            @method('PUT')
            <div class="flex flex-col mb-4">
                <label for="name" class="mb-2 font-semibold text-gray-700">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ $pagePartners->name }}" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="regional" class="mb-2 font-semibold text-gray-700">Regional <span class="text-red-500">*</span></label>
                <input type="text" name="regional" id="regional" value="{{ $pagePartners->regional }}" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('regional') }}">
                @error('regional')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="website" class="mb-2 font-semibold text-gray-700">Website</label>
                <input type="text" name="website" id="website" value="{{ $pagePartners->website }}" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('website') }}">
                @error('website')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="logo" class="mb-2 font-semibold text-gray-700">Logo</label>
                <input type="file" name="logo" id="logo" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('logo') }}">
                @if($pagePartners->logo)
                    <img src="{{ Storage::url($pagePartners->logo) }}" alt="{{ $pagePartners->name }}" class="w-auto h-auto object-cover mt-2">
                @endif
                @error('logo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="country" class="mb-2 font-semibold text-gray-700">Country <span class="text-red-500">*</span></label>
                <select name="country" id="country" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('country') }}">
                    <option value="">Select a country</option>
                    @foreach($countries as $code => $name)
                        <option value="{{ $name }}" {{ $pagePartners->country == $name ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('country')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="address" class="mb-2 font-semibold text-gray-700">Address <span class="text-red-500">*</span></label>
                <input type="text" name="address" id="address" value="{{ $pagePartners->address }}" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('address') }}">
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="description" class="mb-2 font-semibold text-gray-700">Description</label>
                <textarea name="description" id="description" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('description') }}">{{ $pagePartners->description }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
              <label for="english_profiency" class="mb-2 font-semibold text-gray-700">English Proficiency</label>
              <textarea name="english_profiency" id="english_profiency" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->english_profiency ? $pagePartners->english_profiency : old('english_profiency') }}">{{ $pagePartners->english_profiency ? $pagePartners->english_profiency : old('english_profiency') }}</textarea>
              @error('english_profiency')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
            <div class="flex flex-col mb-4">
              <label for="eligible_departement" class="mb-2 font-semibold text-gray-700">Eligible Departement</label>
              <textarea name="eligible_departement" id="eligible_departement" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->eligible_departement ? $pagePartners->eligible_departement : old('eligible_departement') }}">{{ $pagePartners->eligible_departement ? $pagePartners->eligible_departement : old('eligible_departement') }}</textarea>
              @error('eligible_departement')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
            <div class="flex flex-col mb-4">
              <label for="study_periode" class="mb-2 font-semibold text-gray-700">Study Periode</label>
              <textarea name="study_periode" id="study_periode" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->study_periode ? $pagePartners->study_periode : old('study_periode') }}">{{ $pagePartners->study_periode ? $pagePartners->study_periode : old('study_periode') }}</textarea>
              @error('study_periode')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
            <div class="flex flex-col mb-4">
              <label for="fact_sheet" class="mb-2 font-semibold text-gray-700">Fact Sheet</label>
              <input type="file" name="fact_sheet" id="fact_sheet" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ old('fact_sheet') }}">
              @if ($pagePartners->fact_sheet && !old('fact_sheet'))
                  <p class="mt-2 text-sm text-gray-600">
                      <a href="{{ asset('storage/' . $pagePartners->fact_sheet) }}"
                          class="text-blue-500 underline" target="_blank">
                          {{ $pagePartners->fact_sheet }}
                      </a>
                  </p>
              @endif
              @error('fact_sheet')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <!-- New Partnership Details Fields -->
            <div class="border-t border-gray-300 my-6 pt-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Partnership Details</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="flex flex-col">
                        <label for="partnership_start_date" class="mb-2 font-semibold text-gray-700">Partnership Start Date</label>
                        <input type="date" name="partnership_start_date" id="partnership_start_date" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->partnership_start_date ? $pagePartners->partnership_start_date : old('partnership_start_date') }}">
                        @error('partnership_start_date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="partnership_end_date" class="mb-2 font-semibold text-gray-700">Partnership End Date</label>
                        <input type="date" name="partnership_end_date" id="partnership_end_date" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->partnership_end_date ? $pagePartners->partnership_end_date : old('partnership_end_date') }}">
                        @error('partnership_end_date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="partnership_type" class="mb-2 font-semibold text-gray-700">Partnership Type</label>
                    <input type="text" name="partnership_type" id="partnership_type" placeholder="e.g., Student Exchange, Joint Research, Faculty Mobility (comma separated)" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->partnership_type ? $pagePartners->partnership_type : old('partnership_type') }}">
                    <small class="text-gray-500 mt-1">Separate multiple types with commas</small>
                    @error('partnership_type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col mb-4">
                    <label for="cooperation_fields" class="mb-2 font-semibold text-gray-700">Fields of Cooperation</label>
                    <input type="text" name="cooperation_fields" id="cooperation_fields" placeholder="e.g., Engineering, Business, Technology (comma separated)" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->cooperation_fields ? $pagePartners->cooperation_fields : old('cooperation_fields') }}">
                    <small class="text-gray-500 mt-1">Separate multiple fields with commas</small>
                    @error('cooperation_fields')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <h4 class="text-md font-bold text-gray-700 mb-3 mt-6">Contact Information</h4>
                
                <div class="flex flex-col mb-4">
                    <label for="contact_person" class="mb-2 font-semibold text-gray-700">Contact Person</label>
                    <input type="text" name="contact_person" id="contact_person" placeholder="Name of contact person" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->contact_person ? $pagePartners->contact_person : old('contact_person') }}">
                    @error('contact_person')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="flex flex-col">
                        <label for="contact_email" class="mb-2 font-semibold text-gray-700">Contact Email</label>
                        <input type="email" name="contact_email" id="contact_email" placeholder="contact@partner.edu" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->contact_email ? $pagePartners->contact_email : old('contact_email') }}">
                        @error('contact_email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="contact_phone" class="mb-2 font-semibold text-gray-700">Contact Phone</label>
                        <input type="text" name="contact_phone" id="contact_phone" placeholder="+1 234 567 8900" class="p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-100 focus:outline-none" value="{{ $pagePartners->contact_phone ? $pagePartners->contact_phone : old('contact_phone') }}">
                        @error('contact_phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition duration-300">Update Partner</button>
            </div>
        </form>
    </div>
</x-layout>