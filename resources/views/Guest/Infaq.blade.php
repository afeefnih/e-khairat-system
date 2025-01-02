<x-guest_layout>
    <!-- Content Section -->

     <!-- Display Success or Error Messages -->
     @if (session('success'))
     <div class="p-4 bg-green-100 text-green-800 rounded-md mb-4">
         {{ session('success') }}
     </div>
 @elseif (session('error'))
     <div class="p-4 bg-red-100 text-red-800 rounded-md mb-4">
         {{ session('error') }}
     </div>
 @endif

    <div class="self-stretch px-[170px] py-[60px] justify-center items-center gap-[60px] inline-flex overflow-hidden">

        <div class="grow shrink basis-0 flex-col justify-start items-start gap-6 inline-flex">
            <div class="self-stretch text-black text-[40px] font-bold leading-[48px]">Infaq Badan Khairat Kebajikan</div>
            <div class="self-stretch text-black text-base font-normal leading-normal">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            </div>
        </div>
        <div class="grow shrink basis-0 h-[400px] justify-start items-start flex overflow-hidden">
            <div class="h-[400px] px-[110px] py-[50px] bg-[#d8d8d8]/50 justify-center items-center flex">
                <img class="w-[300px] h-[300px]" src="https://via.placeholder.com/300x300" />
            </div>
        </div>
    </div>

    <!-- Donation Section -->
    <div class="self-stretch px-[170px] py-[60px] justify-center items-center gap-[60px] inline-flex overflow-hidden">
        <div class="grow shrink basis-0 flex-col justify-start items-start gap-6 inline-flex">
            <div class="self-stretch text-black text-[40px] font-bold leading-[48px]">Make a Donation</div>
            <div class="self-stretch text-black text-base font-normal leading-normal">Choose the amount you wish to donate</div>



            <!-- Donation Form -->
            <form method="POST" action="{{ route('donation.process') }}" class="self-stretch">
                @csrf
                <!-- Donation Amount -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Select Amount:</label>
                    <div class="flex gap-4">
                        <label>
                            <input type="radio" name="amount" value="10" required>
                            <span class="ml-2">RM 10</span>
                        </label>
                        <label>
                            <input type="radio" name="amount" value="20" required>
                            <span class="ml-2">RM 20</span>
                        </label>
                        <label>
                            <input type="radio" name="amount" value="50" required>
                            <span class="ml-2">RM 50</span>
                        </label>
                        <label>
                            <input type="radio" name="amount" value="100" required>
                            <span class="ml-2">RM 100</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-between">
                    <a href="{{ route('Utama') }}" class="py-2 px-4 border rounded-md bg-gray-100 hover:bg-gray-200 text-gray-700">Cancel</a>
                    <button type="submit" class="py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Donate Now</button>
                </div>
            </form>
        </div>
    </div>
</x-guest_layout>
