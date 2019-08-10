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
            <h1>Ubah Harga Barang Laundry</h1>        
        </div>

        <form action="{{ route('update-laundry',$laundry->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="row mt-5">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Jenis : {{$laundry->typeLaundry->type}}</label>          
                    </div>
                </div>                 
                <div class="col-md-4">
                    <label>Harga</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                    <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="..." value="{{$laundry->price}}" name="harga">
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <input type="submit" value="Ubah" class="btn btn-primary">
                <a href="{{ route('laundry') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        
        

        @include('layouts.footers.auth')
    </div>
@endsection