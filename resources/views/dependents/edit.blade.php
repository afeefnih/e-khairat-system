<x-member_layout>
    <div class="px-[170px] py-10">
        <h1 class="text-2xl font-bold mb-6">Edit Dependent</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('dependents.update', $dependent->id) }}">
            @csrf
            @method('PUT')

            <!-- Full Name -->
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 font-medium">Full Name</label>
                <input
                    type="text"
                    name="full_name"
                    id="full_name"
                    value="{{ old('full_name', $dependent->full_name) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    required>
                @error('full_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Relationship -->
            <div class="mb-4">
                <label for="relationship" class="block text-gray-700 font-medium">Relationship</label>
                <input
                    type="text"
                    name="relationship"
                    id="relationship"
                    value="{{ old('relationship', $dependent->relationship) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    required>
                @error('relationship')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- IC Number -->
            <div class="mb-4">
                <label for="ic_number" class="block text-gray-700 font-medium">IC Number</label>
                <input
                    type="text"
                    name="ic_number"
                    id="ic_number"
                    value="{{ old('ic_number', $dependent->ic_number) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    required>
                @error('ic_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Age -->
            <div class="mb-4">
                <label for="age" class="block text-gray-700 font-medium">Age</label>
                <input
                    type="number"
                    name="age"
                    id="age"
                    value="{{ old('age', $dependent->age) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    required>
                @error('age')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md shadow-sm hover:bg-gray-400">
                    Cancel
                </a>
                <button type="submit" class="ml-4 px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-member_layout>
