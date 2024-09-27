@extends('layouts.frontend')
@section('content')
    <div class="container mx-auto py-10 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Payment Section -->
            <div class="bg-white p-2 md:p-6 rounded-lg border">
                <h2 class="text-xl font-semibold mb-4">Payment options</h2>

                <!-- Card Payment -->
                <div class="border-b pb-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <label class="text-sm font-semibold">Pay with card</label>
                        <img src="src/images/visa.png" class="w-16" alt="" />
                    </div>
                    <div class="space-y-4">
                        <div class="border p-2 rounded-lg">
                            <label for="card-number" class="block text-sm text-gray-600">Card number</label>
                            <input type="number" id="card-number" class="w-full border-gray-300 rounded-md p-2"
                                placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-1/2 border p-2 rounded-lg">
                                <label for="expiration-date" class="block text-sm text-gray-600">Expiration date</label>
                                <select id="expiration-date" class="w-full border-gray-300 rounded-md p-2">
                                    <option>Month</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <!-- Add more months -->
                                </select>
                            </div>
                            <div class="w-1/2 border p-2 rounded-lg">
                                <label for="expiration-year" class="block text-sm text-gray-600">Year</label>
                                <select id="expiration-year" class="w-full border-gray-300 rounded-md p-2">
                                    <option>Year</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <!-- Add more years -->
                                </select>
                            </div>
                        </div>
                        <div class="w-1/1 border p-2 rounded-lg">
                            <label for="cvv" class="block text-sm text-gray-600">CVV</label>
                            <input type="number" id="cvv" class="w-full border-gray-300 rounded-md p-2"
                                placeholder="123">
                        </div>
                        <button class="w-full bg-black text-white p-3 rounded-md">Complete purchase</button>
                    </div>
                </div>

                <!-- PayPal Payment -->
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <label class="text-sm font-semibold">Pay with PayPal</label>
                        <img src="src/images/paypal.png" class="w-14" alt="" />
                    </div>
                    <button class="w-full bg-blue-500 text-white p-3 rounded-md">Pay with PayPal</button>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="bg-white p-2 md:p-6 rounded-lg border">
                <h2 class="text-xl font-semibold mb-4">Order Summary</h2>

                <!-- Product -->
                <div class="flex items-center justify-between space-x-4 mb-4">
                    <div class="flex flex-col text-left p-2">
                        <img src="./src/images/van1.png" alt="Van Image" class="rounded-md w-20">
                        <p class="text-lg font-semibold">8 Seater Mercedes Van</p>
                        <p class="text-sm text-gray-600"><b>Pickup:</b> NC, newcastle 876 at 6:00AM, 15 JULY</p>
                        <p class="text-sm text-gray-600"><b>Dropoff:</b> NC, newcastle 876 at 6:00AM, 18 JULY</p>
                    </div>
                    <div>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.5 11V17M14.5 11V17M4.5 7H20.5M19.5 7L18.633 19.142C18.5971 19.6466 18.3713 20.1188 18.0011 20.4636C17.6309 20.8083 17.1439 21 16.638 21H8.362C7.85614 21 7.36907 20.8083 6.99889 20.4636C6.6287 20.1188 6.40292 19.6466 6.367 19.142L5.5 7H19.5ZM15.5 7V4C15.5 3.73478 15.3946 3.48043 15.2071 3.29289C15.0196 3.10536 14.7652 3 14.5 3H10.5C10.2348 3 9.98043 3.10536 9.79289 3.29289C9.60536 3.48043 9.5 3.73478 9.5 4V7H15.5Z"
                                stroke="#3F3F46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                </div>

                <!-- Extras Section -->
                <div class="space-y-4">
                    <!-- Extra 1 -->
                    <div class="flex items-start justify-between p-4 border rounded-md">
                        <div class="flex items-center space-x-2">
                            <img src="./src/images/Driver.png" class="w-10 h-10">
                            <div>
                                <p class="font-semibold">Do you need a driver?</p>
                                <p class="text-sm text-gray-600">+ Extra $300 /hr</p>
                            </div>
                        </div>
                        <button class="bg-gray-800 text-white w-8 h-8 rounded-full">-</button>
                    </div>

                    <!-- Extra 2 -->
                    <div class="flex items-start justify-between p-4 border rounded-md">
                        <div class="flex items-center space-x-2">
                            <img src="./src/images/Seat.png" class="w-10 h-10">
                            <div>
                                <p class="font-semibold">Do you need a car seat for children?</p>
                                <p class="text-sm text-gray-600">+ Extra $23 for car seats, $17 for booster seats</p>
                            </div>
                        </div>
                        <button class="bg-gray-800 text-white w-8 h-8 rounded-full">-</button>
                    </div>

                    <!-- Extra 3 -->
                    <div class="flex items-start justify-between p-4 border rounded-md">
                        <div class="flex items-center space-x-2">
                            <img src="./src/images/Toll.png" class="w-10 h-10">
                            <div>
                                <p class="font-semibold">Do you need a car seat for children?</p>
                                <p class="text-sm text-gray-600">+ Extra $23 for car seats, $17 for booster seats</p>
                            </div>
                        </div>
                        <button class="bg-gray-800 text-white w-8 h-8 rounded-full">-</button>
                    </div>

                    <!-- Extra 4 -->
                    <div class="flex items-start justify-between p-4 border rounded-md">
                        <div class="flex items-center space-x-2">
                            <img src="./src/images/Wifi.png" class="w-10 h-10">
                            <div>
                                <p class="font-semibold">Do you need a car seat for children?</p>
                                <p class="text-sm text-gray-600">+ Extra $23 for car seats, $17 for booster seats</p>
                            </div>
                        </div>
                        <button class="bg-gray-800 text-white w-8 h-8 rounded-full">-</button>
                    </div>

                    <!-- Add more extra items as needed -->
                </div>

                <!-- Summary Prices -->
                <div class="mt-6 space-y-2">
                    <div class="flex justify-between">
                        <span>Service charge:</span>
                        <span>$80</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tax:</span>
                        <span>$80</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Security Fee:</span>
                        <span>$80</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Credit card processing fee:</span>
                        <span>$30</span>
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between font-bold text-lg">
                        <span>Total To Pay:</span>
                        <span>$1400</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
