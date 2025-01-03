<x-member_layout>
    <div class="pl-[10px] pt-5 bg-gray-100 min-h-screen">
        <div class="px-[170px] py-10">
            <div class="text-center text-black text-3xl font-bold">Kemaskini Ahli</div>
            <div class="text-center text-black text-base font-normal mt-2">
                Fill in the required information to update your profile.
            </div>
        </div>
        <div class="px-[170px] py-10 bg-white shadow-md rounded-md max-w-7xl mx-auto">
            @include('components.profile-form', [
                'action' => route('profile.update'),
                'method' => 'POST',
                'user' => $user
            ])
        </div>

        <div class="px-[170px] py-10">
            <div class="text-center text-black text-3xl font-bold">Kemaskini Tangungan</div>
            <div class="text-center text-black text-base font-normal mt-2">
                Fill in the required information to update your dependents.
            </div>
        </div>
        <div class="px-[170px] py-10 bg-white shadow-md rounded-md max-w-7xl mx-auto">
            @include('components.dependent-form', [
                'action' => route('Newdependent.store', auth()->user()->id),
                'dependents' => $dependents
            ])
        </div>
    </div>
</x-member_layout>
