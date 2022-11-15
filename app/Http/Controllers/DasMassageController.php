<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DasMassage;
use App\Models\User;

class DasMassageController extends Controller
{
    public function index()
    {
        $massage = DasMassage::all();
        return view("das.massage.index", ["massage" => $massage]);
    }
    public function destroy(DasMassage $massage)
    {
        $massage->delete();
        return redirect("/massage")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        $email= User::all();
        return view("das.massage.form",["email"=>$email]);

    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "user_id" => "required",
            "pesan" => "required",
        ]);
        DasMassage::create($validate);
        return redirect("massage")->with("message", "Data has been added.");
    }
    public function edit(DasMassage $massage)
    {
        return view("das.massage.respon",["param"=>$massage]);
    }
    public function update(Request $request, DasMassage $massage)
    {


        $rules = [
            "respon" => "required",
        ];
        $validate=$request->validate($rules);
        $massage->update($validate);
        return redirect("massage")->with("message", "Data has been updated.");
    }
}
