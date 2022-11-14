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
        </div>
        @endif
        <form action="#" id="form-filters">
            <input type="hidden" id="value-from-search" value="#" name="search">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="from">From</label>
                    <input type="date" class="form-control" name="from" id="from" value="#" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="to">to</label>
                    <input type="date" class="form-control" id="to" name="to" value="#" />
                </div>
            </div>
            <div class="row">
                <div class="d-grid gap-2 col-lg-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
                <div class="d-grid gap-2 col-lg-3">
                    <a name="export" href="{{route('cetakLaporanPDF').'?from='.$from.'&to='.$to}}" class="btn btn-primary">Export</a>
                </div>
            </div>

        </form>
        <table class="table mt-2" data-url="{{ url($page)}}/add" data-access="{{getAccessTypeMenu()}}">
            <thead>
                <tr>
                    <th>date</th>
                    <th width="150px">No. Bukti</th>
                    <th>Pemesan</th>
                    <th>Lapangan</th>
                    <th>Durasi</th>
                    <th >Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                <tr>
                    <td>
                        {{date("d/m/Y",strtotime($item->jam_pesan_awal))}}
                    </td>
                    <td>
                        {{$item->kode}}
                    </td>
                    <td>
                        {{$item->user->name}}
                    </td>
                    <td>
                        {{$item->lapangan->name}}
                    </td>
                    <td>
                        {{$item->durasi_sewa}} Jam
                    </td>
                    <td>
                        Rp. {{$item->total_bayar}},-
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">Total</th>
                    <th>Rp. {{$total_bayar}},-</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
