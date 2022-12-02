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


            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Lapangan 1" value="@isset($param){{$param->name}}@endisset" />
                    <div id="nameFeedback" class="invalid-feedback">
                        @error('name') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jenis" class="col-sm-2 col-form-label">jenis</label>
                <div class="col-sm-10">
                    <select class="select2 form-control @error('jenis') is-invalid @enderror" id="jenis"
                        style="width: 100%" name="jenis">
                        <option value="" selected>Select one</option>
                        <option value="Rumput" @isset($param) {{$param->jenis =="Rumput"?'selected':''}}
                            @endisset>Rumput</option>
                        <option value="Matras" @isset($param) {{$param->jenis =="Matras"?"selected":""}}
                            @endisset>Matras</option>
                    </select>
                    <div id="jenisFeedback" class="invalid-feedback">
                        @error('jenis') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="ukuran" class="col-sm-2 col-form-label">ukuran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran"
                        name="ukuran" placeholder="4 x 10 meter" value="@isset($param){{$param->ukuran}}@endisset" />
                    <div id="ukuranFeedback" class="invalid-feedback">
                        @error('ukuran') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="warna" class="col-sm-2 col-form-label">warna</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna"
                        placeholder="Hijau" value="@isset($param){{$param->warna}}@endisset" />
                    <div id="warnaFeedback" class="invalid-feedback">
                        @error('warna') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga" class="col-sm-2 col-form-label">harga <small>(Rupiah)</small></label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" min="0" placeholder="Rp 100.000,-"
                        value="@isset($param){{intval($param->harga)}}@endisset" />
                    <div id="hargaFeedback" class="invalid-feedback">
                        @error('harga') {{$message}} @enderror
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
