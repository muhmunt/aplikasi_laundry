@extends('layouts.argon')
@section('title','POS | Report')
@section('content')
    <div class="header pb-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <h1 class="text-center">Laporan Data Laundry</h1>
                <div class="row">
                        <div class="col-md-6 mt-2">
                                <form action="{{route('search-admin-report')}}" method="GET">
                                    <label for="">Seach Report</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="date" name="date1" class="form-control" id="">                                            
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" name="date2" class="form-control" id="">
                                            <br>                                            
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary float-right" type="submit">Search</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
            <table class="table table-hover mt--4">
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
                            <a href="{{route('delete-report',$order->id)}}" class="btn btn-danger btn-sm delete-report"><i class="fas fa-window-close"></i></a>
                        </td>
                    </tr>
        
                    @endforeach
                    {!! $orders->render() !!}
                </table>
    </div>
@endsection
@push('js')
    
    <script>
        $(document).ready(function(){
            $('#table').dataTable();
        });
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