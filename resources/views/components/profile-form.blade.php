@props([
    'action' => '#', // Form submission URL
    'method' => 'POST', // HTTP method
    'user' => null, // Pass the user model (optional)
])

<form method="{{ $method === 'GET' ? 'GET' : 'POST' }}" action="{{ $action }}">
    @csrf
    @if ($method !== 'GET')
        @method($method)
    @endif

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Full Name -->
        <div>
            <label for="full_name" class="block text-gray-700 font-medium mb-2">Full Name</label>
            <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $user?->full_name ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                required>
            @error('full_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user?->email ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                required>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- IC Number -->
        <div>
            <label for="ic_number" class="block text-gray-700 font-medium mb-2">IC Number</label>
            <input type="text" name="ic_number" id="ic_number" value="{{ old('ic_number', $user?->ic_num ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                required>
            @error('ic_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Age -->
        <div>
            <label for="age" class="block text-gray-700 font-medium mb-2">Age</label>
            <input type="number" name="age" id="age" value="{{ old('age', $user?->age ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                required>
            @error('age')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password and Confirm Password: Only visible when creating a new user -->
        @if (!$user)
            <div>
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        @endif

        <!-- Phone Number -->
        <div>
            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $user?->tel_num ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                required>
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- House Phase -->
        <div>
            <label for="house_num" class="block text-gray-700 font-medium mb-2">House Phase</label>
            <input type="text" name="house_num" id="house_num"
                value="{{ old('house_num', $user?->house_num ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200">
            @error('house_num')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Address -->
        <div class="col-span-1 md:col-span-2">
            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
            <textarea name="address" id="address" rows="3"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200" required>{{ old('address', $user?->address ?? '') }}</textarea>
            @error('address')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Residency Status -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Residency Status</label>
            <div class="flex items-center space-x-4">
                <label class="flex items-center">
                    <input type="radio" name="residency_stat" value="permanent"
                        {{ old('residency_stat', $user?->residency_stat) === 'permanent' ? 'checked' : '' }}
                        class="form-radio text-green-600">
                    <span class="ml-2">Tetap</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="residency_stat" value="tenant"
                        {{ old('residency_stat', $user?->residency_stat) === 'tenant' ? 'checked' : '' }}
                        class="form-radio text-green-600">
                    <span class="ml-2">Penyewa</span>
                </label>
            </div>
            @error('residency_stat')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Buttons -->
    <div class="mt-10 flex justify-end space-x-4">
        <button type="reset" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-200">
            Reset
        </button>
        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
            Save Changes
        </button>
    </div>
</form>
