@extends('layouts.frontend')
@section('content')
    <!-- Header -->
    <header class="bg-black text-white py-6">
        <div class="container mx-auto px-4">
            <h1 class="md:text-2xl text-lg font-bold">About Us</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-10">
        <div class="grid md:grid-cols-2 gap-10 items-center">

            <!-- Text Section -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Who We Are</h2>
                <p class="text-gray-700 mb-6">
                    Welcome to Rent luxury vans, where we offer premium vehicle rentals for all your needs. Whether you're
                    traveling for business, exploring new places, or simply need a car for the weekend, we've got you
                    covered. With a focus on top-notch service, we ensure a hassle-free rental experience from booking to
                    returning.
                </p>
                <p class="text-gray-700 mb-6">
                    Our fleet ranges from compact cars to luxurious vans and SUVs, perfect for any occasion. At Rent Luxuru
                    vans, we value your safety and satisfaction above all, offering the latest models and best rates.
                </p>
            </div>

            <!-- Image Section -->
            <div>
                <img src="{{ asset('frontend/images/Founders.png') }}" alt="About Us Image"
                    class="rounded-lg object-cover w-full h-full">
            </div>

        </div>

        <!-- Our Mission Section -->
        <section class="py-16">
            <div class="grid md:grid-cols-2 gap-10 items-center">

                <!-- Image Section -->
                <div class="order-2 md:order-1">
                    <img src="{{ asset('frontend/images/Our-mission.png') }}" alt="Our Mission Image"
                        class="rounded-lg object-cover w-full h-full">
                </div>

                <!-- Text Section -->
                <div class="order-1 md:order-2">
                    <h2 class="text-2xl font-bold mb-4">Our Mission</h2>
                    <p class="text-gray-700 mb-6">
                        Our mission is simple: to provide seamless, efficient, and affordable vehicle rentals to our valued
                        customers. We strive to make transportation accessible and convenient, helping you reach your
                        destination with ease. Our dedicated team is here to assist you at every step of the way, ensuring
                        your journey is smooth and memorable.
                    </p>
                    <p class="text-gray-700 mb-6">
                        With our transparent pricing and flexible rental terms, you can rest assured that you're getting the
                        best deal possible. Let us help you make your next trip unforgettable.
                    </p>
                </div>
            </div>
        </section>

        <!-- Our Values Section -->
        <section class="md:py-16 py-6">
            <h2 class="text-2xl font-bold text-center mb-10">Our Values</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center">

                <!-- Value 1 -->
                <div class="bg-white p-8 rounded-lg border">
                    <h3 class="text-xl font-bold mb-2">Customer First</h3>
                    <p class="text-gray-600">We prioritize our customers' needs and strive to deliver the best experience
                        every time.</p>
                </div>

                <!-- Value 2 -->
                <div class="bg-white p-8 rounded-lg border">
                    <h3 class="text-xl font-bold mb-2">Integrity</h3>
                    <p class="text-gray-600">Honesty and transparency are at the core of everything we do, ensuring trust in
                        every interaction.</p>
                </div>

                <!-- Value 3 -->
                <div class="bg-white p-8 rounded-lg border">
                    <h3 class="text-xl font-bold mb-2">Innovation</h3>
                    <p class="text-gray-600">We're constantly evolving and improving our services to meet the ever-changing
                        needs of our clients.</p>
                </div>

            </div>
        </section>
    </main>
@endsection
