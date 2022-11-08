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
        <table class="table datatable" data-url="{{ url($page)}}/add" data-access="{{getAccessTypeMenu()}}">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>
                        <img width="50" src="{{asset('sneat')}}/assets/img/avatars/5.png" alt="Avatar"
                            class="rounded-circle" />
                    </td>
                    <td>{{$item->name}}</td>
                    <td>
                        {{$item->email}}
                    </td>
                    <td>
                        {{$item->role->name}}
                    </td>
                    {{-- <td><span class="badge bg-label-primary me-1">Active</span></td> --}}
                    <td>
                        @if($item->id==auth()->id()||getAccessTypeMenu()=="RW")
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url($page)}}/{{$item->id}}/edit"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                @if($item->id!=auth()->id())
                                <form action="{{url($page)}}/{{$item->id}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-trash me-1"></i>
                                        Delete</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection