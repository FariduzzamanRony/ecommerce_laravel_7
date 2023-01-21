<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Order;
use App\Ordel_detail;
use App\Product;
use Mail;
use customer_order_deatils;
use App\Mail\FurchaseConfim;
class Customer_oreder_deatils_Cotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      return view('admin.customer.order_deatils',[
        'Ordel_confram_details'=>Order::all(),
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $RRRR=Ordel_detail::where('order_id',$id)->get();
      foreach ($RRRR as  $value) {
        Ordel_detail::find($value->id)->update([
          'review_active'=>'2'
        ]);
      }
      Ordel_detail::find($id)->update([
            'payment_method'=>1
        ]);
      $oredr_name= Order::find($id)->user_id;
       $value = User::find($oredr_name)->name;
        return back()->with('Perament',$value." ".'Perament Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function order_cencel($order_id)
    {


      $oredr_name= Order::find($order_id)->user_id;
       $value = User::find($oredr_name)->name;

       $Ordel_detail = Ordel_detail::where('order_id',$order_id)->get();
       foreach ($Ordel_detail as  $value_Ordel_detail) {
               Product::find($value_Ordel_detail->product_id)->increment('product_quantity',$value_Ordel_detail->product_quantity);
       }
       Order::find($order_id)->update([
         'payment_status'=>3
       ]);

        return back()->with('Cencle',$value." ".'Order Cencle Successfully');
    }
}
