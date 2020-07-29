<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function products(){
        return $this->hasMany('App\Product','id','product_id');
    }
    public function itemcategories(){
        return $this->hasMany('App\Itemcategory','id','item_category_id');
    }
}
