<x-guest_layout>
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-5">Invoice</h1>

        <!-- User Information -->
        <div class="bg-gray-100 p-6 rounded-md shadow-md mb-6">
            <h2 class="text-xl font-bold mb-3">Maklumat Ahli</h2>
            <p><strong>Nama:</strong> {{ $user->full_name }}</p>
            <p><strong>No. KP:</strong> {{ $user->ic_num }}</p>
            <p><strong>Emel:</strong> {{ $user->email }}</p>
            <p><strong>Telefon:</strong> {{ $user->tel_num }}</p>
            <p><strong>Alamat:</strong> {{ $user->address }}</p>
            <p><strong>Taraf Permastautin:</strong> {{ $user->residency_stat }}</p>
        </div>

        <!-- Dependents -->
        <div class="bg-gray-100 p-6 rounded-md shadow-md mb-6">
            <h2 class="text-xl font-bold mb-3">Maklumat Tangungan</h2>
            <table class="min-w-full divide-y divide-gray-200 table-auto">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pertalian</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.KP</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Umur</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($dependents as $dependent)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $dependent->full_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $dependent->relationship }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $dependent->ic_number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $dependent->age }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Fee Summary -->
        <div class="bg-gray-100 p-6 rounded-md shadow-md mb-6">
            <h2 class="text-xl font-bold mb-3">Makluman Yuran</h2>
            <p><strong>Yuran Pendaftaran:</strong> RM {{ number_format($registrationFee, 2) }}</p>
        </div>

        <!-- Agreement and Submit -->
        <form action="{{ route('invoice.process', $user->id) }}" method="POST">
            @csrf
            <div class="flex items-center mb-6">
                <input
                    type="checkbox"
                    name="agree"
                    id="agree"
                    class="mr-2"
                    required
                >
                <label for="agree" class="text-gray-700">Saya bersetuju dengan Polisi & Syarat e-Khairat.</label>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    Daftar
                </button>
            </div>
        </form>
    </div>
</x-guest_layout>
