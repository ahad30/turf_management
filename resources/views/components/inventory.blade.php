<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Qty
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>

            </tr>
        </thead>
        <tbody id="products">
            {{-- products here  --}}
        </tbody>
    </table>

</div>

<script>
    $.ajax({
        url: `/products/?branch_id=${localStorage.getItem('branch_id')}`,
        method: 'get',
        dataType: 'json',
        beforeSend: function() {
            // $("#products").html('loading...')
        },
        success: function(data) {
            let products = [];
            $.each(data, function(index, product) {
                let options = ``;
                for (let i = 0; i < product?.quantity; i++) {
                    options +=
                        `<option value="{'id':${product.id},'quantity':${i}}">${i}</option>`
                }
                products += `  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="${product.image}" class="h-10 w-10 rounded-full mx-auto "
                        alt="Apple Watch">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    ${product?.name}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div>
                            <select id="products" name="products[]"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            ${options}
                            </select>
                        </div>
                      
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    ৳ ${product?.price}
                </td>

            </tr>`

                $("#products").html(products)

            })


        }

    });


    // add product ajax 
    $("#add-product-form-btn").on('click', function(e) {
        e.preventDefault();
        $(this).hide()
        // Assuming you have other form data to send
        let formData = new FormData();
        $.each($("select#products"), function() {
            jsonString = $(this).val();
            // Replace single quotes with double quotes to make it a valid JSON string
            jsonString = jsonString.replace(/'/g, '"');

            // Parse the JSON string to a JavaScript object
            // var jsonObject = JSON.parse(jsonString);
            formData.append('products[]', jsonString)
        })

        $.ajax({
            url: "{{ route('addToCart') }}",
            method: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {


            },
            success: function(response) {
                console.log(response);
                $("#product-subtotal").html(response.subtotal)
            },
            error: function(err) {
                alert('oops something went wrong')
            }
        });
    })
</script>
