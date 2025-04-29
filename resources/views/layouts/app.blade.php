<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ ucfirst(str_replace('-', ' ', Route::currentRouteName())) }}</title>
    <script src="https://cdn.tailwindcss.com"></script> <!--page styling script -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> <!--controls the click drop down to select page -->
</head>
<body class="m-0 p-0">

<nav class="fixed top-0 left-0 w-full bg-blue-100 border-b-2 border-gray-800 z-50">
    <div class="w-full px-6 py-4 flex justify-center">
        <div class="relative" x-data="{ open: false }">
            <!-- Dropdown Button -->
            <button @click="open = !open"
                    class="flex items-center gap-2 text-lg font-bold text-gray-800 bg-white border border-gray-300 px-4 py-2 rounded-md hover:bg-blue-50 focus:outline-none">
                {{ ucfirst(str_replace('-', ' ', Route::currentRouteName())) }}
                <svg class="w-4 h-4 text-gray-600 transform" :class="{ 'rotate-180': open }"
                     fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false"
                 x-transition
                 class="absolute left-1/2 -translate-x-1/2 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg z-50">
                @foreach ($navbars as $navbarItem)
                    <a href="{{ route($navbarItem->route) }}"
                       class="block px-4 py-2 text-gray-800 hover:bg-blue-100 hover:text-green-900 text-center">
                        {{ $navbarItem->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>

<main class="pt-24 px-6">
    @yield('content')
</main>

</body>
</html>
