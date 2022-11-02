<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DasPelangganController extends Controller
{
    public function index()
    {
        $pengguna = User::all();
        return view("das.produk.index", ["pengguna" => $pengguna]);
    }
    public function destroy(User $pengguna)
    {
        $pengguna->delete();
        return redirect("/pengguna")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        return view("das.produk.form");

    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required",
        ]);
        $validate["status"]=$request->status=="on"?"ACTIVE":"INACTIVE";
        User::create($validate);
        return redirect("pengguna")->with("message", "Data has been added.");
    }
    public function edit(User $pengguna)
    {
        return view("das.produk.form",["param"=>$pengguna]);
    }
    public function update(Request $request, User $pengguna)
    {
        

        $rules = [
            "nama" => "required",
        ];
        $validate=$request->validate($rules);
        $validate["status"]=$request->status=="on"?"ACTIVE":"INACTIVE";
        $pengguna->update($validate);
        return redirect("pengguna")->with("message", "Data has been updated.");
    }
}
