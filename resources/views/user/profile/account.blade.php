<x-layout>
<div class="max-w-3xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Account</h1>
    <div class="bg-white rounded shadow p-6">
        <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="flex items-center gap-4">
                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.png') }}" class="w-16 h-16 rounded-full object-cover border" />
                <div class="flex-1">
                    <label class="block text-sm font-medium mb-1">Profile Photo</label>
                    <input type="file" name="avatar" class="border rounded w-full p-2" />
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="border rounded w-full p-2" required />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="border rounded w-full p-2" required />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password (optional)</label>
                <input type="password" name="password" class="border rounded w-full p-2" />
                <input type="password" name="password_confirmation" class="border rounded w-full p-2 mt-2" placeholder="Confirm password" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="border rounded w-full p-2" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : '') }}" class="border rounded w-full p-2" />
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Address</label>
                    <input type="text" name="address" value="{{ old('address', $user->address) }}" class="border rounded w-full p-2" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Nationality</label>
                    <input type="text" name="nationality" value="{{ old('nationality', $user->nationality) }}" class="border rounded w-full p-2" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Passport Number</label>
                    <input type="text" name="passport_number" value="{{ old('passport_number', $user->passport_number) }}" class="border rounded w-full p-2" />
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






