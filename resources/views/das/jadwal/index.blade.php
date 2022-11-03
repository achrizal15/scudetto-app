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
                    <th>Sabtu</th>
                </tr>
            </thead>
            <tbody>
               
                @for ($i = 0; $i <= 14; $i++)
                <?php
                $jam=date("H:i",strtotime(8+$i.".00"));
                ?>
                <tr>
                    <td>{{$jam}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                        $kamis=App\Models\DasTransaksi::where("jam_pesan_awal",">=",date("Y-m-d H:i:s",strtotime("2022-11-03 $jam")))->first();
                        ?>
                        {{$kamis!=null?$kamis->user->name:""}}
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                @endfor
                

            </tbody>
        </table>
    </div>
</div>
@endsection