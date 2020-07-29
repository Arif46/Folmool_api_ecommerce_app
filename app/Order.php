<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public function orderitem()
     {
         return $this->hasMany('App\OrderItem','order_id','id');
     }
    public function user(){
        return $this->hasOne('App\User','id','customer_id');
    }
    public function payment(){
        return $this->hasOne('App\Payment','id','payment_id');
    }
    public function delivery_man(){
        return $this->hasOne('App\User','id','delivery_man_id');
    }
    public function shipment(){
        return $this->hasOne('App\Shipment','id','shipping_id');
    }
}
