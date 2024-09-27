<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Van rental</title>
    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/png" sizes="32x32" />
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/custom.css') }}">
</head>

<body>
    <!--Mini header-->
    <div class="hidden container md:block mx-auto px-1">
        <div class="py-2 text-sm flex justify-between items-center px-4 border-b border-gray-100">
            <div class="flex items-center space-x-2">
                <span class="text-gray-600">Have any questions?</span>
                <a href="tel:+61383766284" class="hover:underline flex">
                    +61 383 766 284
                </a>
                <a href="mailto:noreply@envato.com" class="hover:underline">
                    noreply@envato.com
                </a>
            </div>
            <div class="flex items-center space-x-3">

                <a href="#" class="text-gray-500 hover:text-gray-800">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.0867 3.00122C10.1584 3.00122 8.2733 3.57305 6.66993 4.64439C5.06655 5.71574 3.81686 7.23848 3.07891 9.02006C2.34096 10.8016 2.14787 12.762 2.52408 14.6534C2.90028 16.5447 3.82888 18.282 5.19244 19.6455C6.55601 21.0091 8.29329 21.9377 10.1846 22.3139C12.0759 22.6901 14.0363 22.497 15.8179 21.759C17.5995 21.0211 19.1222 19.7714 20.1936 18.168C21.2649 16.5647 21.8367 14.6796 21.8367 12.7512C21.834 10.1662 20.8059 7.68783 18.978 5.85994C17.1501 4.03206 14.6718 3.00395 12.0867 3.00122ZM12.8367 20.9665V15.0012H15.0867C15.2856 15.0012 15.4764 14.9222 15.6171 14.7816C15.7577 14.6409 15.8367 14.4501 15.8367 14.2512C15.8367 14.0523 15.7577 13.8615 15.6171 13.7209C15.4764 13.5802 15.2856 13.5012 15.0867 13.5012H12.8367V11.2512C12.8367 10.8534 12.9948 10.4719 13.2761 10.1906C13.5574 9.90926 13.9389 9.75122 14.3367 9.75122H15.8367C16.0356 9.75122 16.2264 9.6722 16.3671 9.53155C16.5077 9.3909 16.5867 9.20013 16.5867 9.00122C16.5867 8.80231 16.5077 8.61154 16.3671 8.47089C16.2264 8.33024 16.0356 8.25122 15.8367 8.25122H14.3367C13.5411 8.25122 12.778 8.56729 12.2154 9.1299C11.6528 9.69251 11.3367 10.4556 11.3367 11.2512V13.5012H9.08674C8.88782 13.5012 8.69706 13.5802 8.55641 13.7209C8.41575 13.8615 8.33674 14.0523 8.33674 14.2512C8.33674 14.4501 8.41575 14.6409 8.55641 14.7816C8.69706 14.9222 8.88782 15.0012 9.08674 15.0012H11.3367V20.9665C9.22248 20.7735 7.26401 19.7729 5.86871 18.1727C4.4734 16.5726 3.74868 14.4962 3.84528 12.3753C3.94188 10.2545 4.85237 8.25249 6.38737 6.78582C7.92236 5.31915 9.96369 4.50069 12.0867 4.50069C14.2098 4.50069 16.2511 5.31915 17.7861 6.78582C19.3211 8.25249 20.2316 10.2545 20.3282 12.3753C20.4248 14.4962 19.7001 16.5726 18.3048 18.1727C16.9095 19.7729 14.951 20.7735 12.8367 20.9665Z"
                            fill="black" />
                    </svg>

                </a>

                <a href="#" class="text-gray-500 hover:text-gray-800">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.9529 8.37012C12.0629 8.37012 11.1928 8.63404 10.4528 9.1285C9.71279 9.62297 9.13602 10.3258 8.79542 11.148C8.45483 11.9703 8.36571 12.8751 8.53935 13.748C8.71298 14.6209 9.14156 15.4228 9.7709 16.0521C10.4002 16.6814 11.2021 17.11 12.075 17.2837C12.9479 17.4573 13.8527 17.3682 14.675 17.0276C15.4972 16.687 16.2 16.1102 16.6945 15.3702C17.189 14.6302 17.4529 13.7601 17.4529 12.8701C17.4516 11.677 16.9771 10.5332 16.1335 9.68951C15.2898 8.84586 14.146 8.37136 12.9529 8.37012ZM12.9529 15.8701C12.3595 15.8701 11.7795 15.6942 11.2862 15.3645C10.7928 15.0349 10.4083 14.5663 10.1812 14.0182C9.95418 13.47 9.89477 12.8668 10.0105 12.2848C10.1263 11.7029 10.412 11.1684 10.8316 10.7488C11.2511 10.3292 11.7857 10.0435 12.3676 9.92776C12.9496 9.81201 13.5528 9.87142 14.1009 10.0985C14.6491 10.3255 15.1176 10.7101 15.4473 11.2034C15.7769 11.6968 15.9529 12.2768 15.9529 12.8701C15.9529 13.6658 15.6368 14.4288 15.0742 14.9914C14.5116 15.554 13.7485 15.8701 12.9529 15.8701ZM17.4529 3.12012H8.45288C7.06095 3.12161 5.72646 3.67521 4.74221 4.65945C3.75797 5.64369 3.20437 6.97819 3.20288 8.37012V17.3701C3.20437 18.762 3.75797 20.0965 4.74221 21.0808C5.72646 22.065 7.06095 22.6186 8.45288 22.6201H17.4529C18.8448 22.6186 20.1793 22.065 21.1635 21.0808C22.1478 20.0965 22.7014 18.762 22.7029 17.3701V8.37012C22.7014 6.97819 22.1478 5.64369 21.1635 4.65945C20.1793 3.67521 18.8448 3.12161 17.4529 3.12012ZM21.2029 17.3701C21.2029 18.3647 20.8078 19.3185 20.1045 20.0218C19.4013 20.725 18.4474 21.1201 17.4529 21.1201H8.45288C7.45832 21.1201 6.50449 20.725 5.80123 20.0218C5.09797 19.3185 4.70288 18.3647 4.70288 17.3701V8.37012C4.70288 7.37556 5.09797 6.42173 5.80123 5.71847C6.50449 5.01521 7.45832 4.62012 8.45288 4.62012H17.4529C18.4474 4.62012 19.4013 5.01521 20.1045 5.71847C20.8078 6.42173 21.2029 7.37556 21.2029 8.37012V17.3701ZM18.9529 7.99512C18.9529 8.21762 18.8869 8.43513 18.7633 8.62013C18.6397 8.80514 18.464 8.94933 18.2584 9.03448C18.0528 9.11963 17.8266 9.14191 17.6084 9.0985C17.3902 9.05509 17.1897 8.94795 17.0324 8.79061C16.8751 8.63328 16.7679 8.43282 16.7245 8.21459C16.6811 7.99637 16.7034 7.77017 16.7885 7.5646C16.8737 7.35903 17.0179 7.18333 17.2029 7.05971C17.3879 6.9361 17.6054 6.87012 17.8279 6.87012C18.1262 6.87012 18.4124 6.98864 18.6234 7.19962C18.8344 7.4106 18.9529 7.69675 18.9529 7.99512Z"
                            fill="black" />
                    </svg>

                </a>

            </div>
        </div>
    </div>
    <!-- Header (Fixed when scrolling) -->
    <header class="w-full z-50 bg-white">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">

            <!-- Left side (Logo) -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('frontend.index') }}"><img src="{{ asset('frontend/images/logo.png') }}"
                        alt="Van Logo" class="h-7 md:h-10" /></a>
            </div>

            <!-- Hamburger Menu Button (Visible on small screens) -->
            <button id="menu-btn" class="md:hidden flex items-center text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Right side (Language + Login/Sign up) -->
            <div class="hidden md:flex items-center space-x-4">

                <!-- Language Dropdown -->
                {{-- <div class="relative inline-block text-left">
                    <button id="language-dropdown"
                        class="flex items-center space-x-2 px-2 py-1 border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none ">
                        <span class="fi fi-us"></span>
                        <span>EN</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="language-options"
                        class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg">
                        <ul class="py-2 text-gray-700">
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center space-x-2">
                                <span class="fi fi-us"></span>
                                <span>English</span>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center space-x-2">
                                <span class="fi fi-fr"></span>
                                <span>French</span>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center space-x-2">
                                <span class="fi fi-es"></span>
                                <span>Spanish</span>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center space-x-2">
                                <span class="fi fi-de"></span>
                                <span>German</span>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                @if (Auth::check())
                    <button class="px-4 py-2 text-gray-700 border-gray-300 rounded-md hover:bg-gray-200 border"><a
                            href="{{ route('frontend.profile') }}">{{ Auth::user()->name }}</a></button>
                @else
                    <!-- Login / Sign up Buttons -->
                    <button class="px-4 py-2 text-gray-700 border-gray-300 rounded-md hover:bg-gray-200 border"><a
                            href="{{ route('login') }}">Login</a></button>
                    <button class="px-4 py-2 text-white bg-gray-900 rounded-md hover:bg-gray-800"><a
                            href="{{ route('register') }}">SIgnup</a></button> @endif
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu"
                    class="menu-toggle md:hidden">
                    <div class="px-4 py-2">
                        <button
                            class="flex items-center space-x-2 px-2 py-1 border border-gray-300 rounded-md w-full mb-2 hidden md:block">
                            <span class="fi fi-us"></span>
                            <span>EN</span>
                        </button>
                        <button
                            class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-200 w-full mb-2"><a
                                href="login.html">Login</a></button>
                        <button class="px-4 py-2 text-white bg-gray-900 rounded-md hover:bg-gray-800 w-full"><a
                                href="signup.html">Signup</a></button>
                    </div>
            </div>
            </header>


            @yield('content')


            <!-- Footer Section -->
            <footer class="bg-black text-white pt-10">

                <div class="container mx-auto px-4 py-4 grid grid-cols-1">
                    <img src="{{ asset('frontend/images/logo-white.png') }}" width="250px" class="mb-5">
                </div>
                <!-- Contact and Info Section -->
                <div class="container mx-auto px-4 py-8 grid grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Contact Info -->
                    <div>
                        <h2 class="text-lg font-bold">Any Queries?</h2>
                        <p class="md:text-xl text-lg font-semibold mt-2">+07 98482609887</p>
                    </div>
                    <!-- Quick Links -->
                    <div>
                        <h2 class="text-lg font-bold">Quick Links</h2>
                        <ul class="mt-2">
                            <li class="pb-2 text-gray-400"><a href="{{ route('frontend.about') }}"
                                    class="hover:text-primary">About Us</a>
                            </li>
                            {{-- <li class="pb-2 text-gray-400"><a href="#" class="hover:text-primary">Blogs</a></li> --}}
                            <li class="pb-2 text-gray-400"><a href="{{ route('frontend.contact') }}" class="hover:text-primary">Contact</a></li>
                        </ul>
                    </div>

                    <div>
                        <h2 class="text-lg font-bold">Others</h2>
                        <ul class="mt-2">
                            <li class="pb-2 text-gray-400"><a href="{{ route('frontend.privacy-policies') }}"
                                    class="hover:text-primary">Privacy
                                    Policy</a>
                            </li>
                            <li class="pb-2 text-gray-400"><a href="{{ route('frontend.privacy-policies') }}" class="hover:text-primary">Terms of
                                    Service</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Connect with us -->
                    <div>
                        <h2 class="text-lg font-bold pb-3">Connect with us</h2>
                        <div class="flex flex-row">
                            <a href="#" class="text-gray-500 hover:text-gray-800">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.0867 3.00122C10.1584 3.00122 8.2733 3.57305 6.66993 4.64439C5.06655 5.71574 3.81686 7.23848 3.07891 9.02006C2.34096 10.8016 2.14787 12.762 2.52408 14.6534C2.90028 16.5447 3.82888 18.282 5.19244 19.6455C6.55601 21.0091 8.29329 21.9377 10.1846 22.3139C12.0759 22.6901 14.0363 22.497 15.8179 21.759C17.5995 21.0211 19.1222 19.7714 20.1936 18.168C21.2649 16.5647 21.8367 14.6796 21.8367 12.7512C21.834 10.1662 20.8059 7.68783 18.978 5.85994C17.1501 4.03206 14.6718 3.00395 12.0867 3.00122ZM12.8367 20.9665V15.0012H15.0867C15.2856 15.0012 15.4764 14.9222 15.6171 14.7816C15.7577 14.6409 15.8367 14.4501 15.8367 14.2512C15.8367 14.0523 15.7577 13.8615 15.6171 13.7209C15.4764 13.5802 15.2856 13.5012 15.0867 13.5012H12.8367V11.2512C12.8367 10.8534 12.9948 10.4719 13.2761 10.1906C13.5574 9.90926 13.9389 9.75122 14.3367 9.75122H15.8367C16.0356 9.75122 16.2264 9.6722 16.3671 9.53155C16.5077 9.3909 16.5867 9.20013 16.5867 9.00122C16.5867 8.80231 16.5077 8.61154 16.3671 8.47089C16.2264 8.33024 16.0356 8.25122 15.8367 8.25122H14.3367C13.5411 8.25122 12.778 8.56729 12.2154 9.1299C11.6528 9.69251 11.3367 10.4556 11.3367 11.2512V13.5012H9.08674C8.88782 13.5012 8.69706 13.5802 8.55641 13.7209C8.41575 13.8615 8.33674 14.0523 8.33674 14.2512C8.33674 14.4501 8.41575 14.6409 8.55641 14.7816C8.69706 14.9222 8.88782 15.0012 9.08674 15.0012H11.3367V20.9665C9.22248 20.7735 7.26401 19.7729 5.86871 18.1727C4.4734 16.5726 3.74868 14.4962 3.84528 12.3753C3.94188 10.2545 4.85237 8.25249 6.38737 6.78582C7.92236 5.31915 9.96369 4.50069 12.0867 4.50069C14.2098 4.50069 16.2511 5.31915 17.7861 6.78582C19.3211 8.25249 20.2316 10.2545 20.3282 12.3753C20.4248 14.4962 19.7001 16.5726 18.3048 18.1727C16.9095 19.7729 14.951 20.7735 12.8367 20.9665Z"
                                        fill="white" />
                                </svg>
                            </a> &nbsp;&nbsp;
                            <a href="#" class="text-gray-500 hover:text-gray-800">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.9529 8.37012C12.0629 8.37012 11.1928 8.63404 10.4528 9.1285C9.71279 9.62297 9.13602 10.3258 8.79542 11.148C8.45483 11.9703 8.36571 12.8751 8.53935 13.748C8.71298 14.6209 9.14156 15.4228 9.7709 16.0521C10.4002 16.6814 11.2021 17.11 12.075 17.2837C12.9479 17.4573 13.8527 17.3682 14.675 17.0276C15.4972 16.687 16.2 16.1102 16.6945 15.3702C17.189 14.6302 17.4529 13.7601 17.4529 12.8701C17.4516 11.677 16.9771 10.5332 16.1335 9.68951C15.2898 8.84586 14.146 8.37136 12.9529 8.37012ZM12.9529 15.8701C12.3595 15.8701 11.7795 15.6942 11.2862 15.3645C10.7928 15.0349 10.4083 14.5663 10.1812 14.0182C9.95418 13.47 9.89477 12.8668 10.0105 12.2848C10.1263 11.7029 10.412 11.1684 10.8316 10.7488C11.2511 10.3292 11.7857 10.0435 12.3676 9.92776C12.9496 9.81201 13.5528 9.87142 14.1009 10.0985C14.6491 10.3255 15.1176 10.7101 15.4473 11.2034C15.7769 11.6968 15.9529 12.2768 15.9529 12.8701C15.9529 13.6658 15.6368 14.4288 15.0742 14.9914C14.5116 15.554 13.7485 15.8701 12.9529 15.8701ZM17.4529 3.12012H8.45288C7.06095 3.12161 5.72646 3.67521 4.74221 4.65945C3.75797 5.64369 3.20437 6.97819 3.20288 8.37012V17.3701C3.20437 18.762 3.75797 20.0965 4.74221 21.0808C5.72646 22.065 7.06095 22.6186 8.45288 22.6201H17.4529C18.8448 22.6186 20.1793 22.065 21.1635 21.0808C22.1478 20.0965 22.7014 18.762 22.7029 17.3701V8.37012C22.7014 6.97819 22.1478 5.64369 21.1635 4.65945C20.1793 3.67521 18.8448 3.12161 17.4529 3.12012ZM21.2029 17.3701C21.2029 18.3647 20.8078 19.3185 20.1045 20.0218C19.4013 20.725 18.4474 21.1201 17.4529 21.1201H8.45288C7.45832 21.1201 6.50449 20.725 5.80123 20.0218C5.09797 19.3185 4.70288 18.3647 4.70288 17.3701V8.37012C4.70288 7.37556 5.09797 6.42173 5.80123 5.71847C6.50449 5.01521 7.45832 4.62012 8.45288 4.62012H17.4529C18.4474 4.62012 19.4013 5.01521 20.1045 5.71847C20.8078 6.42173 21.2029 7.37556 21.2029 8.37012V17.3701ZM18.9529 7.99512C18.9529 8.21762 18.8869 8.43513 18.7633 8.62013C18.6397 8.80514 18.464 8.94933 18.2584 9.03448C18.0528 9.11963 17.8266 9.14191 17.6084 9.0985C17.3902 9.05509 17.1897 8.94795 17.0324 8.79061C16.8751 8.63328 16.7679 8.43282 16.7245 8.21459C16.6811 7.99637 16.7034 7.77017 16.7885 7.5646C16.8737 7.35903 17.0179 7.18333 17.2029 7.05971C17.3879 6.9361 17.6054 6.87012 17.8279 6.87012C18.1262 6.87012 18.4124 6.98864 18.6234 7.19962C18.8344 7.4106 18.9529 7.69675 18.9529 7.99512Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-800"></div>

                <!-- Location, Social Media, and Copyright Section -->
                <div
                    class="container mx-auto px-4 py-6 grid grid-cols-1 md:grid-cols-2 items-center gap-8 justify-between">
                    <!-- Location Info -->
                    <div class="text-left flex items-center">
                        <p class="text-sm flex items-center"><i class="fa fa-map-marker mr-2 fa-2x"
                                aria-hidden="true"></i><span>Location one Address<br><span class="text-gray-500">Sub
                                    text</span></span></p>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <p class="text-sm flex items-center"><i class="fa fa-map-marker mr-2 fa-2x"
                                aria-hidden="true"></i></i><span>Location two Address<br><span class="text-gray-500">Sub
                                    text</span></span>
                        </p>
                    </div>

                    <!-- Copyright -->
                    <div class="text-center md:text-right">
                        <p class="text-sm">&copy; 2024 Rent Luxury Vans. All rights reserved.</p>
                    </div>
                </div>

            </footer>

            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
            <script src="{{ asset('frontend/main.js') }}"></script>
</body>

</html>
