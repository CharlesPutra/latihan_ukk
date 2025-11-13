<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    protected $fillable = ['id_barang','diskon','total'];

    public function barang() {
        return $this->belongsTo(Barang::class,'id_barang');
    }
}
