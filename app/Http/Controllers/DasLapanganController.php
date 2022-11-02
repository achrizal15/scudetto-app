<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;

class DasLapanganController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::all();
        return view("das.lapangan.index", ["lapangan" => $lapangan]);
    }
    public function destroy(Lapangan $lapangan)
    {
        $lapangan->delete();
        return redirect("/lapangan")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        return view("das.lapangan.form");

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
        Lapangan::create($validate);
        return redirect("lapangan")->with("message", "Data has been added.");
    }
    public function edit(Lapangan $lapangan)
    {
        return view("das.lapangan.form",["param"=>$lapangan]);
    }
    public function update(Request $request, Lapangan $lapangan)
    {
        

        $rules = [
            "name" => "required",
            "jenis" => "required",
            "ukuran" => "required",
            "warna" => "required",
            "harga" => "required",
        ];
        $validate=$request->validate($rules);
        $lapangan->update($validate);
        return redirect("lapangan")->with("message", "Data has been updated.");
    }
}
