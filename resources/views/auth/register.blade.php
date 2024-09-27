@extends('layouts.frontend')
@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6 text-left">Signup with</h2>

            <!-- Email and Password Login -->
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Email address here" required name="email">
                    @error('email')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Full Name" required name="name">
                    @error('name')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="••••••••" required name="password">
                    @error('password')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="••••••••" required name="password_confirmation">
                    @error('password_confirmation')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-black hover:bg-gray-900 text-white py-3 rounded-lg">Signup</button>
            </form>


            <!-- Social Login Buttons -->
            <div class="space-y-4">
                <!-- Divider -->
                <div class="my-6 flex items-center">
                    <hr class="flex-grow border-t border-gray-300">
                    <span class="mx-4 text-gray-500">or</span>
                    <hr class="flex-grow border-t border-gray-300">
                </div>

                <button
                    class="w-full flex items-center pl-4 border shadow-sm bg-white-600 hover:bg-gray-100 text-black py-2 rounded-lg">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px"
                        viewBox="0 0 48 48" enable-background="new 0 0 48 48" class="h-5 w-5" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="#FFC107"
                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                                                                        c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                                                                        c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                        </path>
                        <path fill="#FF3D00"
                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                                                                        C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                        </path>
                        <path fill="#4CAF50"
                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                                                                        c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                        </path>
                        <path fill="#1976D2"
                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                                                                        c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                        </path>
                    </svg>&nbsp; &nbsp;
                    Continue with Google
                </button>
                {{-- <button class="w-full flex items-center pl-4 border bg-white text-black py-2 rounded-lg hover:bg-gray-100">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.0492 20.28C16.0692 21.23 14.9992 21.08 13.9692 20.63C12.8792 20.17 11.8792 20.15 10.7292 20.63C9.28919 21.25 8.52919 21.07 7.66919 20.28C2.78919 15.25 3.50919 7.59 9.04919 7.31C10.3992 7.38 11.3392 8.05 12.1292 8.11C13.3092 7.87 14.4392 7.18 15.6992 7.27C17.2092 7.39 18.3492 7.99 19.0992 9.07C15.9792 10.94 16.7192 15.05 19.5792 16.2C19.0092 17.7 18.2692 19.19 17.0392 20.29L17.0492 20.28ZM12.0292 7.25C11.8792 5.02 13.6892 3.18 15.7692 3C16.0592 5.58 13.4292 7.5 12.0292 7.25Z"
                            fill="black" />
                    </svg>

                    &nbsp; &nbsp;


                    Continue with Apple
                </button>
                <button class="w-full flex items-center pl-4 border bg-white hover:bg-gray-100 text-black py-2 rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.4082 12C21.4082 6.80403 17.196 2.5918 12 2.5918C6.80403 2.5918 2.5918 6.80403 2.5918 12C2.5918 16.6959 6.03226 20.5881 10.53 21.2939V14.7196H8.14117V12H10.53V9.92726C10.53 7.56932 11.9346 6.26688 14.0836 6.26688C15.1129 6.26688 16.1896 6.45063 16.1896 6.45063V8.76593H15.0033C13.8345 8.76593 13.47 9.49117 13.47 10.2352V12H16.0793L15.6622 14.7196H13.47V21.2939C17.9677 20.5881 21.4082 16.6959 21.4082 12Z"
                            fill="#1877F2" />
                        <path
                            d="M15.6617 14.7195L16.0788 12H13.4695V10.2352C13.4695 9.49107 13.834 8.7659 15.0027 8.7659H16.189V6.4506C16.189 6.4506 15.1124 6.26685 14.083 6.26685C11.934 6.26685 10.5294 7.56929 10.5294 9.92722V12H8.14062V14.7195H10.5294V21.2939C11.0157 21.3701 11.5072 21.4083 11.9995 21.4082C12.4917 21.4083 12.9832 21.3701 13.4695 21.2939V14.7195H15.6617Z"
                            fill="white" />
                    </svg>
                    &nbsp; &nbsp;
                    Continue with Facebook
                </button> --}}
            </div>

            <!-- Forgot Password -->
            <div class="mt-4 text-center">
                <span>Already have account? <a href="{{ route('login') }}"
                        class="text-blue-500 hover:underline">Signin</a></span>
            </div>
        </div>
    </div>
@endsection
