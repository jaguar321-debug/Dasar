<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="overflow-auto custom-scroll max-h-[600px] transparent-scrollbar container mx-auto p-8">

        <!-- Konten Film & Chat -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Bagian Kiri: Statistik -->
            <section class="col-span-1 bg-[#4A628A] rounded-2xl p-6">
                <h2 class="text-2xl font-semibold mb-6 text-white flex items-center">
                    <!-- Ikon Header -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a4 4 0 00-.88 7.88M21 7a4 4 0 010 8M5 21h14M9 17v4m6-4v4M3 3h18" />
                    </svg>
                    Pencarian
                </h2>
                
                <div class="space-y-8 text-white">
                    <!-- Total Film -->
                    <div class="flex items-center space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M5 18h14M7 20v-4" />
                        </svg>
                        <div>
                            <h2 class="text-lg font-semibold">Total Film</h2>
                            <p class="text-3xl font-bold mt-1">{{ $totalFilms }}</p>
                        </div>
                    </div>
            
                    <!-- Total Genre -->
                    <div class="flex items-center space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8M8 8h8m-4 8v4M5 20h14" />
                        </svg>
                        <div>
                            <h2 class="text-lg font-semibold">Total Genre</h2>
                            <p class="text-3xl font-bold mt-1">{{ $totalGenres }}</p>
                        </div>
                    </div>
            
                    <!-- Total Review -->
                    <div class="flex items-center space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7M12 3v12" />
                        </svg>
                        <div>
                            <h2 class="text-lg font-semibold">Total Review</h2>
                            <p class="text-3xl font-bold mt-1">{{ $totalReviews }}</p>
                        </div>
                    </div>
                </div>
            </section>
            

            <!-- Bagian Tengah: Highlight Movie -->
            <section class="col-span-2 bg-[#4A628A] rounded-2xl p-6">
                @foreach ($film as $data)
                <div class="mb-6">
                    <h1 class="text-white">Film Terbaru</h1>
                    <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->judul }}"
                        class="w-full h-60 object-cover rounded-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-white mt-4 truncate">{{ $data->judul }}</h3>
                    <button class="bg-white hover:bg-[#D1E9F6] text-[#4A628A] rounded-full px-6 py-2 mt-4">Watch Now</button>
                </div>
                @endforeach
            </section>
        </div>

        <!-- Daftar Film -->
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6">Aksi</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($genre1 as $data)
                <div class="bg-[#4A628A] rounded-xl p-4 relative">
                    <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->judul }}"
                        class="w-full h-48 object-cover rounded-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-white mt-4 truncate">{{ $data->judul }}</h3>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Daftar Film2 -->
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6">Petualangan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($genre2 as $data)
                <div class="bg-[#4A628A] rounded-xl p-4 relative">
                    <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->judul }}"
                        class="w-full h-48 object-cover rounded-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-white mt-4 truncate">{{ $data->judul }}</h3>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- CSS untuk scrollbar transparan -->
    <style>
        .custom-scroll::-webkit-scrollbar {
            display: none;
        }
        .custom-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</x-app-layout>






{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">

<!-- Container Utama -->
<div class="min-h-screen flex">
    

    <!-- Konten Utama -->
    <main class="flex-1 p-8">
        <!-- Header -->
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold">Straminboy</h1>
            <div class="flex items-center space-x-6">
                <!-- Pencarian -->
                <input type="text" placeholder="Search..." class="bg-gray-800 text-white rounded-full px-4 py-2 outline-none">
                <!-- Profil -->
                <div class="relative">
                    <span class="absolute -top-2 -right-2 bg-red-500 text-xs rounded-full px-2 py-1">12</span>
                    <img src="https://via.placeholder.com/32" class="w-8 h-8 rounded-full" alt="Profile">
                </div>
            </div>
        </header>

        <!-- Konten Film & Chat -->
        <div class="grid grid-cols-3 gap-8">
            <!-- Bagian Kiri: Chat -->
            <section class="col-span-1 bg-gray-800 rounded-2xl p-6">
                <h2 class="text-xl font-semibold mb-4">Global Chat</h2>
                <div class="space-y-4">
                    <p><span class="font-bold text-blue-400">Kaido:</span> Where can I download?</p>
                    <p><span class="font-bold text-yellow-400">Rachel:</span> Wow, this is amazing!</p>
                    <p><span class="font-bold text-green-400">Joni:</span> 37 minutes, why did he run?</p>
                    <p><span class="font-bold text-pink-400">Cicilia:</span> Nice movie!</p>
                </div>
                <!-- Input Chat -->
                <input type="text" placeholder="Type your message..." class="w-full mt-4 bg-gray-700 rounded-full px-4 py-2 outline-none">
            </section>

            <!-- Bagian Tengah: Highlight Movie -->
            <section class="col-span-2 bg-gray-800 rounded-2xl p-6 relative">
                <div class="absolute top-4 left-4 bg-red-600 text-white rounded-full px-3 py-1 text-xs">Live</div>
                <h2 class="text-4xl font-bold mb-4">Cyber Last Human</h2>
                <p class="mb-6">The ultimate human battle with future technology to save mankind.</p>
                <button class="bg-red-600 hover:bg-red-700 text-white rounded-full px-6 py-2">Watch Now</button>
            </section>
        </div>

        <!-- Daftar Film -->
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6">Live Movies</h2>
            <div class="grid grid-cols-4 gap-6">
                <div class="bg-gray-800 rounded-xl p-4 relative">
                    <div class="absolute top-2 right-2 bg-red-600 text-white rounded-full px-2 py-1 text-xs">Hot</div>
                    <img src="https://via.placeholder.com/150" class="rounded-lg mb-4" alt="Movie">
                    <h3 class="text-lg font-semibold">Hell Ring</h3>
                </div>
                <div class="bg-gray-800 rounded-xl p-4 relative">
                    <div class="absolute top-2 right-2 bg-red-600 text-white rounded-full px-2 py-1 text-xs">Hot</div>
                    <img src="https://via.placeholder.com/150" class="rounded-lg mb-4" alt="Movie">
                    <h3 class="text-lg font-semibold">Cyber Human</h3>
                </div>
                <div class="bg-gray-800 rounded-xl p-4">
                    <img src="https://via.placeholder.com/150" class="rounded-lg mb-4" alt="Movie">
                    <h3 class="text-lg font-semibold">Hiro</h3>
                </div>
                <div class="bg-gray-800 rounded-xl p-4">
                    <img src="https://via.placeholder.com/150" class="rounded-lg mb-4" alt="Movie">
                    <h3 class="text-lg font-semibold">Future World</h3>
                </div>
            </div>
        </section>
    </main>
</div>

</body>
</html> --}}
