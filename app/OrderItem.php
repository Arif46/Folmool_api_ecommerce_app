<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // protected $table = 'order_items';
    public function orders(){
        return $this->hasMany('App\Order','id','order_id');
    }
    public function items(){
        return $this->hasMany('App\item','id','item_id');
    }
        public function orderitem()
        {
            return $this->belongsTo('App\OrderItem','id','order_id');
        }
}
