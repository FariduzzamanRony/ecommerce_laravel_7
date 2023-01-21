<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Billing;
use App\Shipping;
use Carbon\Carbon;
use App\Division;
use App\District;
use App\Order;
use App\Ordel_detail;
use App\Product;
use Mail;
use App\Mail\FurchaseConfim;
class CheckoutController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth');
   }



   function checkout(){
     return view('Frontend.chekout',[
      'user'=>User::find(Auth::id()),
      'countryes'=>Division::all(),
      'cityes'=>District::all()
     ]);
  }



  function ajax_post(Request $request){

    $collaget_name="";
$District_id= District::where('division_id',$request->country_id)->get();
foreach ($District_id as  $value) {

  $collaget_name.="<option value='".$value->id."' selected>".$value->name."</option>";
}
return $collaget_name;
  }



   function checkout_post(Request $request){


     $request->validate([
      'name'=>'required',
      'name'=>'required',
      'phone'=>'required',
      'email'=>'required',
      'country_id'=>'required',
      'city_id'=>'required',
      'email'=>'required',
      'address'=>'required',
      'note'=>'required'
     ]);
      if (isset($request->shipping_address_status)) {
        $shipping_id = shipping::insertGetId([
            'name'=>$request->shipping_name,
            'phone'=>$request->shipping_phone,
            'email'=>$request->shipping_email,
            'country_id'=>$request->shipping_country_id,
            'city_id'=>$request->shipping_city_id,
            'address'=>$request->shipping_address,
            'created_at'=>Carbon::now()

         ]);
      }
      else {
         $shipping_id = shipping::insertGetId([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'address'=>$request->address,
            'created_at'=>Carbon::now(),

         ]);
      }
    $billing_id =  Billing::insertGetId([
         'name'=>$request->name,
         'phone'=>$request->phone,
         'email'=>$request->email,
         'country_id'=>$request->country_id,
         'city_id'=>$request->city_id,
         'address'=>$request->address,
         'note'=>$request->note,
         'created_at'=>Carbon::now(),

      ]);

 $order_id = Order::insertGetId([
  'user_id'=>Auth::id(),
  'payment_status'=>'1',
  'sub_total'=>session('card_sub_totle'),
  'disscount_amunt'=>session('card_discount_amount'),
  'coupon_name'=>session('coupon_name'),
  'total'=>session('card_sub_totle')-session('card_amount'),
  'payment_method'=>$request->payment_opction,
  'billing_id'=>$billing_id,
  'shipping_id'=>$shipping_id,
   'created_at'=>Carbon::now()
]);



foreach (Card_aitems() as  $Card_aitemsvalue) {
  $tttttttttt=($Card_aitemsvalue->product->product_price-($Card_aitemsvalue->product->product_price/100)*$Card_aitemsvalue->product->offer_price)*($Card_aitemsvalue->product_quantity);
  $ssssssssss=($Card_aitemsvalue->product->product_price-($Card_aitemsvalue->product->product_price/100)*$Card_aitemsvalue->product->offer_price);

$tttttttttt;
  Ordel_detail::insert([
    'order_id'=>$order_id,
    'payment_method'=>$request->payment_opction,
    'user_id'=>Auth::id(),
    'product_id'=>$Card_aitemsvalue->product_id,
    'product_photo'=>$Card_aitemsvalue->product->product_thumbnail_photo,
    'product_quantity'=>$Card_aitemsvalue->product_quantity,
    'product_price'=>$ssssssssss,
    'totle_price'=>$tttttttttt,
    'created_at'=>Carbon::now(),
 ]);



 Product::find($Card_aitemsvalue->product_id)->decrement('product_quantity',$Card_aitemsvalue->product_quantity);
 $Card_aitemsvalue->forceDelete();


}
if($request->payment_opction=='1'){
    session(['Ordel_detailsss_CART' => Ordel_detail::where('order_id',$order_id)->get()]);
    session(['email_Addesss' => $request->email]);
    session(['card_payment_order_id' => $order_id]);

  return redirect("stripe");
}


else{

  # $Ordel_detailsss=Ordel_detail::where('order_id',$order_id)->get();
  # Mail::to($request->email)->send(new FurchaseConfim($Ordel_detailsss));
  # gmail sms sent view text
  #$Ordel_detailsss=Ordel_detail::where('order_id',1)->get();
  #return (new FurchaseConfim($Ordel_detailsss))->render();




  // bulk_sms_send
  $url = "http://66.45.237.70/api.php";
  $number="01759814232";
  $text="Product kena hoiche"." ".Auth::user()->name;
  $data= array(
  'username'=>"ronykhan",
  'password'=>"M5YWEC7X",
  'number'=>"$number",
  'message'=>"$text"
  );

  $ch = curl_init(); // Initialize cURL
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $smsresult = curl_exec($ch);
  $p = explode("|",$smsresult);
  $sendstatus = $p[0];

$Ordel_detailsss='';
session([
  'payment_methods'=>'',
  'card_sub_totle'=>'',
  'card_discount_amount'=>'',
  'coupon_name'=>'',
  'card_amount'=>'',

]);

return redirect("all_card/product")->with('chash_on','Order successfully');
}


  }




}
