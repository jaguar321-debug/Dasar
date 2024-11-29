<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();
        return view('film.index', compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        return view('film.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:film,judul',
            'genre_id' => 'required',
            'sutradara' => 'required',
            'tahun_rilis' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.unique' => 'Judul sudah digunakan',
            'genre_id.required' => 'Genre tidak boleh kosong',
            'sutradara.required' => 'Sutradara tidak boleh kosong',
            'tahun_rilis.required' => 'Tahun Rilis tidak boleh kosong',
            'image.required' => 'Gambar tidak boleh kosong',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Store image and get path
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Film::create($data);

        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $genre = Genre::all();
        return view('film.edit', compact('film', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'judul' => 'required|unique:film,judul,' . $film->id,
            'genre_id' => 'required',
            'sutradara' => 'required',
            'tahun_rilis' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.unique' => 'Judul sudah digunakan',
            'genre_id.required' => 'Genre tidak boleh kosong',
            'sutradara.required' => 'Sutradara tidak boleh kosong',
            'tahun_rilis.required' => 'Tahun Rilis tidak boleh kosong',
            'image.required' => 'Gambar tidak boleh kosong',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($film->image && Storage::disk('public')->exists($film->image)) {
                Storage::disk('public')->delete($film->image);
            }

            // Store new image
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $film->update($data);

        return redirect()->route('film.index')->with('success', 'Film Berhasil Di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        if ($film->image && Storage::disk('public')->exists($film->image)) {
            Storage::disk('public')->delete($film->image);
        }

        $film->delete();

        $this->reorderIds();

        return redirect()->route('film.index')->with('success', 'Film dihapus dan ID diurutkan ulang dengan sukses.');
    }

    /**
     * Reorder IDs after deletion.
     */
    public function reorderIds()
    {
        DB::statement('SET @count = 0');
        DB::statement('UPDATE film SET id = @count:= @count + 1');
        DB::statement('ALTER TABLE film AUTO_INCREMENT = 1');
    }
}
