<x-layout>
<div class="max-w-3xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Dokumen</h1>
    <div class="bg-white rounded shadow p-6">
        <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">CV</label>
                    <input type="file" name="cv" class="border rounded w-full p-2" />
                    @if($user->cv_path)
                        <a class="text-blue-700 text-sm" target="_blank" href="{{ asset('storage/' . $user->cv_path) }}">Lihat CV</a>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Transkrip Nilai</label>
                    <input type="file" name="transcript" class="border rounded w-full p-2" />
                    @if($user->transcript_path)
                        <a class="text-blue-700 text-sm" target="_blank" href="{{ asset('storage/' . $user->transcript_path) }}">Lihat Transkrip</a>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">TOEFL</label>
                    <input type="file" name="toefl" class="border rounded w-full p-2" />
                    @if($user->toefl_path)
                        <a class="text-blue-700 text-sm" target="_blank" href="{{ asset('storage/' . $user->toefl_path) }}">Lihat TOEFL</a>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Pakta Integritas</label>
                    <input type="file" name="integrity_letter" class="border rounded w-full p-2" />
                    @if($user->integrity_letter_path)
                        <a class="text-blue-700 text-sm" target="_blank" href="{{ asset('storage/' . $user->integrity_letter_path) }}">Lihat Pakta</a>
                    @endif
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






