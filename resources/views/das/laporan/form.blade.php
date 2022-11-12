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
            <div class="row mb-3">
                <label for="akun_id" class="col-sm-2 col-form-label">akun</label>
                <div class="col-sm-10">
                    <select class="select2 form-control @error('akun_id') is-invalid @enderror" id="akun_id"
                        style="width: 100%" name="akun_id">
                        <option value="" selected>Select one</option>
                        @foreach($akun as $item)
                        <option value="{{$item->id}}" @isset($param) {{$param->akun_id==$item->id?'selected':''}}
                            @endisset>{{$item->no_akun." | ".$item->name}}</option>
                        @endforeach
                    </select>
                    <div id="akun_idFeedback" class="invalid-feedback">
                        @error('akun_id') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="saldo" class="col-sm-2 col-form-label">saldo <small>(Rupiah)</small></label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('saldo') is-invalid @enderror" id="saldo" name="saldo"
                        placeholder="200000" value="@isset($param){{intval($param->saldo)}}@endisset" />
                    <div id="saldoFeedback" class="invalid-feedback">
                        @error('saldo') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        placeholder="Uraian kas" value="@isset($param){{$param->description}}@endisset" />
                    <div id="descriptionFeedback" class="invalid-feedback">
                        @error('description') {{$message}} @enderror
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
@endsection