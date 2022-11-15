@extends('template.das')
@section('content')
@php
$page=request()->segment(1);
@endphp
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> {{ucwords($page)}}
</h4>
<div class="card">

    <div class="card-body">
        @if(session("message"))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{session("message")}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>@endif
        <table class="table " data-url="{{ url($page)}}/edit">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>keluhan</th>
                    <th>deskripsi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keluhan as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url($page)}}/{{$item->id}}/edit"><i class="bx bx-chat me-1"></i>
                                    Reply</a>
                                    <form action="{{url($page)}}/{{$item->id}}" method="post">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
