<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Pengguna;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::all();
        return view('review.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengguna = Pengguna::all();
        $film = Film::all();
        return view('review.create', compact('pengguna','film'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pengguna_id' => 'required|unique:review,pengguna_id',
            'film_id' => 'required',
            'rating' => 'required|max:1',
            'komentar' => 'required',
        ],[
            'pengguna_id.required' => 'Pengguna tidak boleh kosong',
            'pengguna_id.unique' => 'Pengguna tidak boleh sama',
            'film_id.required' => 'Film tidak boleh kosong',
            'rating.required' => 'Rating tidak boleh kosong',
            'rating.max' => 'Rating tidak boleh lebih/kurang dari 10',
            'komentar.required' => 'Komentar tidak boleh kosong',
        ]);
        

        Review::create($request->all());
        return redirect()->route('review.index')->with('success', 'Review berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $pengguna = Pengguna::all();
        $film = Film::all();
        return view('review.edit', compact('review', 'pengguna', 'film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'pengguna_id' => 'required|unique:review,pengguna_id,' . $review->id,
            'film_id' => 'required',
            'rating' => 'required|max:1',
            'komentar' => 'required',
        ],[
            'pengguna_id.required' => 'Pengguna tidak boleh kosong',
            'pengguna_id.unique' => 'Pengguna sudah digunakan',
            'film_id.required' => 'Film tidak boleh kosong',
            'rating.required' => 'Rating tidak boleh kosong',
            'rating.max' => 'Rating tidak boleh lebih/kurang dari 10',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ]);

        $review->update($request->all());
        return redirect()->route('review.index')->with('success', 'Review berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        $this->reorderIds();

        return redirect()->route('review.index')->with('success', 'Review dihapus dan No diurutkan ulang dengan sukses.');
    }

    /**
     * Mengurutkan ulang ID setelah penghapusan.
     */
    public function reorderIds()
    {
        $review = Review::orderBy('id')->get();
        $counter = 1;

        foreach ($review as $data) {
            $data->id = $counter++;
            $data->save();
        }

        // Setel ulang nilai auto-increment ke ID tertinggi + 1
        DB::statement('ALTER TABLE review AUTO_INCREMENT = ' . ($counter));
    }
    
}
