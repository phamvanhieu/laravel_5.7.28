<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $primaryKey = 'au_id';
    public $timestamps = false;
}
