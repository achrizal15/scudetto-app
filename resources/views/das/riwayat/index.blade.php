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
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Pesan</th>
                    <th>Lapangan</th>
                    <th>Jenis</th>
                    <th>Jam Mulai</th>
                    <th>Jam selesai</th>
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
                    <td>{{$item->jam_pesan_awal}}</td>
                    <td>{{$item->jam_pesan_akhir}}</td>

                    @if ($item->status=="PENDING")
                    <td><a class="badge bg-warning">PENDING</a></td>

                    @elseif($item->status=="PROSES")
                    <td><a class="badge bg-info">PROSES</a></td>
                    @elseif($item->status=="SELESAI")
                    <td><a class="badge bg-success">SELESAI</a></td>
                    @else
                    <td><a class="badge bg-warning">BATAL</a></td>
                    @endif
                    <td>
                    @if ($item->status=="SELESAI")
                        
                                <a class="dropdown-item" href="{{url($page)}}/{{$item->id}}/edit"><i
                                        class="bx bx-download me-1"></i>
                                    Cetak</a>
                                <form action="{{url($page)}}/{{$item->id}}" method="post">
                                    @csrf
                                </form>
                        @else
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection