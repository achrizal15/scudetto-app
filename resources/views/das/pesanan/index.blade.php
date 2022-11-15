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
        {{-- <div class="table-responsive"> --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode Pesan</th>
                        <th>Lapangan</th>
                        <th>Durasi Sewa</th>
                        <th>Tangal Sewa</th>
                        <th>Total Bayar</th>
                        <th>Bukti Bayar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_pesan as $item)
                    <tr>
                        <td>{{$item->kode}}</td>
                        <td>{{$item->lapangan->name}}</td>
                        <td>{{$item->durasi_sewa}} Jam</td>
                        <td>{{date("d-m-Y", strtotime($item->jam_pesan_awal))}}</td>
                        <td>{{rupiah($item->total_bayar)}}</td>
                        <td><a target="_blank" href="{{asset('storage/'.$item->bukti_bayar)}}">Lihat</a></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('terima',$item->id).'?status=SELESAI'}}"><i
                                            class="bx bx-check me-1"></i>
                                        Terima</a>
                                    <a class="dropdown-item" href="{{route('terima',$item->id).'?status=BATAL'}}"><i
                                            class="bx bx-x me-1"></i>
                                        Batalkan</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        {{-- </div> --}}
    </div>
</div>
@endsection