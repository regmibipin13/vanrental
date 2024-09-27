@extends('layouts.frontend')
@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg text-center max-w-md w-full">
            <!-- Checkmark Icon -->
            <div class="w-16 h-16 mx-auto bg-black text-white rounded-full flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <!-- Reservation Text -->
            <h2 class="text-2xl font-bold mb-2">Reservation is Cancelled</h2>
            <p class="text-gray-600 mb-6">You Reservation has been successfully cancelled.
            </p>

            <!-- Button -->
            <button class="bg-black text-white px-6 py-3 rounded-md font-semibold hover:bg-gray-800">
                <a href="{{ route('frontend.index') }}">Go to Home</a>
            </button>
        </div>
    </div>
@endsection
