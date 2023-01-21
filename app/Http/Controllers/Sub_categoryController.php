<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sub_category;
use App\Product;
use Auth;
use Image;
use Carbon\Carbon;

class Sub_categoryController extends Controller

{
    function sub_index(){
      return view('admin\sub_category\index',[
         'category_actives'=>Category::all(),
         'sub_categorys'=>Sub_category::latest()->Paginate(10)
      ]);
   }
    function sub_category_post(Request $request){
// ->default('null.png')
       $sub_id=Sub_category::insertGetId($request->except('_token')+[
          'created_at'=>Carbon::now()
      ]);

      if ($request->hasFile('sub_category_photo')) {

         $user_uplode_location_tump = $request->file('sub_category_photo');
         $last_extension = $user_uplode_location_tump->getClientOriginalExtension();
       $photo_new_name =$sub_id.".".$last_extension;
        $new_location_photo_uplode='public/uplodes/sub_category_photo/'.$photo_new_name;
      Image::make($user_uplode_location_tump)->resize(800,800)->save(base_path($new_location_photo_uplode));
      Sub_category::find($sub_id)->update([
          'sub_category_photo'=>$photo_new_name
      ]);

      }



      return back()->with('success_full','insert success full');

   }
}
