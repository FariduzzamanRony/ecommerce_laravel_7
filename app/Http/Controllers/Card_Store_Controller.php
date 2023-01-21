<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Str;

use App\Card_store;
use App\Cuopon;
use Carbon\Carbon;

class Card_Store_Controller extends Controller
{


function all_card_product($coupon_name=""){

$coupon_error= "";
$discount_amount=0;


if ($coupon_name=="") {
   $coupon_error= "";
}
else {



$discount_amount=0;
   if(Cuopon::where('coupon_name',$coupon_name)->first()){
    if (Carbon::now()->format('Y-m-d') < Cuopon::where('coupon_name',$coupon_name)->first()->validity_till ){
      $minimun_amount= Cuopon::where('coupon_name',$coupon_name)->first()->minimun_amount;
      $sub_totle=0;
      $discount_amount=0;
      foreach (Card_aitems() as  $card_aitems_value) {
          $sub_totle= $sub_totle +($card_aitems_value->product_quantity * $card_aitems_value->product->product_price);
      }
      if ($minimun_amount <= $sub_totle) {
         $discount_amount= Cuopon::where('coupon_name',$coupon_name)->first()->discount_amount;
     }
     else {
         $coupon_error='you must coupon price '.$minimun_amount.' and enjoy disscount';
     }
    }
    else {
      $coupon_error='date expaire coupon';
    }
  }
  else {
      $coupon_error='invalide coupon';
  }

}

$validate_coupon= Cuopon::whereDate('validity_till','>=',Carbon::now()->format('Y-m-d'))->get();
   return view('Frontend/Card_page',compact('coupon_error','discount_amount','coupon_name','validate_coupon'));
}



    function card_store(Request $request){
      // $product_id=6;
      // $name='product_id#'.$product_id;
      // $value=2;
      // $minutes=50;

if ( Cookie::get('generated_card_id')) {
   $cookies_generated_card_id=Cookie::get('generated_card_id');
}
else {
   // cookies_generated_card_id
    $php=rand(1,1000);
    $cookies_generated_card_id=Str::random(10)."php".$php;
   Cookie::queue('generated_card_id', $cookies_generated_card_id, 1460);

}
// data page indert code
if (Card_store::where('cookies_generated_card_id',$cookies_generated_card_id)->where('product_id',$request->product_id)->exists()) {
   Card_store::where('cookies_generated_card_id',$cookies_generated_card_id)
   ->where('product_id',$request->product_id)->increment('product_quantity',$request->product_quantity);
}
else {


   if ( 0 < $request->product_quantity) {
      Card_store::insert([
        'cookies_generated_card_id'=>$cookies_generated_card_id,
        'product_id'=>$request->product_id,
        'product_quantity'=>$request->product_quantity,
        'created_at'=>Carbon::now()

      ]);
   }
   else {
      return back();
   }

}

return back();


   }


   function product_delete($product_delete_id){

       Card_store::find($product_delete_id)->delete();
       return back()->with('card_prodect_delete', 'Card Product Deleted Successfully');
   }
   function card_update(Request $request){


if (0 < Card_aitems()->count()) {
foreach ($request->product_quantity_id_and_vlaue as $card_id => $product_quantity_value) {

   Card_store::find($card_id)->update([
      'product_quantity'=>$product_quantity_value
   ]);
}


}
else {
   return back();
}
return back();

   }


















}
