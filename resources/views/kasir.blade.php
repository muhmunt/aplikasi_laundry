@extends('layouts.app')
@section('title','Kasir')
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
{{-- @if (Session::has('auth'))
<div class="alert alert-danger">
    {{Session::get('auth')}}
</div>               
@endif                 --}}

<div class="container h-100">
        <div class="row h-100">
            <div class="col-md-10 h-100 d-table mx-auto">
                <div class="d-table-cell align-middle">
                    <div class="card border-0">
                        
                        <tbody class="mt-5">
                            <br>
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
        &nbsp;              
                <div class="row">
                    <div class="card-deck">
                    
                            <div class="card a bg-primary" id="tambah">                                    
                                      <h5 class="text-center mt-4 text-white"><i class="fas fa-tshirt fa-3x"></i></h5>
                                      <div class="card-body">
                                        <p class="card-title text-center text-white">Masukkan Barang Laundry</p>
                                        <p class="card-text text-center text-white"><i>tap here</i></p>
                                      </div>                                    
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
                                    <a href="{{route('invoice')}}">
                                      <h5 class="text-center mt-5 text-secondary"><i class="fas fa-print fa-3x"></i></h5>
                                      <div class="card-body">
                                        <p class="card-title text-center">Struk</p>
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
                </div>
                            <div class="row ml-4 mt-4">
                                <div class="col-md-2 mt-3">
                                    {{-- <button class="btn btn-primary" id="tambah"><i class="fas fa-plus"></i></button> --}}
                                </div>          
                                       
                            </div>
                            <form action="{{route('add-to-order')}}" method="POST">
                            <table class="table table-hover mt-3">                                
                                <tr>
                                    <th>No.</th>
                                    <th>Jasa</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th class="w-25">Subtotal</th>
                                    <th></th>
                                </tr>
                                <?php $no = 1; ?>
                                @foreach ($carts as $cart)
                                  <tbody id="databarang">
                                <tr>
                                    <p class="type d-none">{{$cart->laundry->type_id}}</p>
                                    <td id="nomor">{{$no++}}.</td>
                                    <td>{{ $cart->laundry->typeLaundry->type }}</td>

                                    <input type="hidden" name="order_details[{{$cart->laundry->id}}][laundry_id]" value="{{$cart->laundry_id}}">
                                    <input type="hidden" name="order_details[{{$cart->laundry->id}}][qty]" value="{{$cart->qty}}">

                                    <input type="hidden" value="{{$cart->laundry->id}}" name="laundry_id">
                                    <input type="hidden" value="{{$cart->qty}}" name="qty">
                                    <td>Rp. {{ number_format($cart->price) }}.00</td>
                                    <td>
                                        <div class="gap-form">
                                            {{-- <a  class="link"></a> --}}
                                            @csrf
                                            <input data-harga="{{$cart->price}}" href="{{route('update-jumlah',$cart->id)}}" type="number" class="qty" name="jumlah" value="{{ $cart->qty }}">
                                        </div>                                        
                                    </td>
                                    {{-- <td class="w-25" class="subtotal">Rp. {{ number_format($cart->price*$cart->qty) }}.00</td> --}}
                                    <td class="w-25" id="subtotal">Rp. {{ number_format($cart->price*$cart->qty) }}</td>
                                    <td>
                                        <a href="{{route('delete-cart',$cart->id)}}" class="btn btn-danger btn-sm delete-cart"><i class="fas fa-window-close"></i></a>
                                    </td>
                                </tr>
                                </tbody>                                                             
                                @endforeach
                                <input type="hidden" name="total" id="total" value="{{ array_sum($total) }}">
                                {{-- <input type="text" name="inputTotal" id="inputTotal" value=""> --}}
                                <input type="hidden" name="inputBayar" id="inputBayar" value="">
                                <input type="hidden" name="inputKembalian" id="inputKembalian" value="">

                                <tbody id="bungkus" class="d-none">
                                <tr class="">
                                    <td colspan="4" class="text-right"><strong>Total : </strong></td>
                                    <td class="w-25" id="jumlahTot">Rp. {{ number_format(array_sum($total)) }}</td>
                                    <input type="hidden" name="total" id="total" value="{{ array_sum($total) }}">
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Bayar : </strong></td>
                                    <td class="w-25">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                         <input type="number" type="button" class="form-control w-50" id="bayar" required placeholder="..." name="harga">
                                        </div>
                                        <p id="text-bayar"></p>
                                        {{-- <button class="btn w-50 btn-primary" type="button" id="btn-bayar">Bayar</button></td> --}}
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Kembalian : </strong></td>
                                    <td class="w-25"><input type="text" name="kembalian" id="kembalian" readonly placeholder="Rp. ..." class="form-control w-75"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">
                                    </td>
                                    <td class="w-25"><button type="button" disabled class="btn btn-success" id="checkout">Checkout</button></td>
                                    <td ></td>
                                </tr>
                            </tbody>
                            </table>
                                                        
                            {{-- modal --}}
                            <div class="modal fade" role="dialog" id="pelanggan">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pelanggan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="">Nama</label>
                                                <input type="text" autofocus required name="customer" placeholder="Masukkan nama ..." class="form-control">                           
                            
                                                <label for="">Alamat</label>
                                                <input type="text" required class="form-control" name="alamat" placeholder="Masukkan Alamat ... ">
                                                
                                                <label for="">No Hp</label>
                                                <input type="number" required name="noPhone" class="form-control" placeholder="">
                                                
                                                <br>                    
                                            </div>
                                            <div class="modal-footer">                    
                                                <button type="submit" class="btn btn-primary">Send</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>    
                                </div>

                        </form>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Cucian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add-to-cart') }}" method="POST">
                    @csrf
                <div class="modal-body">
                    <label for="">Jenis</label>                    
                    <select name="jenis" class="form-control" id="jenis">
                        <option value="0">Pilih Jenis</option>
                        @foreach ($laundries as $laundry)                            
                        <option value="{{ $laundry->id }}" data-price="{{ $laundry->price }}">{{$laundry->typeLaundry->type}}</option>
                        @endforeach
                    </select>                                

                    <label for="">Harga</label>
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                         <input type="text" id="harga" readonly class="form-control" id="inlineFormInputGroup" placeholder="..." name="harga">
                        </div>
                    <label for="">Jumlah</label>
                    <input type="number" id="jumlah" required name="jumlah" class="form-control">
                    <br>
                    <i class="d-none" id="text">*Semua jenis sudah dipilih</i>
                </div>
                <div class="modal-footer">
                    @foreach ($laundries as $laundry)
                        <p class="ambil-type d-none">{{$laundry->type_id}}</p>
                    @endforeach
                    <button type="submit" class="btn tambah btn-primary">Tambah Cucian</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>    
    </div>
    <style>
            .a:hover{   
                box-shadow:0 1px 4px 0 #000000,0 1px 1px 0 #ffffff;
            }
        </style>

