<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Protfolio;
use Carbon\Carbon;
class Rony_protfolioController extends Controller
{
   function my_protfilio(){

      return view('admin/MY_Protfolio/index',[
       'my_protfolio'=> DB::select('SELECT * from protfolios where status = 1'),
       'my_protfolios_2'=> DB::select('SELECT * from protfolios where status = 2')

      ]);
   }
   function my_protfilio_post (Request $request){
      protfolio::insert([
         'my_name'=>$request->my_name,
         'father_name'=>$request->father_name,
         'mother_name'=>$request->mother_name,
         'created_at'=>Carbon::now()
      ]);

     return back()->with('success_protfolio','Insert Successfully');
   }
   function mark_delete(Request $request){

foreach($request->mark_id as $key => $value){
   protfolio::find($value)->delete();
}
return back()->with('delete_protfolio','deleted Successfully');

   }

function potfolio_dective($active_and_deactive_id){
// $ = DB::table('protfolio')->select('status')->where('id','=',$active_and_deactive_id)->frist();
$protfoliot =protfolio::select('status')->find($active_and_deactive_id);

if ($protfoliot->status=='1') {
   $status='2';
}
else {
   $status='1';
}
$values=array('status'=>$status);

protfolio::find($active_and_deactive_id)->update($values);
return back();
}
}
