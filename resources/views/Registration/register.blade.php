<x-guest_layout>
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="px-[170px] py-10">
            <div class="text-center text-black text-3xl font-bold">Daftar Ahli Baru</div>
            <div class="text-center text-black text-base font-normal mt-2">
                Fill in the required information to create your account.
            </div>
        </div>
        <div class="px-[170px] py-10 bg-white shadow-md rounded-md max-w-7xl mx-auto">
            @include('components.profile-form', [
                'action' => route('register.post'),
                'method' => 'POST',
                'user' => null
            ])
        </div>
    </div>
</x-guest_layout>
