<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genre = Genre::all();
        return view('genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_genre' => 'required|unique:genre,nama_genre',
            'deskripsi' => 'required',
        ],[
            'nama_genre.required' => 'Nama nama_genre tidak boleh kosong',
            'nama_genre.unique' => 'Nama genre tidak boleh sama',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ]);

        Genre::create($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'nama_genre' => 'required|unique:genre,nama_genre,' . $genre->id,
            'deskripsi' => 'required ',
        ],[
            'nama_genre.required' => 'Nama nama_genre tidak boleh kosong',
            'nama_genre.unique' => 'Nama genre tidak boleh sama',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ]);

        $genre->update($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        if($genre->film()->exists()){
            return redirect()->route('genre.index')->with('error','Genre tidak dapat dihapus, karena masih digunakan.');
        }
        $genre->delete();

        $this->reorderIds();

        return redirect()->route('genre.index')->with('success', 'Genre dihapus dan No diurutkan ulang dengan sukses.');
    }

    /**
     * Mengurutkan ulang ID setelah penghapusan.
     */
    public function reorderIds()
    {
        $genre = Genre::orderBy('id')->get();
        $counter = 1;

        foreach ($genre as $data) {
            $data->id = $counter++;
            $data->save();
        }

        // Setel ulang nilai auto-increment ke ID tertinggi + 1
        DB::statement('ALTER TABLE genre AUTO_INCREMENT = ' . ($counter));
    }
}
