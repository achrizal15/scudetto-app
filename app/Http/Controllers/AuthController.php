<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function register(){
        return view("register");
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
        Auth::logout();
        return redirect("/login");
    }
}
