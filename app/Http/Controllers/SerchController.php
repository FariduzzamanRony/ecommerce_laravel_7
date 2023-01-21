<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Sub_category;
use App\Product;
use App\Product_multipull_photo;
use Image;
use Carbon\Carbon;
class SerchController extends Controller
{
    //
    function search_index(Request $request){
      $products=Product::orderBy('id','desc')->where('product_name','LIKE','%'.$request->product.'%');
             if($request->category != "ALL") $products->where('cat_id',$request->category);
             $products= $products->get();
              return view('Frontend.serch',compact('products'));
    }
}
