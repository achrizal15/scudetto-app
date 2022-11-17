<?php

namespace App\Http\Controllers;

use App\Models\AlamatLengkap;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        notificationManager();
        return view("login");
    }
    public function register()
    {
        return view("register");
    }
    public function createAuth(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required",
            "role_id" => "required",
        ]);
        $validate["password"] = Hash::make($request->password);
        $user = User::create($validate);
        AlamatLengkap::create([
            "user_id" => $user->id,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
        ]);
      return  $this->store($request);
    }
    public function store(Request $request)
    {
        // validasi input user
        $validate = $request->validate([
            'email' => "email|required",
            'password' => "required"
        ]);
        if (!Auth::attempt($validate)) {
            return back()->withErrors([
                'email' => 'Login error!',
            ]);
        }
        $request->session()->regenerate();
        $roleaccess = Role::where("id", auth()->user()->role_id)->with("menus")->first();
        session(["role_menus" => $roleaccess]);
        return redirect($roleaccess->landing_page);
    }
    public function destroy()
    {
        notificationManager();
        Auth::logout();
        return redirect("/login");
    }
}
