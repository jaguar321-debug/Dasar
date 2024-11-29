<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    

    <!-- Flowbite & FontAwesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Vite Scripts for Laravel 10 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#CBDCEB]">
    <div class="flex min-h-screen bg-[#CBDCEB]">
        <!-- Sidebar -->
        <div class="w-64 text-white fixed h-full">
            @include('layouts.navigation')
        </div>

        <!-- Page Content -->
        <div class="flex-1 p-6 ml-64">
            @if (isset($header))
                <header class="bg-[#4A628A] shadow-lg rounded-lg">
                    <div class="flex justify-center max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Toastify Notifications -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 2500,
                    gravity: "top",
                    position: 'right',
                    backgroundColor: "#4CAF50",
                    close: true,
                    stopOnFocus: true,
                }).showToast();
            @endif

            @if(session('error'))
                Toastify({
                    text: "{{ session('error') }}",
                    duration: 2500,
                    gravity: "top",
                    position: 'right',
                    backgroundColor: "#d12525",
                    close: true,
                    stopOnFocus: true,
                }).showToast();
            @endif
        });
    </script>

    <!-- Additional Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
