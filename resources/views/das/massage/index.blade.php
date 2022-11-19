@extends('template.das')
@section('content')
@php
$page=request()->segment(1);
@endphp
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> {{ucwords("Message")}}
</h4>


@foreach ($massage as $item)
<div class="col-md-12 col-lg-12 mb-3 mt-3">
                  <div class="card">
                    <h5 class="card-header">Notifikasi</h5>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>
                          {{$item->pesan}}
                        </p>
                        <footer class="blockquote-footer">
                          {{date("Y-m-d",strtotime($item->created_at))}} <br>
                          <cite title="Source Title">tertanda, admin Futsal Scudetto Banyuwangi</cite>
                        </footer>
                      </blockquote>
                    </div>
                  </div>
                </div>
@endforeach

@endsection
