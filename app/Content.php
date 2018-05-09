<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //table 
    public $table='contents';
    //primary key
    public $primarykey='id';
    //timestamps
    public $timestamps=true;

    public function user(){
        return $this->belogsTo('App\User');
    }
}
