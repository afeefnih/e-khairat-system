<x-guest_layout>

    <div class="px-[170px] py-[60px] flex justify-center">
        <div class="flex flex-col items-center gap-6">
            <h1 class="w-[520px] text-center text-black text-[40px] font-bold leading-[48px]">Pendaftaran Akaun</h1>
            <p class="w-[520px] text-center text-black text-base font-normal">Fill in the required information to create your account.</p>
        </div>
    </div>
    <div class="px-[170px] py-[10px] flex justify-center">
        <div class="w-[514px] h-[125.94px] relative">
            <div class="flex justify-between">
                <div class="relative w-[150px]">
                    <div class="text-center text-[#111010] text-[32px] font-bold leading-[48px]">Langkah 1</div>
                    <div class="w-[71.88px] h-[71.88px] mx-auto mt-[6.06px] bg-[#ebebeb] rounded-[50px]"></div>

                </div>
                <div class="relative w-[150px]">
                    <div class="text-center text-[#111010] text-[32px] font-bold leading-[48px]">Langkah 2</div>
                    <div class="w-[71.88px] h-[71.88px] mx-auto mt-[6.06px] bg-[#416aa0]/50 rounded-[50px]"></div>
                </div>
                <div class="relative w-[150px]">
                    <div class="text-center text-[#111010] text-[32px] font-bold leading-[48px]">Langkah 3</div>
                    <div class="w-[71.88px] h-[71.88px] mx-auto mt-[6.06px] bg-[#ebebeb] rounded-[50px]"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Member Information Section --}}
    <div class="px-[170px] py-[10px] flex justify-center">
        <h2 class="text-center text-black text-[32px] font-bold leading-[48px]">Maklumat Ahli</h2>
    </div>

    {{-- Registration Form --}}
    <div class="px-[170px] py-[60px]">
        <form action="#" method="POST" class="max-w-[817px] mx-auto">
            @csrf

            <div class="flex gap-20 mb-10">
                <div class="w-[520px]">
                    <label for="ic_number" class="block text-sm font-medium mb-1">IC Number</label>
                    <input type="text" id="ic_number" name="ic_number"
                           class="w-full px-3 py-2 rounded-md border @error('ic_number') border-red-500 @else border-black/10 @enderror"
                           placeholder="Enter your IC number"
                           value="{{ old('ic_number') }}">
                    @error('ic_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-[217px]">
                    <label for="age" class="block text-sm font-medium mb-1">Umur</label>
                    <input type="number" id="age" name="age"
                           class="w-full px-3 py-2 rounded-md border @error('age') border-red-500 @else border-black/10 @enderror"
                           value="{{ old('age') }}">
                    @error('age')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-20 mb-10">
                <div class="w-[311px]">
                    <label for="home_phone" class="block text-sm font-medium mb-1">No. Telefon Rumah</label>
                    <input type="tel" id="home_phone" name="home_phone"
                           class="w-full px-3 py-2 rounded-md border @error('home_phone') border-red-500 @else border-black/10 @enderror"
                           placeholder="Enter your Phone Number"
                           value="{{ old('home_phone') }}">
                    @error('home_phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-[311px]">
                    <label for="mobile_phone" class="block text-sm font-medium mb-1">No. Telefon H/P</label>
                    <input type="tel" id="mobile_phone" name="mobile_phone"
                           class="w-full px-3 py-2 rounded-md border @error('mobile_phone') border-red-500 @else border-black/10 @enderror"
                           placeholder="Enter your Phone Number"
                           value="{{ old('mobile_phone') }}">
                    @error('mobile_phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-10">
                <div class="w-[561px]">
                    <label for="address" class="block text-sm font-medium mb-1">Address</label>
                    <textarea id="address" name="address"
                            class="w-full px-3 py-2 h-[101px] rounded-md border @error('address') border-red-500 @else border-black/10 @enderror"
                            placeholder="Enter your residential address">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-10">
                <label class="block text-sm font-medium mb-1">Taraf Pemastautin</label>
                <div class="flex gap-1">
                    <div class="px-[19px] flex items-center gap-2">
                        <input type="radio" id="status_tetap" name="resident_status" value="tetap"
                               class="w-6 h-6" {{ old('resident_status') == 'tetap' ? 'checked' : '' }}>
                        <label for="status_tetap" class="text-sm">Tetap</label>
                    </div>
                    <div class="px-[19px] flex items-center gap-2">
                        <input type="radio" id="status_penyewa" name="resident_status" value="penyewa"
                               class="w-6 h-6" {{ old('resident_status') == 'penyewa' ? 'checked' : '' }}>
                        <label for="status_penyewa" class="text-sm">Penyewa</label>
                    </div>
                </div>
                @error('resident_status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 w-[492px]">
                <button type="reset" class="w-60 p-3 rounded-lg border border-black font-medium">
                    Reset
                </button>
                <button type="submit" class="w-60 p-3 rounded-lg bg-[#5e9943] text-white font-medium">
                    Next
                </button>
            </div>
        </form>
    </div>
</x-guest_layout>
