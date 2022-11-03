<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DasTransaksi;

class DasTransaksiController extends Controller
{
    public function index()
    {
        $jadwal = DasTransaksi::all();
        return view("das.jadwal.index", ["jadwal" => $jadwal]);
    }
    public function destroy(DasTransaksi $transaski)
    {
        $transaski->delete();
        return redirect("/transaski")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        return view("das.transaski.form");

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
        return redirect("transaski")->with("message", "Data has been added.");
    }
    public function edit(DasTransaksi $transaski)
    {
        return view("das.transaski.form",["param"=>$transaski]);
    }
    public function update(Request $request, DasTransaksi $transaski)
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
