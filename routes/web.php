<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;



//route barang
Route::resource('/barang', BarangController::class);


//route transaksi
Route::resource('/transaksi', TransaksiController::class);
