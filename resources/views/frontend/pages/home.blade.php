@extends('layouts.frontend')
@section('content')
    <!-- Hero Section Container -->
    <div class="hero-pattern">
        <div class="container mx-auto px-4 py-12 lg:flex lg:justify-between lg:items-center">

            <!-- Left Side - Van Image -->
            <div class="lg:w-1/2 mb-6 lg:mb-0">
                <img class="w-full h-auto object-cover" src="{{ asset('frontend/images/heroimage.png') }}" alt="Van Image">
            </div>

            <!-- Right Side - Booking Form -->
            <div class="lg:w-1/2 bg-white md:p-5 p-3 rounded-lg shadow-sm border">
                <h2 class="text-2xl md:text-3xl font-semibold mb-4">Discover Your Perfect Van</h2>
                <p class="text-gray-600 mb-6">Rent vans with just a Few Clicks</p>


                <form action="{{ route('frontend.search') }}" method="GET" id="booking-form">
                    <!-- Pick-up and Drop-off Details -->
                    <div class="space-y-4 mb-6">

                        <!-- Pick-up Location & Date -->
                        <div class="grid grid-cols-2 md:grid-cols-2 border rounded-xl">

                            <!-- Location Dropdown (Pick-up) -->
                            <div class="relative flex items-center p-3 rounded-md border-gray-300 sm:border-none">
                                <i class="fa fa-map-marker mr-2 fa-2x" aria-hidden="true"></i>
                                <div class="flex-1">
                                    <label for="pickup-location" class="text-gray-600 text-sm">Pick-up Location</label>
                                    <input type="text" id="pickup-location" class="w-full border-0 focus:outline-none"
                                        placeholder="Search location" onfocus="showLocationDropdown('pickup')"
                                        name="pickup_location" />

                                    <!-- Error message for pickup location -->
                                    @error('pickup_location')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror

                                    <!-- Dropdown with available and upcoming locations -->
                                    <ul id="pickup-location-dropdown"
                                        class="absolute left-0 mt-1 w-full bg-white border border-gray-300 rounded-md z-50 hidden p-2">
                                        <li class="p-2 cursor-pointer hover:bg-gray-100"
                                            onclick="selectLocation('pickup', 'Charlotte, NC - 3025 Prado Lane')">
                                            <i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Charlotte, NC
                                        </li>
                                        <li class="p-2 cursor-pointer hover:bg-gray-100"
                                            onclick="selectLocation('pickup', 'Columbia, SC - 10320 Wilson Blvd')">
                                            <i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Columbia, SC
                                        </li>
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
                                    <input type="text" id="pickup-date" class="w-full border-0 focus:outline-none"
                                        placeholder="Select date and time" name="pickup_date" />

                                    <!-- Error message for pickup date -->
                                    @error('pickup_date')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <!-- Drop-off Location & Date -->
                        <div class="grid grid-cols-1 md:grid-cols-2 border rounded-xl">

                            <!-- Location Dropdown (Drop-off) -->
                            <div class="relative flex items-center p-3 rounded-md border-b border-gray-300 sm:border-none">
                                <i class="fa fa-map-marker mr-2 fa-2x" aria-hidden="true"></i>
                                <div class="flex-1">
                                    <label for="dropoff-location" class="text-gray-600 text-sm">Drop-off Location</label>
                                    <input type="text" id="dropoff-location" class="w-full border-0 focus:outline-none"
                                        placeholder="Search location" onfocus="showLocationDropdown('dropoff')"
                                        name="dropoff_location" />

                                    <!-- Error message for dropoff location -->
                                    @error('dropoff_location')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror

                                    <!-- Dropdown with available and upcoming locations -->
                                    <ul id="dropoff-location-dropdown"
                                        class="absolute left-0 mt-1 w-full bg-white rounded-md z-50 hidden border p-2">
                                        <li class="p-2 cursor-pointer hover:bg-gray-100"
                                            onclick="selectLocation('dropoff', 'Charlotte, NC - 3025 Prado Lane')">
                                            <i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Charlotte, NC
                                        </li>
                                        <li class="p-2 cursor-pointer hover:bg-gray-100"
                                            onclick="selectLocation('dropoff', 'Columbia, SC - 10320 Wilson Blvd')">
                                            <i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Columbia, SC
                                        </li>
                                        <li class="p-2 cursor-pointer hover:bg-gray-100"
                                            onclick="selectLocation('dropoff','Bring it to me (within 50 miles, $100 fee')">
                                            <i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Bring it to me (within
                                            50 miles, $100 fee')
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
                                    <input type="text" id="dropoff-date" class="w-full border-0 focus:outline-none"
                                        placeholder="Select date and time" name="dropoff_date" />

                                    <!-- Error message for dropoff date -->
                                    @error('dropoff_date')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Search Button -->
                    <button class="w-full bg-black text-white py-3 rounded-md hover:bg-gray-900 transition-all"
                        type="submit">
                        Search
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!--3 step booking process-->
    <div class="md:py-12 py-2">
        <div class="container mx-auto px-4">
            <div class="flex flex-nowrap md:flex-row justify-center">

                <div class="bg-white p-1 md:p-8 rounded-lg w-full md:w-1/3 text-center hover:bg-gray-100">
                    <div
                        class="rounded-full h-12 w-12 md:w-16 md:h-16 bg-gray-200 mx-auto mb-4 flex items-center justify-center">
                        <svg width="29" height="31" viewBox="0 0 29 31" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.1366 2.07129V7.40462M25.8032 15.0713V7.40462C25.8032 6.69738 25.5223 6.0191 25.0222 5.519C24.5221 5.01891 23.8438 4.73796 23.1366 4.73796H4.46989C3.76265 4.73796 3.08437 5.01891 2.58427 5.519C2.08417 6.0191 1.80322 6.69738 1.80322 7.40462V26.0713C1.80322 26.7785 2.08417 27.4568 2.58427 27.9569C3.08437 28.457 3.76265 28.738 4.46989 28.738H14.1366M27.1366 28.738L24.6366 26.238M1.80322 12.738H25.8032M8.46989 2.07129V7.40462M25.8032 23.4046C25.8032 25.6138 24.0124 27.4046 21.8032 27.4046C19.5941 27.4046 17.8032 25.6138 17.8032 23.4046C17.8032 21.1955 19.5941 19.4046 21.8032 19.4046C24.0124 19.4046 25.8032 21.1955 25.8032 23.4046Z"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <h3 class="text-md md:text-lg font-semibold">Pick Date</h3>
                    <p class="text-center text-gray-500 text-sm md:text-md">Select start and end date</p>
                </div>

                <div class="p-1 md:p-8 rounded-lg w-full md:w-1/3 text-center bg-gray-100 md:bg-white hover:bg-gray-100">
                    <div
                        class="rounded-full  h-12 w-12 md:w-16 md:h-16 bg-gray-200 mx-auto mb-4 flex items-center justify-center">
                        <svg width="31" height="25" viewBox="0 0 31 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.1367 20.4049V4.40495C18.1367 3.6977 17.8558 3.01943 17.3557 2.51933C16.8556 2.01923 16.1773 1.73828 15.4701 1.73828H4.80339C4.09614 1.73828 3.41786 2.01923 2.91777 2.51933C2.41767 3.01943 2.13672 3.6977 2.13672 4.40495V19.0716C2.13672 19.4252 2.27719 19.7644 2.52724 20.0144C2.77729 20.2645 3.11643 20.4049 3.47005 20.4049H6.13672M6.13672 20.4049C6.13672 21.8777 7.33063 23.0716 8.80339 23.0716C10.2761 23.0716 11.4701 21.8777 11.4701 20.4049M6.13672 20.4049C6.13672 18.9322 7.33063 17.7383 8.80339 17.7383C10.2761 17.7383 11.4701 18.9322 11.4701 20.4049M19.4701 20.4049H11.4701M19.4701 20.4049C19.4701 21.8777 20.664 23.0716 22.1367 23.0716C23.6095 23.0716 24.8034 21.8777 24.8034 20.4049M19.4701 20.4049C19.4701 18.9322 20.664 17.7383 22.1367 17.7383C23.6095 17.7383 24.8034 18.9322 24.8034 20.4049M24.8034 20.4049H27.4701C27.8237 20.4049 28.1628 20.2645 28.4129 20.0144C28.6629 19.7644 28.8034 19.4252 28.8034 19.0716V14.2049C28.8028 13.9024 28.6994 13.609 28.5101 13.3729L23.87 7.57295C23.7453 7.41679 23.5871 7.29066 23.4071 7.20388C23.2271 7.1171 23.0299 7.0719 22.8301 7.07161H18.1367"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="text-md md:text-lg font-semibold">Select Van</h3>
                    <p class="text-center text-gray-500 text-sm md:text-md">Select van that best fit for you</p>
                </div>

                <div class="bg-white p-1 md:p-8 rounded-lg w-full md:w-1/3 text-center hover:bg-gray-100">
                    <div
                        class="rounded-full  h-12 w-12 md:w-16 md:h-16 bg-gray-200 mx-auto mb-4 flex items-center justify-center">
                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.58456 22.6489C2.08442 23.1489 1.80337 23.827 1.80322 24.5342V27.4302C1.80322 27.7838 1.9437 28.123 2.19375 28.373C2.4438 28.6231 2.78293 28.7636 3.13656 28.7636H7.13656C7.49018 28.7636 7.82932 28.6231 8.07936 28.373C8.32941 28.123 8.46989 27.7838 8.46989 27.4302V26.0969C8.46989 25.7433 8.61036 25.4041 8.86041 25.1541C9.11046 24.904 9.4496 24.7636 9.80322 24.7636H11.1366C11.4902 24.7636 11.8293 24.6231 12.0794 24.373C12.3294 24.123 12.4699 23.7838 12.4699 23.4302V22.0969C12.4699 21.7433 12.6104 21.4041 12.8604 21.1541C13.1105 20.904 13.4496 20.7636 13.8032 20.7636H14.0326C14.7397 20.7634 15.4179 20.4824 15.9179 19.9822L17.0032 18.8969C18.8563 19.5424 20.8737 19.54 22.7252 18.8899C24.5767 18.2398 26.1528 16.9807 27.1957 15.3184C28.2386 13.6561 28.6864 11.6891 28.466 9.73921C28.2456 7.7893 27.37 5.9719 25.9825 4.58432C24.5949 3.19674 22.7775 2.32114 20.8276 2.10075C18.8777 1.88035 16.9107 2.32822 15.2484 3.37108C13.5861 4.41394 12.3269 5.99006 11.6769 7.84159C11.0268 9.69312 11.0244 11.7104 11.6699 13.5636L2.58456 22.6489Z"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M21.1366 10.0969C21.5047 10.0969 21.8032 9.79842 21.8032 9.43023C21.8032 9.06204 21.5047 8.76356 21.1366 8.76356C20.7684 8.76356 20.4699 9.06204 20.4699 9.43023C20.4699 9.79842 20.7684 10.0969 21.1366 10.0969Z"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="text-md md:text-lg font-semibold">Secure</h3>
                    <p class="text-center text-gray-500 text-sm md:text-md">Select extra and secure booking</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Card -->
    <div class="md:py-12 py-4">
        <div class="container mx-auto px-4">
            <!-- Number of Vehicles Found -->
            <h2 class="text-xl font-bold mb-4">Our Available Van Options:</h2>

            <!-- Vehicle Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @foreach ($vans as $van)
                    @include('frontend.includes.vancard', ['form_submit' => true])
                @endforeach
            </div>
        </div>
    </div>

    <!-- Blogs -->
    <div class="md:py-12 py-4">
        <div class="container mx-auto px-4">
            <!-- Heading -->
            <h2 class="text-2xl font-bold mb-8">Read our blogs</h2>

            <!-- Blog Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($blogs as $blog)
                    <div class="relative group rounded-lg hover:cursor-pointer">
                        <div class="relative aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                            <img src="{{ $blog->display_image->getUrl() }}" alt="Blog Image"
                                class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                                <div
                                    class="bg-black bg-opacity-50 rounded-full w-16 h-16 flex items-center justify-center">
                                    <svg class="text-white w-8 h-8" width="25" height="24" viewBox="0 0 25 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.5 5L16.5 12L9.5 19" stroke="#ffffff" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg mt-4">
                            {{ $blog->title }}
                        </h3>
                        <p class="text-sm text-gray-600 mt-2">
                            {{ $blog->short_description }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!--testimonials-->
    <div class="md:py-12 py-4">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-12 p-2">What Our Customers Say</h2>

            <div class="grid p-3 grid-cols-2 md:grid-cols-2 lg:grid-cols-3 md:gap-8 gap-2">
                <!-- Testimonial 1 -->
                @foreach ($testimonials as $testimonial)
                    <div class="bg-white p-2 md:p-6 rounded-lg border">
                        <div class="flex items-left md:items-center mb-4 flex-col md:flex-row">
                            <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('frontend/images/user.png') }}"
                                alt="Customer 1">
                            <div class="text-left">
                                <h3 class="text-lg font-semibold">{{ $testimonial->name }}</h3>
                                <p class="text-sm text-gray-600 line-clamp-1">{{ $testimonial->rent_details }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4 text-left">{{ $testimonial->review }}</p>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

    <!-- Faqs -->
    <div class="md:py-12 py-4">
        <div class="container mx-auto px-4">
            <!-- FAQs Heading -->
            <h2 class="text-2xl font-bold mb-6">Frequently Asked Questions</h2>
            @foreach ($faqs as $faq)
                <!-- FAQ Item 1 -->
                <div class="faq-item border-b border-gray-100 mb-4">
                    <div class="flex justify-between items-center py-4 cursor-pointer" onclick="toggleFAQ(this)">
                        <h3 class="text-md md:text-lg md:font-medium">Q. {{ $faq->question }}</h3>
                        <span class="text-2xl font-bold"><svg width="25" height="24" viewBox="0 0 25 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 6V12M12.5 12V18M12.5 12H18.5M12.5 12H6.5" stroke="#3F3F46" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <div class="faq-answer hidden pl-6 pb-4">
                        <p class="text-gray-600">{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
