<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Order;
use App\Ordel_detail;
use App\Product;
use Mail;
use App\Mail\FurchaseConfim;
use Carbon\Carbon;
use Session;
use Stripe;

class StripePaymentController extends Controller
{



  public function stripe(){
    if (session('card_payment_order_id')) {
        return view('test.stripe');
    }
    else {
           abort(404);
    }

  }



  public function stripePost(Request $request){
$totle_taka=session('card_sub_totle')-session('card_amount');
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    Stripe\Charge::create ([
            "amount" => $totle_taka * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment from Ironman Order Id: ".session('card_payment_order_id')
    ]);

    Session::flash('success', 'Payment successful!');

    Order::find(session('card_payment_order_id'))->update([
      'payment_status'=>'2'
    ]);

    $card_payment_order_id = session('card_payment_order_id');
   $review_active_Ordel_detail=Ordel_detail::where('order_id',$card_payment_order_id)->get();
   foreach ($review_active_Ordel_detail as  $review_active_value) {
     Ordel_detail::find($review_active_value->id)->update([
       'review_active'=>'2'
     ]);
      }
$Ordel_detailsss = session('Ordel_detailsss_CART');
 # $email = session('email_Addesss');
 # Mail::to($email)->send(new FurchaseConfim($Ordel_detailsss));


    session([
      'payment_methods'=>'',
      'card_sub_totle'=>'',
      'card_discount_amount'=>'',
      'coupon_name'=>'',
      'card_amount'=>'',
      'order_id'=>'',
      'product_id'=>'',
      'product_photo'=>'',
      'product_quantity'=>'',
      'product_price'=>'',
      'totle_price'=>'',
      'email_Addesss'=>'',
      'totle_price'=>'',
      'card_payment_order_id'=>'',
      'Ordel_detailsss_CART'=>'',
      'totle_taka'=>'',
    ]);
    return redirect("all_card/product");
}


}
