<?php

use App\Models\DasKeluhan;
use App\Models\DasTransaksi;
use App\Models\DasMassage;

if(!function_exists("getAccessType")){
    function getAccessTypeMenu(){
        $menus=session("role_menus")->menus->filter(function($item){
            return $item->link=="/".request()->segment(1);;
        })->first();
        return $menus->pivot->type;
    }
}
if(!function_exists("rupiah")){
    function rupiah($angka){
        $format_rupiah = "Rp " . number_format($angka,2,',','.');
        return $format_rupiah;
    }
}
if(!function_exists("expiredOrder")){
    function expiredOrder(){
       $trans= DasTransaksi::where("status","PENDING")->get();
        foreach ($trans as $item) {
            if(date("Y-m-d H:i:s",strtotime($item->created_at." +5 minutes"))<date("Y-m-d H:i:s",strtotime("now"))){
                $item->status="BATAL";
                $item->save();
            }
            continue;
        }
        return true;
    }
}

function getNotifKeluhan(){
    $massage=DasMassage::whereDate('created_at',date("Y-m-d"))->where('user_id',auth()->user()->id)->get()->count();
    $keluhan=DasKeluhan::where("respon",null)->get()->count();
    $transaksi=DasTransaksi::where("status","PROSES")->get()->count();
    return ["data_keluhan"=>$keluhan,"data_pesan"=>$transaksi,"massage"=>$massage];
}

function notificationManager(){
    $transaksi=DasTransaksi::whereDate('jam_pesan_awal',date("Y-m-d"))->where('status','selesai')->get();
    foreach ($transaksi as $item) {
        DasMassage::create([
            "user_id" => $item->user_id,
            "pesan" => "Hari ini adalah permainan anda, Don't Miss I",
        ]);
        $item->update([
            "status"=>"BOOKED",
        ]);
    }
}
