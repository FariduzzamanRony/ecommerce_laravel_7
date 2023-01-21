@extends('layouts.frontend_app')


@section('frontend_content')

  <!-- Breadcrumb Area start -->
       <section class="breadcrumb-area">
          <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="breadcrumb-content">
                          <h1 class="breadcrumb-hrading">Serch Product</h1>
                          <ul class="breadcrumb-links">
                               <li><a href="{{ url('/') }}">Home</a></li>

                          </ul>
                       </div>
                   </div>
               </div>
          </div>
       </section>

       <section class="recent-add-area mt-30 mb-30px">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <!-- Section Title -->
                       <div class="section-title">
                         <h2>Find Your Product</h2>
                           <p>Products</p>

                       </div>
                       <!-- Section Title -->
                   </div>
               </div>
               <!-- Recent Product slider Start -->
               <div class="recent-product-slider owl-carousel owl-nav-style">
                   <!-- Single Item -->
                   @forelse ($products as  $active_Product_value)
                     <article class="list-product">
                         <div class="img-block">
                             <a href="{{ url('Frontend/single_card') }}/{{ $active_Product_value->slug }}" class="thumbnail">

                                 <img class="first-img" src="{{asset('frontend_asset/product_photo')}}/{{ $active_Product_value->product_thumbnail_photo }}" alt="" />
                                 <img class="second-img" src="{{asset('frontend_asset/product_photo')}}/{{ $active_Product_value->product_thumbnail_photo }}" alt="" />

                             </a>
                             <div class="quick-view">

                             </div>
                         </div>
                         <ul class="product-flag">
                             <li class="new">New</li>
                         </ul>
                         <div class="product-decs">
                             <a class="inner-link" href="shop-4-column.html"><span>{{ $active_Product_value->product_title }}</span></a>
                             <h2><a href="{{ url('Frontend/single_card') }}/{{ $active_Product_value->slug }}" class="product-link">{{ $active_Product_value->product_name }}</a></h2>
                             <div class="rating-product">
                               @for ($i=1; $i <=review_star_count($active_Product_value->id); $i++)
                                 <i class="ion-android-star"></i>
                               @endfor
                               @if (review_star_count($active_Product_value->id)==0)
                                 No Review Yet
                               @endif
                             </div>
                             <div class="pricing-meta">

                                 <ul>
                                   @if ($active_Product_value->offer_price=="")
                                     <li class="old-price not-cut">${{ $active_Product_value->product_price }}</li>
                                     @else
                                          <li class="old-price">${{ $active_Product_value->product_price }}</li>
                                       <li class="discount-price">- {{ $active_Product_value->offer_price }}%</li>
                                       <li class="current-price">${{ $active_Product_value->product_price-($active_Product_value->product_price/100)*$active_Product_value->offer_price }}</li>

                                   @endif
                                 </ul>
                             </div>
                         </div>
                         <div class="add-to-link">
                             <ul>

                                 <li>
                                     <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                 </li>

                             </ul>
                         </div>
                     </article>
                   @empty


                     <ul>
                           <li colspan="500" class="text-center text-danger">No Data Availavel</li>
                     </ul>
                   @endforelse

                   <!-- Single Item -->

                   <!-- Single Item -->
               </div>
               <!-- Recent product slider end -->
           </div>
       </section>



@endsection
