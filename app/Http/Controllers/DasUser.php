<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DasUser extends Controller
{

    public function index()
    {
        $users = User::latest()->where("role_id","!=",2)->with("role")->get();
        return view("das.user.index", ["data" => $users]);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect("/user")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        $roles = Role::orderBy("name", "ASC")->where("id", "!=", 2)->get();
        return view("das.user.form", ["roles" => $roles]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "email" => "required|unique:users,email|email:rfc,dns",
            "password" => "required",
            "name" => "required",
            "role_id" => "required"
        ]);
        $validate["password"] = Hash::make($validate["password"]);
        User::create($validate);
        return redirect("user")->with("message", "Data has been added.");
    }
    public function edit(User $user)
    {
        $roles = Role::orderBy("name", "ASC")->get();
        return view("das.user.form", ["roles" => $roles, "param" => $user]);
    }
    public function update(Request $request, User $user)
    {
        $rules = [
            "email" => "required|email:rfc,dns",
            "name" => "required",
            "role_id" => "required"
        ];
        if ($request->email != $user->email) {
            $rules["email"] .= "|unique:users,email";
        }
        $validate = $request->validate($rules);
        $user->update($validate);
        return redirect("user")->with("message", "Data has been updated.");
    }
}
