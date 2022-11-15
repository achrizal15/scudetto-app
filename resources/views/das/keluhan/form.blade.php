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
                    <label for="title" class="col-sm-2 col-form-label">Keluhan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        placeholder="keluhan" value="@isset($param){{$param->title}}@endisset" />
                        <div id="titleFeedback" class="invalid-feedback">
                            @error('title') {{$message}} @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                        placeholder="deskripsi" value="@isset($param){{$param->deskripsi}}@endisset"></textarea>
                        <div id="deskripsiFeedback" class="invalid-feedback">
                            @error('deskripsi') {{$message}} @enderror
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

