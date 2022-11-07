@extends('template.das')
@section('content')
@php
$page=request()->segment(1);
$action=request()->segment(2);
@endphp
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / {{ucwords($page)}} / </span>
    {{ucwords($action)}}
</h4>
<div class="card">
    <div class="card-body">
        <form action="{{$action=='add'?url($page):url($page.'/'.$param->id)}}" method="POST">
            @csrf
            @method($action=="add"?'POST':'PUT')

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
                <label for="jam_pesan_awal" class="col-sm-2 col-form-label">Waktu Awal</label>
                <div class="col-sm-6">
                    <input type="text"  value="Pilih Waktu" required class="form-control datetimepicker" name="jam_pesan_awal"
                        value="<?= isset($transaksi) ? $transaksi->jam_pesan_awal : "" ?>">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jam_pesan_akhir" class="col-sm-2 col-form-label">Waktu Akhir</label>
                <div class="col-sm-6">
                    <input type="text" value="Pilih Waktu" required class="datetimepicker form-control" name="jam_pesan_akhir"
                        value="<?= isset($transaksi) ? $transaksi->jam_pesan_akhir : "" ?>">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>


            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>



</div>
</div>
@endsection

