<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateggoryFrom;
use App\Category;
use App\Sub_category;
use App\Product;
use Auth;
use Image;
use Carbon\Carbon;

class CategoryController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('Check_Role');
   }


    function category(){
        return view('admin/category/index',[
          // 'categorys' => Category::all()
          // 'categorys' => Category::latest()->get()
          'categorys' => Category::latest()->Paginate(5),
          'delete' => Category::onlyTrashed()->get()

        ]);
    }

    function categorypost(CateggoryFrom $request){
// echo Auth::User()->name;
 $Category_id=Category::insertGetId([
    'category_name'=>$request->category_name,
    'category_title'=>$request->category_title,
    'category_description'=>$request->category_description,
    'user_id'=>Auth::id(),
    'created_at'=>Carbon::now(),
]);
if ($request->hasFile('category_photo')) {

   $user_uplode_location_tump = $request->file('category_photo');
   $last_extension = $user_uplode_location_tump->getClientOriginalExtension();
 $photo_new_name =$Category_id.".".$last_extension;
  $new_location_photo_uplode='public/uplodes/category_photo/'.$photo_new_name;
Image::make($user_uplode_location_tump)->resize(800,800)->save(base_path($new_location_photo_uplode));
Category::find($Category_id)->update([
    'category_photo'=>$photo_new_name
]);

}
else {
   echo "nai";
}

  return back()->with('success_status','category Successfully');

    }





    function deletecategory($category_id){



      $sub_categorys_value=Sub_category::where('category_id',$category_id)->get();
    foreach ($sub_categorys_value as $key => $value) {

         print_r(Product::where('sub_category_id',$value->category_id)->delete());
    }
    Sub_category::where('category_id',$category_id)->delete();
    Category::find($category_id)->delete();
        return back()->with('delete_status','Delete category Successfully');

    }




    function editcategory($category_id){
        return view('admin/category/edit',[
            'Category_info'=>Category::find($category_id)
        ]);
    }
    function editcategorypost(Request $request){
    $request->validate([
     'category_name'=>'required|regex:/^[\pL\s\-]+$/u|max:255|unique:categories,category_name,'.$request->category_id,
     'category_title'=>'required',
     'category_description'=>'required'
    ]);
     Category::find($request->category_id)->update([
         'category_name'=>$request->category_name,
         'category_title'=>$request->category_title,
         'category_description'=>$request->category_description
     ]);

   return back();

    }

function restorecategory($restore_id){

    Category::withTrashed()->find($restore_id)->restore();
    return back()->with('restore_sataus','Restore successfully');
}
function forceDeletecategory($forcedelete_id){
   echo $forcedelete_id;
    Category::withTrashed()->find($forcedelete_id)->forceDelete();

    return back()->with('forcedelete','Deleted successfully');
}

}
