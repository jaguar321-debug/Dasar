<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- Header Card -->
                    <div class="bg-[#4A628A] text-white font-bold text-center py-4 flex items-center justify-center space-x-2">
                        <i class="fas fa-user-plus"></i>
                        <span>Form Tambah Genre</span>
                    </div>
                    <!-- Card Body -->
                    <div class="p-6">
                        <form method="POST" action="{{ route('genre.store') }}">
                            @csrf
                            <!-- Nama Genre Field -->
                            <div class="mb-4">
                                <div class="relative">
                                    <i class="fas fa-tag absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" id="nama_genre" name="nama_genre" value="{{ old('nama_genre') }}" placeholder="Nama Genre"
                                        class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('nama_genre') border-red-500 @enderror">
                                </div>
                                @error('nama_genre')
                                    <div class="flex items-center text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Deskripsi Field -->
                            <div class="mb-4">
                                <div class="relative">
                                    <i class="fas fa-info-circle absolute top-3 left-3 text-gray-400"></i>
                                    <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi"
                                        class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                                </div>
                                @error('deskripsi')
                                    <div class="flex items-center text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Button Kembali dan Submit -->
                            <div class="flex justify-end space-x-2 mt-4">
                                <a href="{{ route('genre.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Kembali</span>
                                </a>
                                <button type="submit" class="bg-[#4A628A] hover:bg-[#091057] text-white py-2 px-4 rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
                                    <i class="fas fa-save"></i>
                                    <span>Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
