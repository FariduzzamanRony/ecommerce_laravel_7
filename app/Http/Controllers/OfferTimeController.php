<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sub_category;
use App\Contact_dev;
use App\Product;
use App\Ordel_detail;
use App\User;
use App\Offerproduct;
use Auth;
use Hash;
use DB;
use App\Product_multipull_photo;
use Carbon\Carbon;
use Illuminate\Support\Str;
class OfferTimeController extends Controller
{
    function offer_product(){

     //  $hot_sales = DB::table('products')
                 //  ->leftJoin('ordel_details','products.id','=','ordel_details.product_id')
                   //->selectRaw('products.id, SUM(ordel_details.product_quantity) as total')
                 //  ->groupBy('products.id')
                 //  ->orderBy('total','desc')
                 //  ->take(5)
                 //  ->get();
             //$hotProducts = [];
             //  foreach ($hot_sales as $s){
               //    $p = Product::findOrFail($s->id);
               //    $p->totalQty = $s->total;
               //    $hotProducts[] = $p;
               //}
      return view('offer.index',[
        'hotProducts'=>Product::all(),
        'Offerproduct'=>Offerproduct::latest('id','desc')->limit(1)->get()
      ]);
    }
    function ajax_offer_post(Request $request){

          $collaget_price="";
      $product_id= Product::where('id',$request->product_name)->get();
      foreach ($product_id as  $value) {

       $collaget_price.="<option value='".$value->id."' selected>"."$ ".$value->product_price."</option>";
      }
      return $collaget_price;
        }




    function offer_post(Request $request){




    $id=Offerproduct::insertGetId([
        'user_id'=>Auth::id(),
         'product_id_offer'=>$request->product_id_offer,
         'disscount'=>$request->disscount,
         'validity_date'=>$request->validity_date,
         'created_at'=>Carbon::now(),
     ]);

          $slug_offer = Offerproduct::find($id);
             $slug_offer->product_id_offer;
          $slug_name=Product::where('id',$slug_offer->product_id_offer)->first();
         $slug_name->slug;
         Offerproduct::find($id)->update([
          'slug'=>$slug_name->slug
        ]);

        $offer_product_id= Product::where('id',$request->product_id_offer)->first();
        Product::find($offer_product_id->id)->update([
          'offer_price'=>$request->disscount
        ]);

      return back()->with('offer_succer','Product Offer Succesfully');
    }
}
