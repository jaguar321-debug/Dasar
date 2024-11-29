<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Pengguna;
use App\Models\Wishlist;
use Illuminate\Http\Request;use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Wishlist::all();
        return view('wishlist.index', compact('wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengguna = Pengguna::all();
        $film = Film::all();
        return view('wishlist.create', compact('pengguna', 'film'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pengguna_id' => 'required',
            'film_id' => 'required',
        ], [
            'pengguna_id.required' => 'Nama pengguna_id tidak boleh kosong',
            'film_id.required' => 'Nama film_id tidak boleh kosong',
        ]);

        Wishlist::create($request->all());
        return redirect()->route('wishlist.index')->with('success', 'Wishlist berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        $pengguna = Pengguna::all();
        $film = Film::all();
        return view('wishlist.edit', compact('wishlist', 'pengguna', 'film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        $request->validate([
            'pengguna_id' => 'required',
            'film_id' => 'required',
        ], [
            'pengguna_id.required' => 'Nama pengguna_id tidak boleh kosong',
            'film_id.required' => 'Nama film_id tidak boleh kosong',
        ]);

        $wishlist->update($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        $this->reorderIds();

        return redirect()->route('wishlist.index')->with('success', 'Daftar Tonton dihapus dan No diurutkan ulang dengan sukses.');
    }

    /**
     * Mengurutkan ulang ID setelah penghapusan.
     */
    public function reorderIds()
    {
        $wishlist = Wishlist::orderBy('id')->get();
        $counter = 1;

        foreach ($wishlist as $data) {
            $data->id = $counter++;
            $data->save();
        }

        // Setel ulang nilai auto-increment ke ID tertinggi + 1
        DB::statement('ALTER TABLE wishlist AUTO_INCREMENT = ' . ($counter));
    }

    public function markAsWatched($id)
    {
        $wishlist = Wishlist::findOrFail($id);

        // Update status menjadi 'sudah ditonton'
        $wishlist->status = 'sudah ditonton';
        $wishlist->save();

        return response()->json(['success' => true, 'status' => 'sudah ditonton']);
    }
}
