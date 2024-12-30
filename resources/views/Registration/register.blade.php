<x-guest_layout>
    <div class="w-full min-h-screen bg-white flex flex-col justify-center items-center pt-12">
        <!-- Registration Form -->
        <form method="POST" action="{{route('register.post')}}" class="w-[520px] space-y-4">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="full_name" class="text-sm font-medium text-black leading-tight">Full Name</label>
                <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                @error('full_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="text-sm font-medium text-black leading-tight">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email address" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="text-sm font-medium text-black leading-tight">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a secure password" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="text-sm font-medium text-black leading-tight">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
            </div>

            <!-- IC Number -->
            <div>
                <label for="ic_number" class="text-sm font-medium text-black leading-tight">IC Number</label>
                <input type="text" name="ic_number" id="ic_number" value="{{ old('ic_number') }}" placeholder="Enter your IC number" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                @error('ic_number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="text-sm font-medium text-black leading-tight">Address</label>
                <textarea name="address" id="address" placeholder="Enter your address" class="w-full p-4 border border-gray-300 rounded-md mt-2" required>{{ old('address') }}</textarea>
                @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="text-sm font-medium text-black leading-tight">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter your phone number" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- House Number -->
            <div>
                <label for="house_num" class="text-sm font-medium text-black leading-tight">House Number</label>
                <input type="text" name="house_num" id="house_num" value="{{ old('house_num') }}" placeholder="Enter your house number" class="w-full p-4 border border-gray-300 rounded-md mt-2" />
                @error('house_num') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Residency Status -->
            <div>
                <label for="residency_stat" class="text-sm font-medium text-black leading-tight">Residency Status</label>
                <select name="residency_stat" id="residency_stat" class="w-full p-4 border border-gray-300 rounded-md mt-2">
                    <option value="permanent">Permanent</option>
                    <option value="tenant">Tenant</option>
                </select>
                @error('residency_stat') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Age -->
            <div>
                <label for="age" class="text-sm font-medium text-black leading-tight">Age</label>
                <input type="number" name="age" id="age" value="{{ old('age') }}" placeholder="Enter your age" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                @error('age') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 bg-[#5e9943] text-white rounded-md hover:bg-[#4a7b32]">
                    Register
                </button>
            </div>
        </form>
    </div>
</x-guest_layout>
