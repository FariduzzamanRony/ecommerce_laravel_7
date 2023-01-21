
 @extends('layouts.frontend_app')



 @section('frontend_content')


    <!-- Breadcrumb Area start -->
               <section class="breadcrumb-area">
                   <div class="container">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="breadcrumb-content">
                                   <h1 class="breadcrumb-hrading">Cart Page</h1>
                                   <ul class="breadcrumb-links">
                                       <li><a href={{ url('/') }}>Home</a></li>
                                       <li>Cart</li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </section>

               <!-- Breadcrumb Area End -->
               <!-- cart area start -->
               <div class="cart-main-area mtb-60px">
                   <div class="container">
                       <h3 class="cart-page-title">Your cart items</h3>

                       @if (session('success'))
                         <div class="alert alert-success" role="alert">
                           <h1 class="text-center">{{ session('success') }}</h1>
                         </div>
                       @endif

                       @if (session('chash_on'))
                         <div class="alert alert-success" role="alert">
                           <h1 class="text-center">{{ session('chash_on') }}</h1>
                         </div>
                       @endif
                       @if (session('card_prodect_delete'))
                         <div class="alert alert-success" role="alert">
                           <h1 class="text-center">{{ session('card_prodect_delete') }}</h1>
                         </div>
                       @endif

                       <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               <form method="post" action="{{  route('update.card')  }}">
                                  @csrf
                                   <div class="table-content table-responsive cart-table-content">
                                       <table>
                                           <thead>
                                               <tr>
                                                   <th>Image</th>
                                                   <th>Product Name</th>
                                                   <th>Until Price</th>
                                                   <th>Qty</th>
                                                   <th>Subtotal</th>
                                                   <th>Action</th>
                                               </tr>
                                           </thead>
                                           <tbody>

                                              @php
                                                 $totel_taka=0;


                                                 $flag=0;

                                              @endphp

                                              @forelse (Card_aitems() as $key => $Card_aitems_svalue)


                                                @if ($Card_aitems_svalue->product->offer_price =="")
                                             @php
                                                $totel_taka=$totel_taka+$Card_aitems_svalue->product_quantity*$Card_aitems_svalue->product->product_price
                                             @endphp


                                                @else
                                                  @php
                                                     $ttytyty=$Card_aitems_svalue->product->product_price-($Card_aitems_svalue->product->product_price*$Card_aitems_svalue->product->offer_price )/100;
                                                             $totel_taka=$totel_taka+$ttytyty*$Card_aitems_svalue->product_quantity ;
                                                  @endphp



                                                @endif

                                                 <tr  class="{{ ($Card_aitems_svalue->product->product_quantity < $Card_aitems_svalue->product_quantity) ? 'bg-warning':'' }}">
                                                    <td class="shopping-cart-img">
                                                       <a href="single-product.html"><img src=" {{ asset('frontend_asset/product_photo') }}/{{ $Card_aitems_svalue->product->product_thumbnail_photo }}" alt="" ></a>
                                                    </td>


                                                    <td class="product-name"><a href="{{ url('Frontend/single_card') }}/{{ $Card_aitems_svalue->product->slug }}">
                                                        @if ($Card_aitems_svalue->product->product_quantity < $Card_aitems_svalue->product_quantity)
                                                           <h6 class="text-danger">{{ 'No Available product'." ".$Card_aitems_svalue->product->product_quantity }}</h6>
                                                           @php
                                                             $flag=1;
                                                          @endphp
                                                        @else
                                                           {{ $Card_aitems_svalue->product->product_name }}</a>
                                                        @endif


                                                    </td>



                                                    <td class="product-price-cart">
                                                      @if ($Card_aitems_svalue->product->offer_price =="")
                                                        <span class="amount">${{ $Card_aitems_svalue->product->product_price  }}</span>
                                                      @else
                                                        <span class="amount">${{ $Card_aitems_svalue->product->product_price-($Card_aitems_svalue->product->product_price*$Card_aitems_svalue->product->offer_price )/100 }}</span>

                                                      @endif


                                                    </td>
                                                    <td class="product-quantity">
                                                        <div class="cart-plus-minus">

                                                            <input class="cart-plus-minus-box" type="text" name="product_quantity_id_and_vlaue[{{ $Card_aitems_svalue->id }}]" value="{{ $Card_aitems_svalue->product_quantity }}" />
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal">$

                                                      @if ($Card_aitems_svalue->product->offer_price =="")
                                                        @if ($Card_aitems_svalue->product->product_quantity < $Card_aitems_svalue->product_quantity)
                                                            00
                                                        @else
                                                            {{$Card_aitems_svalue->product_quantity*$Card_aitems_svalue->product->product_price  }}</td>
                                                        @endif
                                                      @else
                                                        @php
                                                           $ttytyty=$Card_aitems_svalue->product->product_price-($Card_aitems_svalue->product->product_price*$Card_aitems_svalue->product->offer_price )/100
                                                        @endphp
                                                        {{ $ttytyty*$Card_aitems_svalue->product_quantity }}


                                                      @endif










                                                    <td class="product-remove">
                                                        <a href="#"><i class="fa fa-pencil-alt"></i></a>
                                                        <a class="btn btn-sm btn-danger"href="{{ url('product_delete') }}/{{ $Card_aitems_svalue->id }}"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                              @empty

                                              @endforelse
                                           </tbody>
                                       </table>
                                   </div>
                                   <div class="row">
                                       <div class="col-lg-12">
                                           <div class="cart-shiping-update-wrapper">
                                               <div class="cart-shiping-update">
                                                   <a href="{!! route('category/all_product') !!} ">Continue Shopping</a>
                                               </div>
                                               <div class="cart-clear">
                                                   <button type="submit">Update Shopping Cart</button>
                                          </form>
                                                   <a href="#">Clear Shopping Cart</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                               <div class="row">

                                   {{-- <div class="col-lg-4 col-md-6">
                                       <div class="cart-tax">
                                           <div class="title-wrap">
                                               <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                           </div>
                                           <div class="tax-wrapper">
                                               <p>Enter your destination to get a shipping estimate.</p>
                                               <div class="tax-select-wrapper">
                                                   <div class="tax-select">
                                                       <label>
                                                           * Country
                                                       </label>
                                                       <select class="email s-email s-wid">
                                                           <option>Bangladesh</option>
                                                           <option>Albania</option>
                                                           <option>Åland Islands</option>
                                                           <option>Afghanistan</option>
                                                           <option>Belgium</option>
                                                       </select>
                                                   </div>
                                                   <div class="tax-select">
                                                       <label>
                                                           * Region / State
                                                       </label>
                                                       <select class="email s-email s-wid">
                                                           <option>Bangladesh</option>
                                                           <option>Albania</option>
                                                           <option>Åland Islands</option>
                                                           <option>Afghanistan</option>
                                                           <option>Belgium</option>
                                                       </select>
                                                   </div>
                                                   <div class="tax-select mb-25px">
                                                       <label>
                                                           * Zip/Postal Code
                                                       </label>
                                                       <input type="text" />
                                                   </div>
                                                   <button class="cart-btn-2" type="submit">Get A Quote</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                    --}}
                                   <div class="col-lg-4 col-md-6">
                                       <div class="discount-code-wrapper">
                                           <div class="title-wrap">
                                               <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                           </div>
                                           <div class="discount-code">
                                               <p>Enter your coupon code if you have one.</p>


                                                                @if ($coupon_error!=="")
                                                                   <p class="alert alert-danger">{{ $coupon_error }}</p>

                                                                @endif




                                                <form>
                                                   <input type="text" id="aplly_cuopon_input" value="{{ $coupon_name }}">

                                                   <button class="cart-btn-2" type="button" id="aplly_cuopon_btn" >Apply Coupon</button>

                                                </form>
                                             @foreach ($validate_coupon as  $validate_coupon_value)
                                                           <button value="{{ $validate_coupon_value->coupon_name }}" class="badge cuopon_btns"> {{ $validate_coupon_value->coupon_name." - ".'shop more than price '.$validate_coupon_value->minimun_amount}}</button>
                                                @endforeach


                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-lg-4 col-md-12">
                                       <div class="grand-totall">
                                           <div class="title-wrap">
                                               <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                           </div>

                                           <h5>Total products <span>$
                                              @if ($flag==1)
                                                 00
                                              @else

                                                    {{ $totel_taka }}

                                              @endif
                                         @php
                                            session(['card_sub_totle' => $totel_taka]);
                                         @endphp


                                           </span></h5>
                                           <h5>Disscount (%)<span>{{ $discount_amount }}%</span></h5>
                                           @php
                                               session(['card_discount_amount' => $discount_amount]);
                                           @endphp
                                           <h5>Disscount Amount({{ ($coupon_name) ? : '-' }})<span>${{ ($totel_taka*$discount_amount )/100 }}</span></h5>
                                           @php
                                               session(['coupon_name' => ($coupon_name) ? : '-']);
                                               session(['card_amount' => ($totel_taka*$discount_amount )/100]);
                                           @endphp

                                           <h4 class="grand-totall-title">Grand Total <span>$ {{ $totel_taka-($totel_taka*$discount_amount )/100 }}</span></h4>
                                           @if ($flag==1)
                                              <a class="text-danger">Please Soluve your Issue</a>
                                           @else
                                                @if ($totel_taka-($totel_taka*$discount_amount )/100 >='1')
                                                  <a href="{{ url('checkout/page') }}">Proceed to Checkout</a>
                                                @endif



                                           @endif
   {{-- <button id="rrrro">llllllllllll</button> --}}
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- cart area end -->



@endsection

@section('footer_script')

<script>
$(document).ready(function(){
   $('#aplly_cuopon_btn').click(function(){
         var aplly_cuopon_input= $('#aplly_cuopon_input').val();
         var go_to_livk="{{ url('all_card/product') }}/"+aplly_cuopon_input;
         window.location.href=go_to_livk;

   });
});
</script>


<script>
$(document).ready(function(){
   $('.cuopon_btns').click(function(){
      $('#aplly_cuopon_input').val($(this).val());
   });
});
</script>

<script>
$(document).ready(function(){
  $('#rrrro').click(function(){
    alert("The paragraph was clicked.");
  });
});
</script>
@endsection
