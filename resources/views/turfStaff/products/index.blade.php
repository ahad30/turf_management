<x-dashboard-layout>

    @section('title')
        Products
    @endsection

    <div class="w-full mt-4 mb-3 text-left">
        <div class="flex justify-left">
            <a href="{{ route('staff.products') }}"
                class="p-3 m-2 border rounded-sm bg-primary hover:bg-green-700 text-white">All Products</a>
        </div>
    </div>
    <!------ Alert ------->
    @include('alerts.alert')

    <div class="flex flex-col rounded-lg overflow-hidden">
        <div class=" bg-gray-100">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow w-full ">
                    <table class=" dark:divide-gray-600 w-full " style="">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    image
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Name
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Branch Name
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Size
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Color
                                </th>

                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Qty
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Price
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                            @foreach ($products as $item)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 ">
                                        <div class="flex items-center">
                                            <input id="checkbox-{{ $item->id }}" aria-describedby="checkbox-1"
                                                type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-{{ $item->id }}" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        <img src="{{ asset($item->image) }}" alt=""
                                            style="height: 50px; width:50px;">
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->name }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->branch->name }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->size }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->color }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->price }}
                                    </td>

                                    <td class="p-4  space-x-2 whitespace-nowrap">
                                        <div class="flex gap-4">
                                            <a
                                                href="{{ route('turf-owner.products.edit', ['product' => $item->id]) }}">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                        </path>
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Edit
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-full p-4 bg-white"> {{ $products->links() }}</div>
            </div>
        </div>
    </div>

    @push('datatablejs')
        @include('partials.jquery-datatable-init')
    @endpush
</x-dashboard-layout>
