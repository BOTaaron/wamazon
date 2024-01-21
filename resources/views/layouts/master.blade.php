<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/account-dropdown.js', 'resources/js/app.js'])
</head>
<!-- master webpage template. All future pages will follow this style with different content occurring within the body marked yield -->
<body class="body-bg">
<div class="flex flex-col min-h-screen">
    <nav class="bg-gradient-to-r from-blue-700 to-blue-900 text-white py-3 shadow-md">
        <div class="flex mx-auto px-4 md:px-6 lg:px-8" style="max-width: calc(100% - 50px);">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/wamazon-charcoal.png" alt="Logo" class="h-10 flex items-center mr-5 transform hover:scale-110 transition duration-300">
            </a>
            <!-- Search bar that takes up all available space between nav content using flex grow -->
            <form class="flex w-full ml-4" action="{{ route('store.search') }}" method="GET">
                <select name="category" class="px-2 py-1 border border-r-0 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 pr-8 text-black">
                    <option value="">All Categories</option>
                    <option value="Game">Game</option>
                    <option value="CD">CD</option>
                    <option value="Movie">Movie</option>
                </select>
                <input type="search" name="query" class="px-2 py-1 w-full border focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-black" placeholder="Search">
                <button type="submit" class="bg-white text-black px-3 border border-l-0 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Search</button>
            </form>




            <div class="flex items-center ml-auto">
                <div class="account-dropdown-container relative">
                    <!-- Trigger -->
                    @guest
                        <a href="/dashboard" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white whitespace-nowrap">Sign In</a>
                        <!-- Dropdown menu for guests when not logged in -->
                        <div id="account-dropdown" class="dropdown-content absolute right-0 bg-white shadow-lg mt-1 hidden py-2 w-48">
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-500">Sign In</a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-500">Register</a>
                        </div>
                    @else
                        <a href="/dashboard" class="text-white px-5 py-2 rounded-md text-sm font-medium whitespace-nowrap">Hello, {{ Auth::user()->name }}</a>
                        <!-- Dropdown Menu for Authenticated User -->
                        <div id="account-dropdown" class="dropdown-content absolute right-0 bg-white shadow-lg mt-1 hidden py-2 w-48">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-500">Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>

                <a href="/" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">Home</a>
                <a href="/store" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">Store</a>
                <a href="#" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">Contact</a>
                <a href="#" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">About</a>
                <a href="#" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">News</a>
            </div>
        </div>
    </nav>


    <main class="flex-grow">
    @yield('content')
    </main>


    <!-- Sticky footer that stays at the bottom of the page no matter the size -->
    <footer class="bg-gradient-to-r from-blue-700 to-blue-900 text-white py-6 shadow-md">
        <div class="container mx-auto px-4 md:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <div>
                <h3 class="font-bold text-lg mb-3">Sell with Wamazon</h3>
                <ul>
                    <li><a href="#" class="hover:text-blue-300">Become a Seller</a></li>
                    <li><a href="#" class="hover:text-blue-300">Terms and Conditions</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-3">About Us</h3>
                <ul>
                    <li><a href="#" class="hover:text-blue-300">Careers</a></li>
                    <li><a href="#" class="hover:text-blue-300">Locations</a></li>
                    <li><a href="#" class="hover:text-blue-300">Our Mission</a></li>
                </ul>
            </div>


            <div>
                <h3 class="font-bold text-lg mb-3">Your Data</h3>
                <ul>
                    <li><a href="#" class="hover:text-blue-300">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-blue-300">Cookies</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-3">Support</h3>
                <ul>
                    <li><a href="#" class="hover:text-blue-300">Contact Us</a></li>
                    <li><a href="#" class="hover:text-blue-300">FAQ</a></li>
                    <li><a href="#" class="hover:text-blue-300">Account Queries</a></li>
                </ul>
            </div>
        </div>
    </footer>


</body>
</html>
