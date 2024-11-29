<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:pengguna,email',
            'telp' => 'required|unique:pengguna,telp',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email tidak boleh sama',
            'telp.required' => 'Telp tidak boleh kosong',
            'telp.unique' => 'Telp tidak boleh sama',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);

        // Simpan data
        Pengguna::create($request->all());

        // Redirect jika berhasil
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:pengguna,email,' . $pengguna->id,
            'telp' => 'required|unique:pengguna,telp,' . $pengguna->id,
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah digunakan',
            'telp.required' => 'Telp tidak boleh kosong',
            'telp.unique' => 'Telp sudah digunakan',
            'alamat.duplicatee' => 'Alamat tidak boleh sama',
        ]);

        $pengguna->update($request->all());
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengguna $pengguna)
    {
        // // Periksa apakah Pelanggan direferensikan di tabel lain
        // $isReferenced = DB::table('film')->where('nama', $pengguna)->exists(); // Ganti 'pesans' dan 'nama_id' sesuai nama tabel dan kolom sebenarnya

        // if ($isReferenced) {
        //     return redirect()->route('pengguna.index')
        //         ->with('error', 'Pelanggan tidak dapat dihapus karena masih digunakan di data lain.');
        // }

        $pengguna->delete();

        $this->reorderIds();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna dihapus dan No diurutkan ulang dengan sukses.');
    }

    /**
     * Mengurutkan ulang ID setelah penghapusan.
     */
    public function reorderIds()
    {
        $pengguna = Pengguna::orderBy('id')->get();
        $counter = 1;

        foreach ($pengguna as $data) {
            $data->id = $counter++;
            $data->save();
        }

        // Setel ulang nilai auto-increment ke ID tertinggi + 1
        DB::statement('ALTER TABLE pengguna AUTO_INCREMENT = ' . ($counter));
    }
}
