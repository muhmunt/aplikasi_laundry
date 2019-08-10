<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Laundry;

class Cart extends Model
{
    protected $tables = 'carts';

    protected $fillable = [
        'laundry_id','price','qty'
    ];

    public function laundry(){
        return $this->belongsTo('App\Laundry','laundry_id');
    }
}
