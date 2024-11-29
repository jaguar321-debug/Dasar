<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- Header Card -->
                    <div class="bg-[#4A628A] text-white font-bold text-center py-4 flex items-center justify-center space-x-2">
                        <i class="fas fa-user-edit"></i>
                        <span>Form Edit Penugasan</span>
                    </div>
                    <!-- Card Body -->
                    <div class="p-6">
                        <form method="POST" action="{{ route('pengguna.update', $pengguna->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <!-- Nama Field -->
                                <div>
                                    <label for="nama" class="block text-gray-700">Nama</label>
                                    <div class="relative">
                                        <i class="fas fa-user absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" id="nama" name="nama" value="{{ old('nama', $pengguna->nama) }}" 
                                            class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('nama') border-red-500 @enderror">
                                    </div>
                                    @error('nama')
                                        <div class="flex items-center text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Email Field -->
                                <div>
                                    <label for="email" class="block text-gray-700">Email</label>
                                    <div class="relative">
                                        <i class="fas fa-envelope absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="email" id="email" name="email" value="{{ old('email', $pengguna->email) }}" 
                                            class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('email') border-red-500 @enderror">
                                    </div>
                                    @error('email')
                                        <div class="flex items-center text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Telp Field -->
                            <div class="mb-4">
                                <label for="telp" class="block text-gray-700">Telp</label>
                                <div class="relative">
                                    <i class="fas fa-phone absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" id="telp" name="telp" value="{{ old('telp', $pengguna->telp) }}" 
                                        class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('telp') border-red-500 @enderror">
                                </div>
                                @error('telp')
                                    <div class="flex items-center text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Alamat Field -->
                            <div class="mb-4">
                                <label for="alamat" class="block text-gray-700">Alamat</label>
                                <div class="relative">
                                    <i class="fas fa-map-marker-alt absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $pengguna->alamat) }}" 
                                        class="w-full mt-1 px-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A628A] @error('alamat') border-red-500 @enderror">
                                </div>
                                @error('alamat')
                                    <div class="flex items-center text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Button Kembali dan Submit -->
                            <div class="flex justify-end space-x-2 mt-4">
                                <a href="{{ route('pengguna.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
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
