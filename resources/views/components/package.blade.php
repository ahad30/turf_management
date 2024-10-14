<div class="mt-3">

    <input type="radio" name="package" class="hidden peer package" id="package-{{ $packageId }}"
        value="{{ $packageId }}" />
    <label for="package-{{ $packageId }}"
        class="shadow rounded w-full flex items-center p-3 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary">
        <div class="right w-[50%] ">
            <div class="flex">
                <img src="https://ui-avatars.com/api/?background=fff&color=05c46b&name={{ $image }}"
                    alt="" class="w-10 h-10 mr-4 rounded-full ring-2 ring-primary" />
                <div class="flex flex-col text-sm font-semibold gap-y-2">
                    <h4> {{ $title }}</h4>
                    <div class="flex item-start">
                        <p class="bg-yellow-200 text-red-800 inline-block rounded-full text-xs p-[3px] px-3">
                            {{ $duration }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="left w-[50%]  text-end text-2xl text-primary font-medium">
            <h3>৳{{ $amount }}</h3>
        </div>
    </label>

</div>
