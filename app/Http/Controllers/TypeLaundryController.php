<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeLaundry;
use App\Laundry;
use Carbon\Carbon;

class TypeLaundryController extends Controller
{
    public function index(){
        $types = TypeLaundry::latest()->paginate(20);
        return view('admin.type-laundry',compact('types'));
    }

    public function create(){
        return view('admin.create-type');
    }

    public function store(Request $request){
        $this->validate($request,[
            'jenis' => 'required',            
        ]);

        TypeLaundry::create([
            'type' => $request->jenis,            
        ]);

        return redirect()->route('type')->with('success','Berhasil menambahkan jenis barang');
    }

    public function delete($id){
        $delete = TypeLaundry::where('id',$id)->first();
        if(!empty($delete->image)){
            unlink(public_path('\upload\images\jenis-laundry\\'.$delete->image));
        }else{

        }
        TypeLaundry::where('id',$id)->delete();
        return back()->with('success','Berhasil menghapus jenis barang');
    }

    public function edit($id){
        $type = TypeLaundry::where('id',$id)->first();
        return view('admin.edit-type',compact('type'));
    }

    public function update($id,Request $request){
        $get = TypeLaundry::where('id',$id)->first();        

        TypeLaundry::where('id',$id)->update([
            'type' => $request->jenis,        
        ]);

        return redirect()->route('type')->with('success','Jenis Laundry berhasil diubah');
    }
}
