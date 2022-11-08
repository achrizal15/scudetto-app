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
    public function upload_bukti(DasTransaksi $transaksi)
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
        return view("das.transaksi.form", ["lapangan" => $lapangan]);
    }
    public function store(Request $request, DasTransaksi $transaksi)
    {
        $validate = $request->validate([
            "lapangan_id" => "required",
            "jam_pesan_awal" => "required",
            "jam_pesan_akhir" => "required",
        ]);
        $validate["jam_pesan_awal"] = date("Y-m-d H", strtotime($validate["jam_pesan_awal"]));
        $validate["jam_pesan_akhir"] = date("Y-m-d H", strtotime($validate["jam_pesan_akhir"]));
        $validate["user_id"] =auth()->user()->id;
        
        
        DasTransaksi::create($validate);
        return view("das.transaksi.upload", ["param" => $transaksi]);
        // return redirect("upload_bukti")->with("message", "Data has been added.");
    }
    public function edit(DasTransaksi $transaksi)
    {
        return view("das.transaksi.form", ["param" => $transaksi]);
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
        $validate = $request->validate($rules);
        $transaksi->update($validate);
        return redirect("transaksi")->with("message", "Data has been updated.");
    }

    public function riwayat()
    {
        $riwayat = DasTransaksi::all();
        return view("das.riwayat.index", ["riwayat" => $riwayat]);
    }

    public function cetakPDF($id)
    {
        
        $data ['riwayat'] = DasTransaksi::find($id);

        // cetak pdf
        $pdf = \PDF::loadView('das.riwayat.cetak',$data);

        return $pdf->stream('Invoice.pdf');
    }
}
