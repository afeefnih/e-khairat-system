<x-guest_layout>
    {{-- Title Section --}}
    <div class="px-[170px] py-[60px] flex justify-center">
        <div class="flex flex-col items-center gap-6">
            <h1 class="w-[520px] text-center text-black text-[40px] font-bold leading-[48px]">Pendaftaran Akaun</h1>
            <p class="w-[520px] text-center text-black text-base font-normal">Fill in the required information to create your account.</p>
        </div>
    </div>

    {{-- Step Indicator --}}
    <div class="px-[170px] py-[10px] flex justify-center">
        <div class="w-[514px] h-[125.94px] relative">
            <div class="flex justify-between">
                <div class="relative w-[150px]">
                    <div class="text-center text-[#111010] text-[32px] font-bold leading-[48px]">Langkah 1</div>
                    <div class="w-[71.88px] h-[71.88px] mx-auto mt-[6.06px] bg-[#ebebeb] rounded-[50px]"></div>

                </div>
                <div class="relative w-[150px]">
                    <div class="text-center text-[#111010] text-[32px] font-bold leading-[48px]">Langkah 2</div>
                    <div class="w-[71.88px] h-[71.88px] mx-auto mt-[6.06px] bg-[#ebebeb] rounded-[50px]"></div>
                </div>
                <div class="relative w-[150px]">
                    <div class="text-center text-[#111010] text-[32px] font-bold leading-[48px]">Langkah 3</div>
                    <div class="w-[71.88px] h-[71.88px] mx-auto mt-[6.06px]  bg-[#416aa0]/50  rounded-[50px]"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="h-[920px] px-[170px] py-[60px] justify-center items-center gap-[60px] inline-flex overflow-hidden">
        <div class="grow shrink basis-0 flex-col justify-center items-start gap-10 inline-flex">
            <!-- Step information -->
            <div class="self-stretch justify-start items-start gap-20 inline-flex">
                <div class="w-14 h-14 relative">
                    <div class="w-14 h-14 left-0 top-0 absolute bg-[#1a1a1a] rounded-full"></div>
                    <div class="w-6 h-6 left-[16px] top-[16px] absolute overflow-hidden"></div>
                </div>
                <div class="text-black text-sm font-bold font-['Roboto'] leading-tight">Klik + sekiranya ada tanggungan</div>
            </div>

            <!-- Form Fields Section -->
            <form method="POST" action="#" class="w-full space-y-8">
                @csrf
                <!-- Full Name -->
                <div class="self-stretch justify-start items-start gap-20 inline-flex">
                    <div class="w-[520px] flex-col justify-center items-start gap-1 inline-flex overflow-hidden">
                        <div class="self-stretch text-black text-sm font-medium font-['Roboto'] leading-tight">Nama</div>
                        <input type="text" name="full_name" placeholder="Enter your full name" class="w-full p-4 border border-gray-300 rounded-md mt-2" required>
                    </div>
                </div>

                <!-- Relationship -->
                <div class="self-stretch justify-start items-start gap-20 inline-flex">
                    <div class="w-[447px] flex-col justify-center items-start gap-1 inline-flex overflow-hidden">
                        <div class="self-stretch text-black text-sm font-medium font-['Roboto'] leading-tight">Hubungan</div>
                        <select name="relationship" class="w-full h-12 bg-white rounded border border-[#b3b3b3]">
                            <option selected disabled>Choose</option>
                            <option value="ahli">AHLI</option>
                            <option value="kerabat">KERABAT</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>

                <!-- IC Number -->
                <div class="self-stretch justify-start items-start gap-20 inline-flex">
                    <div class="w-[520px] flex-col justify-center items-start gap-1 inline-flex overflow-hidden">
                        <div class="self-stretch text-black text-sm font-medium font-['Roboto'] leading-tight">IC Number</div>
                        <input type="text" name="ic_number" placeholder="Enter your IC number" class="w-full p-4 border border-gray-300 rounded-md mt-2" required>
                    </div>
                </div>

                <!-- Family Information Section -->
                <div class="self-stretch justify-start items-start gap-20 inline-flex">
                    <div class="w-[1100px] h-[226px] flex-col justify-start items-start inline-flex">
                        <div class="self-stretch h-[180px] bg-white rounded border border-[#5b5b5b] flex-col justify-start items-start flex overflow-hidden">
                            <!-- First row of fields (Name) -->
                            <div class="self-stretch bg-white/0 justify-start items-start inline-flex overflow-hidden">
                                <div class="grow shrink basis-0 self-stretch bg-white/5 border-t border-[#b9b9b9] flex-col justify-start items-start inline-flex">
                                    <div class="self-stretch px-3 py-2.5 justify-start items-start inline-flex overflow-hidden">
                                        <div class="grow shrink basis-0 text-[#1e1e1e] text-xs font-semibold font-['Roboto'] leading-none">Nama</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Continue other rows like above (Pertalian, Umur, No. KP) -->
                            <!-- Add these fields dynamically with input boxes -->
                        </div>
                    </div>
                </div>

                <!-- Submit and Reset buttons -->
                <div class="w-[492px] justify-end items-baseline gap-3 inline-flex overflow-hidden">
                    <button type="reset" class="w-60 p-3 rounded-lg border border-black flex-col justify-center items-center inline-flex">
                        <div class="text-black text-base font-medium font-['Roboto'] leading-normal">Reset</div>
                    </button>
                    <button type="submit" class="w-60 p-3 bg-[#5e9943] rounded-lg flex-col justify-center items-center inline-flex">
                        <div class="text-white text-base font-medium font-['Roboto'] leading-normal">Submit</div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest_layout>
