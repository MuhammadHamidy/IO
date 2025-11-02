@extends('components.admin-layout')

@section('page-title', 'Edit Partner')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Partner</h1>
            <p class="text-gray-600">Update partner information</p>
        </div>
        <a href="{{ route('admin.partners.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Partners
        </a>
    </div>

    
    <form method="POST" action="{{ route('admin.partners.update', $partner->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 space-y-6">
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Mitra *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $partner->name) }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                       placeholder="Enter partner name">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-2">Negara *</label>
                    <select id="country" name="country" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('country') border-red-500 @enderror">
                        <option value="">Select Country</option>
                        @php
                            $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');
                        @endphp
                        @foreach($countries as $code => $name)
                            <option value="{{ $code }}" {{ old('country', $partner->country) === $code ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('country')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                
                <div>
                    <label for="regional" class="block text-sm font-medium text-gray-700 mb-2">Kawasan *</label>
                    <select id="regional" name="regional" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('regional') border-red-500 @enderror">
                        <option value="">Select Region</option>
                        <option value="Asia" {{ old('regional', $partner->regional) === 'Asia' ? 'selected' : '' }}>Asia</option>
                        <option value="Europe" {{ old('regional', $partner->regional) === 'Europe' ? 'selected' : '' }}>Europe</option>
                        <option value="North America" {{ old('regional', $partner->regional) === 'North America' ? 'selected' : '' }}>North America</option>
                        <option value="South America" {{ old('regional', $partner->regional) === 'South America' ? 'selected' : '' }}>South America</option>
                        <option value="Africa" {{ old('regional', $partner->regional) === 'Africa' ? 'selected' : '' }}>Africa</option>
                        <option value="Oceania" {{ old('regional', $partner->regional) === 'Oceania' ? 'selected' : '' }}>Oceania</option>
                    </select>
                    @error('regional')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori Mitra *</label>
                <select id="category" name="category" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror">
                    <option value="">Select Category</option>
                    <option value="University" {{ old('category', $partner->category) === 'University' ? 'selected' : '' }}>🎓 University</option>
                    <option value="Organization" {{ old('category', $partner->category) === 'Organization' ? 'selected' : '' }}>🏢 Organization</option>
                    <option value="Embassy" {{ old('category', $partner->category) === 'Embassy' ? 'selected' : '' }}>🏛️ Embassy</option>
                    <option value="Government Agency" {{ old('category', $partner->category) === 'Government Agency' ? 'selected' : '' }}>🏛️ Government Agency</option>
                    <option value="Company" {{ old('category', $partner->category) === 'Company' ? 'selected' : '' }}>💼 Company</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Link Website *</label>
                <input type="url" id="website" name="website" value="{{ old('website', $partner->website) }}" required
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('website') border-red-500 @enderror"
                       placeholder="https://example.com">
                @error('website')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                          placeholder="Enter partner description (optional)...">{{ old('description', $partner->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                @if($partner->logo)
                <div class="mb-3">
                    <p class="text-sm text-gray-600 mb-2">Current logo:</p>
                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="w-32 h-32 object-contain border border-gray-200 rounded-lg p-2">
                </div>
                @endif
                <input type="file" id="logo" name="logo" accept="image/*"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('logo') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload new logo to replace current one (optional)</p>
                @error('logo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select id="status" name="status" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                    <option value="">Select Status</option>
                    <option value="draft" {{ old('status', $partner->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $partner->status) === 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.partners.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                Update Partner
            </button>
        </div>
    </form>
</div>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
/* Custom Select2 styling to match form */
.select2-container--default .select2-selection--single {
    height: 42px !important;
    padding: 6px 12px !important;
    border: 1px solid #d1d5db !important;
    border-radius: 0.375rem !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 28px !important;
    padding-left: 0 !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 40px !important;
}

.select2-container--default.select2-container--focus .select2-selection--single {
    border-color: #3b82f6 !important;
    outline: 2px solid transparent !important;
    outline-offset: 2px !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5) !important;
}

.select2-dropdown {
    border: 1px solid #d1d5db !important;
    border-radius: 0.375rem !important;
}

.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #3b82f6 !important;
}

.select2-search--dropdown .select2-search__field {
    border: 1px solid #d1d5db !important;
    border-radius: 0.375rem !important;
    padding: 6px 12px !important;
}

.select2-search--dropdown .select2-search__field:focus {
    border-color: #3b82f6 !important;
    outline: none !important;
}
</style>

<script>
$(document).ready(function() {
    $('#country').select2({
        theme: 'default',
        placeholder: 'Search and select country...',
        allowClear: true,
        width: '100%',
        dropdownParent: $('#country').parent(),
        language: {
            noResults: function() {
                return "No country found";
            },
            searching: function() {
                return "Searching...";
            }
        }
    });
});
</script>
@endsection

