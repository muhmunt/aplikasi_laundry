<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset ('css/bootstrap.css')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            /* margin-top:; */
            /* padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        } */
        /* caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        } */ 
    
        /* span #fast{
            font-weight: bold;
        } */
    </style>
</head>
<body>
    <div class="container">
        <table class="table mx-auto">
            <caption>
                    <span>FAST Clean Invoice</span>
            </caption>
            <thead>
                <tr>
                    <th >Invoice <strong>#{{ $struk->id }}</strong></th>
                    <th colspan="3">{{ $struk->created_at->format('D, d M Y') }}</th>
                </tr>                
            </thead>
            <tbody>
                <tr>
                    <th>Jasa</th>
                    <th>Harga</th> 
                    <th>Jumlah</th>                   
                    <th>Subtotal</th>
                </tr>
                    @foreach ($struk->orderdetails as $item)
                    <tr>
                        <td>{{$item->laundry->typeLaundry->type}}</td>
                        <td>{{$item->laundry->price}}</td>
                        <td>{{$item->qty}}</td>
                        <td>Rp. {{number_format($item->laundry->price * $item->qty)}},00</td>
                    </tr>
                    @endforeach
                <tr>
                    <th colspan="3">Total</th>
                    <td colspan="2">Rp. {{number_format($struk->total_price)}},00</td>
                </tr>
                <tr>
                    <th colspan="3">Bayar</th>
                    <td colspan="1">Rp. {{number_format($struk->paid)}},00</td>
                </tr>
                <tr>
                    <th colspan="3">Kembalian</th>
                    <td colspan="1">Rp. {{number_format($struk->change_money)}},00</td>
                </tr>
            </tbody>        
        </table>
        <br>
        <table class="table">
            <tr>
                <th>Customer</th>
                <th>Alamat</th>
                <th>No Hp</th>
            </tr>
            <tr>
                <td>{{ucfirst($struk->customer)}}</td>
                <td>{{$struk->address}}</td>
                <td>{{$struk->no_phone}}</td>                
            </tr>
        </table>
    </div>
</body>
</html>