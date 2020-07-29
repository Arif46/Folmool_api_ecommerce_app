<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_class extends Model

{
    protected $table = 'products_classes';
    public function categories(){
        return $this->hasMany('App\Category','id','category_id');
    }
}
