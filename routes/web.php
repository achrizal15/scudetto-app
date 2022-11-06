<?php

use App\Http\Controllers\DasPelangganController;
use App\Http\Controllers\DasLapanganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasTransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/logout', [AuthController::class, "destroy"])->name("logout");
Route::group(["middleware" => "guest"], function () {
    Route::get('/login', [AuthController::class, "index"])->name("login");
    Route::post("/store", [AuthController::class, "store"]);
});
Route::group(["middleware" => "auth"], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // MANAGE PELANGGAN
    Route::get("/pelanggan", [DasPelangganControler::class, "index"]);
    Route::delete("/pelanggan/{pelanggan}", [DasPelangganControler::class, "destroy"]);
    Route::get("/pelanggan/add", [DasPelangganControler::class, "add"]);
    Route::post("/pelanggan", [DasPelangganControler::class, "store"]);
    Route::get("/pelanggan/{pelanggan}/edit", [DasPelangganControler::class, "edit"]);
    Route::put("/pelanggan/{pelanggan}", [DasPelangganControler::class, "update"]);

    // MANAGE DATA LAPANGAN
    Route::get("/lapangan", [DasLapanganController::class, "index"]);
    Route::delete("/lapangan/{lapangan}", [DasLapanganController::class, "destroy"]);
    Route::get("/lapangan/add", [DasLapanganController::class, "add"]);
    Route::post("/lapangan", [DasLapanganController::class, "store"]);
    Route::get("/lapangan/{lapangan}/edit", [DasLapanganController::class, "edit"]);
    Route::put("/lapangan/{lapangan}", [DasLapanganController::class, "update"]);

    // MANAGE DATA TRANSAKSI
    Route::get("/jadwal", [DasTransaksiController::class, "index"]);
    Route::delete("/jadwal/{jadwal}", [DasTransaksiController::class, "destroy"]);
    Route::get("/jadwal/add", [DasTransaksiController::class, "add"]);
    Route::post("/jadwal", [DasTransaksiController::class, "store"]);
    Route::get("/jadwal/{jadwal}/edit", [DasTransaksiController::class, "edit"]);
    Route::put("/jadwal/{jadwal}", [DasTransaksiController::class, "update"]);


    Route::get("/upload_bukti", [DasTransaksiController::class, "upload_bukti"]);
});