@endsection
@push('scripts')
    
    <script>        
        $(document).ready(function(){            
            $('.qty').mouseover(function(){
                var link= $(this).attr('href');                
                $('.gap-form').wrap('<form id="Form2" action="'+link+'" method="post"></form>');
            });
            
            
            if($('#nomor').text() == ''){            
             $('#bungkus').addClass('d-none');            
            }else{            
             $('#bungkus').removeClass('d-none');            
            }

            $('#tambah').click(function(){
                $('#modal').modal('show');
            });

            var satu = $('.ambil-type').text();            
            var dua = $('.type').text();            
            var bayar = $('#bayar').val();
            $('#btn-bayar').attr('disabled',true);

            if(satu == dua){
                $('.tambah').attr('disabled',true);
                $('#text').removeClass('d-none');
            }else{

            }            
            
            $('#bayar').keyup(function(){
                $('#btn-bayar').attr('disabled',false)
                var bayar = $('#bayar').val();                
                var total = $('#total').val();                

                var kembalian = parseInt(bayar) - parseInt(total);
                var cek = parseInt(bayar) < parseInt(total);

                if($('#bayar').val() == '' || $('#kembalian').val() == 'NaN' ){
                 $('#checkout').attr('disabled',true);
                }else{            
                 $('#checkout').attr('disabled',false);
                }
                
                if(cek){
                    $('#text-bayar').text('Uang anda kurang');                    
                    // alert('Uand anda kurang');
                }else{
                $('#text-bayar').addClass('d-none');                    
                $('#kembalian').val('Rp. '+kembalian);                    
                // $('#bayar').attr('disabled',true)
                $('#btn-bayar').attr('disabled',true)
                }              

                $('#inputTotal').val(total);
                $('#inputBayar').val(bayar);
                $('#inputKembalian').val(kembalian);
            });

            // input to order & order-details
            var total = $('#total').val();
            var bayar = $('#bayar').val();


            $('#btn-bayar').click(function(){
                var bayar = $('#bayar').val();
                var total = $('#total').val();


                var kembalian = parseInt(bayar) - parseInt(total);
                var cek = parseInt(bayar) < parseInt(total);

                

                if(cek){
                    $('#text-bayar').text('Uang anda kurang');                    
                }else{
                $('#text-bayar').addClass('d-none');                    
                $('#kembalian').val('Rp. '+kembalian);                    
                $('#bayar').attr('disabled',true)
                $('#btn-bayar').attr('disabled',true)
                }
                // alert(total);
                // alert(total);
            });

            $('#jenis').change(function(){
                var isi = $(this).val();
                var harga = $('select option:selected').data('price');

                // if($('#jenis option:selected').val() == )

                if($('select option:selected').val() == '0'){
                $('#harga').val('');
                }else{
                $('#harga').val(harga);
                }

            });

            $('.delete-cart').click(function(e){
                e.preventDefault();
                var link_project = $(this).attr('href');
                // alert(link_project);
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

            $('#checkout').click(function(){
                $('#pelanggan').modal('show');
            });

        });

    </script>

@endpush
