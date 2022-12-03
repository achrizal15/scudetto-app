@extends('template.das')
@section('content')
@php
$page=request()->segment(1);
@endphp
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> {{ucwords($page)}}
</h4>
<div class="card">

    <div class="card-body">
        @if(session("message"))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{session("message")}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>@endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode Pesan</th>
                        <th>Lapangan</th>
                        <th>Jenis</th>
                        <th>Durasi Sewa</th>
                        <th>Tangal Sewa</th>
                        <th>Jam Mulai</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayat as $item)
                    <tr>
                        <td>{{$item->kode}}</td>
                        <td>{{$item->lapangan->name}}</td>
                        <td>{{$item->lapangan->jenis}}</td>
                        <td>{{$item->durasi_sewa}}</td>
                        <td>{{date("d-m-Y", strtotime($item->jam_pesan_awal))}}</td>
                        <td>{{date("H", strtotime($item->jam_pesan_awal))}}:00:00</td>
                        <td>{{$item->total_bayar}}</td>

                        @if ($item->status=="PENDING")
                        <td><a class="badge bg-warning">PENDING</a></td>

                        @elseif($item->status=="PROSES")
                        <td><a class="badge bg-info">PROSES</a></td>
                        @elseif($item->status=="SELESAI"|| $item->status=="BOOKED")
                        <td><a class="badge bg-success ">SELESAI</a></td>
                        @else
                        <td><a class="badge bg-warning">BATAL</a></td>
                        @endif
                        <td>
                            @if($item->status=="SELESAI" && date("Y-m-d H:i", strtotime($item->jam_pesan_awal))<date("Y-m-d H:i",strtotime("now")))
                            <a href="transaksi/edit/{{$item->id}}" class="text-dark"> <i
                                class="bx bx-repost"></i>Reschedule</a>
                            @endif
                            @if ($item->status=="SELESAI"||$item->status=="BOOKED")
                            <a href="{{route('cetakPDF',[$item->id])}}" class="text-dark"> <i
                                    class="bx bx-save"></i>Invoice</a>
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection