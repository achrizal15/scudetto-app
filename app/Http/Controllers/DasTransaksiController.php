<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DasTransaksi;
use App\Models\Lapangan;
use Barryvdh\DomPDF\Facade\Pdf;
class DasTransaksiController extends Controller
{
    public function index()
    {
        $jadwal = DasTransaksi::all();
        return view("das.jadwal.index", ["jadwal" => $jadwal]);
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
    public function store(Request $request)
    {
        $validate = $request->validate([
            "lapangan_id" => "required",
            "durasi_sewa" => "required",
            "jam_pesan_awal" => "required",
        ]);
        $validate["jam_pesan_awal"] = date("Y-m-d H", strtotime($validate["jam_pesan_awal"]));
        $validate["user_id"] =auth()->user()->id;
        $validate["total_bayar"] =$validate["durasi_sewa"]*100000;
        $transaksi=DasTransaksi::create($validate);

        return redirect("upload_bukti/$transaksi->id");
    }
    public function upload_bukti(DasTransaksi $transaksi)
    {
        return view("das.transaksi.upload",["transaksi"=>$transaksi]);

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
        $pdf =  Pdf::loadView('das.riwayat.cetak',$data);
        // dd($data);

     return $pdf->download("file.pdf");
    }
}
