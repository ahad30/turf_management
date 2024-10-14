<x-dashboard-layout>
    @section('title')
        Products
    @endsection

    <div class="w-full mt-4 mb-8 text-right">
        <a href="{{ route('turf-owner.products.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">Add
            Product</a>
    </div>
    <div class="w-full mt-4 mb-3 text-left">
        <div class="flex justify-left">
            <a href="{{ route('turf-owner.products.index') }}"
                class="p-3 m-2 border rounded-sm bg-primary hover:bg-green-700 text-white">All Products</a>
            @forelse ($branches as $item)
                <a href="{{ route('turf-owner.filter.products', ['id' => $item->id, 'name' => $item->name]) }}"
                    class="p-3 m-2 border rounded-sm bg-primary hover:bg-green-700 text-white">{{ $item->name }}</a>
            @empty
                <a href="{{ route('turf-owner.branches.create') }}">Add Branch</a>
            @endforelse
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
                                            <form
                                                action="{{ route('turf-owner.products.destroy', ['product' => $item->id]) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    onclick= "return confirm('Are you sure you want to destroy')"
                                                    class="inline-flex
                                                    items-center px-3 py-2 text-sm font-medium text-center text-white
                                                    bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4
                                                    focus:ring-red-300 dark:focus:ring-red-900">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
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
