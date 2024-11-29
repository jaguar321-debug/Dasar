<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "review";
    protected $fillable = ['pengguna_id', 'film_id', 'rating', 'komentar'];

    public function film() {
        return $this->belongsTo(Film::class);
    }
    public function pengguna() {
        return $this->belongsTo(Pengguna::class);
    }
    
}
