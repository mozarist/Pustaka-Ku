<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'products_id',
        'nama_pemesan',
        'alamat',
        'jumlah',
        'kurir',
        'metode_pembayaran',
        'status',
        'total_harga',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Products() {
        return $this->belongsTo(Products::class, 'products_id');
    }
}
