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
<body class="font-sans antialiased bg-gray-50 text-black">
    <!-- Main Container -->
    <div class="min-h-screen flex flex-col">
        <!-- Navigation Bar -->
        <nav class="w-full h-20 px-6 bg-white shadow-md flex justify-between items-center">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                <div class="ml-4 text-lg font-medium">E-Khairat System</div>
            </div>
            <div class="flex space-x-6">
                <a href="{{route ("Utama")}}" class="text-sm font-normal hover:text-gray-700">Utama</a>
                <a href="{{route ("Syarat")}}" class="text-sm font-normal hover:text-gray-700">Syarat</a>
                <a href="{{route ("Infaq")}}" class="text-sm font-normal hover:text-gray-700">Infaq</a>
                <a href="{{route ("Login")}}" class="text-sm font-normal hover:text-gray-700">Login</a>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="w-full px-6 py-6 bg-gray-600 text-white text-center flex flex-col sm:flex-row justify-center sm:justify-between items-center">
            <div>© 2023 E-Khairat System. All Rights Reserved</div>
            <div class="flex space-x-6">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms & Conditions</a>
            </div>
        </footer>
    </div>
</body>
</html>
