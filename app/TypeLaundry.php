<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Laundry;

class TypeLaundry extends Model
{
    protected $table = 'type_laundries';

    protected $fillable = [
        'type','image'
    ];

    public function laundry(){
        return $this->hasMany('App\Laundry','type_id');
    }
}
