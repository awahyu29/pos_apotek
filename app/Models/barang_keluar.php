<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_keluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jumlah',
        'harga'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
