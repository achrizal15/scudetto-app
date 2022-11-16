<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>landing Page</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/img/favicon.png" rel="icon" />
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{asset('arsha/assets')}}/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha - v4.9.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <img src="{{asset('arsha/assets')}}/img/logo.png " class="img-fluid animated logo me-auto" width="150" height="150">
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link " href="#hero">Home</a></li>
                    <li><a class="nav-link " href="#Information">Information</a></li>
                    <li><a class="nav-link " href="#pricing">Pricing</a></li>
                    <li><a class="nav-link " href="#jadwal">Schedule</a></li>
                    @if(!auth()->user())
                    <li><a class="getstarted scrollto" href="{{asset('login')}}">Login</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h2>Anda ingin memesan lapangan?</h2>
                    <h1>Bergabung Bersama Kami dan Dapatkan layanan Maksimal</h1>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        @if(!auth()->user())
                        <a href="{{route('register')}}" class="btn-get-started scrollto">Register</a>
                        @else
                        <a href="/home" class="btn-get-started scrollto">Dashboard</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{asset('arsha/assets')}}/img/futsal.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= Why Us Section ======= -->
        <section id="Information" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="section-title">
                    <h2>Information</h2>
                </div>

                <div class="row ">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>tentang <br><strong>Scudetto Futsal Banyuwangi</strong></h3>
                            <h5>
                            Scudetto Futsal Banyuwangi merupakan tempat futsal pertama di Banyuwangi yang memiliki lapangan futsal bertaraf internasional. Perlombaan besar seperti Porseni Provinsi, Liga Futsal Banyuwangi, serta Scudetto Competition diadakan di tempat ini. Terletak di Jalan Letjen Sutoyo, Tukang Kayu, Banyuwangi, Jawa Timur Indonesia tepatnya di sebelah timur SDN 4 Penganjuran, Banyuwangi. Scudetto Futsal Banyuwangi memiliki 4 lapangan yang terdiri dari 3 lapangan matras berukuran kecil dan 1 lapangan matras bertaraf internasional.
