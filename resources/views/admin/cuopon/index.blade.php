
@extends('layouts.deshbord_app')


@section('cuopon')
active
@endsection
@section('deshbord_content')


<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card ">
            <div class="card-header bg-success text-warning text-center">
            <h2>Cupon View</h2>
          </div>
          <table class="table">
             <thead>
               <tr>
                   <th>ID<th>
                   <th>Cupon_name<th>
                   <th>Added_By<th>
                   <th>discount_amount<th>
                   <th>minimun_amount<th>
                   <th>validity_till<th>
                   <th>Created_At<th>


               </tr>
             </thead>
             <tbody>

             {{-- ucfirst() - converts the first character of a string to uppercase
             lcfirst() - converts the first character of a string to lowercase
             strtoupper() - converts a string to uppercase
             strtolower() - converts a string to lowercase --}}
             {{--timezone('Asia/Dhaka')-> format('h:i:s:A')
             format('d/m/Y')
             diffForHumans() --}}

          @forelse ($cuopon as  $cuopon_value)
             <tr>
               <td colspan="2">{{ $cuopon_value->id }}</td>
               <td colspan="2">{{ $cuopon_value->coupon_name }}</td>
               <td colspan="2">{{ App\User::find($cuopon_value->added_by)->name }}</td>
               <td colspan="2">{{ $cuopon_value->discount_amount }}%</td>
               <td colspan="2">{{ $cuopon_value->minimun_amount }} Taka</td>
               <td colspan="2">Time :{{ $cuopon_value->validity_till }}</td>
               <td colspan="2">{{ $cuopon_value->created_at }}</td>

             </tr>
          @empty

          @endforelse
                   <tr>
                      <td colspan="80" class="text-center text-danger"> <h4>Nothing to Show</h4> </td>
                   </tr>

             </tbody>
             </table>

         </div>
      </div>
   </div>
   </div>

<div class="container">
   <div class="row">
      <div class="col-lg-4 m-auto">


         <div class="card text-white bg-info mb-3">
           <div class="card-body">
             <h3 class="bg-white text-success text-center" style="padding:5px;">Cuopon</h3>

          <form method="post" action="{{ url('cuopon/post') }}">
             @csrf

          <div class="form-group">
           <label>Please Enter your coupon name</label>
           <input type="text" class="form-control"   placeholder="coupon name" name="coupon_name" value="{{ old('coupon_name') }}">
          </div>


          <div class="form-group">
           <label>Please Enter your discount amount</label>
           <input type="text" class="form-control"   placeholder="amount" name="discount_amount" value="{{ old('discount_amount') }}">
          </div>

          <div class="form-group">
           <label>Please Enter your minimun amount  </label>
           <input type="text" class="form-control"   placeholder="amount" name="minimun_amount" value="{{ old('minimun_amount') }}">
          </div>





          <div class="form-group">
           <label>Please Enter your date</label>
           <input type="date" class="form-control" placeholder="validity till" name="validity_till">
          </div>

          <button type="submit" class="btn btn-success" style="cursor:pointer;" >Add Cuopon</button>

          </form>

           </div>
         </div>
         </div>




   </div>
</div>
@endsection
