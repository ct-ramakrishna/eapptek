<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    public $table='products';
    public $primaryKey='id';
    public $timestamps=true;

    public function user(){
         return $this->belongsTo('App\Products');
    }
}
