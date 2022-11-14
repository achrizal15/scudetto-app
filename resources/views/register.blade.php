<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('sneat/assets//')}}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('sneat/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('sneat/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('sneat/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('sneat/assets/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              @if($errors->any())
              <div class="alert alert-danger" role="alert">
                Login error!
               </div>
              @endif
             
              <!-- /Logo -->
              <h4 class="mb-2">Welcome! 👋</h4>
              {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

              <form id="formAuthentication" class="mb-3" action="{{route('createAuth')}}" method="POST">
                @csrf
                @method("POST")
                <div class="mb-3">
                  <label for="Nama" class="form-label">Nama</label>
                  <input
                    type="text"
                    class="form-control"
                    id="Nama"
                    name="name"
                    placeholder="Enter your Nama"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="no_hp" class="form-label">No Hp</label>
                  <input
                    type="text"
                    class="form-control"
                    id="no_hp"
                    name="no_hp"
                    placeholder="Enter your no_hp"
                    autofocus
                  />
                </div>
                <input type="hidden" name="role_id" value="2">
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input
                    type="text"
                    class="form-control"
                    id="alamat"
                    name="alamat"
                    placeholder="Enter your alamat"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  {{-- gloria.kuhn@example.com --}}
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    value=""
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                   
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      value=""
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
               
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('sneat/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('sneat/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('sneat/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('sneat/assets/vendor/js/menu.js')}}"></script>

    <script src="{{asset('sneat/assets/js/main.js')}}"></script>

  </body>
</html>