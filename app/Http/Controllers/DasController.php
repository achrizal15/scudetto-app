<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\DasTransaksi;
Use App\Models\Lapangan;


class DasController extends Controller
{
    public function index()
    {
        $pelanggan = User::all()
        ->where('role_id',"1")
        ->count();

        $lapangan = Lapangan::count();

        $pesanan = DasTransaksi::count();

        $saldo = DasTransaksi::sum('total_bayar');

        return view ('welcome', compact('pelanggan','lapangan','pesanan','saldo'));
    }
}
