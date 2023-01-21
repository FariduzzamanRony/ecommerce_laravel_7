
@extends('layouts.frontend_app')



@section('frontend_content')


<!-- Breadcrumb Area start -->
           <section class="breadcrumb-area">
             <div class="container">
                   <div class="row">
                       <div class="col-md-12">
                           <div class="breadcrumb-content">
                              <h1 class="breadcrumb-hrading">Checkout Page</h1>
                              <ul class="breadcrumb-links">
                                   <li><a href="{{ url('/') }}">Home</a></li>
                                   <li>Checkout</li>
                              </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           <!-- Breadcrumb Area End -->
           <!-- checkout area start -->
           @if (session('success_status'))
          <div class="alert alert-success">
          <p>{{ session('success_status') }}</p>
          </div>
          @endif

           <div class="checkout-area mt-60px mb-40px">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-7">
                           <div class="billing-info-wrap">
                              <h3>Billing Details</h3>
                              <form class="" action="{{ url('checkout/post') }}" method="post">
                              @csrf
                              <div class="row">
                                  <div class="col-lg-12 col-md-6">
                                      <div class="billing-info mb-20px">
                                          <label>First Name</label>
                                          @error ('name')
                                             <div class="alert alert-danger">
                                                {{ $message }}
                                             </div>
                                          @enderror
                                          <input type="text"  name="name"/ value="{{ $user->name }}">
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                      <div class="billing-info mb-20px">
                                          <label>Phone</label>
                                          @error ('phone')
                                             <div class="alert alert-danger">
                                                {{ $message }}
                                             </div>
                                          @enderror
                                          <input type="text" value="{{ old('phone') }}" name="phone"/>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                      <div class="billing-info mb-20px">
                                        @error ('email')
                                           <div class="alert alert-danger">
                                              {{ $message }}
                                           </div>
                                        @enderror
                                          <label>Email Address</label>
                                          <input type="text" name="email"/ value="{{ $user->email }}">
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                      <div class="billing-select mb-20px">
                                        @error ('country_id')
                                           <div class="alert alert-danger">
                                              {{ $message }}
                                           </div>
                                        @enderror
                                          <label>Country *</label>

                                          <select name="country_id" value="{{ old('country_id') }}" id="country_list_1" size="3">
                                              <option value="1">Select a country</option>
                                              @foreach ($countryes as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                              @endforeach

                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                      <div class="billing-select mb-20px">
                                          <label>City *</label>
                                          <select name="city_id"  id="city_list_1" size="3">
                                              <option value="">Select a city</option>

                                          </select>
                                      </div>
                                  </div>



                                  <div class="col-lg-12">
                                      <div class="billing-info mb-20px">
                                          <label>Street Address</label>
                                          @error ('address')
                                             <div class="alert alert-danger">
                                                {{ $message }}
                                             </div>
                                          @enderror
                                          <input class="billing-address" name="address" placeholder="House number and street name" type="text" />

                                      </div>
                                  </div>
                              </div>

                              {{-- <div class="checkout-account mb-50px">
                                   <input class="checkout-toggle2" type="checkbox" />
                                   <label>Create an account?</label>
                              </div>
                              <div class="checkout-account-toggle open-toggle2 mb-30">
                                   <input placeholder="Email address" type="email" />
                                   <input placeholder="Password" type="password" />
                                   <button class="btn-hover checkout-btn" type="submit">register</button>
                              </div> --}}
                              <div class="additional-info-wrap">
                                   <h4>Additional information</h4>
                                   <div class="additional-info">
                                       <label>Order notes</label>
                                       @error ('note')
                                          <div class="alert alert-danger">
                                             {{ $message }}
                                          </div>
                                       @enderror
                                       <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery. " name="message">{{ old('note') }}</textarea>
                                   </div>
                              </div>
                              <div class="checkout-account mt-25">
                                   <input class="checkout-toggle" type="checkbox" value="1" name="shipping_address_status"/>
                                   <label>Ship to a different address?</label>
                              </div>
                              <div class="different-address open-toggle mt-30">


                            <div class="row">
                                     <div class="col-lg-12 col-md-6">
                                         <div class="billing-info mb-20px">

                                             <label>First Name</label>

                                             <input type="text"  name="shipping_name"/>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-6">
                                         <div class="billing-info mb-20px">
                                             <label>Phone</label>
                                             <input type="text" name="shipping_phone"/>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-6">
                                         <div class="billing-info mb-20px">
                                             <label>Email Address</label>
                                             <input type="text" name="shipping_email"/>
                                         </div>
                                     </div>

                                     <div class="col-lg-6 col-md-6">
                                         {{-- <div class="billing-select mb-20px">
                                             <label>Country *</label>
                                             <br>
                                             <select name="country_id" id="country_list_1" size="3">
                                                 <option value="1">Select a country</option>
                                                 @foreach ($countryes as $country)
                                                   <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                 @endforeach

                                             </select>
                                         </div> --}}
                                     </div>
                                     {{-- <div class="col-lg-6 col-md-6">
                                         <div class="billing-select mb-20px">
                                             <label>City *</label>
                                              <br>
                                             <select name="city_id" id="city_list_1" size="3">
                                                 <option value="">Select a city</option>

                                             </select>
                                         </div>
                                     </div> --}}

                                     <div class="col-lg-12">
                                         <div class="billing-info mb-20px">
                                             <label>Street Address</label>
                                             <input class="billing-address" name="shipping_address"  placeholder="House number and street name" type="text" />

                                         </div>
                                     </div>
                                 </div>


                              </div>

                           </div>
                       </div>
                       <div class="col-lg-5">
                           <div class="your-order-area">
                              <h3>Your order</h3>
                              <div class="your-order-wrap gray-bg-4">
                                   <div class="your-order-product-info">
                                       <div class="your-order-top">
                                           <ul>
                                               <li>Product</li>
                                               <li>Total</li>
                                           </ul>
                                       </div>
                                       <div class="your-order-middle">
                                           <ul>
                                              @forelse (Card_aitems() as  $card_check_value)

                                                @php
                                                $ttt=$card_check_value->product->product_price-($card_check_value->product->product_price*$card_check_value->product->offer_price )/100;

                                                @endphp
                                                @php

                                                @endphp
                                                 <li><span class="order-middle-left">{{ $card_check_value->product->product_title }} X {{ $card_check_value->product_quantity }}</span> <span class="order-price">${{ $ttt*$card_check_value->product_quantity }}</span></li>

                                              @empty
                                                 <li><span class="order-middle-left text-danger">Nothing To Show</span> <span class="order-price">$0</span></li>

                                              @endforelse

                                           </ul>
                                       </div>
                                       <div class="your-order-bottom">
                                           <ul>
                                               <li class="your-order-shipping">Disscount (%)</li>
                                               <li>{{ session('card_discount_amount') }}%</li>

                                           </ul>
                                           <ul>
                                               <li class="your-order-shipping">Disscount Amount ({{ session('coupon_name') }})</li>
                                                <li>${{ session('card_amount') }}</li>
                                           </ul>


                                       </div>
                                       <div class="your-order-total">
                                           <ul>
                                               <li class="order-total">Sub Total</li>
                                               <li>${{ session('card_sub_totle')-session('card_amount') }}</li>
                                           </ul>
                                       </div>
                                   </div>
                                   <div class="payment-method">
                                       <div class="payment-accordion element-mrg">
                                           <div class="panel-group" id="accordion">
                                               <div class="panel payment-accordion">
                                                   <div class="panel-heading" id="method-one">
                                                       <h4 class="panel-title">
                                                           <a data-toggle="collapse" data-parent="#accordion" href="#method1">
                                                               payment method

                                                           </a>
                                                       </h4>
                                                   </div>
                                                   <br>
                                                   <div class="panel-heading" id="method-one">


                                                             <input type="radio" id="Bkesh" name="payment_opction" value="1">
                                                             <label for="css">Card</label><br>
                                                             <input type="radio" id="Cash" name="payment_opction" value="2" checked>
                                                             <label for="javascript">Cash on Delivery</label>
                                                   </div>

                                               </div>


                                           </div>
                                       </div>
                                   </div>
                              </div>

                              <div class="Place-order mt-25">

                                   <button type="submit" class="btn-hover btn btn-primary" href="#">Place Order</button>


</form>
                              </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- checkout area end -->
           <!-- Footer Area start -->

<style>

.nice-select {
display: none;
}

</style>
                           @endsection
 @section('footer_script')
   <script>
       $(document).ready(function(){
          $('#country_list_1').select2();
          $('#city_list_1').select2();

         $('#country_list_1').change(function(){
           var country_id= $(this).val();




           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });


           $.ajax({
                  type:'POST',
                  url:'/check_out/ajax_query',
                  data: {country_id:country_id},
                  success:function (data){
                   $('#city_list_1').html(data);
                  }
           });


         });



       });
   </script>
 @endsection
