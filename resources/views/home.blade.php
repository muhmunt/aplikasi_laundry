@extends('layouts.app')
@section('title','Report')
@section('nav')
<li class="nav-item">
  <a class="nav-link" style="font-weight:bold;" id="contact" href="">gaskuy</a>
  </li>
<li class="nav-item">
        <a href="{{ route('logout') }}" class="text-white"
        onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
  </li>
  

@endsection
@section('content')
@if (Session::has('auth'))
<div class="alert alert-danger">
    {{Session::get('auth')}}
</div>               
@endif            

    <div class="container">
        <h3 class="text-center mt-5"><strong>FAST</strong> Clean</h3>
        <p class="text-center text-muted">&copy; Aplikasi_Laundry </p>        
        <div class="row mx-auto pl-5 pr-5">
                <div class="card-deck mt-4 mx-auto">
                    
                    <div class="card a">
                        <a href="{{route('kasir')}}">
                          <h5 class="text-center mt-5 text-secondary"><i class="fas fa-cash-register fa-5x"></i></h5>
                          <div class="card-body mt-5">
                            <h5 class="card-title text-center">Kasir</h5>
                            <p class="card-text text-center text-muted mt-5"><i>tap here</i></p>
                          </div>
                        </a>
                    </div>
                    <div class="card a">
                        <a href="{{route('invoice')}}">
                          <h5 class="text-center mt-5 text-secondary"><i class="fas fa-print fa-5x"></i></h5>
                          <div class="card-body mt-5">
                            <h5 class="card-title text-center">Struk</h5>
                            <p class="card-text text-center text-muted mt-5"><i>tap here</i></p>
                          </div>
                        </a>
                    </div> 
                    <div class="card a">
                        <a href="{{route('report')}}">
                          <h5 class="text-center mt-5 text-secondary"><i class="fas fa-file fa-5x"></i></h5>
                          <div class="card-body">
                            <h5 class="card-title mt-5 text-center">Laporan Laundry</h5>
                            <p class="card-text text-center text-muted"><i>tap here</i></p>
                          </div>
                        </a>
                    </div>
                    <div class="card a">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                          <h5 class="text-center mt-5 text-danger"><i class="fas fa-sign-out-alt fa-5x"></i></h5>
                          <div class="card-body mt-5">
                            <h5 class="card-title text-center">Logout Cashier</h5>
                            <p class="card-text text-center text-muted mt-4"><i>tap here</i></p>
                          </div>
                        </a>
                    </div>

                </div>
        </div>
    </div>
    <p class="text-center text-muted bottom mt-5">by:muhmunt</p>
<style>
    .card:hover{   
        box-shadow:0 1px 4px 0 #000000,0 1px 1px 0 #ffffff;
    }
</style>
@endsection