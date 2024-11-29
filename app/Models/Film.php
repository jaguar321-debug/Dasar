<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = "film";
    protected $fillable = ['judul', 'genre_id', 'sutradara', 'tahun_rilis', 'image'];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
    
    public function reviews() {
        return $this->hasMany(Review::class);
    }
 
}
