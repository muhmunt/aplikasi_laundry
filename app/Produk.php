<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    protected $table = 'produks';

    protected $guard = [];

    public function idPemasok(){
        return $this->belongsTo('App\Pemasok','id_pemasok');
    }
}
