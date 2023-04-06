<x-template>
    <br></br>
    <br></br>
    <br></br>

    <div name="content">
        <div class="max-w-md mx-auto my-10">
            <h1 class="text-2xl font-bold mb-5">Payment</h1>
            <form action="/payment" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="card_number" class="block text-gray-700 font-bold mb-2">Card Number</label>
                    <input type="text" name="card_number" id="card_number" placeholder="XXXX-XXXX-XXXX-XXXX" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="expiry_date" class="block text-gray-700 font-bold mb-2">Expiry Date</label>
                    <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YY" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <label for="cvv" class="block text-gray-700 font-bold mb-2">CVV</label>
                    <input type="password" name="cvv" id="cvv" placeholder="XXX" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Pay</button>
                </div>
            </form>
        </div>
</div>
</x-template>