<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Carbon\Carbon;
use Hash;
use Laravel\Socialite\Facades\Socialite;

class Guthub_Controller extends Controller
{


   public function redirectToProvider()
   {
      return Socialite::driver('github')->redirect();
   }


   public function handleProviderCallback()
   {
      ;
      $user = Socialite::driver('github')->user();

      // if (User::where('email',$user->getEmail())->exists()) {
      //         return view('auth.register');
      // }
      // else {
      //    User::insert([
      //       'role'=>'2',
      //       'name'=>$user->getNickname(),
      //       'email'=>$user->getEmail(),
      //       'password'=>Hash::make('ronykhan'),
      //       'updated_at'=>Carbon::now(),
      //       'created_at'=>Carbon::now()
      //    ]);
      // }
      if (!User::where('email',$user->getEmail())->exists()) {
         User::insert([
            'role'=>'2',
            'name'=>$user->getNickname(),
            'email'=>$user->getEmail(),
            'password'=>Hash::make('ronykhan'),
            'updated_at'=>Carbon::now(),
            'created_at'=>Carbon::now()
         ]);
      }


      if (Auth::attempt(['email'=>$user->getEmail(),'password'=>'ronykhan'])) {
         return redirect('customer/home');
      }

   }
}
