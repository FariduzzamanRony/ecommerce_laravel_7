<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
   use SoftDeletes;
   protected $fillable=['category_name','category_title','category_description','category_photo'];



   function relationship_category_table_with_product_name(){
   return $this->hasMany('App\Product','category_id','id');
   }
   public function totle_sub_category()
    {
        return $this->hasMany('App\Sub_category');
    }

}
