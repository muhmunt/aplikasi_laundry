@extends('layouts.app')
@section('title','Home')
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
        <div class="row">
            <div class="col-md-10 d-table mx-auto">
                    <div class="row mt-5">
                            <div class="card-deck">
                            
                                    <div class="card a">
                                            <a href="{{route('kasir')}}">
                                              <h5 class="text-center mt-5 text-secondary"><i class="fas fa-cash-register fa-3x"></i></h5>
                                              <div class="card-body">
                                                <p class="card-title text-center">Masuk Halaman Kasir</p>
                                                <p class="card-text text-center text-muted"><i>tap here</i></p>
                                              </div>
                                            </a>
                                        </div>     
        
                                    <div class="card a">
                                        <a href="{{route('report')}}">
                                            <h5 class="text-center mt-5 text-secondary"><i class="fas fa-file fa-3x"></i></h5>
                                            <div class="card-body">
                                                <p class="card-title text-center">Data Laporan Laundry</p>
                                                <p class="card-text text-center text-muted"><i>tap here</i></p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="card a">
                                        <a href="{{url('/')}}">
                                              <h5 class="text-center mt-5 text-secondary"><i class="fas fa-home fa-3x"></i></h5>
                                              <div class="card-body">
                                                <p class="card-title text-center">Home</p>
                                                <p class="card-text text-center text-muted"><i>tap here</i></p>
                                              </div>
                                            </a>
                                        </div>            
                            
                            
                            </div>                            
                           
                        <table class="table table-hover mt-3">
                            <tr>
                                <td>No.</td>
                                <td>Kode Order</td>                                
                                <td>Tanggal Cuci</td>
                                <td>Customer</td>
                                <td>Alamat</td>
                                <td>No HP</td>
                                <td>Total</td>
                                <td>Aksi</td>
                            </tr>
                            <?php $no = 1; ?>
                            @foreach ($orders as $order)
                                                    
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$order->order_code}}</td>
                                <td>{{\Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y')}}</td>
                                <td>{{$order->customer}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->no_phone}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>
                                    <a href="{{route('print-invoice',$order->id)}}" class="btn btn-success btn-sm"><i class="fas fa-print"></i>Print</a>
                                    <a href="{{route('delete-report',$order->id)}}" class="btn btn-danger btn-sm delete-report"><i class="fas fa-window-close"></i></a>
                                </td>
                            </tr>

                            @endforeach
                            {!! $orders->render() !!}
                        </table>
                    </div>
        
            </div>
        </div>
    </div>
<style>
    .card:hover{   
        box-shadow:0 1px 4px 0 #000000,0 1px 1px 0 #ffffff;
    }
</style>
@endsection
@push('scripts')
    
    <script>
        // alert('slkfjlksfj');
            $('.delete-report').click(function(e){
                e.preventDefault();
                var link_project = $(this).attr('href');
                swal({
                    title: 'Are you sure?',
                    type:'warning',
                    showCancelButton:true,
                    cancelButtonColor:'#d33',
                    confirmButtonColoro:'#3085d6'
                }).then((result)=>{
                    if(result.value){
                        window.location.href= link_project;
                        console.log('delete button clicked');
                    }
                });
            });
        
    </script>

@endpush