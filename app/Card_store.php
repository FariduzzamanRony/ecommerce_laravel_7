<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Card_store extends Model
{

protected $fillable=['product_quantity'];



  function product(){
   return $this->belongsTo('App\Product');
}


}
