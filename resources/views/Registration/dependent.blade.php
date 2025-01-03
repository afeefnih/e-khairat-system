<x-guest_layout>
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-5">Add Dependents for {{ $user->full_name }}</h1>

        <form action="{{ route('dependent.store', $user->id) }}" method="POST">
            @csrf

            <div id="dependent-section">
                <div class="dependent-item mb-4">
                    <h2 class="text-xl font-semibold mb-2">Dependent 1</h2>
                    <div class="mb-2">
                        <label for="dependent_full_name[]" class="block text-gray-700">Full Name</label>
                        <input type="text" name="dependent_full_name[]" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div class="mb-2">
                        <label for="dependent_relationship[]" class="block text-gray-700">Relationship</label>
                        <input type="text" name="dependent_relationship[]" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div class="mb-2">
                        <label for="dependent_age[]" class="block text-gray-700">Age</label>
                        <input type="number" name="dependent_age[]" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div class="mb-2">
                        <label for="dependent_ic_num[]" class="block text-gray-700">IC Number</label>
                        <input type="text" name="dependent_ic_num[]" class="w-full p-2 border rounded-md" required>
                    </div>
                </div>
            </div>

            <button type="button" id="add-more" class="bg-green-500 text-white px-4 py-2 rounded-md">Add Another Dependent</button>

            <div class="mt-5">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-more').addEventListener('click', function () {
            const section = document.getElementById('dependent-section');
            const newDependent = `
                <div class="dependent-item mb-4">
                    <h2 class="text-xl font-semibold mb-2">Dependent</h2>
                    <div class="mb-2">
                        <label for="dependent_full_name[]" class="block text-gray-700">Full Name</label>
                        <input type="text" name="dependent_full_name[]" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div class="mb-2">
                        <label for="dependent_relationship[]" class="block text-gray-700">Relationship</label>
                        <input type="text" name="dependent_relationship[]" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div class="mb-2">
                        <label for="dependent_age[]" class="block text-gray-700">Age</label>
                        <input type="number" name="dependent_age[]" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div class="mb-2">
                        <label for="dependent_ic_num[]" class="block text-gray-700">IC Number</label>
                        <input type="text" name="dependent_ic_num[]" class="w-full p-2 border rounded-md" required>
                    </div>
                </div>`;
            section.insertAdjacentHTML('beforeend', newDependent);
        });
    </script>
</x-guest_layout>
