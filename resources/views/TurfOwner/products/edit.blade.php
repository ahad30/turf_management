<x-dashboard-layout>
    @section('title')
        Edit Product
    @endsection

    <div class="w-full mt-4 mb-8 flex justify-between">
        <a href="{{ route('turf-owner.products.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">All
            Product</a>
    </div>
    @include('alerts.alert')

    <form action="{{ route('turf-owner.products.update', ['product' => $product->id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Edit Product
            </h4>
            <div class="grid gird-cols-1 lg:grid-cols-2 gap-6">
                <!--  Select Branch -->
                <div>
                    <x-input-label for="name" :value="__(' Select Branch')" />
                    <select id="branch" name="branch_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option>Choose a Branch</option>
                        @foreach ($branches as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $product->branch_id) selected @endif>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>


                <!-- Type -->
                <div>
                    <x-input-label for="name" :value="__(' Select Product Type')" />
                    {{ $product->type }}
                    <select id="type" name="type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option>Choose a Type</option>
                        <option value="Jersey" @if ($product->type == 'Jersey') selected @endif>Jersey</option>
                        <option value="Cricket ball" @if ($product->type == 'Cricket ball') selected @endif>Cricket ball
                        </option>
                        <option value="Football" @if ($product->type == 'Football') selected @endif>Football</option>
                        <option value="Shoes" @if ($product->type == 'Shoes') selected @endif>Shoes</option>
                        <option value="Cricket Bat" @if ($product->type == 'Cricket Bat') selected @endif>Cricket Bat
                        </option>
                        <option value="Net" @if ($product->type == 'Net') selected @endif>Net</option>
                    </select>
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Product Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="$product->name" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Price -->
                <div>
                    <x-input-label for="name" :value="__('Product Price')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="number" name="price"
                        :value="$product->price" autofocus />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!--  Select Color -->
                <div>
                    <x-input-label for="name" :value="__(' Select Color')" />
                    <select id="color" name="color"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option>Choose a Color</option>
                        <option value="Red" @if ($product->type == 'Red') selected @endif>Red</option>
                        <option value="Green" @if ($product->type == 'Green') selected @endif>Green</option>
                        <option value="Blue" @if ($product->type == 'Blue') selected @endif>Blue</option>
                        <option value="Yellow" @if ($product->type == 'Yellow') selected @endif>Yellow</option>
                        <option value="Cyan" @if ($product->type == 'Cyan') selected @endif>Cyan</option>
                        <option value="Pink" @if ($product->type == 'Pink') selected @endif>Pink</option>
                        <option value="Purple" @if ($product->type == 'Purple') selected @endif>Purple</option>
                        <option value="Black" @if ($product->type == 'Black') selected @endif>Black</option>
                        <option value="White" @if ($product->type == 'White') selected @endif>White</option>
                        <option value="Megenta" @if ($product->type == 'Megenta') selected @endif>Megenta</option>
                        <option value="Gradient" @if ($product->type == 'Gradient') selected @endif>Gradient</option>
                    </select>
                    <x-input-error :messages="$errors->get('color')" class="mt-2" />
                </div>

                <!-- Size -->
                <div>
                    <x-input-label for="name" :value="__(' Select Size')" />
                    <select id="size" name="size"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option>Choose a Size</option>
                        <option value="S" @if ($product->size == 'S') selected @endif>S</option>
                        <option value="M" @if ($product->size == 'M') selected @endif>M</option>
                        <option value="L" @if ($product->size == 'L') selected @endif>L</option>
                        <option value="XL" @if ($product->size == 'XL') selected @endif>XL</option>
                        <option value="XXL" @if ($product->size == 'XXL') selected @endif>XXL</option>
                        <option value="XXXL" @if ($product->size == 'XXXL') selected @endif>XXXL</option>
                    </select>
                    <x-input-error :messages="$errors->get('size')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="quantity" :value="__('Quantity')" />
                    <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity"
                        :value="$product->quantity" autofocus />
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="image" :value="__('Product Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                        :value="old('image')" autofocus />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />

                    @if ($product->image)
                        <img src="{{ asset("$product->image") }}" alt="" class="w-20 h-20">
                    @else
                        <span>No image found</span>
                    @endif
                </div>

            </div>
            <div class="my-4 text-right">
                <x-primary-button class="">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
