<?php

use App\Http\Controllers\DasLapanganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasLandingController;
use App\Http\Controllers\DasTransaksiController;
use App\Http\Controllers\DasController;
// use App\Http\Controllers\DasLandingController;
use App\Http\Controllers\DasLaporanController;
use App\Http\Controllers\DasPelangganController;
use App\Http\Controllers\DasKeluhanController;
use App\Http\Controllers\DasMassageController;
use App\Http\Controllers\DasMailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasRoleController;
use App\Http\Controllers\DasUser;

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

// Route::get('/', [DasLandingController::class, "index"]);
Route::get('/logout', [AuthController::class, "destroy"])->name("logout");
Route::get('/', [DasLandingController::class, "index"]);
Route::group(["middleware" => "guest"], function () {
    Route::post("/createAuth",[AuthController::class,"createAuth"])->name("createAuth");
    Route::get('/login', [AuthController::class, "index"])->name("login");
    Route::get("/register",[ AuthController::class, "register"])->name("register");
    Route::post("/store", [AuthController::class, "store"]);
});
Route::group(["middleware" => "auth"], function () {
    Route::get('/home', [DasController::class, "index"]);
    Route::get("/user", [DasUser::class, "index"]);
    Route::delete("/user/{user}", [DasUser::class, "destroy"]);
    Route::get("/user/add", [DasUser::class, "add"]);
    Route::post("/user", [DasUser::class, "store"]);
    Route::get("/user/{user}/edit", [DasUser::class, "edit"]);
    Route::put("/user/{user}", [DasUser::class, "update"]);

    // MANAGE ROLE DASHBOARD
    Route::get("/access-control", [DasRoleController::class, "index"]);
    Route::delete("/access-control/{role}", [DasRoleController::class, "destroy"]);
    Route::get("/access-control/add", [DasRoleController::class, "add"]);
    Route::post("/access-control", [DasRoleController::class, "store"]);
    Route::get("/access-control/{role}/edit", [DasRoleController::class, "edit"]);
    Route::put("/access-control/{role}", [DasRoleController::class, "update"]);
    // MANAGE PELANGGAN
    Route::get("/pelanggan", [DasPelangganController::class, "index"]);
    Route::delete("/pelanggan/{pelanggan}", [DasPelangganController::class, "destroy"]);
    Route::get("/pelanggan/add", [DasPelangganController::class, "add"]);
    Route::post("/pelanggan", [DasPelangganController::class, "store"]);
    Route::get("/pelanggan/{pelanggan}/edit", [DasPelangganController::class, "edit"]);
    Route::put("/pelanggan/{pelanggan}", [DasPelangganController::class, "update"]);

    // MANAGE DATA LAPANGAN
    Route::get("/lapangan", [DasLapanganController::class, "index"]);
    Route::delete("/lapangan/{lapangan}", [DasLapanganController::class, "destroy"]);
    Route::get("/lapangan/add", [DasLapanganController::class, "add"]);
    Route::post("/lapangan", [DasLapanganController::class, "store"]);
    Route::get("/lapangan/{lapangan}/edit", [DasLapanganController::class, "edit"]);
    Route::put("/lapangan/{lapangan}", [DasLapanganController::class, "update"]);

    // MANAGE DATA TRANSAKSI
    Route::get("/jadwal", [DasTransaksiController::class, "index"]);
    Route::delete("/transaksi/{transaksi}", [DasTransaksiController::class, "destroy"]);
    Route::get("/transaksi/add", [DasTransaksiController::class, "add"]);
    Route::post("/transaksi", [DasTransaksiController::class, "store"]);
    Route::get("/transaksi/{transaksi}/edit", [DasTransaksiController::class, "edit"]);
    // Route::put("/transaksi/{transaksi}", [DasTransaksiController::class, "update"]);
    Route::post("/transaksi/{transaksi}", [DasTransaksiController::class, "update"])->name('updatebukti');
    Route::get("/upload_bukti/{transaksi}", [DasTransaksiController::class, "upload_bukti"]);
    Route::get("/riwayat", [DasTransaksiController::class, "riwayat"]);
    Route::get("/riwayat/cetak/{riwayat}", [DasTransaksiController::class, "cetakPDF"])->name('cetakPDF');
    Route::get("/data_pesan", [DasTransaksiController::class, "data_pesan"]);
    Route::get("/data_pesan/{transaksi}", [DasTransaksiController::class, "change_condition"])->name('terima');


    // MANAGE DATA LAPORAN
    Route::get("/laporan", [DasLaporanController::class, "index"]);
    Route::get("/laporan/cetak", [DasLaporanController::class, "cetakPDF"])->name('cetakLaporanPDF');

    // MANAGE DATA KELUHAN
    Route::get("/keluhan", [DasKeluhanController::class, "index"]);
    Route::delete("/keluhan/{keluhan}", [DasKeluhanController::class, "destroy"]);
    Route::get("/keluhan/add", [DasKeluhanController::class, "add"]);
    Route::post("/keluhan", [DasKeluhanController::class, "store"]);
    Route::get("/keluhan/{keluhan}/edit", [DasKeluhanController::class, "edit"]);
    Route::put("/keluhan/{keluhan}", [DasKeluhanController::class, "update"]);

    // MANAGE DATA MASSAGE
    Route::get("/massage", [DasMassageController::class, "index"]);
    Route::delete("/massage/{massage}", [DasMassageController::class, "destroy"]);
    Route::get("/massage/add", [DasMassageController::class, "add"]);
    Route::post("/massage", [DasMassageController::class, "store"]);
    Route::get("/massage/{massage}/edit", [DasMassageController::class, "edit"]);
    Route::put("/massage/{massage}", [DasMassageController::class, "update"]);


});
Route::get('/kirim', [DasMailController::class, 'index']);
