<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- Header Card -->
                    <div class="bg-[#4A628A] text-white font-bold text-center py-4 flex items-center justify-center space-x-2">
                        <i class="fas fa-user-plus"></i>
                        <span>Form Tambah Film</span>
                    </div>
                    <!-- Card Body -->
                    <div class="p-6">
                        <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Grid untuk Judul dan Genre -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <!-- Judul Field -->
                                <div>
                                    <div class="relative">
                                        <i class="fas fa-film absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                                            class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('judul') border-red-500 @enderror"
                                            placeholder="Judul">
                                    </div>
                                    @error('judul')
                                        <div class="flex items-center text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Genre Field -->
                                <div>
                                    <select name="genre_id" id="genre_id"
                                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('genre_id') border-red-500 @enderror">
                                        <option disabled selected>-- Pilih Genre --</option>
                                        @foreach ($genre as $data)
                                            <option value="{{ $data->id }}" {{ old('genre_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama_genre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('genre_id')
                                        <div class="flex items-center text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Grid for Sutradara and Tahun Rilis -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <!-- Sutradara Field -->
                                <div>
                                    <div class="relative">
                                        <i class="fas fa-user absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" id="sutradara" name="sutradara" value="{{ old('sutradara') }}" 
                                            placeholder="Sutradara" class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('sutradara') border-red-500 @enderror">
                                    </div>
                                    @error('sutradara')
                                        <div class="flex items-center text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Tahun Rilis Field -->
                                <div>
                                    <div class="relative">
                                        <i class="fas fa-calendar-alt absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="number" id="tahun_rilis" name="tahun_rilis" value="{{ old('tahun_rilis') }}" 
                                            placeholder="Tahun Rilis" min="1900" max="2099"
                                            class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('tahun_rilis') border-red-500 @enderror">
                                    </div>
                                    @error('tahun_rilis')
                                        <div class="flex items-center text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Image Field -->
                            <div class="mb-4">
                                <label for="image" class="block text-gray-700">Gambar</label>
                                <input type="file" id="image" name="image">
                                @error('image')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Buttons -->
                            <div class="flex justify-end space-x-2 mt-4">
                                <a href="{{ route('film.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
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
