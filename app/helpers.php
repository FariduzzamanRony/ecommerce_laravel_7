<?php
use App\Sub_category;

function totel_Sub_category_count(){
   echo App\Sub_category::count();
}

function category_product($id){
   echo App\Product::where('cat_id',$id)->count();
}

function totel_Card_product_count(){
   echo App\Card_store::where('cookies_generated_card_id',Cookie::get('generated_card_id'))->count();
}
function Card_aitems(){
   return App\Card_store::where('cookies_generated_card_id',Cookie::get('generated_card_id'))->get();
}
function card_price_aitems(){
   return App\Card_store::where('cookies_generated_card_id',Cookie::get('generated_card_id'))->get();
}
function review_customer_count($product_id){
  return App\Ordel_detail::where('product_id',$product_id)->whereNotNull('review')->count();
}
function review_star_count($product_id){
  $totle_user_review= App\Ordel_detail::where('product_id',$product_id)->whereNotNull('review')->count();
  $totle_star_count= App\Ordel_detail::where('product_id',$product_id)->whereNotNull('review')->sum('star');
if ($totle_user_review==0) {
  return 0;
}
else {
  return round($totle_star_count/$totle_user_review);
}


}
