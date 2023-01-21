<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogFrom;
use Carbon\Carbon;
use App\Blog;
use Image;
class BlogController extends Controller
{

function blog_index(){
       return view('admin.blog.index',[
      'bloge'=>Blog::all()
   ]);
}
function blog_post(BlogFrom $request){


$blog_id=Blog::insertGetId([
      'blog_name'=> $request->blog_name,
      'blog_email'=> $request->blog_email,
      'blog_photo'=>"",
      'created_at'=>Carbon::now()
]);

if($request->hasFile('blog_photo')){
      $user_uplod_photo_laction= $request->file('blog_photo');
      $photo_last_extension=$user_uplod_photo_laction->getClientOriginalExtension();
      $custom_new_name=$blog_id.".".$photo_last_extension;
      $new_photo_location='public/uplodes/blog_photoss/'.$custom_new_name;
      Image::make($user_uplod_photo_laction)->save(base_path($new_photo_location));
      Blog::find($blog_id)->update([
      'blog_photo'=>$custom_new_name
]);
}
else {
      echo "nai";
}

return back()->with('blog_success','Successfully');

}

function blog_edit($blog_edit_id){
      return view('admin.blog.edit',[
     'blog_information'=>Blog::find($blog_edit_id)
   ]);
}

function blog_edit_post(Request $request){
   $request->validate([
      'blog_name'=>'required',
      'blog_email'=>'required|unique:blogs,blog_email,'.$request->blog_id
   ]);

Blog::find($request->blog_id)->update([
    'blog_name'=>$request->blog_name,
    'blog_email'=>$request->blog_email
]);




// photo name anar jonno
 $old_photo = Blog::select('blog_photo')->find($request->blog_id);



    // photo check
if ($request->hasFile('blog_photo')) {
   // photo location
   $photo_location=$request->file('blog_photo');

// old photo delete
   if ($request->blog_id==$request->blog_id) {
     $old_photo_location='public/uplodes/blog_photoss/'.$old_photo->blog_photo;

   // location a photo ase naki nai
if ($old_photo->blog_photo=="") {
   // na thakle uplode hobe
   // new photo uploade
         $photo_last_Extension= $photo_location->getClientOriginalExtension();
         $photo_new_name=$request->blog_id.".".$photo_last_Extension;
         $new_location_photo_uplodes='public/uplodes/blog_photoss/'.$photo_new_name;
         Image::make($photo_location)->save(base_path($new_location_photo_uplodes));
         Blog::find($request->blog_id)->update([
         'blog_photo'=>$photo_new_name
      ]);
}
else {
   // thakle delete hoye uplode hobe
   unlink(base_path($old_photo_location));

// new photo uploade
   $photo_last_Extension= $photo_location->getClientOriginalExtension();
   $photo_new_name=$request->blog_id.".".$photo_last_Extension;
   $new_location_photo_uplodes='public/uplodes/blog_photoss/'.$photo_new_name;
   Image::make($photo_location)->save(base_path($new_location_photo_uplodes));
   Blog::find($request->blog_id)->update([
   'blog_photo'=>$photo_new_name
]);
}











   }
   else {
      echo "hobe na";
   }



}
else {
   echo "nai";
}



return back()->with('blog_edit_success','Edit Successfully');
}

}
