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
                    <th>Jam</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                    <th>Sabtu </th>
                </tr>
            </thead>
            <tbody>

                @for ($i = 8 ; $i <= 22; $i++) <tr>
                    <td>{{"$i:00"}} </td>
                    <td>@php
                        $senin= $transaksi->filter(function($e)use($i){
                        $start=date("H",strtotime($e->jam_pesan_awal));
                        $duration=$start+$e->durasi_sewa;

                        if(date("Y-m-d",strtotime("now"))!=date("Y-m-d",strtotime($e->jam_pesan_awal)))
                        return false;
                        return $start<=$i&&$duration>=$i; })->first()
                            @endphp
                            @if ($senin)
                            {{$senin->user->name}}
                            @endif
                    </td>
                    <td>
                        @php
                        $senin= $transaksi->filter(function($e)use($i){
                        $start=date("H",strtotime($e->jam_pesan_awal));
                        $duration=$start+$e->durasi_sewa;

                        if(date("Y-m-d",strtotime("now +1
                        days"))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return false;
                        return $start<=$i&&$duration>=$i; })->first()
                            @endphp
                            @if ($senin)
                            {{$senin->user->name}}
                            @endif
                    </td>
                    <td>
                        @php
                        $senin= $transaksi->filter(function($e)use($i){
                        $start=date("H",strtotime($e->jam_pesan_awal));
                        $duration=$start+$e->durasi_sewa;

                        if(date("Y-m-d",strtotime("now +2
                        days"))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return false;
                        return $start<=$i&&$duration>=$i; })->first()
                            @endphp
                            @if ($senin)
                            {{$senin->user->name}}
                            @endif
                    </td>
                    <td>
                        @php
                        $senin= $transaksi->filter(function($e)use($i){
                        $start=date("H",strtotime($e->jam_pesan_awal));
                        $duration=$start+$e->durasi_sewa;

                        if(date("Y-m-d",strtotime("now +3
                        days"))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return false;
                        return $start<=$i&&$duration>=$i; })->first()
                            @endphp
                            @if ($senin)
                            {{$senin->user->name}}
                            @endif
                    </td>
                    <td>
                        @php
                        $senin= $transaksi->filter(function($e)use($i){
                        $start=date("H",strtotime($e->jam_pesan_awal));
                        $duration=$start+$e->durasi_sewa;

                        if(date("Y-m-d",strtotime("now +4
                        days"))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return false;
                        return $start<=$i&&$duration>=$i; })->first()
                            @endphp
                            @if ($senin)
                            {{$senin->user->name}}
                            @endif
                    </td>
                    <td> @php
                        $senin= $transaksi->filter(function($e)use($i){
                        $start=date("H",strtotime($e->jam_pesan_awal));
                        $duration=$start+$e->durasi_sewa;

                        if(date("Y-m-d",strtotime("now +5
                        days"))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return false;
                        return $start<=$i&&$duration>=$i; })->first()
                            @endphp
                            @if ($senin)
                            {{$senin->user->name}}
                            @endif</td>
                    <td> @php
                        $senin= $transaksi->filter(function($e)use($i){
                        $start=date("H",strtotime($e->jam_pesan_awal));
                        $duration=$start+$e->durasi_sewa;

                        if(date("Y-m-d",strtotime("now +6
                        days"))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return false;
                        return $start<=$i&&$duration>=$i; })->first()
                            @endphp
                            @if ($senin)
                            {{$senin->user->name}}
                            @endif</td>
                    </tr>
                    @endfor


            </tbody>
        </table>
    </div>
</div>
@endsection