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
                <label for="respon" class="col-sm-2 col-form-label">Reply</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('respon') is-invalid @enderror" id="respon" name="respon"
                        placeholder="Respon Balasan" value="@isset($param){{$param->respon}}@endisset" />
                    <div id="responFeedback" class="invalid-feedback">
                        @error('respon') {{$message}} @enderror
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
