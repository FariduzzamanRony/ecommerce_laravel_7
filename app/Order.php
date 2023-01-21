<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{


  protected $fillable=['payment_status'];
   use SoftDeletes;

 function order_deatels(){
  return $this->hasMany('App\Ordel_detail');
 }
}
