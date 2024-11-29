<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function index()
    {
        // Menghitung total data untuk statistik di dashboard
        $totalFilms = Film::count();
        $totalGenres = Genre::count();
        $totalReviews = Review::count();


        $film = Film::select('judul', 'image')->latest()->take(1)->get();

        $genre1 = Film::WhereHas('genre', function ($query){
            $query->where('nama_genre', 'aksi');
        })->latest()->get();

        $genre2 = Film::WhereHas('genre', function ($query){
            $query->where('nama_genre', 'petualangan');
        })->latest()->get();

        

        
        // Mengirim data ke view dashboard
        return view('dashboard', compact(
            'totalFilms',
            'totalGenres',
            'totalReviews',
            'film',
            'genre1',
            'genre2'
        ));
    }
}
