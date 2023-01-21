
@extends('layouts.deshbord_app')


@section('offer_product')
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
                   <th>Slug<th>
                   <th>Old Price<th>
                   <th>Product Name<th>
                   <th>Product photo<th>
                   <th>discount<th>
                   <th>validity_date<th>
                   <th>Price<th>



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

   @forelse ($Offerproduct as  $Offerproduct_value)
             <tr class="
             @if (Carbon\Carbon::now()->format('Y-m-d') > $Offerproduct_value->validity_date)
        bg-warning
                 @endif

             ">
               <td colspan="2">{{ $Offerproduct_value->id }}</td>
               <td colspan="2">{{ $Offerproduct_value->slug }}</td>
               <td colspan="2">$ {{ $Offerproduct_value->offer_realsion_product_date->product_price }}</td>
               <td colspan="2">{{ $Offerproduct_value->offer_realsion_product_date->product_name }}</td>

               <td colspan="2">
                 <img width="50" class="second-img"  src="{{ asset('frontend_asset/product_photo') }}/{{ $Offerproduct_value->offer_realsion_product_date->product_thumbnail_photo }}" alt=""/>

               </td>
               <td colspan="2">{{ $Offerproduct_value->disscount }}%</td>
               <td colspan="2">{{ $Offerproduct_value->validity_date }}</td>
               <td colspan="2">{{ $Offerproduct_value->offer_realsion_product_date->product_price-($Offerproduct_value->offer_realsion_product_date->product_price/100)*$Offerproduct_value->disscount }}</td>

             </tr>

          @empty
            <tr>
               <td colspan="80" class="text-center text-danger"> <h4>Nothing to Show</h4> </td>
            </tr>
          @endforelse


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
             <h3 class="bg-white text-success text-center" style="padding:5px;">Product Offer Create</h3>
@if (session('offer_succer'))
  <div class="alert alert-success">
    {{ session('offer_succer') }}
  </div>
@endif

          <form method="post" action="{{ url('offer/post') }}">
             @csrf

          <div class="form-group">
           <label>Please Enter your coupon name</label>
           <br>
          <select class="form-control" name="product_id_offer" id="product_name">
            <option class="form-control">-select-</option>
            @foreach ($hotProducts as $key => $hot_product)
                <option class="form-control" value="{{ $hot_product->id }}">{{ $hot_product->product_name }}</option>
            @endforeach

          </select>
          </div>

          <div class="form-group">
           <label>Product Old Price </label>
           <br>
           <select class="form-control"  id="product_price">
                 <option class="form-control">Price</option>
           </select>
          </div>
          <div class="form-group">
           <label>Product Discount</label>
           <input type="text" class="form-control" placeholder="Discount %" name="disscount">
          </div>
          <div class="form-group">
           <label>Please Enter your date</label>
           <input type="date" class="form-control" placeholder="validity date" name="validity_date">
          </div>
          <button type="submit" class="btn btn-success" style="cursor:pointer;" >Add Offer</button>

          </form>

           </div>
         </div>
         </div>




   </div>
</div>
@endsection

@section('footer_script')
  <script>
      $(document).ready(function(){
         $('#product_name').select2();
        $('#product_name').change(function(){
          var product_name= $(this).val();




          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });


          $.ajax({
                 type:'POST',
                 url:'/offer_product/ajax_query',
                 data: {product_name:product_name},
                 success:function (data){
                   $('#product_price').html(data);
                 }
          });


        });



      });
  </script>
@endsection
