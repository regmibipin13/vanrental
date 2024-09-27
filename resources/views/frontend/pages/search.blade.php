@extends('layouts.frontend')
@section('content')
    <!-- Location filters -->
    <section class="bg-black ">
        <div class="container mx-auto px-4 py-12">
            <h5 class="text-lg md:text-lg font-semibold mb-4 text-white">Discover Your Perfect Van</h5>
            <form action="{{ route('frontend.search') }}" method="GET">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <!-- Pick-up Location & Date -->
                    <div class="grid grid-cols-1 md:grid-cols-2 border rounded-xl bg-white">

                        <!-- Location Dropdown (Pick-up) -->
                        <div class="relative flex items-center p-3 rounded-md border-b border-gray-300 sm:border-none">
                            <i class="fa fa-map-marker mr-2 fa-2x" aria-hidden="true"></i>
                            <div class="flex-1">
                                <label for="pickup-location" class="text-gray-600 text-sm">Pick-up Location</label>
                                <input type="text" id="pickup-location" name="pickup_location"
                                    class="w-full border-0 focus:outline-none" placeholder="Search location"
                                    onfocus="showLocationDropdown('pickup')" value="{{ request()->pickup_location ?? '' }}"
                                    wire:model.live="pickup_location" />

                                <!-- Display validation error for pickup location -->
                                @error('pickup_location')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror

                                <!-- Dropdown with available and upcoming locations -->
                                <ul id="pickup-location-dropdown"
                                    class="absolute left-0 mt-1 w-full bg-white border border-gray-300 rounded-md z-50 hidden p-2">
                                    <li class="p-2 cursor-pointer hover:bg-gray-100"
                                        onclick="selectLocation('pickup', 'Charlotte, NC - 3025 Prado Lane')"><i
                                            class="fa fa-map-marker mr-2" aria-hidden="true"></i>Charlotte, NC</li>
                                    <li class="p-2 cursor-pointer hover:bg-gray-100"
                                        onclick="selectLocation('pickup', 'Columbia, SC - 10320 Wilson Blvd')"><i
                                            class="fa fa-map-marker mr-2" aria-hidden="true"></i>Columbia, SC</li>
                                    <li class="p-2 text-gray-400">New York, NY (Coming Soon)</li>
                                    <li class="p-2 text-gray-400">Miami, FL (Coming Soon)</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Date/Time Picker (Pick-up) -->
                        <div
                            class="flex items-center p-3 border-l-0 md:border-l md:border-l-1 border-gray-300 rounded-none">
                            <i class="fa fa-calendar-check-o mr-2 fa-lg" aria-hidden="true"></i>
                            <div class="flex-1">
                                <label for="pickup-date" class="text-gray-600 text-sm">Date and Time</label>
                                <input type="text" id="pickup-date" name="pickup_date"
                                    class="w-full border-0 focus:outline-none" placeholder="Select date and time"
                                    value="{{ request()->pickup_date }}" wire:model.live="pickup_date" />

                                <!-- Display validation error for pickup date -->
                                @error('pickup_date')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Drop-off Location & Date -->
                    <div class="grid grid-cols-1 md:grid-cols-2 border rounded-xl bg-white">

                        <!-- Location Dropdown (Drop-off) -->
                        <div class="relative flex items-center p-3 rounded-md border-b border-gray-300 sm:border-none">
                            <i class="fa fa-map-marker mr-2 fa-2x" aria-hidden="true"></i>
                            <div class="flex-1">
                                <label for="dropoff-location" class="text-gray-600 text-sm">Drop-off Location</label>
                                <input type="text" id="dropoff-location" name="dropoff_location"
                                    class="w-full border-0 focus:outline-none" placeholder="Search location"
                                    onfocus="showLocationDropdown('dropoff')"
                                    value="{{ request()->dropoff_location ?? '' }}" wire:model.live="dropoff_location" />

                                <!-- Display validation error for drop-off location -->
                                @error('dropoff_location')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror

                                <!-- Dropdown with available and upcoming locations -->
                                <ul id="dropoff-location-dropdown"
                                    class="absolute left-0 mt-1 w-full bg-white rounded-md z-50 hidden border p-2">
                                    <li class="p-2 cursor-pointer hover:bg-gray-100"
                                        onclick="selectLocation('dropoff', 'Charlotte, NC - 3025 Prado Lane')"><i
                                            class="fa fa-map-marker mr-2" aria-hidden="true"></i>Charlotte, NC</li>
                                    <li class="p-2 cursor-pointer hover:bg-gray-100"
                                        onclick="selectLocation('dropoff', 'Columbia, SC - 10320 Wilson Blvd')"><i
                                            class="fa fa-map-marker mr-2" aria-hidden="true"></i>Columbia, SC</li>
                                    <li class="p-2 cursor-pointer hover:bg-gray-100"
                                        onclick="selectLocation('dropoff','Bring it to me (within 50 miles, $100 fee')">
                                        <i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Bring it to me (within 50
                                        miles, $100 fee')
                                    </li>
                                    <li class="p-2 text-gray-400">New York, NY (Coming Soon)</li>
                                    <li class="p-2 text-gray-400">Miami, FL (Coming Soon)</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Date/Time Picker (Drop-off) -->
                        <div
                            class="flex items-center p-3 border-l-0 md:border-l md:border-l-1 border-gray-300 rounded-none">
                            <i class="fa fa-calendar-check-o mr-2 fa-lg" aria-hidden="true"></i>
                            <div class="flex-1">
                                <label for="dropoff-date" class="text-gray-600 text-sm">Date and Time</label>
                                <input type="text" id="dropoff-date" name="dropoff_date"
                                    class="w-full border-0 focus:outline-none" placeholder="Select date and time"
                                    value="{{ request()->dropoff_date }}" wire:model.live="dropoff_date" />

                                <!-- Display validation error for drop-off date -->
                                @error('dropoff_date')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Search Button -->
                    <button class="py-3 rounded-md transition-all bg-white text-black">Search</button>

                </div>
            </form>

        </div>

    </section>

    @livewire('book-van', ['vans' => $vans, 'extras' => $extras])
@endsection
