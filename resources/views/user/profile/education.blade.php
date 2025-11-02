<x-layout>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Pendidikan</h1>
        <div class="bg-white rounded shadow p-6">
            <form method="POST" action="{{ route('user.profile.update') }}" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Program Studi</label>
                        <select name="program_study" class="border rounded w-full p-2">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="Teknik Perminyakan" {{ old('program_study', $user->program_study) == 'Teknik Perminyakan' ? 'selected' : '' }}>Teknik Perminyakan</option>
                            <option value="Teknik Geologi" {{ old('program_study', $user->program_study) == 'Teknik Geologi' ? 'selected' : '' }}>Teknik Geologi</option>
                            <option value="Teknik Geofisika" {{ old('program_study', $user->program_study) == 'Teknik Geofisika' ? 'selected' : '' }}>Teknik Geofisika</option>
                            <option value="Teknik Elektro" {{ old('program_study', $user->program_study) == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                            <option value="Teknik Mesin" {{ old('program_study', $user->program_study) == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                            <option value="Teknik Linkungan" {{ old('program_study', $user->program_study) == 'Teknik Linkungan' ? 'selected' : '' }}>Teknik Linkungan</option>
                            <option value="Teknik Sipil" {{ old('program_study', $user->program_study) == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                            <option value="Teknik Kimia" {{ old('program_study', $user->program_study) == 'Teknik Kimia' ? 'selected' : '' }}>Teknik Kimia</option>
                            <option value="Ilmu Komputer" {{ old('program_study', $user->program_study) == 'Teknik Ilmu Komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
                            <option value="Kimia" {{ old('program_study', $user->program_study) == 'Kimia' ? 'selected' : '' }}>Kimia</option>
                            <option value="Aktuaria" {{ old('program_study', $user->program_study) == 'Aktuaria' ? 'selected' : '' }}>Aktuaria</option>
                            <option value="Ekonomi" {{ old('program_study', $user->program_study) == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                            <option value="Menejemen" {{ old('program_study', $user->program_study) == 'Menejemen' ? 'selected' : '' }}>Menejemen</option>
                            <option value="Hubungan Internasional" {{ old('program_study', $user->program_study) == 'Hubungan Internasional' ? 'selected' : '' }}>Hubungan Internasional</option>
                            <option value="Komunikasi" {{ old('program_study', $user->program_study) == 'Komunikasi' ? 'selected' : '' }}>Komunikasi</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Fakultas</label>
                        <select name="faculty" class="border rounded w-full p-2">
                            <option value="">-- Pilih Fakultas --</option>
                            <option value="FTI" {{ old('faculty', $user->faculty) == 'FTI' ? 'selected' : '' }}>Fakultas Teknologi Industri</option>
                            <option value="FEB" {{ old('faculty', $user->faculty) == 'FEB' ? 'selected' : '' }}>Fakultas Ekonomi dan Bisnis</option>
                            <option value="FPI" {{ old('faculty', $user->faculty) == 'FPI' ? 'selected' : '' }}>Fakultas Perancangan Infrastruktur</option>
                            <option value="FTEP" {{ old('faculty', $user->faculty) == 'FTEP' ? 'selected' : '' }}>Fakultas Teknologi Eksplorasi dan Produksi</option>
                            <option value="FSIK" {{ old('faculty', $user->faculty) == 'FSIK' ? 'selected' : '' }}>Fakultas Sains dan Ilmu Komputer</option>
                            <option value="FKD" {{ old('faculty', $user->faculty) == 'FKD' ? 'selected' : '' }}>Fakultas Komunikasi dan Diplomasi</option>
                        </select>
                    </div>

                    {{-- NIM tetap text field --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">NIM</label>
                        <input type="text" name="student_id" value="{{ old('student_id', $user->student_id) }}" class="border rounded w-full p-2" />
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('user.profile.show') }}" class="px-4 py-2 border rounded">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
