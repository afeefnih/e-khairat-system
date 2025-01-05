<x-member_layout>
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-8 shadow-md rounded-md">
            <h1 class="text-2xl font-bold mb-6">Tukar Katalaluan</h1>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('password.change') }}" method="POST">
                @csrf

                <!-- Current Password -->
                <div class="mb-4">
                    <label for="current_password" class="block text-gray-700 font-medium mb-2">Katalaluan Semasa</label>
                    <input type="password" name="current_password" id="current_password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                        required>
                    @error('current_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 font-medium mb-2">Katalaluan Baru</label>
                    <input type="password" name="new_password" id="new_password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                        required>
                    @error('new_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm New Password -->
                <div class="mb-4">
                    <label for="new_password_confirmation" class="block text-gray-700 font-medium mb-2">Sahkan Katalaluan Baru</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                        required>
                    @error('new_password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Tukar Katalaluan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-member_layout>
