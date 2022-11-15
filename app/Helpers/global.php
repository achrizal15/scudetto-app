<?php

use App\Models\DasTransaksi;

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
