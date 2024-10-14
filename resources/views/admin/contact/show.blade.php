<x-dashboard-layout>
    @section('title')
        Cities
    @endsection
    <div class="flex justify-center">
        <span class="me-3 text-3xl mt-1">
            <ion-icon name="mail-outline"></ion-icon>
        </span>
        <p class="uppercase font-bold text-3xl">message</p>
    </div>
    <div class="flex">
        <div class="me-20">
            <p class="text-lg font-semibold py-2">Name</p>
            <p class="text-lg font-semibold py-2">Email</p>
            <p class="text-lg font-semibold py-2">Phone</p>
            <p class="text-lg font-semibold py-2">Message</p>

        </div>
        <div class="w-3/6">
            <p class="text-lg py-2">{{ $contact->name }}</p>
            <div class="flex justify-start py-2">
                <p class="text-lg">{{ $contact->email }}
                </p>
                <span class="mt-2 gap-3 ms-3">
                    <a href="mailto:{{ $contact->email }}" class=" pt-3 mt-3">
                        <ion-icon name="mail-outline" class=" text-lg"></ion-icon>
                    </a>
                </span>
            </div>

            <p class="text-lg py-2">{{ $contact->phone }}</p>
            <p class="text-lg py-2">{{ $contact->message }}</p>
        </div>
    </div>
</x-dashboard-layout>
