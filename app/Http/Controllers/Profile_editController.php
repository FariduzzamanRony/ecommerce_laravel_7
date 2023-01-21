<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Image;
use Carbon\Carbon;
use Mail;
use App\Mail\ChangePasswordMail;

class Profile_editController extends Controller
{
    function profile_edit(){
      return view('admin/profile_edit/index');
   }
    function profile_edit_post(Request $request){

$request->validate([
   'name'=>'required'
]);
 if (Auth::user()->updated_at->addDays(30) < Carbon::now()) {
    User::find(Auth::id())->update([
      'name'=>$request->name
    ]);
    return back()->with('name_succ','Name Edit Successfully');
 }
 else {
    return back()->with('name_error','You Can after 30 days');
 }
   }


function password_change(){
   return view('admin/password_change/index');
}
function password_change_post(Request $request){
$request->validate([
   'old_password'=>'required',
   'password'=>'required | confirmed',
   'password_confirmation'=>'required'
]);


if (Hash::check($request->old_password,Auth::user()->password)) {
    if ($request->old_password==$request->password) {
      return back()->with('old_pass_math','old password and new password same');
    }
    else {
   User::find(Auth::id())->update([
      'password'=>Hash::make($request->password)
   ]);


   $user_email= Auth::user()->email;
   $user_name= Auth::user()->name;
   Mail::to($user_email)->send(new ChangePasswordMail($user_name));
   return back()->with('change_success','Password change Successfully');


    }
}
else {
   return back()->with('on_math_pass','old password dose not math');
}
}





function profile_photo_uplode(Request $request){


   if ($request->hasFile('profile_photo')) {

if (Auth::user()->profile_photo!='null.png') {
    $old_photo_location='public/profile_photos/'.Auth::user()->profile_photo;
  unlink(base_path($old_photo_location));


}

$user_uplode_photo = $request->file('profile_photo');
$last_extension= $user_uplode_photo->getClientOriginalExtension();
$new_photo_name=Auth::id().".".$last_extension;
 $new_location_photo_uplode='public/profile_photos/'.$new_photo_name;
Image::make($user_uplode_photo)->resize(150,150)->save(base_path($new_location_photo_uplode,50));
User::find(Auth::id())->update([
   'profile_photo'=>$new_photo_name
]);

   }
   else {
      echo "nai";
   }
}




 function datatable(){
    return view('admin/category/data_table');
}



}
