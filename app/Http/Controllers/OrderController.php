<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laundry;
use App\TypeLaundry;
use Auth;

class OrderController extends Controller
{
    public function inputbarang(Request $request,$id){	
	    date_default_timezone_set("Asia/Jakarta");
	    $date= date("Y-m-d");
	    $ambil = \App\Input::max('id');
	    $id = $ambil;
	    $nourut = (int) substr($id,3,3);
	    $nourut++;
	    $char = "IN";
	    $tanggal=substr($date, 9, 1);
	    $id = $char.$tanggal.sprintf("%03s",$nourut);
	    $now = \Carbon\Carbon::now();	    
        
        
    }

}
