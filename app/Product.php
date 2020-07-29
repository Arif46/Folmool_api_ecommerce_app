<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
 

    public function Products(){
        return $this->hasMany('App\Product_class','id','product_class_id');
    }

}
