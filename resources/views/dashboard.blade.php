<x-member_layout>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Welcome Section -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Welcome to Your Dashboard!</h2>
                    <p class="mt-4 text-gray-600">
                        Here you can manage your profile, check recent activities, and more.
                    </p>
                </div>

                <!-- User Info Section -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Your Details</h2>
                    <ul class="mt-4 text-gray-600 space-y-2">
                        <li><strong>Full Name:</strong> {{ auth()->user()->Full_Name }}</li>
                        <li><strong>Email:</strong> {{ auth()->user()->Email }}</li>
                        <li><strong>IC Number:</strong> {{ auth()->user()->IC_Num }}</li>
                        <li><strong>Phone:</strong> {{ auth()->user()->Tel_Num }}</li>
                        <li><strong>Residency Status:</strong> {{ auth()->user()->Residency_Stat }}</li>
                        <li><strong>Age:</strong> {{ auth()->user()->Age }}</li>
                    </ul>
                </div>

                <!-- Recent Activities Placeholder -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Recent Activities</h2>
                    <p class="mt-4 text-gray-600">No recent activities to display yet.</p>
                </div>

                <!-- Placeholder for Additional Widgets -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Quick Links</h2>
                    <ul class="mt-4 text-gray-600 space-y-2">
                        <li><a href="#" class="text-blue-500 hover:underline">Update Profile</a></li>
                        <li><a href="#" class="text-blue-500 hover:underline">View Payments</a></li>
                        <li><a href="#" class="text-blue-500 hover:underline">Make a Donation</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-member_layout>
