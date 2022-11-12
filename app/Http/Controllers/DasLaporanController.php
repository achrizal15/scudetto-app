<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DasTransaksi;

class DasLaporanController extends Controller
{
    public function index()
    {
        // $filters = [
        //     "from" => $request->from ?? date("Y-m-d", strtotime('now -7 days')),
        //     "to" => $request->to ?? date("Y-m-d", strtotime('now')),
        //     "search" => $request->search
        // ];
        // if (isset($request->export)) return $this->export($filters["from"],$filters["to"]);
        // $data = DasTransaksi::latest()->AkunAccess()->filters($filters)->paginate(10)->withQueryString();
        // $totalDebet = DasTransaksi::select('total_bayar')->AkunAccess()->filters($filters)->whereHas("akun", fn ($q) => $q->where("type", "DEBET"))->sum("saldo");
        // $totalKredit = DasTransaksi::select('total_bayar')->AkunAccess()->filters($filters)->whereHas("akun", fn ($q) => $q->where("type", "KREDIT"))->sum("saldo");
        // return view("das.report-kas.index", ["data" => $data, "total" => [$totalDebet, $totalKredit], "filters" => $filters]);
       
        $laporan = DasTransaksi::all();
        return view("das.laporan.index", ["laporan" => $laporan]);
    }
    public function destroy(DasTransaksi $laporan)
    {
        $laporan->delete();
        return redirect("/laporan")->with("message", "Data has been deleted.");
    }
    public function add()
    {
        return view("das.laporan.form");

    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "jenis" => "required",
            "ukuran" => "required",
            "warna" => "required",
            "harga" => "required",
        ]);
        DasTransaksi::create($validate);
        return redirect("laporan")->with("message", "Data has been added.");
    }
    public function edit(DasTransaksi $laporan)
    {
        return view("das.laporan.form",["param"=>$laporan]);
    }
    public function update(Request $request, DasTransaksi $laporan)
    {
        

        $rules = [
            "name" => "required",
            "jenis" => "required",
            "ukuran" => "required",
            "warna" => "required",
            "harga" => "required",
        ];
        $validate=$request->validate($rules);
        $laporan->update($validate);
        return redirect("laporan")->with("message", "Data has been updated.");
    }
}
