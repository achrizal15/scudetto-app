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
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <select class="select2 form-control @error('email') is-invalid @enderror" id="email"
                        style="width: 100%" name="user_id">
                        <option value="" selected>Pilih Email</option>
                        @foreach($email as $item)
                        <option value="{{$item->id}}" @isset($param) {{$param->email==$item->id?'selected':''}}
                            @endisset>{{$item->email}}</option>
                        @endforeach
                    </select>
                    <div id="emailFeedback" class="invalid-feedback">
                        @error('email') {{$message}} @enderror
                    </div>
                </div>
            </div>
                <div class="row mb-3">
                    <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control @error('pesan') is-invalid @enderror" id="pesan" name="pesan"
                        placeholder="Isi Pesan" value="@isset($param){{$param->pesan}}@endisset" ></textarea>
                        <div id="pesanFeedback" class="invalid-feedback">
                            @error('pesan') {{$message}} @enderror
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
