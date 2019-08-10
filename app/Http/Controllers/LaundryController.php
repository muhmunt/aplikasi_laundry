<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laundry;
use App\TypeLaundry;
use Carbon\Carbon;

class LaundryController extends Controller
{
    public function index(){
        $laundries = Laundry::latest()->paginate(10);
        $type = TypeLaundry::first();
        return view('admin.laundry',compact('laundries','type'));
    }

    public function create(){
        $types = TypeLaundry::all();
        return view('admin.create-laundry',compact('types'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'harga' => 'required|numeric'
        ]);

        Laundry::create([
            'type_id' => $request->jenis,
            'price' => $request->harga
        ]);

        return redirect()->route('laundry')->with('success','Berhasil menambahkan Harga Laundry');

    }

    public function delete($id){
        $delete = Laundry::where('id',$id)->first();
        Laundry::where('id',$id)->delete();
        return back()->with('success','Berhasil dihapus');
    }

    public function edit($id){
        $types = TypeLaundry::all();
        $laundry = Laundry::where('id',$id)->first();
        return view('admin.edit-laundry',compact('laundry','types'));
    }

    public function update($id,Request $request){
        $get = TypeLaundry::where('id',$id)->first();                

        Laundry::where('id',$id)->update([
            'price' => $request->harga
        ]);

        return redirect()->route('laundry')->with('success','Harga Laundry berhasil diubah');
    }

}
