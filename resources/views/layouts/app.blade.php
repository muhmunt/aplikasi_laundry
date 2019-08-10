<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{asset ('img/alfamind/Mind_logo_header.png')}}">
        <title>@yield('title')</title>
        {{-- css file --}}
        <link rel="stylesheet" href="{{ asset ('css/animate.css')}}">
        <link rel="stylesheet" href="{{ asset ('css/bootstrap.css')}}">
        {{--  --}}
        {{-- <link rel="stylesheet" href="{{asset('css/homes.css')}}"> --}}      
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/waves.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/placeholder-loading.min.css')}}">
        <!-- ANIMATE CSS -->
        <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">        
        
        <meta name="Description" content="@ArtTerror23"/>
        <!-- theme-color defines the top bar color (blue in my case)-->
        <!-- Add to home screen for Safari on iOS-->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="default" />
        <meta name="apple-mobile-web-app-title" content="@ArtTerror23" />
        <link rel="apple-touch-icon" href="{{ asset('/img/android-icon-144x144.png') }}" />
        <!-- Add to home screen for Windows-->
        <meta name="msapplication-TileImage" content="{{ asset('/img/android-icon-144x144.png') }}" />
        <meta name="msapplication-TileColor" content="#000000" />
        <meta name="theme-color" content="#414f57"/>
 
    </head>
    <body class="">
            <header>
                    <div class="text-white">
                        <nav class="navbar navbar-expand-md bg-primary">
                            <a class="navbar-brand text-white" href="#"><b>FAST</b> CLEAN</a>
                            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                              <i class="fas fa-bars text-white"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                              <div class="navbar-nav ml-auto">
                                <a href="{{ route('logout') }}" class="text-white nav-item nav-link"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </div>
                            </div>
                          </nav>
                    </div> 
                  </header>
        <style>

        @media(max-width: 900px){
            .pl{
                padding-left: 0px;
                margin-left: -27px;
                width: 6rem;height: auto;
            }
        }
        </style>

        
    @yield('content')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/migrate-1.4.1.min.js') }}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>          
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script src="{{ asset ('js/plugins/sweetalert2.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/waves.min.js') }}"></script>
    <script src="{{asset('js/wow.js')}}"></script>
    <script src="{{ asset('js/autoNumeric.js') }}"></script>
    @stack('scripts')
    <script>
        Waves.attach('.a');
        Waves.init();
        new WOW().init();   
        </script>
    </body>
    </html>
    