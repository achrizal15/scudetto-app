<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // https://boxicons.com/
        $menu=[
            ["name"=>"Dashboard","key"=>"dashboard","icon"=>"bx-home-circle","link"=>"/"],
            ["name"=>"Akun Pelanggan","key"=>"akun_pelanggan","icon"=>"bx-user-circle","link"=>"/pengguna"],
            ["name"=>"Data Lapangan","key"=>"data_lapangan","icon"=>"bx-map-pin","link"=>"/lapangan"],
            ["name"=>"Jadwal Lapangan","key"=>"jadwal_lapangan","icon"=>"bx-calendar","link"=>"/jadwal"],
            ["name"=>"Upload Bukti Bayar","key"=>"upload_bukti_bayar","icon"=>"bx-upload","link"=>"/upload_bukti"],
            ["name"=>"Access Control","key"=>"access_control","icon"=>"bx-cog","link"=>"/access-control","group_name"=>"Settings"],
            ["name"=>"User","key"=>"user","icon"=>"bx-cog","link"=>"/user","group_name"=>"Settings"],
        ];
        foreach($menu as $item){
            if(isset($item["group_name"])){
            $item["group_key"]=strtolower(implode("_",explode(" ",$item["group_name"])));
            }
            Menu::create($item);
        }
    }
}
