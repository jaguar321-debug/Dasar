<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- Header Card -->
                    <div class="bg-[#4A628A] text-white font-bold text-center py-4 flex items-center justify-center space-x-2">
                        <i class="fas fa-user-plus"></i>
                        <span>Form Review</span>
                    </div>
                    <!-- Card Body -->
                    <div class="p-6">
                        <form method="POST" action="{{ route('review.store') }}">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <!-- Pengguna Field -->
                                <div>
                                    <select name="pengguna_id" id="pengguna_id"
                                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('pengguna_id') border-red-500 @enderror">
                                        <option disabled selected>-- Pilih Pengguna --</option>
                                        @foreach ($pengguna as $data)
                                            <option value="{{ $data->id }}" {{ old('pengguna_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pengguna_id')
                                        <div class="flex items-center text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Film Field -->
                                <div>
                                    <select name="film_id" id="film_id"
                                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('film_id') border-red-500 @enderror">
                                        <option disabled selected>-- Pilih Film --</option>
                                        @foreach ($film as $data)
                                            <option value="{{ $data->id }}" {{ old('film_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->judul }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('film_id')
                                        <div class="flex items-center text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Rating Field -->
                            <div class="mb-4">
                                <div class="relative">
                                    <i class="fas fa-star absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="number" id="rating" name="rating" value="{{ old('rating') }}"
                                        placeholder="Rating"
                                        class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('rating') border-red-500 @enderror">
                                </div>
                                @error('rating')
                                    <div class="flex items-center text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Komentar Field -->
                            <div class="mb-4">
                                <div class="relative">
                                    <i class="fas fa-comment-dots absolute top-3 left-3 text-gray-400"></i>
                                    <textarea id="komentar" name="komentar" placeholder="Komentar"
                                        class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('komentar') border-red-500 @enderror">{{ old('komentar') }}</textarea>
                                </div>
                                @error('komentar')
                                    <div class="flex items-center text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Button Kembali dan Submit -->
                            <div class="flex justify-end space-x-2 mt-4">
                                <a href="{{ route('review.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
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
