<?php

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
