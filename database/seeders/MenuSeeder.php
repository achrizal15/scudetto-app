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
            ["name"=>"Dashboard","key"=>"dashboard","icon"=>"bx-home-circle","link"=>"/home"],
            ["name"=>"Akun Pelanggan","key"=>"akun_pelanggan","icon"=>"bx-user-circle","link"=>"/pelanggan"],
            ["name"=>"Data Lapangan","key"=>"data_lapangan","icon"=>"bx-map-pin","link"=>"/lapangan"],
            ["name"=>"Jadwal Lapangan","key"=>"jadwal_lapangan","icon"=>"bx-calendar","link"=>"/jadwal"],
            ["name"=>"Pemesanan Lapangan","key"=>"pemesanan_lapangan","icon"=>"bx-credit-card-alt","link"=>"/transaksi/add"],
            ["name"=>"Data Pesan Lapangan","key"=>"data_pesan","icon"=>"bx-list-ol","link"=>"/data_pesan"],
            ["name"=>"Laporan","key"=>"laporan","icon"=>"bx-receipt","link"=>"/laporan"],
            ["name"=>"Riwayat Pesan","key"=>"riwayat_pesan","icon"=>"bx-archive","link"=>"/riwayat"],
            ["name"=>"Keluhan","key"=>"keluhan","icon"=>"bx-chat","link"=>"/keluhan/add"],
            ["name"=>"Data Keluhan","key"=>"data_keluhan","icon"=>"bx-chat","link"=>"/keluhan"],
            ["name"=>"Message","key"=>"massage","icon"=>"bx-mail-send","link"=>"/massage"],
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
