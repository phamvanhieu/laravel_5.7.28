<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categorys";
    public $primaryKey = "cate_id";
    public function product(){
        return $this->hasMany('App\Product','cate_id','cate_id');
    }
}
