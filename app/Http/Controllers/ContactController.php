<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;
class ContactController extends Controller
{
    function contact_index(){
      return view('admin/contact/index',[
   'contacts'=>Contact::all(),
   'contact_softdelete'=>Contact::onlyTrashed()->get()
      ]);
   }
    function contact_post(Request $request){
      $request->validate([
         'contact_name'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
         // 'contact_email'=>'required |email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
         'contact_email'=>'required |email',
         // 'contact_number'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/ |min:11|max:11',
         'contact_number'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/| digits:11',
         'contact_title'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
         'contact_messages'=>'required'
      ],[
        'contact_name.required'=>'please vai khali diyen na??',
        'contact_email.required'=>'please vai khali diyen na??',
        'contact_title.required'=>'please vai khali diyen na??',
        'contact_number.required'=>'please vai khali diyen na??',
        'contact_messages.required'=>'please vai khali diyen na??'
      ]);

      Contact::insert([
         'contact_name'=>$request->contact_name,
         'contact_email'=>$request->contact_email,
         'contact_number'=>$request->contact_number,
         'contact_title'=>$request->contact_title,
         'contact_messages'=>$request->contact_messages,
         'created_at'=>Carbon::now(),
      ]);

      return back()->with('success','Successfully');

   }

   function contact_edit($contact_id){
      return view('admin/contact/edit',[
      'contact_edit'=>Contact::find($contact_id)
      ]);
   }
  function contact_edit_post(Request $request){
     $request->validate([
        'contact_name'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
        // 'contact_email'=>'required |email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        'contact_email'=>'required |email',
        // 'contact_number'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/ |min:11|max:11',
        'contact_number'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/| digits:11',
        'contact_title'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
        'contact_messages'=>'required'
     ],[
       'contact_name.required'=>'please vai khali diyen na??',
       'contact_email.required'=>'please vai khali diyen na??',
       'contact_title.required'=>'please vai khali diyen na??',
       'contact_number.required'=>'please vai khali diyen na??',
       'contact_messages.required'=>'please vai khali diyen na??'
     ]);

   Contact::find($request->id)->Update([
      'contact_name'=>$request->contact_name,
      'contact_email'=>$request->contact_email,
      'contact_number'=>$request->contact_number,
      'contact_title'=>$request->contact_title,
      'contact_messages'=>$request->contact_messages,
   ]);
   return back()->with('contact_success_edit','Successfully');
 }


function contact_delete($contact_delete_id){

   Contact::find($contact_delete_id)->delete();
   return back()->with('contact_delete','Contact Delete Successfully');
}


function restore_contact($restore_contact_delete_id){

$PRIYA =Contact::withTrashed()->find($restore_contact_delete_id)->contact_name;
   Contact::withTrashed()->find($restore_contact_delete_id)->restore();
   return back()->with('restore_contact',ucfirst(strtolower($PRIYA))." ".'Contact Restore Successfully');

}

function contact_hard_delete ($Hard_delete_contact_id){

Contact::withTrashed()->find($Hard_delete_contact_id)->forceDelete();
return back()->with('Hard_delete_contact','Contact delete Successfully');

}


}
