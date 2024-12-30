<x-guest_layout>

 <!-- Login Page Content -->
 <div class="flex flex-col justify-center items-center px-6 py-16 space-y-16">
    <!-- Header Section -->
    <div class="text-center space-y-4">
        <h1 class="text-3xl font-bold leading-tight">
            Selamat Datang ke E-Khairat Masjid Taman Sutera
        </h1>
        <p class="text-base text-gray-600">
            Log Masuk Akaun E-Khairat Anda
        </p>
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('Login.post') }}" class="w-full max-w-lg flex flex-col space-y-6">
        @csrf

        <!-- IC Number -->
        <div class="flex flex-col space-y-1">
            <label for="ic_number" class="text-sm font-medium text-gray-700">IC Number</label>
            <input type="text" name="ic_number" id="ic_number" value="{{ old('ic_number') }}" required
                class="px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                placeholder="Enter your IC number">
            <!-- Error Message for IC Number -->
            @error('ic_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="flex flex-col space-y-1">
            <label for="password" class="text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" required
                class="px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                placeholder="Enter your password">
            <!-- Error Message for Password -->
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

                <!-- Login Button -->
                <div class="flex space-x-4">
                    <a href="{{ route('StepAll') }}"
                        class="w-1/2 text-center py-2 border border-gray-700 rounded-lg text-gray-700 hover:bg-gray-100">
                        Pendaftaran
                    </a>
                    <button type="submit" class="w-1/2 py-2 bg-black text-white rounded-lg hover:bg-gray-800">
                        Log Masuk
                    </button>
                </div>
        </form>
    </div>



</x-guest_layout>
