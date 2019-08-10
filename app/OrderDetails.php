<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Laundry;

class OrderDetails extends Model
{
    protected $tables = 'order_details';

    protected $fillable = [
        'order_id','laundry_id','qty'
    ];

    public function order(){
        return $this->belongsTo('App\Order','order_id');
    }

    public function laundry(){
        return $this->belongsTo('App\Laundry','laundry_id');
    }
}
