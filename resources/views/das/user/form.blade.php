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
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="John Doe" value="@isset($param){{$param->name}}@endisset" />
                    <div id="nameFeedback" class="invalid-feedback">
                        @error('name') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="jon@mvb.co.id" value="@isset($param){{$param->email}}@endisset" />
                    <div id="emailFeedback" class="invalid-feedback">
                        @error('email') {{$message}} @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select class="select2 form-control @error('role_id') is-invalid @enderror" id="role_id"
                        style="width: 100%" name="role_id">
                        <option value="" selected>Select one</option>
                        @foreach($roles as $item)
                        <option value="{{$item->id}}" @isset($param) {{$param->role_id==$item->id?'selected':''}}
                            @endisset>{{$item->name}}</option>
                        @endforeach
                    </select>
                    <div id="role_idFeedback" class="invalid-feedback">
                        @error('role_id') {{$message}} @enderror
                    </div>
                </div>
            </div>
            @if($action=="add")
            <div class="row mb-3 form-password-toggle">
                <label class="col-sm-2 col-form-label">Password</label>
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
            @endif
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection