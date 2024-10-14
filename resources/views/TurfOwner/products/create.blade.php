<x-dashboard-layout>
    @section('title')
        Create Product
    @endsection

    <div class="w-full mt-4 mb-8 flex justify-between">
        <a href="{{ route('turf-owner.products.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">All
            Products</a>
    </div>
    @include('alerts.alert')

    <form action="{{ route('turf-owner.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Create New Product
            </h4>
            <div class="grid gird-cols-1 lg:grid-cols-2 gap-6">
                <!--  Select Turf -->
                <div>
                    <x-input-label for="name" :value="__(' Select Branch')" />
                    <select id="branch" name="branch_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option selected value="">Choose a Branch</option>
                        @foreach ($branches as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>


                <!-- Type -->
                <div>
                    <x-input-label for="name" :value="__(' Select Product Type')" />
                    <select id="type" name="type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option selected value="">Choose a Type</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Cricket ball">Cricket ball</option>
                        <option value="Football">Football</option>
                        <option value="Shoes">Shoes</option>
                        <option value="Cricket Bat">Cricket Bat</option>
                        <option value="Net">Net</option>
                    </select>
                    <x-input-error :messages="$errors->get('size')" class="mt-2" />
                </div>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Product Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Price -->
                <div>
                    <x-input-label for="name" :value="__('Product Price')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="number" name="price"
                        :value="old('name')" autofocus />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!--  Select Color -->
                <div>
                    <x-input-label for="name" :value="__(' Select Color')" />
                    <select id="color" name="color"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option selected>Choose a Color</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                        <option value="Blue">Blue</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Cyan">Cyan</option>
                        <option value="Pink">Pink</option>
                        <option value="Purple">Purple</option>
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                        <option value="Megenta">Megenta</option>
                        <option value="Gradient">Gradient</option>
                    </select>
                    <x-input-error :messages="$errors->get('color')" class="mt-2" />
                </div>

                <!-- Size -->
                <div>
                    <x-input-label for="name" :value="__(' Select Size')" />
                    <select id="size" name="size"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option selected>Choose a Size</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        <option value="XXXL">XXXL</option>
                    </select>
                    <x-input-error :messages="$errors->get('size')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="quantity" :value="__('Quantity')" />
                    <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity"
                        :value="old('quantity')" autofocus />
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="image" :value="__('Product Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                        :value="old('image')" autofocus />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

            </div>
            <div class="my-4 text-right">
                <x-primary-button class="">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
