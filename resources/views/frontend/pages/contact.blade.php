@extends('layouts.frontend')
@section('content')
    <!--Contact Us-->
    <div class="container mx-auto px-4 py-12">

        <!-- Heading -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">Contact Us</h1>
            <p class="text-gray-600 mt-2">We'd love to hear from you! Reach out for any queries, suggestions, or
                feedback.</p>
        </div>

        <div class="flex flex-wrap -mx-4">

            <!-- Contact Form -->
            <div class="w-full md:w-1/2 px-4">
                <div class="bg-white p-2 md:p-8 rounded-lg border">
                    <h2 class="text-2xl font-bold mb-6">Send us a Message</h2>
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('frontend.contact') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-lg font-semibold mb-2">Enter Your Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full p-3 border border-gray-300 rounded-md @error('name') border-red-500 @enderror" 
                                placeholder="Full Name here" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <div class="mb-4">
                            <label for="email" class="block text-lg font-semibold mb-2">Your Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full p-3 border border-gray-300 rounded-md @error('email') border-red-500 @enderror" 
                                placeholder="example@example.com" required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <div class="mb-4">
                            <label for="message" class="block text-lg font-semibold mb-2">Message</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full p-3 border border-gray-300 rounded-md @error('message') border-red-500 @enderror"
                                placeholder="Type your message here..." required></textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <button type="submit"
                            class="w-full bg-black text-white py-3 rounded-md font-semibold hover:bg-gray-800">
                            Send Message
                        </button>
                    </form>
                    
                </div>
            </div>

            <!-- Extraaa contact info -->
            <div class="w-full md:w-1/2 px-4  md:mt-0 mt-4 mb-8 md:mb-8">
                <div class="bg-white p-2 md:p-8 rounded-lg border">
                    <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>
                    <p class="text-gray-600 mb-6">Feel free to contact us by phone, email, or by filling out the form.
                        We're here to help you!</p>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">📞 Phone</h3>
                        <p class="text-gray-700">+1-800-123-4567</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">✉️ Email</h3>
                        <p class="text-gray-700">support@luxuryvanrental.com</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">📍 Address</h3>
                        <p class="text-gray-700">123 Luxury Van Blvd, Suite 500, New York, NY 10001</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Map ko link garam yeta-->
        <div class="md:mt-12 mt-4">
            <h2 class="text-center text-3xl font-bold text-gray-800 mb-6">Our Location</h2>
            <div class="relative h-64 w-full bg-gray-200 rounded-lg">

                <p class="absolute inset-0 flex justify-center items-center text-gray-500 text-lg">
                        Google map ko tag here
                </p>
            </div>
        </div>

    </div>
@endsection