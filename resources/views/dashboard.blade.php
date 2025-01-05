<x-member_layout>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        <!-- Success Message -->


        <!-- Main Content -->
        <div class="flex-grow p-6">
            <!-- Welcome Section -->
            <div class="bg-black/60 p-6 rounded-lg flex flex-wrap items-center gap-6 text-center md:text-left">
                <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto md:mx-0"></div>
                <div class="flex-grow">
                    <h2 class="text-white text-2xl font-bold">{{ auth()->user()->full_name }}</h2>
                    <div class="flex flex-wrap justify-center md:justify-start gap-2 mt-2">
                        <div class="px-2 py-1 bg-gray-200 rounded text-black text-xs">Customer</div>
                        <div class="px-2 py-1 bg-gray-200 rounded text-black text-xs">Premium</div>
                    </div>
                    <p class="text-white mt-2 text-sm">Selamat datang ke papan pemuka peribadi anda!.</p>
                </div>
                <div>
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-700">
                        Edit Profile
                    </a>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="mt-8 flex flex-wrap gap-4">
                <!-- Payment Summary -->
                <div class="flex-1 p-4 bg-white border rounded-md shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Jumlah Bayaran (RM)</h3>
                    <p class="text-black text-2xl font-medium mt-2">100</p>
                </div>
                <div class="flex-1 p-4 bg-white border rounded-md shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Jumlah Tunggakan (RM)</h3>
                    <p class="text-black text-2xl font-medium mt-2">00</p>
                </div>
            </div>

            <!-- Recent Payments Section -->
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800">Recent Payments</h3>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full bg-white border rounded-md">
                        <thead class="bg-gray-100 text-gray-600 text-sm">
                            <tr>
                                <th class="py-2 px-4 text-left">Yuran</th>
                                <th class="py-2 px-4 text-left">Jumlah (RM)</th>
                                <th class="py-2 px-4 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800 text-sm">
                            <tr>
                                <td class="py-2 px-4">Pendaftaran</td>
                                <td class="py-2 px-4">100</td>
                                <td class="py-2 px-4">
                                    <span class="px-2 py-1 bg-green-500 text-white rounded-md">Successful</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4">Kutipan 2025</td>
                                <td class="py-2 px-4">50</td>
                                <td class="py-2 px-4">
                                    <span class="px-2 py-1 bg-green-500 text-white rounded-md">Successful</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-member_layout>
