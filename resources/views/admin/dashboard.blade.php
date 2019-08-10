@extends('layouts.argon')
@section('title','Dashboard')
@section('content')
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div> 

    <div class="container-fluid mt--7">
        <div class="text-center">
            <h1>Dashboard</h1>
        </div>
        <div class="card-deck mt-4 mx-auto">
                    
                <div class="card a">
                    <a href="{{route('type')}}">
                      <h5 class="text-center mt-5 text-dark"><i class="fas fa-cash-register fa-5x"></i></h5>
                      <div class="card-body mt-5">
                        <h5 class="card-title text-center">Jasa Laundry</h5>
                        <p class="card-text text-center text-muted mt-5"><i>tap here</i></p>
                      </div>
                    </a>
                </div>
                <div class="card a">
                    <a href="{{route('laundry')}}">
                      <h5 class="text-center mt-5 text-dark"><i class="fas fa-money-check-alt fa-5x"></i></h5>
                      <div class="card-body">
                        <h5 class="card-title mt-5 text-center">Harga Laundry</h5>
                        <p class="card-text text-center text-muted"><i>tap here</i></p>
                      </div>
                    </a>
                </div>
                <div class="card a">
                    <a href="{{ route('logout') }}">                            
                      <h5 class="text-center mt-5 text-danger"><i class="fas fa-file fa-5x"></i></h5>
                      <div class="card-body mt-5">
                        <h5 class="card-title text-center">Laporan Laundry</h5>
                        <p class="card-text text-center text-muted mt-4"><i>tap here</i></p>
                      </div>
                    </a>
                </div>

            </div>

        @include('layouts.footers.auth')
    </div>
@endsection