<?php

namespace App\Http\Controllers;

use App\Models\AlamatLengkap;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DasPelangganController extends Controller
{
    public function index()
    {
        $pelanggan = User::latest()->where("role_id", 2)->with("alamatLengkap")->paginate()->withQueryString();

        return view("das.pelanggan.index", ["pelanggan" => $pelanggan]);
    }
    public function destroy(User $pelanggan)
    {
        $pelanggan->delete();
        return redirect("/pelanggan")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        return view("das.pelanggan.form");
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required",
            "role_id"=>"required",
        ]);
        $validate["password"]=Hash::make($request->password);
        $user = User::create($validate);
        AlamatLengkap::create([
            "user_id" => $user->id,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
        ]);
        return redirect("pelanggan")->with("message", "Data has been added.");
    }
    public function edit(User $pelanggan)
    {
        return view("das.pelanggan.form", ["param" => $pelanggan->load("alamatLengkap")]);
    }
    public function update(Request $request, User $pelanggan)
    {
        $rules = [
            "name" => "required",
            "email" => "required",
            "role_id"=>"required",
        ];
        if($request->email!=$pelanggan->email){
            $rules["email"].="|unique:users,email";
        }
        $validate = $request->validate($rules);
        if($request->password!=""){
            $validate["password"]=Hash::make($request->password);
        }
        $pelanggan->update($validate);
        $pelanggan->alamatLengkap()->update([
            "alamat"=>$request->alamat,
            "no_hp"=>$request->no_hp
        ]);
        return redirect("pelanggan")->with("message", "Data has been updated.");
    }
}
