<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function users(){
        return $this->hasMany('App\User','id','user_id');
    }
   
}
