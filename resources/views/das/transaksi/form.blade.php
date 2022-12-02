@extends('template.das')
@section('content')
@php
$page=request()->segment(1);
$action=request()->segment(2);
@endphp
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / {{ucwords($page)}} / </span>
    Tambah
</h4>
<div class="card">
    <div class="card-body">
        <form action="{{$action=='add'?url($page):url($page.'/'.$param->id)}}" method="POST">
            @csrf
            @method($action=="add"?'POST':'PUT')

            @if(auth()->user()->role_id==2)
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @else
            <div class="row mb-3">
                <label for="user_id" class="col-sm-2 col-form-label">Pelanggan</label>
                <div class="col-sm-10">
                    <select class="select2 form-control @error('user_id') is-invalid @enderror" id="user_id"
                        style="width: 100%" name="user_id">
                        <option value="" selected>Pilih Pelanggan</option>
                        @foreach($pengguna as $item)
                        <option value="{{$item->id}}" @isset($param) {{$param->user_id==$item->id?'selected':''}}
                            @endisset>{{$item->name}}</option>
                        @endforeach
                    </select>
                    <div id="user_idFeedback" class="invalid-feedback">
                        @error('user_id') {{$message}} @enderror
                    </div>
                </div>
            </div>
            @endif
            <div class="row mb-3">
                <label for="lapangan_id" class="col-sm-2 col-form-label">Lapangan</label>
                <div class="col-sm-10">
                    <select class="select2 form-control @error('lapangan_id') is-invalid @enderror" id="lapangan_id"
                        style="width: 100%" name="lapangan_id">
                        <option value="" selected>Pilih Lapangan</option>
                        @foreach($lapangan as $item)
                        <option value="{{$item->id}}" @isset($param) {{$param->lapangan_id==$item->id?'selected':''}}
                            @endisset>{{$item->name." | Ukuran ".$item->ukuran." Meter | Jenis ".$item->jenis}}</option>
                        @endforeach
                    </select>
                    <div id="lapangan_idFeedback" class="invalid-feedback">
                        @error('lapangan_id') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">tanggal</label>

                    <div class="col-sm-10">
                        <input type="date" data-date="{{date('d-m-Y',strtotime('now'))}}" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal_pesan_lapangan" name="tanggal" value="@isset($param){{date("Y-m-d",strtotime($param->jam_pesan_awal))}}@endisset" />
                        <div id="tanggalFeedback" class="invalid-feedback">
                            @error('tanggal') {{$message}} @enderror
                        </div>
                    </div>
                </div>
            <div class="row mb-3">
                <label for="waktu_awal" class="col-sm-2 col-form-label">Waktu Awal</label>
                <div class="col-sm-10">
                    <select class="select2 form-control @error('waktu_awal') is-invalid @enderror" id="waktu_awal"
                        style="width: 100%" name="waktu_awal" >
                        <option value="" selected>Waktu Awal</option>
                        @isset($param)
                        <option selected value="{{date("H:i",strtotime($param->jam_pesan_awal))}}">{{date("H:i",strtotime($param->jam_pesan_awal))}}</option>
                        @endisset

                    </select>
                    <div id="waktu_awalFeedback" class="invalid-feedback">
                        @error('waktu_awal') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="waktu_akhir" class="col-sm-2 col-form-label">Waktu Akhir</label>
                <div class="col-sm-10">
                    <select class="select2 form-control @error('waktu_akhir') is-invalid @enderror" id="waktu_akhir"
                        style="width: 100%" name="waktu_akhir">
                        <option value="" selected>Waktu Akhir</option>
                        @isset($param)
                        <option selected value="{{date("H:i",strtotime($param->jam_pesan_akhir))}}">{{date("H:i",strtotime($param->jam_pesan_akhir))}}</option>
                        @endisset
                    </select>
                    <div id="waktu_akhirFeedback" class="invalid-feedback">
                        @error('waktu_akhir') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>



</div>
</div>
@endsection

