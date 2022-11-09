@extends('template.das')
@section('content')
@php
$page=request()->segment(1);
$action=request()->segment(2);
@endphp
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / {{ucwords($page)}} / </span>
    {{ucwords($action)}}
</h4>
<form action="{{$action=='add'?url($page):url($page.'/'.$param->id)}}" method="POST" id="form-access-control">
    @csrf
    @method($action=="add"?'POST':'PUT')
    <div class="card accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordion1"
                aria-expanded="true" aria-controls="accordion1">
                <legend>General</legend>
            </button>
        </h2>
        <div id="accordion1" class="accordion-collapse collapse show" aria-labelledby="heading1"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Admin" value="@isset($param){{$param->name}}@endisset" />
                        <div id="nameFeedback" class="invalid-feedback">
                            @error('name') {{$message}} @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="landing_page" class="col-sm-2 col-form-label">Landing page</label>
                    <div class="col-sm-10">
                        <select class="select2 form-control @error('landing_page') is-invalid @enderror"
                            id="landing_page" style="width: 100%" name="landing_page">
                            @if (!isset($param))
                            <option value="">Select access menu first</option>
                            @else
                            @foreach ($param->menus as $item)
                            <option value="{{$item->link}}" @if ($param->landing_page==$item->link)
                                selected
                                @endif>{{$item->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <div id="landing_pageFeedback" class="invalid-feedback">
                            @error('landing_page') {{$message}} @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card accordion-item mt-3">
        <h2 class="accordion-header" id="heading2">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                data-bs-target="#accordion2" aria-expanded="false" aria-controls="accordion2">
                <legend>Access Menu</legend>
            </button>
        </h2>
        <div id="accordion2" class="accordion-collapse collapse" aria-labelledby="heading2"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                @php
                $grouping=[];
                @endphp
                @foreach ($menus as $item)
                @php
                if(isset($param)){
                $rolemenuTypeOf=$param->menus->filter(function($e)use($item){return $item->id==$e->id;})->first();
                $rolemenuTypeOf=$rolemenuTypeOf?$rolemenuTypeOf->pivot->type:'';
                }
                @endphp
                @if (!in_array($item->group_key,$grouping)&&$item->group_key!=null)
                <div class="row">
                    <h5 class="col-sm-2">{{$item->group_name}}</h5>
                    <div class="col-md">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="na-all" name="{{$item->group_key}}"
                                value="{{$item->group_key}}" />
                            <label class="form-check-label">No Access (NA)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="ro-all" name="{{$item->group_key}}"
                                value="{{$item->group_key}}" />
                            <label class="form-check-label">Read Only (RO)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="rw-all" name="{{$item->group_key}}"
                                value="{{$item->group_key}}" />
                            <label class="form-check-label">Read Write (RW)</label>
                        </div>
                    </div>
                </div>
                @php
                array_push($grouping,$item->group_key)
                @endphp
                @endif
                <div class="row mb-3">
                    <label for="{{$item->id}}" class="col-sm-2 col-form-label">{{$item->name}}</label>
                    <div class="col-sm-10">
                        <select class="select2 form-control {{$item->group_key}} menu" id="{{$item->id}}"
                            style="width: 100%" name="menu[{{$item->id}}]">
                            <option value="NA">NA</option>
                            <option @isset($param) {{$rolemenuTypeOf=="RO" ?"selected":""}} @endisset value="RO">RO
                            </option>
                            <option @isset($param) {{$rolemenuTypeOf=="RW" ?"selected":""}} @endisset value="RW">RW
                            </option>
                        </select>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="card accordion-item mt-3">
        <h2 class="accordion-header" id="heading3">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                data-bs-target="#accordion3" aria-expanded="false" aria-controls="accordion3">
                <legend>Access Akun</legend>
            </button>
        </h2>
        <div id="accordion3" class="accordion-collapse collapse" aria-labelledby="heading3"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>NO AKUN</th>
                            <th colspan="2">Name</th>
                            <th>Type</th>
                            <th>Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akuns as $item)
                        @isset($param)
                        @php
                        $akunSelected=$param->akuns->filter(function($e)use($item){return $item->id==$e->id;})
                        @endphp
                        @endisset
                        <tr>
                            @if($item->parent_akun!=null)
                            <td></td>
                            <td>{{$item->no_akun}}</td>
                            <td>{{$item->name}}</td>
                            @else
                            <td>{{$item->no_akun}}</td>
                            <td colspan="2">{{$item->name}}</td>
                            @endif

                            <td><span class="badge {{$item->type=='KREDIT'?'bg-label-danger':'bg-label-success'}}
                                    me-1">{{$item->type}}</span>
                                   </td>
                            <td>
                                <input type="checkbox" @isset($param) {{count($akunSelected)>0?"checked":''}}
                                @endisset class="form-check-input akun-{{$item->parent_akun}}"
                                value="{{$item->id}}" id="check-akun-group" name="akun[]">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> --}}
</form>
<script>
    const menus =JSON.parse('<?php echo json_encode($menus) ?>') ;
</script>
@endsection