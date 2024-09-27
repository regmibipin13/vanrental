@extends('layouts.frontend')
@section('content')
    <div class="container mx-auto p-6">
        <h5 class="text-xl mb-6">Account Settings</h5>

        <!-- User Information Section -->
        <a href="{{ route('frontend.userInformation') }}"
            class="block p-4 rounded-lg mb-4 flex justify-between items-center hover:bg-gray-100 transition border">
            <div class="flex items-center space-x-4">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.3284 9.82843C16.0786 9.07828 16.5 8.06087 16.5 7C16.5 5.93913 16.0786 4.92172 15.3284 4.17157C14.5783 3.42143 13.5609 3 12.5 3C11.4391 3 10.4217 3.42143 9.67157 4.17157C8.92143 4.92172 8.5 5.93913 8.5 7C8.5 8.06087 8.92143 9.07828 9.67157 9.82843C10.4217 10.5786 11.4391 11 12.5 11C13.5609 11 14.5783 10.5786 15.3284 9.82843Z"
                        stroke="#3F3F46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M7.55025 16.0503C8.86301 14.7375 10.6435 14 12.5 14C14.3565 14 16.137 14.7375 17.4497 16.0503C18.7625 17.363 19.5 19.1435 19.5 21H5.5C5.5 19.1435 6.2375 17.363 7.55025 16.0503Z"
                        stroke="#3F3F46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="font-semibold">User Information</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <!-- Booking History Section -->
        <a href="{{ route('frontend.bookings') }}"
            class="block p-4 rounded-lg  mb-4 flex justify-between items-center hover:bg-gray-100 transition border">
            <div class="flex items-center space-x-4">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 18H11.5M4.5 6H20.5H4.5ZM4.5 12H20.5H4.5Z" stroke="#3F3F46" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="font-semibold">Booking History</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <!-- Logout Section -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="block w-full p-4 rounded-lg flex justify-between items-center hover:bg-red-100 transition border text-red-600">
                <div class="flex items-center space-x-4">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 12H5M12 8L15 12L12 16M19 5C20.0609 5 21.0783 5.42143 21.8284 6.17157C22.5786 6.92172 23 7.93913 23 9V15C23 16.0609 22.5786 17.0783 21.8284 17.8284C21.0783 18.5786 20.0609 19 19 19H17"
                            stroke="#EF4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="font-semibold">Logout</span>
                </div>
            </button>
        </form>

    </div>
@endsection
