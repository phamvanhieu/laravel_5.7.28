<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    public $primaryKey = 'manu_id';
    public $timestamps = false;
    public function product(){
        return $this->hasMany('App\Product','manu_id','manu_id');
    }
}
