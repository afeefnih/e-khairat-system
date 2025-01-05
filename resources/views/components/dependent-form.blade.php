<div>
    <h1 class="text-2xl font-bold mb-6">Kemaskini Tangungan</h1>

    <!-- Add New Dependent Section -->
    <form method="POST" action="{{ $action }}" class="space-y-6">
        @csrf

        <h2 class="text-lg font-semibold mb-4">Tambah Tangungan Baru</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Dependent Name -->
            <div>
                <label for="dependent_full_name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                <input
                    type="text"
                    name="dependent_full_name[]"
                    id="dependent_full_name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    placeholder="Masukkan nama tangungan"
                    required>
            </div>

            <!-- Relationship -->
            <div>
                <label for="dependent_relationship" class="block text-gray-700 font-medium mb-2">Hubungan</label>
                <select
                    name="dependent_relationship[]"
                    id="dependent_relationship"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    required>
                    <option value="" disabled selected>Pilih Hubungan</option>
                    <option value="Father">Bapa</option>
                    <option value="Mother">Ibu</option>
                    <option value="Sibling">Adik/Abang/Kakak</option>
                    <option value="Spouse">Pasangan</option>
                    <option value="Child">Anak</option>
                </select>
            </div>

            <!-- IC Number -->
            <div>
                <label for="dependent_ic_num" class="block text-gray-700 font-medium mb-2">No Kad Pengenalan</label>
                <input
                    type="text"
                    name="dependent_ic_num[]"
                    id="dependent_ic_num"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    placeholder="Masukkan nombor KP"
                    required>
            </div>

            <!-- Age -->
            <div>
                <label for="dependent_age" class="block text-gray-700 font-medium mb-2">Umur</label>
                <input
                    type="number"
                    name="dependent_age[]"
                    id="dependent_age"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200"
                    placeholder="Masukkan umur"
                    required>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-6">
            <button type="reset" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md shadow-sm hover:bg-gray-400">
                Reset
            </button>
            <button type="submit" class="ml-4 px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700">
                Tambah Tangungan
            </button>
        </div>
    </form>

    <!-- Existing Dependents Section -->
    <h2 id="tambah-tanggungan" class="text-lg font-semibold mt-10 mb-4 ">Senarai Tangungan</h2>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Hubungan
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Umur
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombor KP
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tindakan
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($dependents as $dependent)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $dependent->full_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $dependent->relationship }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $dependent->age }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $dependent->ic_number }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('dependents.edit', $dependent->id) }}" class="text-blue-600 hover:text-blue-900">
                                Edit
                            </a>

                            <form action="{{ route('dependents.delete', $dependent->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tiada tanggungan yang didaftarkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

    <script>
    document.querySelectorAll('form[method="POST"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to delete this dependent?')) {
                e.preventDefault(); // Prevent form submission if user cancels
            }
        });
    });


</script>
