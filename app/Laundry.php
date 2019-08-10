<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TypeLaundry;
use App\Cart;
use App\OrderDetails;

class Laundry extends Model
{
    protected $table = 'laundries';

    protected $fillable = [
        'type_id','price'
    ];

    public function typeLaundry(){
        return $this->belongsTo('App\TypeLaundry','type_id');
    }

    public function cart(){
        return $this->hasMany('App\Cart','laundry_id');
    }

    public function orderdetail(){
        return $this->hasMany('App\OrderDetails','laundry_id');
    }
}
