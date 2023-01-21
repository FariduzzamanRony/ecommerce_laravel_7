<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Practice;
use Carbon\Carbon;
class PracticeController extends Controller
{
        function practice(){
          return view('admin/practice/index',[
           'Practicees'=>Practice::all(),
           'Soft_delete_Practicees'=>Practice::onlyTrashed()->get(),
         'AAactive_status'=>DB::select('SELECT * from practices  where Active_Status = 2')

          ]);
        }


        function practice_post (Request $request){
           $request->validate([
              'name'=>'required',
              'email'=>'required | email | unique:Practices,email'
          ]);
        Practice::insert([
           'name'=>$request->name,
           'email'=>$request->email,
           'created_at'=>Carbon::now()
        ]);
return back()->with('practice_status','Successfully');
        }


        function read_practice($read_id){
          $read_Practice = Practice::select('status')->find($read_id);
if ($read_Practice->status==1) {
   $status ='2';
}

$value = array('status'=>$status);
Practice::find($read_id)->update($value);
return back();
        }


function edit_practice($edit_id){
   return view('admin/practice/edit',[
      'edit_Practice'=> Practice::find($edit_id)
   ]);
}



function edit_practice_post (Request $request){
 Practice::find($request->edit_id)->update([
   'name'=>$request->name,
   'email'=>$request->email
]);
return back()->with('edit_success','Practice edit Successfully');
}



function Soft_Delete_practice($Soft_Delete_id){
Practice::find($Soft_Delete_id)->delete();
return back()->with('delete_success','delete Successfully');
}



function restore_practice ($restore_id){
Practice::withTrashed()->find($restore_id)->restore();
return back()->with('Restore_success','Restore Successfully');
}



function hard_delete_practice($hard_delete_id){
Practice::withTrashed()->find($hard_delete_id)->forceDelete();
return back()->with('hard_delete_success','Hard Deleted Successfully');
}

function active_and_dective_practice($active_and_dective_id){

$active= Practice::select('active_status')->find($active_and_dective_id);

if ($active->active_status=='1') {
   $active_status='2';
}
else {
   $active_status='1';
}

$values=array('active_status'=>$active_status);
Practice::find($active_and_dective_id)->update($values);

if ($active->active_status=='1') {
   return back()->with('active_status_success','Active Status Successfully');
}
else {
   return back()->with('active_status_success','Deactive Status Successfully');
}

}

function practice_mark_delete(Request $request){
   foreach ($request->mark_id as $value) {
      Practice::withTrashed()->find($value)->forceDelete();
   }
   return back();

}





}
