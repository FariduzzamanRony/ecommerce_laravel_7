<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\AjaxImage;
use Mail;
use App\Mail\AllFriendSmsMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('Check_Role');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {

        return view('home',[
             'users'=>User::latest()->simplepaginate(3),
              'totle_user'=>User::count()
        ]);




        // $users=User::all();
        // $users=User::orderBy('id','desc')->get();
        // $users=User::latest('id','desc')->get();
        // paginate er jonno get() change ==== $users=User::latest()->get();
        // $users=User::latest()->paginate(3);


        // $users=User::latest()->simplepaginate(3);
        // $totle_user=User::count();
        // return view('home',compact('users','totle_user'));

        // $users=User::latest()->simplepaginate(3);
        // $totle_user=User::count();
        // return view('home',[
        //   'users'=>$users,
        // 'totle_user'=>$totle_user
        // ]);

        // return view('home')
        // ->with('users',User::latest()->simplepaginate(3))
        // ->with('totle_user',User::count());

    }
    function sentall_manber_sms(){

    // echo User::all()->find(Auth::id())->pluck('gender');
    $all_register_member= User::all()->pluck('email');


foreach ($all_register_member as  $value) {
   Mail::to($value)->send(new AllFriendSmsMail());

}
return back();
    }





    public function ajaxRequest()
       {

           return view('Ajax.index');
       }

       public function ajaxRequestPost(Request $request)
       {

           post::insert([
               'title' => $request->Code, //This Code coming from ajax request
               'details' => $request->Chief, //This Chief coming from ajax request
           ]);

           return response()->json(
               [
                   'success' => true,
                   'message' => 'Data inserted successfully'
               ]
           );
       }
       public function destroy($id){

        AjaxImage::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }





}
