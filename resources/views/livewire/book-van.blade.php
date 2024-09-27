<div class="py-12">
    <div class="container mx-auto px-4">
        <!-- Number of Vehicles Found -->
        <h2 class="text-xl font-bold mb-4">Our Available Van for booking:</h2>

        <!-- Vehicle Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <!-- Vehicle Card -->
            @foreach ($vans as $key => $van)
                @include('frontend.includes.vancard', ['openExtrasModal' => true])
            @endforeach
        </div>

        <!-- Modal Background (Extras Modal) -->
        @if ($showExtrasModal)
            <div class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center">
                <div class="bg-white md:p-6 p-2 rounded-lg shadow-lg md:relative absolute m-3 overflow-y-scroll"
                    style="bottom: 0;">
                    <!-- Modal Close Button -->
                    <button wire:click="closeExtrasModal"
                        class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Modal Header -->
                    <h2 class="text-xl font-semibold mb-4">Add Extras</h2>
                    <!-- Extras Options Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($extras as $key => $extra)
                            <div class="bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                                <div class="flex">
                                    <img src="{{ $extra->image->getUrl() }}" class="w-10 h-10">
                                    <div>
                                        <h3 class="font-semibold">{{ $extra->name }}</h3>
                                        <p class="text-sm text-gray-600">+ ${{ $extra->price }}</p>
                                    </div>
                                </div>
                                &nbsp;&nbsp;
                                <button
                                    class="px-4 py-2 rounded-md {{ in_array($key, $selectedExtras) ? 'bg-green-700 text-white' : 'bg-gray-900 text-white' }}"
                                    wire:click.prevent="addExtra({{ $key }})">
                                    @if (in_array($key, $selectedExtras))
                                        <span>Added</span>
                                    @else
                                        <span>+</span>
                                    @endif
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <!-- Confirm & Continue Button -->
                    <button wire:click="openCheckoutModal"
                        class="mt-6 px-6 py-3 bg-black text-white rounded-md hover:bg-gray-800 w-full">
                        Confirm & Continue
                    </button>
                </div>
            </div>
        @endif

        <!-- Modal Background (Checkout Modal) -->
        @if ($showCheckoutModal)
            <div class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center">
                <div class="bg-white md:p-6 p-2 rounded-lg shadow-lg md:relative absolute m-3 overflow-y-scroll"
                    style="bottom: 0; max-width: 500px; width: 100%;">
                    <button wire:click="closeCheckoutModal"
                        class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Modal Header -->
                    <h2 class="text-xl font-semibold mb-4">Review & Checkout</h2>

                    <!-- Pickup and Dropoff Details -->
                    <div class="mb-4">
                        <p class="text-gray-700">Pickup Location: <strong>{{ $pickup_location }}</strong></p>
                        <p class="text-gray-700">Pickup Date: <strong>{{ $pickup_date }}</strong></p>
                        <p class="text-gray-700">Dropoff Location: <strong>{{ $dropoff_location }}</strong></p>
                        <p class="text-gray-700">Dropoff Date: <strong>{{ $dropoff_date }}</strong></p>
                    </div>

                    <!-- Review Selected Extras -->
                    <div class="mb-4">
                        <p class="text-gray-700">Selected Extras:</p>
                        <ul id="selected-extras-list" class="list-disc list-inside text-gray-600">
                            @foreach ($selectedExtras as $extra)
                                <span
                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-green-500 rounded-full mb-2">
                                    {{ $extras[$extra]->name }} (${{ $extras[$extra]->price }})
                                </span>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Total Price Calculation -->
                    <div class="mb-4">

                        <p class="text-gray-700">Van Price (per day): <strong>${{ $selectedVan['price'] }}</strong></p>
                        <p class="text-gray-700">Total Days:
                            <strong>{{ \Carbon\Carbon::parse($pickup_date)->diffInDays(\Carbon\Carbon::parse($dropoff_date)) }}
                                days</strong>
                        </p>
                        <p class="text-gray-700">Total Price: <strong>${{ $totalAmount }}</strong></p>
                    </div>

                    <!-- Proceed to Payment Button -->
                    <button
                        class="mt-6 px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-400 w-full flex items-center justify-center"
                        wire:click.prevent="proceedToCheckout({{ $selectedVan['id'] }})" wire:loading.disable>
                        <!-- Text when not loading -->
                        <span wire:loading.remove>
                            Proceed to Payment
                        </span>
                        <!-- Spinner with text when loading -->
                        <span wire:loading>
                            Processing...
                        </span>
                    </button>

                </div>
            </div>
        @endif

    </div>
</div>
