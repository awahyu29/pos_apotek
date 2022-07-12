<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'suplier',
        'nama',
        'jumlah',
        'biaya',
        'harga_beli',
        'status',
        'ongkir'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
