<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = "genre";
    protected $fillable = ['nama_genre', 'deskripsi'];

    public function film() {
        return $this->belongsToMany(Film::class);
    }
    
}
