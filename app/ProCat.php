<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProCat extends Model
{
    public function product(){
    	return $this->hasMany('App\Product','id','cat_id');
    }
}
