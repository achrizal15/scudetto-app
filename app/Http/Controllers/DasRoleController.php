<?php

namespace App\Http\Controllers;

use App\Models\DasAkun;
use App\Models\DasMenu;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class DasRoleController extends Controller
{

    public function index()
    {
        $roles = Role::latest()->with("menus")->get();
        return view("das.access-control.index", ["data" => $roles]);
    }
    public function destroy(Role $role)
    {
        $role->menus()->detach();
        // $role->akuns()->detach();
        $role->delete();
        return redirect("/access-control")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        $menus = Menu::orderBy("id", "ASC")->get();
        
        return view("das.access-control.form", ["menus" => $menus]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|unique:das_roles,name",
            "landing_page" => "required",
        ]);

        $roleMenu = collect($request->post("menu", []))->filter(function($e){
            return $e!="NA";
        })->map(function ($e) {
            return ["type" => $e];
        });
        $role = Role::create($validate);        
        $role->menus()->sync($roleMenu);
        $role->akuns()->sync($request->akun);
        return redirect("access-control")->with("message", "Data has been added.");
    }
    public function edit(Role $role)
    {
        $menus = DasMenu::orderBy("id", "ASC")->get();
        $akuns = DasAkun::get()->sortBy([
            fn ($a, $b) => intval($a["no_akun"]) <=> intval($b["no_akun"]),
            fn ($a, $b) => $a["id"] <=> $b["id"],
        ]);
        return view("das.access-control.form", ["menus" => $menus, "akuns" => $akuns,"param"=>$role->load(["menus","akuns"])]);
    }
    public function update(Request $request, Role $role)
    {
        $rules = [
            "name" => "required",
            "landing_page" => "required",
        ];
        if($request->email!=$role->email){
            $rules["name"].="|unique:das_roles,name";
        }
        $roleMenu = collect($request->post("menu", []))->filter(function($e){
            return $e!="NA";
        })->map(function ($e) {
            return ["type" => $e];
        });
        $validate=$request->validate($rules);
        $role->update($validate);
        $role->menus()->sync($roleMenu);
        $role->akuns()->sync($request->akun);
        return redirect("access-control")->with("message", "Data has been updated.");
    }
}
