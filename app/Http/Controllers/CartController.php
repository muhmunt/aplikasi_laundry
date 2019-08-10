<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laundry;
use App\Cart;
use App\Order;
use App\OrderDetails;

class CartController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'harga' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        $cart = Cart::all();
        foreach($cart as $item){
            $tambah = $item->qty + $request->jumlah;
            // dd($request->jumlah);
            $cek = $request->jenis == $item->laundry_id;
            if($cek){
                Cart::where('laundry_id',$request->jenis)->update([
                    'qty' => $tambah
                ]);

                return back()->with('success','Jumlah Berhasil ditambahkan');
            }
            
            
        }
                if($request->jumlah = $request->jumlah){
                    Cart::create([
                        'laundry_id' => $request->jenis,
                        'price' => $request->harga,
                        'qty' => $request->jumlah
                    ]);
            
                    return back()->with('success','Berhasil ditambahkan');
                    
                }                
        // dd($item);
    }

    public function delete($id){
        Cart::where('id',$id)->delete();

        return back()->with('success','Berhasil dihapus');
    }

    public function updatejumlah(Request $request,$id){
        $jumlah = Cart::where('id',$id)->first()->qty;        
        // dd($jumlah);
        Cart::where('id',$id)->update([
            'qty' => $request->jumlah
        ]);

        return redirect()->route('kasir');
    }

    public function addToOrder(Request $request){
        $order = [];
        $lID = [];
        $lID[] = $request->order_details;
        $londry_id = [];

        $order[] = [$request->customer,$request->alamat,$request->noPhone,$request->qty,$request->laundry_id,$request->total,$request->inputBayar,$request->inputKembalian];

        date_default_timezone_set("Asia/Jakarta");
	    $date= date("Y-m-d");
	    $ambil = Order::max('id');
	    $id = $ambil;
	    $nourut = (int) substr($id,3,3);
	    $nourut++;
	    $char = "OR";
	    $tanggal=substr($date, 9, 1);
	    $id = $char.$tanggal.$ambil.sprintf("%03s",$nourut);
        // dd($id);
	    $now = \Carbon\Carbon::now();	    
        
        $order = Order::create([
            "order_code" => $id,
            "total_price" => $request->total,
            "paid" => $request->inputBayar,
            "change_money" => $request->inputKembalian,
            "customer" => $request->customer,
            "address" => $request->alamat,
            "no_phone" => $request->noPhone
        ]);;
 
        //dd($londry_id);
        
        foreach($lID as $ld => $key){
            foreach($key as $val){
                //dd($val);
                //$londry_id[] = $val['laundry_id'];            
                OrderDetails::create([
                    'order_id' => $order->id,
                    'laundry_id' => $val['laundry_id'],
                    'qty' => $val['qty']
                ]);
            }    
        }

        Cart::query()->truncate();


        return redirect()->route('invoice')->with('success','STRUK JADI');

    }

}
