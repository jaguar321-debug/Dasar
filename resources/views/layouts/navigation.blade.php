<nav x-data="{ open: false }" class="bg-[#4A628A] text-white w-64 h-screen fixed overflow-y-auto">
    <!-- Primary Navigation Menu -->
    <div class="p-5">
        <div class="shrink-0 flex items-center justify-center">
            <a href="{{ route('dashboard') }}" class="relative inline-block mr-4 items-center "> 
                <!-- Gambar default -->
                <img src="{{ asset('logo/logos.png') }}"  
                     class="fill-current rounded-lg transition duration-300 ease-in-out transform m-auto hover:scale-105" 
                     style="width: 70%; " 
                     alt="Logo Default">
        
                <!-- Gambar hover -->
                <img src="{{ asset('logo/logo.png') }}" 
                     class="absolute inset-0 rounded-lg m-auto opacity-0 transition-opacity duration-300 ease-in-out hover:opacity-100"  style="width: 70%;"
                     alt="Logo Hover">
            </a>
        </div>
        

        <!-- Garis pemisah -->
        <hr class="my-4 border-t border-[#7AB2D3]">

        <!-- Navigation Links -->
        <div class="mt-5 space-y-2">
            <a href="{{ route('dashboard') }}"
                class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('dashboard') ? ' bg-[#608BC1] text-white' : 'hover: hover:bg-[#091057]  hover:text-white hover:shadow-lg' }}">
                <i class="fa-sharp fa-solid fa-house mr-2"></i>
                {{ __('Dashboard') }}
            </a>
            <a href="{{ route('pengguna.index') }}"
                class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('pengguna.index') ? ' bg-[#608BC1] text-white' : 'hover: hover:bg-[#091057]  hover:text-white hover:shadow-lg' }}">
                <i class="fas fa-users mr-2"></i>
                {{ __('Pengguna') }}
            </a>

            <a href="{{ route('genre.index') }}"
                class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('genre.index') ? ' bg-[#608BC1] text-white' : 'hover: hover:bg-[#091057]  hover:text-white hover:shadow-lg' }}">
                <i class="fa-solid fa-bars-staggered mr-3"></i>
                {{ __('Genre') }}
            </a>
            
            <a href="{{ route('film.index') }}"
                class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('film.index') ? ' bg-[#608BC1] text-white' : 'hover: hover:bg-[#091057]  hover:text-white hover:shadow-lg' }}">
                <i class="fa-solid fa-film mr-4"></i>
                {{ __('Film') }}
            </a>

        
            <a href="{{ route('review.index') }}"
                class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('review.index') ? ' bg-[#608BC1] text-white' : 'hover: hover:bg-[#091057]  hover:text-white hover:shadow-lg' }}">
                <i class="fa-regular fa-comments mr-2"></i>
                {{ __('Review') }}
            </a>


            

            <hr class="my-4 border-t border-[#7AB2D3]">

            <a href="{{ route('profile.edit') }}"
                class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('profile.edit') ? ' bg-[#024CAA] text-white' : 'hover: hover:bg-[#091057]  hover:text-white hover:shadow-lg' }}">
                <i class="fas fa-user mr-2"></i>
                {{ Auth::user()->name }}
            </a>

            <!-- Autentikasi -->
            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-[#091057]  hover:text-white {{ request()->routeIs('logout') ? 'bg-[#024CAA]' : '' }}"
                    onclick="event.preventDefault(); confirmLogout();">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i>
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin ingin log out?',
            text: "Anda akan keluar dari sesi ini.",
            icon: 'warning',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, log out!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>