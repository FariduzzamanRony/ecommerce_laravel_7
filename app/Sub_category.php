<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sub_category extends Model
{
   use SoftDeletes;
   protected $fillable=['sub_category_photo'];

   function relationship_sub_with_category_table(){
    return $this->hasOne('App\Category','id','category_id')->withTrashed();

}

    public static function category_product_count($category_id){
      $product_count = Sub_category::where('category_id',$category_id)->count();
      return $product_count;
   }
   public function totle_sub_product()
    {
        return $this->hasMany('App\Product');
    }
}
