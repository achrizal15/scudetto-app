<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DasTransaksi;
use App\Models\Lapangan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class DasTransaksiController extends Controller
{
    public function __construct()
    {
        expiredOrder();
    }
    public function index()
    {
        $transaksi = DasTransaksi::with('user')->where("lapangan_id",request("lapangan")??1)->where("status", "!=", "BATAL")->where("jam_pesan_awal", ">=", date("Y-m-d", strtotime("now")))->where("jam_pesan_akhir", "<=", date("Y-m-d H:i", strtotime("now +7 days")))->get();
        $lapangan=Lapangan::get();
        return view("das.jadwal.index", ["transaksi" => $transaksi,"lapangan"=>$lapangan]);
    }

    public function destroy(DasTransaksi $transaksi)
    {

        $transaksi->delete();
        return redirect("/transaksi")->with("message", "Data has been deleted.");
    }

    public function add()
    {

        $transaksi = DasTransaksi::where("user_id", auth()->user()->id)
            ->where("status", "PENDING")
            ->first();

        if ($transaksi) {

            return redirect("upload_bukti/$transaksi->id");
        }
        $lapangan = Lapangan::get()->sortBy([
            fn ($a, $b) => intval($a["name"]) <=> intval($b["name"]),
            fn ($a, $b) => $a["id"] <=> $b["id"],
        ]);

        $pengguna=User::where('role_id','2')->get()->sortBy([
            fn ($a, $b) => intval($a["name"]) <=> intval($b["name"]),
            fn ($a, $b) => $a["id"] <=> $b["id"],
        ]);

        return view("das.transaksi.form", ["lapangan" => $lapangan,"pengguna" => $pengguna]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "lapangan_id" => "required",
            "tanggal" => "required",
            "waktu_awal" => "required",
            "waktu_akhir" => "required",
        ]);
        $harga = Lapangan::select('harga')->where('id',$validate["lapangan_id"])->get();
        $waktu_awal = explode(":", $request->waktu_awal);
        $waktu_akhir = explode(":", $request->waktu_akhir);
        $validate["durasi_sewa"] = $waktu_akhir[0] - $waktu_awal[0];
        $validate["jam_pesan_awal"] = date("Y-m-d H", strtotime($request->tanggal . "" . $request->waktu_awal));
        $validate["jam_pesan_akhir"] = date("Y-m-d H", strtotime($request->tanggal . "" . $request->waktu_akhir));
        $validate["user_id"] = auth()->user()->id;
        if(auth()->user()->role_id=='2'){
            $validate["user_id"]=$request->user_id;
        }
        $validate["total_bayar"] = $validate["durasi_sewa"] *$harga[0]->harga;

        $transaksi = DasTransaksi::create($validate);

        return redirect("upload_bukti/$transaksi->id");
    }

    public function upload_bukti(DasTransaksi $transaksi)
    {
        if(date("Y-m-d H:i:s",strtotime($transaksi->created_at." +5 minutes"))<date("Y-m-d H:i:s",strtotime("now"))){
           return redirect("/jadwal");
        }
        return view("das.transaksi.upload", ["transaksi" => $transaksi]);
    }

    public function edit(DasTransaksi $transaksi)
    {
        return view("das.transaksi.form", ["param" => $transaksi]);
    }

    public function update(Request $request, DasTransaksi $transaksi)
    {

        $image                   = $request->file('bukti_bayar')->getClientOriginalName();
        $request->file('bukti_bayar')->move('storage', $image);
        $transaksi->bukti_bayar  = $image;
        $transaksi->status       = "PROSES";
        $transaksi->save();


        return redirect("transaksi/add")->with("message", "Data has been updated.");
    }

    public function riwayat()
    {
        $riwayat = DasTransaksi::where("user_id", auth()->user()->id)->latest()->paginate(10)->withQueryString();
        return view("das.riwayat.index", ["riwayat" => $riwayat]);
    }

    public function cetakPDF($id)
    {

        $data['riwayat'] = DasTransaksi::with(['user.alamatLengkap'])->find($id);
        // cetak pdf
        $pdf =  Pdf::loadView('das.riwayat.cetak', $data);
        // dd($data);

        return $pdf->stream("file.pdf");
    }

    public function data_pesan()
    {
        $data_pesan = DasTransaksi::where("status", 'PROSES')->get();
        return view("das.pesanan.index", ["data_pesan" => $data_pesan]);
    }

    public function change_condition(Request $request, DasTransaksi $transaksi)
    {


        $transaksi->status       = $request->status;
        $transaksi->save();


        return redirect("data_pesan")->with("message", "Status has been changes.");
    }
}
