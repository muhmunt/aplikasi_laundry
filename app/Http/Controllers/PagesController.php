<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Laundry;
use App\Cart;
use App\Order;
use PDF;

class PagesController extends Controller
{
    
    public function admin(){
        return view('admin.dashboard');
    }

    public function index(){
        if(Auth::user()->role == 'admin'){
           return view('admin.dashboard');
            
        }else{
            $laundries = Laundry::all();
            $carts = Cart::all();
            $total = [];
            foreach($carts as $cart){                
                $total[]= $cart->price * $cart->qty;
            }
                // dd($total);
            return view('home',compact('laundries','carts','total'));
        }
    }

    public function kasir(){
        $laundries = Laundry::all();
        $carts = Cart::all();
        $total = [];
        foreach($carts as $cart){                
            $total[]= $cart->price * $cart->qty;
        }

        return view('kasir',compact('laundries','carts','total'));
    }

    public function report(Request $request){
        $orders = Order::latest()->paginate(10);
        return view('report',compact('orders'));
    }

    public function searchReport(Request $request){
        $date1 = \Carbon\Carbon::parse($request->date1)->formatLocalized('%y-%m-%d 00:00:00');
        $date2 = \Carbon\Carbon::parse($request->date2)->formatLocalized('%y-%m-%d 00:00:00');
        
        $orders = Order::whereBetween('created_at',[$date1, $date2])->latest()->paginate(10);

        return view('report',compact('orders'));
    }

    public function deleteReport($id){
        $delete = Order::where('id',$id)->first();

        Order::where('id',$id)->delete();

        return back()->with('success','Report berhasil di hapus');
    }

    public function invoice(){
        $orders = Order::latest()->paginate(10);

        return view('invoice',compact('orders'));
    }

    public function struk($id){
        $struk = Order::where('id',$id)->first();

        // dd($struk);            

        $pdf = PDF::loadView('struk', compact('struk'))->setPaper('a4', 'landscape');
        return $pdf->stream();
        
    }

    // admin

    public function adminReport(){
        $orders = Order::latest()->paginate(10);
        
        return view('admin.report',compact('orders'));
    }

    public function searchAdminReport(Request $request){
        $date1 = \Carbon\Carbon::parse($request->date1)->formatLocalized('%y-%m-%d 00:00:00');
        $date2 = \Carbon\Carbon::parse($request->date2)->formatLocalized('%y-%m-%d 00:00:00');
        
        $orders = Order::whereBetween('created_at',[$date1, $date2])->latest()->paginate(10);

        return view('admin.report',compact('orders'));
    }

}
