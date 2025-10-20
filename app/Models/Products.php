<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'status',
        'deskripsi',
        'gambar',
        'user_id',
    ];

    public function seller() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders() {
        return $this->hasMany(order::class);
    }
}
