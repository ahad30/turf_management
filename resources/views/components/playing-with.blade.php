<div class="mx-auto max-w-screen-xl px-4 py-3 sm:px-6 lg:px-8">
    <div class="rounded-lg p-2 lg:p-6">
        <div class="mb-10">
            {{-- <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1> --}}
        </div>
        <x-card>
            <div class="mb-3 flex -mx-2">
                <div class="px-2">
                    <label for="type1" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="playing_status"
                            id="type1" value="0" checked>
                        <strong class="px-3">Play with friends</strong>
                    </label>
                </div>
                <div class="px-2">
                    <label for="type2" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="playing_status"
                            id="type2" value="1">
                        <strong class="px-3">Play with Others</strong>
                    </label>
                </div>
            </div>
        </x-card>
    </div>
</div>
