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
    <div class="card-body text-center">
    <form action="{{route('updatebukti',$transaksi->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
            <div class="card-subtitle text-muted mb-3">Jumlah yang harus Dibayar</div>
            <h3>Rp.{{$transaksi->total_bayar}},-</h3>
            <div class="alert alert-secondary" role="alert"> 
           <h5 id="countdown" data-time="{{date("Y-m-d H:i:s",strtotime($transaksi->created_at ." +5 minute"))}}">  00:05:00 </h5>
          Harap lakukan pembayaran sebelum waktu habis!</div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="card-img card-img-left" src="{{asset('img/mandiri.png')}}"
                                    alt="Card image" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Bank Mandiri</h5>
                                    <p class="card-text">
                                        08797287
                                    </p>
                                    <p class="card-text"><small class="text-muted">Scudetto Futsal Banyuwangi</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Bank BNI</h5>
                                    <p class="card-text">00087877
                                    </p>
                                    <p class="card-text"><small class="text-muted">Scudetto Futsal Banyuwangi</small></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img class="card-img card-img-right" src="{{asset('img/bni.jpg')}}" alt="Card image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3 text-center">
                <div class="col-sm-12">
                    <input type="file" class="dropify" name="bukti_bayar" data-max-file-size="10000K"
                        data-default-file="<?= isset($transaksi) ?>">
                    <div id="bukti_bayarFeedback" class="invalid-feedback">
                        @error('bukti_bayar') {{$message}} @enderror
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Upload Bukti</button>
                </div>
            </div>
        </form>
    </div>



</div>
</div>
@endsection
