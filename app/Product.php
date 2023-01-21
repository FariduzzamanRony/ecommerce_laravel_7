<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

   use SoftDeletes;
   protected $guarded=[];

  function relationship_with_category_table(){
   return $this->hasOne('App\Sub_category','id','sub_category_id')->withTrashed();



}
//   function relationship_category_table_for_Card_view(){
//    return $this->hasOne('App\Category','id','sub_category_id')->withTrashed();
//
// }


// multipule photo er jonno
function relationship_product_table_with_product_multipl_photo(){
return $this->hasMany('App\Product_multipull_photo','product_id','id')->withTrashed();
}

public static function sub_category_product_count($sub_id){
   $product_count = Product::where('sub_category_id',$sub_id)->count();
   return $product_count;
}


}
