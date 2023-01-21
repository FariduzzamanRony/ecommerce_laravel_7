<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offerproduct extends Model
{
   protected $fillable=['product_id_offer','disscount','validity_date','slug'];
  function offer_realsion_product_date(){
   return $this->hasOne('App\Product','id','product_id_offer');
}
}
