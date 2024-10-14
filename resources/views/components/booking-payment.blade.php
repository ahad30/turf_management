<div class="mx-auto max-w-screen-xl px-4 py-3 sm:px-6 lg:px-8">
    <div class="rounded-lg p-2 mt-3 lg:p-6">
        <div class="w-full pt-1 pb-5 mt-3">
            Note: Please copy this number and payment first. We only accept send money only. After payment fill up the
            form
            <br>
            Phone number: {{ $turf->phone }}
            <h1 class="text-center font-bold text-xl uppercase">Total Amount: <span id="total">0</span></h1>
            <label for="">Payment Type</label>
            <div class="mt-2">
                <label for="full-payment"><input type="radio" name="payment_type" id="full-payment" value="full"> Full
                    Payment</label><br>
                <label for="advance-payment"><input type="radio" name="payment_type" id="advance-payment"
                        value="advance" checked>
                    Advance
                    Payment</label>
            </div>
        </div>
        <div class="mb-10">
            <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
        </div>
        <div class="mb-3 flex -mx-2">
            <div class="px-2">
                <label for="type1" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="payment_with" id="type1"
                        value="Bkash" checked>
                    <img src="https://assets-global.website-files.com/628a20f8bd44e7d42b9fa39b/633432fed1074494e21c7409_Bkash-logo.png"
                        class="h-8 ml-3">
                </label>
            </div>
            <div class="px-2">
                <label for="type2" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="payment_with" id="type2"
                        value="Nagad" required>
                    <img src="https://ecdn.dhakatribune.net/contents/cache/images/640x359x1/uploads/dten/2022/08/28/nagad-2.jpeg"
                        class="h-8 ml-3">
                </label>
            </div>
            <div class="px-2">
                <label for="type2" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="payment_with" id="type2"
                        value="Rocket" required>
                    <img src="https://seeklogo.com/images/D/dutch-bangla-rocket-logo-B4D1CC458D-seeklogo.com.png"
                        class="h-8 ml-3">
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Transaction Number</label>
            <div>
                <input
                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                    placeholder="88019-8888-1111" type="number" name="transaction_number" required />
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Amount</label>
            <div>
                <input
                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                    value="500" type="number" name="amount" id="amount-input" required readonly />
            </div>
        </div>

        <div class="mb-10">
            <label class="font-bold text-sm mb-2 ml-1">Transaction Code</label>
            <div>
                <input
                    class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                    placeholder="000" type="text" name="transaction_code" required />
            </div>
        </div>
    </div>
</div>


<script>
    $("input[name='payment_type']").on('change', function() {
        if ($(this).val() == 'full') {
            let totalPrice = localStorage.getItem('total_price');
            $("#amount-input").val(totalPrice)
        } else {
            $("#amount-input").val("500")
        }
    })
</script>
