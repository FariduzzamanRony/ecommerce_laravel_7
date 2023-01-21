<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuopon;
use Carbon\Carbon;
use Auth;


class CuoponController extends Controller
{
    function cuopon(){
      return view('admin.cuopon.index',[
         'cuopon'=>Cuopon::all()
      ]);

   }
    function cuopon_post(Request $request){

    Cuopon::insert($request->except('_token')+[
      'added_by'=>Auth::id(),
      'created_at'=>Carbon::now()
   ]);
   return back();


   }
}
