@extends('layouts.argon')
@section('title','POS')
@section('content')
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div> 

    <div class="container-fluid mt--7">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}    
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
        @endif
        @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        &nbsp;
        <div class="text-center">
            <h1>Jasa & Harga Laundry</h1>
            <div class="row">
                <div class="col-md-6 float-right"></div>
                <div class="col-md-3 float-right"></div>
                <div class="col-md-3 float-right"> 
                    @if ($type == '')
                    <a href="{{ route('create-laundry') }}" class="btn btn-primary disabled"><i class="fas fa-plus"></i></a>                                            
                    <i>*Jenis Laundry Harus diisi terlebih dahulu</i>
                    @else
                    <a href="{{ route('create-laundry') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                    @endif                   
                </div>
            </div>
        </div>           
        <div class="row mt-5">
                <table class="table">
                        <tr>
                            <td>No.</td>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $no = 1; ?>                      
                        @foreach ($laundries as $laundry)
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td>{{ $laundry->typeLaundry->type }}</td>
                            <td>Rp.{{ number_format($laundry->price, '2', ',','.') }}</td>
                            <td>
                                <a href="{{ route('delete-laundry',$laundry->id) }}" class="btn btn-danger btn-sm delete-laundry"><i class="fas fa-window-close"></i></a>
                                <a href="{{ route('edit-laundry',$laundry->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                </table>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    
    <script>
        $(document).ready(function(){
            $('#table').dataTable();
        });
        $('.delete-laundry').click(function(e){
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