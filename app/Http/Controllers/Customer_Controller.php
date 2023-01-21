<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use App\User;
use App\Billing;
use App\Shipping;
use Carbon\Carbon;
use App\Order;
use App\Ordel_detail;
use App\Product;
use PDF;

class Customer_Controller extends Controller
{
    public function Customer_index() {
      return view('Customer/index',[

        #'Billing_confram'=> Billing::all(),
        #'Shipping_confram'=> Order::all(),
        #'Ordel_confram_details'=> Ordel_detail::all()

        'Ordel_confram_details'=> Order::where('user_id',Auth::id())->get(),


      ]);
   }


   function Customer_invoices($order_id){


    $pdf = PDF::loadView('pdf.invoice',[
            'order_info' => Order::find($order_id),
      ]);
    return $pdf->download('invoice.pdf');
    //  return $pdf->stream();
   }
}
