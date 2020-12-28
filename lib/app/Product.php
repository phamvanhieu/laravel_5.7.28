<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Manufacture;
class Product extends Model
{
    public $primaryKey = 'pro_id';
    public $timestamps = false;
    public function manu(){
        return $this->belongsTo('App\Manufacture','manu_id');
    }
    public function cate(){
        return $this->belongsTo('App\Category','cate_id');
    }
}
