<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Category;
use App\Sub_category;
use App\Product;
use App\Product_multipull_photo;
use Image;
use Carbon\Carbon;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('product.index',[
         'active_Sub_categorys'=>Sub_category::all(),
         'product_all'=>Product::latest()->Paginate(3)

       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rrrrrrrr= Sub_category::find($request->sub_category_id);
     $cat_id=$rrrrrrrr->category_id;
    $slug_link=Str::slug($request->product_name."-".Str::random(5));


      $Category_id= Product::insertGetId($request->except('_token','product_multifull_photo')+[
         'slug'=> $slug_link,
         'cat_id'=>$cat_id,
         'created_at'=>Carbon::now()
      ]);


if ($request->hasFile('product_thumbnail_photo')) {

   $user_uplode_location_tump = $request->file('product_thumbnail_photo');
   $last_extension = $user_uplode_location_tump->getClientOriginalExtension();
 $photo_new_name =$Category_id.".".$last_extension;
  $new_location_photo_uplode='public/frontend_asset/product_photo/'.$photo_new_name;
Image::make($user_uplode_location_tump)->resize(750,750)->save(base_path($new_location_photo_uplode));
Product::find($Category_id)->update([
    'product_thumbnail_photo'=>$photo_new_name
]);

}
else {
   echo "nai";
}



// product_multifull_photo uploade

if ($request->hasFile('product_multifull_photo')) {
 $flag=1;

  foreach ($request->file('product_multifull_photo') as  $single_photo) {

        $user_uplode_location_tump = $single_photo;
        $last_extension = $user_uplode_location_tump->getClientOriginalExtension();
      $photo_new_name =$Category_id."-".$flag++.".".$last_extension;
       $new_location_photo_uplode='public/frontend_asset/product_multifull_photo/'.$photo_new_name;
     Image::make($user_uplode_location_tump)->resize(1050,1050)->save(base_path($new_location_photo_uplode));

     Product_multipull_photo::insert([
        'product_id'=>$Category_id,
         'product_multiful_photo_name'=>$photo_new_name,
         'created_at'=>Carbon::now()
      ]);

  }

}

else {
   echo "nai";
}
return back()->with('product_success','product insert successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    public function edit(Product $product)
    {
      return view('product.edit',[
          // 'product_info'=>Product::findOrFail($id),
          'product_info'=>$product,
          'category_info'=>Sub_category::all()
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Request $request, Product $product)
    {
        // echo $id;
        // print_r($request->all());
        $product->update($request->except('_token','_method'));
        return back()->with('edit_success','edit successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Product $product)
    {
       $product->delete();
      return back();
    }
}