</h5>
                        </div>


                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img "
                        style='background-image: url("{{asset('arsha/assets')}}/img/scudetto.jpeg");' data-aos="zoom-in"
                        data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pricing</h2>
                    <p>Berikut merupakan harga sewa lapangan di Scudetto Futsal</p>
                </div>

                <div class="row">
                    @foreach ($lapangan as $item)
                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h3>{{$item->name}}</h3>
                            <ul>
                                <li><i class="bx bx-check"></i> Ukuran : {{$item->ukuran}}</li>
                                <li><i class="bx bx-check"></i> Jenis : {{$item->jenis}}</li>
                            </ul>
                            <h4><sup>Rp.</sup>{{intval($item->harga)}},-<span>per Jam</span></h4>
                            <a  href="/transaksi/add"class="buy-btn">
                           Pesan Sekarang
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Pricing Section -->
        <section class="container" id="jadwal">
            <div class="section-title">
                <h2 >Schedule</h2>
            </div>
            <form action="" class="d-flex gap-2 mb-3">
                <div class="col-3">
                    <select class="form-control" name="lapangan" id="">
                        @foreach ($lapangan as $item)
                        <option value="{{$item->id}}" @if(request()->lapangan==$item->id) selected @endif>{{$item->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info text-white">Filter</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jam</th>
                        <th>{{date("d/m/Y",strtotime("now"))}}</th>
                        <th>{{date("d/m/Y",strtotime("now +1 days"))}}</th>
                        <th>{{date("d/m/Y",strtotime("now +2 days"))}}</th>
                        <th>{{date("d/m/Y",strtotime("now +3 days"))}}</th>
                        <th>{{date("d/m/Y",strtotime("now +4 days"))}}</th>
                        <th>{{date("d/m/Y",strtotime("now +5 days"))}}</th>
                        <th>{{date("d/m/Y",strtotime("now +6 days"))}}</th>
                    </tr>
                </thead>
                <tbody>

                    @for ($i = 8 ; $i <= 24; $i++) <tr>
                        <td>{{"$i:00"}} </td>
                        <td>@php
                            $senin= $transaksi->filter(function($e)use($i){
                            $start=date("H",strtotime($e->jam_pesan_awal));
                            $duration=$start+$e->durasi_sewa;

                            if(date("Y-m-d",strtotime("now"))!=date("Y-m-d",strtotime($e->jam_pesan_awal)))
                            return false;
                            return $start<=$i&&$duration>$i; })->first()
                                @endphp
                                @if ($senin)
                                <span
                                    class="@if($senin->status=='PENDING') text-warning @endif ">{{$senin->user->name}}</span>
                                @endif
                        </td>
                        <td>
                            @php
                            $senin= $transaksi->filter(function($e)use($i){
                            $start=date("H",strtotime($e->jam_pesan_awal));
                            $duration=$start+$e->durasi_sewa;
                            $strtime="now +1 days";
                            if(date("Y-m-d",strtotime($strtime))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return
                            false;
                            return $start<=$i&&$duration>$i; })->first()
                                @endphp
                                @if ($senin)
                                <span
                                    class="@if($senin->status=='PENDING') text-warning @endif ">{{$senin->user->name}}</span>
                                @endif
                        </td>
                        <td>
                            @php
                            $senin= $transaksi->filter(function($e)use($i){
                            $start=date("H",strtotime($e->jam_pesan_awal));
                            $duration=$start+$e->durasi_sewa;
                            $strtime="now +2 days";
                            if(date("Y-m-d",strtotime($strtime))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return
                            false;
                            return $start<=$i&&$duration>$i; })->first()
                                @endphp
                                @if ($senin)
                                <span
                                    class="@if($senin->status=='PENDING') text-warning @endif ">{{$senin->user->name}}</span>
                                @endif
                        </td>
                        <td>
                            @php
                            $senin= $transaksi->filter(function($e)use($i){
                            $start=date("H",strtotime($e->jam_pesan_awal));
                            $duration=$start+$e->durasi_sewa;
                            $strtime="now +3 days";
                            if(date("Y-m-d",strtotime($strtime))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return
                            false;
                            return $start<=$i&&$duration>$i; })->first()
                                @endphp
                                @if ($senin)
                                <span
                                    class="@if($senin->status=='PENDING') text-warning @endif ">{{$senin->user->name}}</span>
                                @endif
                        </td>
                        <td>
                            @php
                            $senin= $transaksi->filter(function($e)use($i){
                            $start=date("H",strtotime($e->jam_pesan_awal));
                            $duration=$start+$e->durasi_sewa;
                            $strtime="now +4 days";
                            if(date("Y-m-d",strtotime($strtime))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return
                            false;
                            return $start<=$i&&$duration>$i; })->first()
                                @endphp
                                @if ($senin)
                                <span
                                    class="@if($senin->status=='PENDING') text-warning @endif ">{{$senin->user->name}}</span>
                                @endif
                        </td>
                        <td> @php
                            $senin= $transaksi->filter(function($e)use($i){
                            $start=date("H",strtotime($e->jam_pesan_awal));
                            $duration=$start+$e->durasi_sewa;
                            $strtime="now +5 days";
                            if(date("Y-m-d",strtotime($strtime))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return
                            false;
                            return $start<=$i&&$duration>$i; })->first()
                                @endphp
                                @if ($senin)
                                <span
                                    class="@if($senin->status=='PENDING') text-warning @endif ">{{$senin->user->name}}</span>
                                @endif</td>
                        <td> @php
                            $senin= $transaksi->filter(function($e)use($i){
                            $start=date("H",strtotime($e->jam_pesan_awal));
                            $duration=$start+$e->durasi_sewa;
                            $strtime="now +4 days";
                            if(date("Y-m-d",strtotime($strtime))!=date("Y-m-d",strtotime($e->jam_pesan_awal))) return
                            false;
                            return $start<=$i&&$duration>$i; })->first()
                                @endphp
                                @if ($senin)
                                <span
                                    class="@if($senin->status=='PENDING') text-warning @endif ">{{$senin->user->name}}</span>
                                @endif</td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-links">
                        <div class="social-links mt-3">
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- Button trigger modal -->


    <!-- Modal -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('arsha/assets')}}/vendor/aos/aos.js"></script>
    <script src="{{asset('arsha/assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('arsha/assets')}}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{asset('arsha/assets')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{asset('arsha/assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('arsha/assets')}}/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{asset('arsha/assets')}}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('arsha/assets')}}//js/main.js"></script>

</body>

</html>
