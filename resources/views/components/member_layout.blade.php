<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Khairat System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <div class="w-[220px] bg-black/5 flex flex-col justify-between min-h-screen">
            <!-- Sidebar Links -->
            <div class="flex flex-col">
                <div class="px-5 py-4 flex items-center gap-3">
                    <div class="w-[31px] h-[31px] bg-gray-300 rounded-full"></div>
                    <a href="{{ route('dashboard') }}" class="text-black text-base font-medium">
                        Dashboard
                    </a>
                </div>
                <div class="px-5 py-4 flex items-center gap-3">
                    <div class="w-[33px] h-[33px] bg-gray-300 rounded-full"></div>
                    <a href="{{ route('profile.edit') }}" class="text-black text-base font-medium">
                        Maklumat Ahli
                    </a>
                </div>
                <div class="px-5 py-4 flex items-center gap-3">
                    <img class="w-[30px] h-[30px]" src="https://via.placeholder.com/30x30" />
                    <a href="#" class="text-black text-base font-medium">
                        Tukar Katalaluan
                    </a>
                </div>
            </div>

            <!-- Footer (optional) -->
            <div class="px-5 py-4">
                <span class="text-sm text-gray-600">© 2025 E-Khairat System</span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow flex flex-col">
            <!-- Navbar -->
            <nav class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <a href="{{ route('dashboard') }}" class="text-lg font-bold text-gray-800">
                                E-Khairat System
                            </a>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">Welcome, {{ auth()->user()->full_name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-red-500 hover:text-red-700">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="p-6 flex-grow">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
