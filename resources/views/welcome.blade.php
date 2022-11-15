@extends('template.das')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Hallo {{auth()->user()->name}}! 🎉</h5>
                        <p class="mb-4">
                           Selamat Datang di Dashboard Penyewaan Lapangan Futsal <span class="fw-bold">Scudetto Banyuwangi.</span>
                           <a href="/">Pergi ke halaman depan</a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{asset('sneat/assets')}}/img/illustrations/man-with-laptop-light.png" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{asset('sneat/assets')}}/img/icons/unicons/chart-success.png" alt="Credit Card"
                                    class="rounded" />
                            </div>
                        </div>
                        <span>Jumlah Pelanggan</span>
                        <h3 class="card-title text-nowrap mb-1">{{$pelanggan}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{asset('sneat/assets')}}/img/icons/unicons/chart-success.png" alt="Credit Card"
                                    class="rounded" />
                            </div>
                        </div>
                        <span>Jumlah Lapangan</span>
                        <h3 class="card-title text-nowrap mb-1">{{$lapangan}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Revenue -->

    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{asset('sneat/assets')}}/img/icons/unicons/chart-success.png" alt="Credit Card"
                                    class="rounded" />
                            </div>
                        </div>
                        <span>Jumlah Pemesanan</span>
                        <h3 class="card-title text-nowrap mb-1">{{$pesanan}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{asset('sneat/assets')}}/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                    class="rounded" />
                            </div>
                        </div>
                        <span>Total Saldo</span>
                        <h5 class="card-title text-nowrap mb-1">Rp. {{intval($saldo)}},-</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
