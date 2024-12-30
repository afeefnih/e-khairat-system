<x-guest_layout>
    <!-- Dependent Form -->
    <div class="w-full min-h-screen bg-white flex flex-col justify-center items-center py-12">
        <!-- Title Section -->
        <div class="w-[520px] text-center">
            <h1 class="text-4xl font-bold text-black leading-tight">
                Add Dependents
            </h1>
            <p class="text-base font-normal text-black mt-4">
                Please fill in the details of your dependents.
            </p>
        </div>

        <!-- Dependent Form -->
        <form method="POST" action="{{ route('register.step4') }}" class="w-[520px] space-y-4 mt-8">
            @csrf

            <!-- Dependent Name -->
            <div>
                <label for="dependent_full_name" class="text-sm font-medium text-black leading-tight">Full Name</label>
                <input type="text" name="dependent_full_name[]" id="dependent_full_name" placeholder="Enter dependent's full name"
                    class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
            </div>

            <!-- Relationship -->
            <div>
                <label for="dependent_relationship" class="text-sm font-medium text-black leading-tight">Relationship</label>
                <input type="text" name="dependent_relationship[]" id="dependent_relationship" placeholder="Enter relationship"
                    class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
            </div>

            <!-- Dependent Age -->
            <div>
                <label for="dependent_age" class="text-sm font-medium text-black leading-tight">Age</label>
                <input type="number" name="dependent_age[]" id="dependent_age" placeholder="Enter dependent's age"
                    class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
            </div>

            <!-- Dependent IC Number -->
            <div>
                <label for="dependent_ic_number" class="text-sm font-medium text-black leading-tight">IC Number</label>
                <input type="text" name="dependent_ic_number[]" id="dependent_ic_number" placeholder="Enter IC number"
                    class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
            </div>

            <!-- Add More Dependents Button -->
            <div class="flex justify-end mt-4">
                <button type="button" id="add_dependent" class="px-4 py-2 bg-[#416aa0] text-white rounded-md">Add Another Dependent</button>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('register.step2') }}" class="text-sm text-blue-500 hover:underline">Back to Step 2</a>
                <button type="submit" class="px-6 py-2 bg-[#5e9943] text-white rounded-md hover:bg-[#4a7b32]">
                    Next
                </button>
            </div>
        </form>
    </div>

    <!-- JavaScript to dynamically add dependent fields -->
    <script>
        document.getElementById('add_dependent').addEventListener('click', function() {
            const form = document.querySelector('form');
            const newDependent = document.createElement('div');
            newDependent.classList.add('space-y-4', 'mt-4');

            newDependent.innerHTML = `
                <div>
                    <label for="dependent_full_name" class="text-sm font-medium text-black leading-tight">Full Name</label>
                    <input type="text" name="dependent_full_name[]" placeholder="Enter dependent's full name" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                </div>
                <div>
                    <label for="dependent_relationship" class="text-sm font-medium text-black leading-tight">Relationship</label>
                    <input type="text" name="dependent_relationship[]" placeholder="Enter relationship" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                </div>
                <div>
                    <label for="dependent_age" class="text-sm font-medium text-black leading-tight">Age</label>
                    <input type="number" name="dependent_age[]" placeholder="Enter dependent's age" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                </div>
                <div>
                    <label for="dependent_ic_number" class="text-sm font-medium text-black leading-tight">IC Number</label>
                    <input type="text" name="dependent_ic_number[]" placeholder="Enter IC number" class="w-full p-4 border border-gray-300 rounded-md mt-2" required />
                </div>
            `;

            form.insertBefore(newDependent, document.querySelector('.flex.justify-end.mt-4'));
        });
    </script>
</x-guest_layout>
