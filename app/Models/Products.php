<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'nama',
        'author',
        'kategori',
        'gambar',
        'jumlah',
        'deskripsi',
    ];

    public function orders() {
        return $this->hasMany(order::class);
    }
}
