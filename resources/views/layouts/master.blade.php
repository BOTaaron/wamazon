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
<body class="body-bg">

<nav class="bg-gradient-to-r from-blue-700 to-blue-900 py-3">
    <div class="flex mx-auto px-4 md:px-6 lg:px-8" style="max-width: calc(100% - 50px);">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/images/wamazon-charcoal.png" alt="Logo" class="h-10 flex items-center mr-5 transform hover:scale-110 transition duration-300">
        </a>
        <!-- Search bar that takes up all available space between nav content using flex grow -->
        <div class="flex items-center flex-grow mx-5">
            <form class="flex w-full">
                <input type="search" class="px-2 py-1 rounded-l-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Search">
                <button type="submit" class="bg-white text-black-500 px-3 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Search</button>
            </form>
        </div>

        <div class="user-account-dropdown relative">
            <!-- Trigger for dropdown -->
            <div class="account-trigger text-white cursor-pointer py-2 px-4 hover:bg-blue-600 whitespace-nowrap">
                <span id="account-text">Sign In</span>
            </div>
            <!-- Dropdown content -->
            <div id="account-dropdown" class="dropdown-content absolute right-0 bg-white shadow-lg mt-1 hidden py-2 w-48">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-500">Sign In</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-500">Register</a>
            </div>
        </div>

        <div class="flex items-center ml-auto">
            <a href="#" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">Home</a>
            <a href="#" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">Store</a>
            <a href="#" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">Contact</a>
            <a href="#" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">About</a>
            <a href="#" class="text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-800 hover:border hover:border-white">News</a>
        </div>
    </div>
</nav>

@yield('content')



</body>
</html>
