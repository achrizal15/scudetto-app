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
            "name" => "required|unique:roles,name",
            "landing_page" => "required",
        ]);

        $roleMenu = collect($request->post("menu", []))->filter(function($e){
            return $e!="NA";
        })->map(function ($e) {
            return ["type" => $e];
        });
        $role = Role::create($validate);        
        $role->menus()->sync($roleMenu);
        return redirect("access-control")->with("message", "Data has been added.");
    }
    public function edit(Role $role)
    {
        $menus = Menu::orderBy("id", "ASC")->get();
        return view("das.access-control.form", ["menus" => $menus,"param"=>$role->load(["menus"])]);
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
        return redirect("access-control")->with("message", "Data has been updated.");
    }
}
