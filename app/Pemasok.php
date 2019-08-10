<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $table = 'pemasoks';

    protected $guard = [];

    public function pemasok(){
        return $this->hasMany('App/Produk','id_pemasok');
    }
}
