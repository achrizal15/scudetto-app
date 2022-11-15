<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DasKeluhan;

class DasKeluhanController extends Controller
{
    public function index()
    {
        $keluhan = DasKeluhan::where('respon',null);
        return view("das.keluhan.index", ["keluhan" => $keluhan]);
    }
    public function destroy(DasKeluhan $keluhan)
    {
        $keluhan->delete();
        return redirect("/keluhan")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        return view("das.keluhan.form");

    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "user_id" => "required",
            "title" => "required",
            "deskripsi" => "required",
        ]);
        Daskeluhan::create($validate);
        return redirect("keluhan/add")->with("message", "Data has been added.");
    }
    public function edit(DasKeluhan $keluhan)
    {
        return view("das.keluhan.respon",["param"=>$keluhan]);
    }
    public function update(Request $request, DasKeluhan $keluhan)
    {


        $rules = [
            "respon" => "required",
        ];
        $validate=$request->validate($rules);
        $keluhan->update($validate);
        return redirect("keluhan")->with("message", "Data has been updated.");
    }
}
