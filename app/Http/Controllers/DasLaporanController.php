<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DasTransaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class DasLaporanController extends Controller
{
    public function index()
    {
        $laporan = DasTransaksi::
       where('created_at',">=",date("Y-m-d H:i", strtotime(request()->from)))
        ->where('created_at',"<=",date("Y-m-d H:i", strtotime(request()->to)))
        ->where(function($query){
            $query->orWhere("status","SELESAI")->orWhere("status","BOOKED");
        })
        
        ->get();
        // dd($laporan);
        $total_bayar =  DasTransaksi::where(function($query){
            $query->orWhere("status","SELESAI")->orWhere("status","BOOKED");
        })
        ->where('created_at',">=",date("Y-m-d H:i", strtotime(request()->from)))
        ->where('created_at',"<=",date("Y-m-d H:i", strtotime(request()->to)))->sum('total_bayar');
        $from=request("from");
        $to=request("to");
        return view("das.laporan.index", ["laporan" => $laporan, "total_bayar"=>$total_bayar,"from"=>$from,"to"=>$to]);
    }

    public function cetakPDF()
    {

        $data["laporan"] = DasTransaksi::where("status","SELESAI")->where('created_at',">=",date("Y-m-d H:i", strtotime(request()->from)))
        ->where('created_at',"<=",date("Y-m-d H:i", strtotime(request()->to)))->get();
        // dd($laporan);
        $data["total_bayar"] =  DasTransaksi::where("status","SELESAI")->where('created_at',">=",date("Y-m-d H:i", strtotime(request()->from)))
        ->where('created_at',"<=",date("Y-m-d H:i", strtotime(request()->to)))->sum('total_bayar');
        // cetak pdf
        $pdf =  Pdf::loadView('das.laporan.cetak', $data);
        // dd($data);

        return $pdf->stream("file.pdf");
    }

}
