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
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Denny Indra" value="@isset($param){{$param->name}}@endisset" />
                    <div id="nameFeedback" class="invalid-feedback">
                        @error('name') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="dennyindra@gmail.com" value="@isset($param){{$param->email}}@endisset" />
                    <div id="emailFeedback" class="invalid-feedback">
                        @error('email') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <input type="hidden" value="2" name="role_id">
            <div class="row mb-3">
                <label for="no_hp" class="col-sm-2 col-form-label">no hp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                        name="no_hp" placeholder="0812xxxxx" value="@isset($param){{$param->alamatLengkap->no_hp}}@endisset" />
                    <div id="no_hpFeedback" class="invalid-feedback">
                        @error('no_hp') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    name="alamat" placeholder="Alamat Anda" value="@isset($param){{$param->alamatLengkap->alamat}}@endisset" />
                <div id="alamatFeedback" class="invalid-feedback">
                    @error('alamat') {{$message}} @enderror
                </div>
                </div>
            </div>

            <div class="row mb-3 form-password-toggle">
                <label class="col-sm-2 col-form-label">Password  @if($action!="add")
                    <small>(Tidak perlu diisi jika tidak ingin merubah password)</small>
                    @endif</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                        <input type="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        <div id="passwordFeedback" class="invalid-feedback">
                            @error('password') {{$message}} @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
