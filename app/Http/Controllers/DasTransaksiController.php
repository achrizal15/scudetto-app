<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DasTransaksi;
use App\Models\Lapangan;

class DasTransaksiController extends Controller
{
    public function index()
    {
        $jadwal = DasTransaksi::all();
        return view("das.jadwal.index", ["jadwal" => $jadwal]);
    }
    public function upload_bukti()
    {
        return view("das.transaksi.upload");

    }
    public function destroy(DasTransaksi $transaksi)
    {
        $transaksi->delete();
        return redirect("/transaksi")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        
        $lapangan = Lapangan::get()->sortBy([
            fn ($a, $b) => intval($a["name"]) <=> intval($b["name"]),
            fn ($a, $b) => $a["id"] <=> $b["id"],
        ]);
        return view("das.transaksi.form",["lapangan" => $lapangan]);

    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "jenis" => "required",
            "ukuran" => "required",
            "warna" => "required",
            "harga" => "required",
        ]);
        DasTransaksi::create($validate);
        return redirect("transaksi")->with("message", "Data has been added.");
    }
    public function edit(DasTransaksi $transaksi)
    {
        return view("das.transaksi.form",["param"=>$transaksi]);
    }
    public function update(Request $request, DasTransaksi $transaksi)
    {
        

        $rules = [
            "name" => "required",
            "jenis" => "required",
            "ukuran" => "required",
            "warna" => "required",
            "harga" => "required",
        ];
        $validate=$request->validate($rules);
        $transaksi->update($validate);
        return redirect("transaksi")->with("message", "Data has been updated.");
    }
}
