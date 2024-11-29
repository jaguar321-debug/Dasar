<x-app-layout>
    <div class="container mx-auto mt-6 p-4">
        <h1 class="text-2xl font-semibold mb-6 text-[#4A628A] ">Detail Film</h1>
        
        <div class="bg-[#D1E9F6] shadow-md rounded-lg overflow-hidden ">
            <div class="bg-[#4A628A] text-white text-lg font-semibold px-6 py-4">
                {{ $film->judul }}
            </div>
            
            <div class="p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <!-- Film Image -->
                    <div class="md:w-1/3 w-full mb-4 md:mb-0 text-center">
                        @if ($film->image)
                            <img src="{{ Storage::url($film->image) }}" alt="{{ $film->judul }}" class="rounded-lg shadow-md max-w-full h-auto">
                        @else
                            <p class="text-gray-500 italic">Gambar tidak tersedia</p>
                        @endif
                    </div>
                    
                    <!-- Film Details -->
                    <div class="md:w-2/3 w-full mt-4 md:mt-0 md:pl-6">
                        <table class="w-full text-gray-700 ">
                            <tbody>
                                <tr>
                                    <td class="py-2 font-medium">Genre</td>
                                    <td class="py-2">: {{ $film->genre->nama_genre }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 font-medium">Sutradara</td>
                                    <td class="py-2">: {{ $film->sutradara }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 font-medium">Tahun</td>
                                    <td class="py-2">: {{ $film->tahun_rilis }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-6 text-center">
                    <a href="{{ route('film.index') }}" class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition ease-in-out duration-200 dark:bg-gray-600 dark:hover:bg-gray-500">
                        Kembali ke Daftar Film
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
