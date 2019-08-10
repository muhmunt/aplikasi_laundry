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
            <h1 class="text-left">Jenis Laundry</h1>
            <div class="row">
                <div class="col-md-6 float-right"></div>
                <div class="col-md-3 float-right">
                    <a href="{{ route('create-type') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
                <div class="col-md-3 float-right"></div>
            </div>
        </div>                

        <div class="row mt-5 col-md-8">
                <table class="table">
                        <tr>
                            <td>No.</td>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $no = 1; ?>
                        @foreach ($types as $type)                        
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td scope="row">{{ucfirst($type->type)}}</td>
                            {{-- <td>{{$type->image}}</td> --}}                            
                            <td>
                                <a href="{{ route('delete-type',$type->id) }}" class="btn btn-danger btn-sm delete-type"><i class="fas fa-window-close"></i></a>
                                <a href="{{ route('edit-type',$type->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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
        $('.delete-type').click(function(e){
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