<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tgl_masuk',
        'jumlah',
        'harga'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
