
@extends('layouts.deshbord_app')


@section('home')
active
@endsection
@section('deshbord_content')

   {{-- <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-10 m-auto">
          <h1>10% descaunt all Member</h1>
         <a href="{{ url('sent/all_manber_sms') }}" class="text-center btn btn-info" >send Que</a>

      </div>
   </div>
</div> --}}
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-10 m-auto">
            <h1 class="text-info">Welcome Customer</h1>
      </div>
   </div>

</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User id</th>
      <th scope="col">Taka</th>
      <th scope="col">disscount(%)</th>
      <th scope="col">sub_total</th>
      <th scope="col">coupon_name</th>
      <th scope="col">total</th>
      <th scope="col">payment</th>
      <th scope="col">created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($Ordel_confram_details as  $Ordel_confram_value)
      <tr>
        <th>{{ $Ordel_confram_value->id }}</th>
        <th>{{ App\User::find($Ordel_confram_value->user_id)->name }}</th>

        <th>  @if ($Ordel_confram_value->payment_status==1)


              <span class="badge bg-warning">Unpaid</span>
          @else

            <span class="badge bg-success">paid</span>
          @endif
        </th>


        <th>{{ $Ordel_confram_value->disscount_amunt }}%</th>
        <th>${{ $Ordel_confram_value->sub_total }}</th>
        <th>{{ $Ordel_confram_value->coupon_name }}</th>
        <th>${{ $Ordel_confram_value->total }}</th>
  <th>
        @php
         if($Ordel_confram_value->payment_method==1){
          echo "Bkash";
        }
        else {
          echo "chsh on delivery";
        }

        @endphp


        </th>
        <th>{{ $Ordel_confram_value->created_at }}</th>
        <th> <a href="{{ url('customer/invoice/download') }}/{{ $Ordel_confram_value->id }}">
          Download Invoice <i class="fa fa-download"></i></a></th>




        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">order_id</th>
            <th scope="col">product_id</th>
            <th scope="col">product_photo</th>
            <th scope="col">product_quantity</th>
            <th scope="col">product_price</th>
            <th scope="col">totle_price</th>
            <th scope="col">created_at</th>
          </tr>
        </thead>

      </tr>
      <tr>
        <td colspan="50">
        <div class="alert alert-primary">
          <h1 class="text-center">Order :{{ App\User::find($Ordel_confram_value->user_id)->name }}</h1>

        </div>
@foreach ( $Ordel_confram_value->order_deatels as $key => $value)
<tr>
<td>{{ $value->id}}</td>
<td>{{ $value->order_id}}</td>
<td>{{ App\Product::find($value->product_id)->product_name }}</td>
{{-- <td>{{ $value->product_id }}={{ App\Product::find($value->product_id)->product_name }}</td> --}}
<td><img src=" {{ asset('frontend_asset/product_photo') }}/{{ $value->product_photo }}" alt="" width="50" ></a></td>
<td>{{ $value->product_quantity }}</td>
<td>${{ $value->product_price }}</td>
<td>${{ $value->totle_price }}</td>
<td>{{ $value->created_at }}</td>

</tr>

@endforeach

        </td>
      </tr>
    @empty
      <tr>
        <td></td>

      </tr>
    @endforelse



  </tbody>
</table>

@endsection
