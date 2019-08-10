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
        <div class="text-left">
            <h1>Ubah Jenis Barang Laundry</h1>        
        </div>

        <form action="{{ route('update-type',$type->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <input name="jenis" value="{{ $type->type }}" placeholder="Nama Jenis ..." required type="text" class="form-control">
                    </div>
                </div>                
            </div>
            

            <div class="mt-5">
                <input type="submit" value="Ubah" class="btn btn-primary">
                <a href="{{ route('type') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        
        

        @include('layouts.footers.auth')
    </div>
@endsection