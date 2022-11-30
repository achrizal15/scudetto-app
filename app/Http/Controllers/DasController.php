<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DasTransaksi;
use App\Models\Lapangan;


class DasController extends Controller
{
    public function __construct()
    {
        notificationManager();
    }
    public function index()
    {
        $pelanggan = User::all()
            ->where('role_id', "2")
            ->count();

        $lapangan = Lapangan::count();

        $pesanan = DasTransaksi::where('status', "SELESAI")->count();
        $pemesanTerbanyak = User::with('transaksi')
        ->where("role_id",2)
            ->limit(5)
            ->get();
        $pemesanTerbanyak = $pemesanTerbanyak->sortBy([fn ($a, $b) =>  count($b['transaksi']) <=> count($a['transaksi'])]);
        $saldo = DasTransaksi::where('status', "SELESAI")->sum('total_bayar');

        return view('welcome', compact('pelanggan', 'lapangan', 'pesanan', 'saldo','pemesanTerbanyak'));
    }
}
