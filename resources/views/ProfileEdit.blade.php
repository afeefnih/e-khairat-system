<x-member_layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Form -->
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <!-- Full Name -->
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 font-medium">Full Name</label>
                <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $user->full_name) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md" required>
                @error('full_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- IC Number -->
            <div class="mb-4">
                <label for="ic_num" class="block text-gray-700 font-medium">IC Number</label>
                <input type="text" name="ic_num" id="ic_num" value="{{ old('ic_num', $user->ic_num) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md" required>
                @error('ic_num') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <textarea name="address" id="address" rows="3"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md">{{ old('address', $user->address) }}</textarea>
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="tel_num" class="block text-gray-700 font-medium">Phone Number</label>
                <input type="text" name="tel_num" id="tel_num" value="{{ old('tel_num', $user->tel_num) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md" required>
                @error('tel_num') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Age -->
            <div class="mb-4">
                <label for="age" class="block text-gray-700 font-medium">Age</label>
                <input type="number" name="age" id="age" value="{{ old('age', $user->age) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md" required>
                @error('age') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- House Number -->
            <div class="mb-4">
                <label for="house_num" class="block text-gray-700 font-medium">House Number</label>
                <input type="text" name="house_num" id="house_num" value="{{ old('house_num', $user->house_num) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md">
                @error('house_num') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Residency Status -->
            <div class="mb-4">
                <label for="residency_stat" class="block text-gray-700 font-medium">Residency Status</label>
                <select name="residency_stat" id="residency_stat" class="w-full mt-2 p-3 border border-gray-300 rounded-md">
                    <option value="permanent" {{ $user->residency_stat == 'permanent' ? 'selected' : '' }}>Permanent</option>
                    <option value="tenant" {{ $user->residency_stat == 'tenant' ? 'selected' : '' }}>Tenant</option>
                </select>
                @error('residency_stat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-member_layout>
