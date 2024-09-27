@extends('layouts.frontend')
@section('content')
    <div class="container mx-auto p-6">
        <h5 class="text-xl mb-6">Booking History</h5>
        <!-- Booking card row-->
        @foreach ($bookings as $booking)
            <div class="bg-white rounded-lg border mb-6 p-2 ">
                <div class="grid p-3 grid-cols-1 md:grid-cols-1 gap-2">
                    <div class="flex items-center">
                        <div>
                            <img src="{{ $booking->van->display_image->getUrl() }}" alt="Van Image"
                                class="w-36 h-auto md:mr-6 mb-4 md:mb-0">
                        </div>
                        <div class="flex flex-col items-left">
                            <h3 class="text-xl font-semibold">{{ $booking->van->name }}</h3>
                            <p class="text-gray-500">{{ $booking->van->category->name }} - @foreach ($booking->van->facilities as $facility)
                                    {{ $facility->name }} -
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Booking Info -->
                <div class="grid grid-cols-2 md:grid-cols-5 p-3">
                    <div class="flex flex-col md:mr-12">
                        <p class="font-semibold">Booking Date</p>
                        <p class="text-gray-600">{{ $booking->created_at->format('d M Y H:i:a') }}</p>
                    </div>
                    <div class="flex flex-col md:mr-12">
                        <p class="font-semibold">Pickup</p>
                        <p class="text-gray-600">{{ $booking->pickup_location }}</p>
                    </div>
                    <div class="flex flex-col md:mr-12">
                        <p class="font-semibold">Dropoff</p>
                        <p class="text-gray-600">{{ $booking->drop_location }}</p>
                    </div>
                    <div class="flex flex-col md:mr-12">
                        <p class="font-semibold">Total Paid</p>
                        <p class="text-2xl text-green-600">$ {{ $booking->total_booking_amount }}</p>
                    </div>
                    {{-- <div style="display: flex;justify-content: start;">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-md mt-4 hover:bg-red-600"><a
                                href="cancellation.html">Request Cancel</a></button>
                    </div> --}}
                </div>

            </div>
        @endforeach

    </div>
@endsection
