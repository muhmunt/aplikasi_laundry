<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="_base_url" content="{{ url('/') }}">
        <title>@yield('title')</title>
        <!-- Favicon -->
        <link href="" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">

        <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">        
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/waves.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
        {{-- datatables CSS --}}
        <link rel="stylesheet" href="{{asset('/css/bootstrap-toggle.css')}}">
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/dataTables.min.css')}}">
        
    </head>
    <body class="{{ $class ?? '' }} bg-white">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.min.js')}}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('js/dataTables.select.min.js')}}"></script>

        <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset ('js/plugins/sweetalert2.js')}}"></script>
        <script src="{{ asset('js/waves.min.js') }}"></script>
        <script src="{{ asset('js/hideShowPassword.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-show-password.min.js') }}"></script>
        <script src="{{ asset('js/moment.min.js')}}"></script>
        <script src="{{ asset('js/daterangepicker.js')}}"></script>
        @stack('js')
        <script>
            function previewFoto(input) {
      
             if (input.files && input.files[0]) {
               var fileReader = new FileReader();
               var imageFile = input.files[0];
            
               if(imageFile.type == "image/png" || imageFile.type == "image/jpeg") {
                 fileReader.readAsDataURL(imageFile);

                        fileReader.onload = function (e) {
                          $('#preview-foto').attr('src', e.target.result);
                        }
                    }
                    else {
                      alert("your file is not image");
                    }
                }
               }
  
                 $("#input-foto").change(function(){
                    $('#preview-foto').removeClass('d-none');
                  previewFoto(this);
              });
        </script>
        <!-- Argon JS -->
        <script src="{{ asset('assets/js/argon.js?v=1.0.0') }}"></script>
    </body>
</html>