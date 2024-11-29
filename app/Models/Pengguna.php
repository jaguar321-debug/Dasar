<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = "pengguna";
    protected $fillable = ['nama', 'email', 'telp', 'alamat'];

    public function review() {
        return $this->hasMany(Review::class);
    }
}
