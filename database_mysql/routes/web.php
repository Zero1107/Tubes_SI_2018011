<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/pelanggan');
});

// Route::get('pelanggan', function () {
//     return view('pelanggan');
// });

// Route::get('create', function () {
//     return view('create');
// });

Route::resource('pelanggan', PelangganController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('menu', MenuController::class);
Route::resource('detailtransaksi', DetailTransaksiController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('stock', StockController::class);

Route::get('cetakpelanggan', [PelangganController::class, 'cetak'])->name('cetak.pdf');
Route::get('cetakmenu', [MenuController::class, 'cetak'])->name('cetak.pdf');
Route::get('cetaktransaksi', [TransaksiController::class, 'cetak'])->name('cetak.pdf');