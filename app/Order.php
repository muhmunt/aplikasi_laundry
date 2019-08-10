<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetails;

class Order extends Model
{
    protected $tables = 'orders';

    protected $fillable = [
        'order_code','total_price','paid','change_money','customer','address','no_phone'
    ];

    public function orderdetails(){
        return $this->hasMany('App\OrderDetails','order_id');
    }
}
