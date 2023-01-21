<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loginregister;
use Hash;
use Redirect;
use Carbon\Carbon;
class Register_loginController extends Controller
{
    function new_register(){
      return view('login_register/register');
   }
    function register_post (Request $request){
      $request->validate([
         'new_name'=>'required',
         'new_email'=>'required | email | unique:loginregisters,new_email',
         'password'=>'required | confirmed',
         'password_confirmation'=>'required',
         'gender'=>'required',
         'date_of_brith'=>'required'
      ]);
loginregister::insert([
   'new_name'=>$request->new_name,
   'new_email'=>$request->new_email,
   'password'=>Hash::make($request->password),
   'password_confirmation'=>$request->password_confirmation,
   'date_of_brith'=>$request->date_of_brith,
   'gender'=>$request->gender,
   'created_at'=>Carbon::now()
]);
// use Redirect;
// return Redirect::to('my/protfilio');
return back()->with('register_success','Register Successfully');
   }
   function new_login(){
      return view('login_register/login');
   }

   function new_login_post(Request $request){
 $register_email = loginregister::where('new_email','=',$request->new_email)->first();

if ($register_email) {
   if (Hash::check($request->password,$register_email->password)) {
      $request->session()->put('new_register_id',$register_email->id);
      return redirect('home');
   }
   else {
      return back()->with('password','apaner password  vul');
   }
}
else {
   return back()->with('email','apaner email address vul');
}











   }
}
