<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

class FrontendController extends Controller
{
    function index(){
      $top_sales = DB::table('products')
                  ->leftJoin('ordel_details','products.id','=','ordel_details.product_id')
                  ->selectRaw('products.id, SUM(ordel_details.product_quantity) as total')
                  ->groupBy('products.id')
                  ->orderBy('total','desc')
                  ->take(8)
                  ->get();
              $topProducts = [];
              foreach ($top_sales as $s){
                  $p = Product::findOrFail($s->id);
                  $p->totalQty = $s->total;
                  $topProducts[] = $p;
              }
              $hot_sales = DB::table('products')
                          ->leftJoin('ordel_details','products.id','=','ordel_details.product_id')
                          ->selectRaw('products.id, SUM(ordel_details.product_quantity) as total')
                          ->groupBy('products.id')
                          ->orderBy('total','desc')
                          ->take(3)
                          ->get();
                      $hotProducts = [];
                      foreach ($hot_sales as $s){
                          $p = Product::findOrFail($s->id);
                          $p->totalQty = $s->total;
                          $hotProducts[] = $p;
                      }
      return view('Frontend.index',[
         'active_categorys'=>Category::latest()->get(),
         'active_Product'=>Product::latest()->get(),
            'Sub_category_Product'=>Sub_category::latest()->get(),
            'topProducts'=>$topProducts,
            'hotProducts'=>$hotProducts,
            //'offerProducts'=>Offerproduct::latest('id','desc')->limit(1)->get(),
            'offerProducts'=>Offerproduct::all(),



      ]);
   }


    function single_card($single_slug_link){
      // Same category Start
      $same_category_product= $single_product_card=Product::where('slug',$single_slug_link)->firstOrfail();
    $same_category=  Product::where('cat_id',$same_category_product->cat_id)->get();
// Same category End
       $single_product_card=Product::where('slug',$single_slug_link)->firstOrfail();
        $product_releted_products= Product::where('sub_category_id',$single_product_card->sub_category_id)->where('id','!=',$single_product_card->id)->get();
     $tttttyuyu= Ordel_detail::where('user_id',Auth::id())->get();
     $totle_review_active=0;
     foreach ($tttttyuyu as  $value) {
    if ($value->review_active==1) {

     $totle_review_active=1;
    }
    else {
      $totle_review_active=2;
    }

     }


     $product_kinche_tar_status=0;
   if (Ordel_detail::where('user_id',Auth::id())->where('product_id',$single_product_card->id)->whereNull('review')->exists()) {
       $Ordel_detail_id=Ordel_detail::where('user_id',Auth::id())->where('product_id',$single_product_card->id)->whereNull('review')->first()->id;
       $product_kinche_tar_status=1;
   }
   else {
      $product_kinche_tar_status=2;
      $Ordel_detail_id=0;
   }
 $all_review = Ordel_detail::where('product_id',$single_product_card->id)->whereNotNull('review')->get();


   return view('Frontend.single_card',[
      'single_product_card'=>$single_product_card,
      'product_releted_product'=>$product_releted_products,
      'product_kinche_tar_status'=>$product_kinche_tar_status,
      'Ordel_detail_id'=>$Ordel_detail_id,
      'all_review'=>$all_review,
      'same_category'=>$same_category,
      'totle_review_active'=>$totle_review_active,
   ]);



   }




   function contact(){
      return view('Frontend.contact');
   }
   function contact_post(Request $request){

      $contact_ID=Contact_dev::insertGetId($request->except('_token')+[
         'created_at'=>Carbon::now()
      ]);

      if ($request->hasFile('contact_file')) {


         // $path = $request->file('contact_file')->store('contact_uplodes');
         // echo $path;
         //
         //
         $path = $request->file('contact_file')->storeAs('contact_uplodes',
          $contact_ID.".".$request->file('contact_file')->getClientOriginalExtension() );


          Contact_dev::find($contact_ID)->update([
             'contact_file'=>$path
          ]);

     return back()->with('file_success','Your sms Receved Successfully!');
      }
      else {
      return back()->with('file_success','Your sms Receved Successfully!');
      }
   }




   function contact_dev_show(){
      return view('admin.contact.contact_dev',[
      'contact_devs' =>  Contact_dev::all()
      ]);
   }

   function contact_file_download($download_id){
      $file = Contact_dev::find($download_id)->contact_file;
      return Storage::download($file);





   }
   function category_all_product(){

return view('Frontend.All_Product',[
   'active_categoory'=>Category::all(),
   'active_Sub_category_Prooduct'=>Sub_category::all()
]

);


   }
   function login_Register (){

      return view('Frontend.login_register');
   }
   function customer_register(Request $request){

     $request->validate([
       'name'=>'required',
       'email'=>'required',
       'password'=>'required',
     ]);
      User::insert([
         'role'=>'2',
         'name'=>$request->name,
         'email'=>$request->email,
         'password'=>Hash::make($request->password),
         'updated_at'=>Carbon::now(),
         'created_at'=>Carbon::now()
      ]);

      if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
         return redirect('customer/home');
      }

   }


   function checkout(){
      return view('Frontend.chekout');
   }
   function review_post (Request $request){
     $request->validate([
        'star'=>'required',
        'review'=>'required',

     ]);
    Ordel_detail::find($request->Ordel_detail_id)->update([
    'star'=>$request->star,
    'review'=>$request->review
  ]);
  return back();
   }
   function Admin_reply_post (Request $request){
   Ordel_detail::find($request->reviewss_id)->update([
  'Admin_reply'=>$request->Admin_reply
   ]);

  return back();

 }
 function all_product($product_id){
   $products=Product::where('sub_category_id',$product_id)->get();
   return view('Frontend.sub_all_product',[
     'products'=>$products
   ]);
 }

 function menu_product($id){

  $products=Product::where('sub_category_id',$id)->get();
  return view('Frontend.sub_all_product',[
    'products'=>$products
  ]);

 }
 function single_blog(){
  return view('Frontend.blog_sigle');
 }
 function about(){
  return view('Frontend.about');
 }
 function shop_category($cate_id){
      $all_cat_shop=Product::where('cat_id',$cate_id)->get();
  return view('Frontend\shop_category',[
    'all_cat_shop'=>$all_cat_shop
  ]);
 }


}
