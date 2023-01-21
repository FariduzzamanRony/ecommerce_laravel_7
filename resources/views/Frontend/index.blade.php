
 @extends('layouts.frontend_app')



 @section('frontend_content')


            <!-- Header End -->
            <!-- Slider Arae Start -->
            <div class="slider-area">
                <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
                    <!-- Slider Single Item Start -->
                    <div class="slider-height-6 d-flex align-items-start justify-content-start bg-img" style="background-image: url({{ asset('frontend_asset') }}/assets/images/slider-image/sample-1.jpg);">
                        <div class="container">
                            <div class="slider-content-1 slider-animated-1 text-left">
                                <span class="animated">NOT FRIED NOT BAKED</span>
                                <h1 class="animated">
                                    Freeze Dried Fruits <br />
                                    Pineapple Coconut
                                </h1>
                                <p class="animated">Free Shipping On Qualified Orders Over $35</p>
                                <a href="{{ url('category/all_product') }}" class="shop-btn animated">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item End -->
                    <!-- Slider Single Item Start -->
                    <div class="slider-height-6 d-flex align-items-start justify-content-start bg-img" style="background-image: url({{ asset('frontend_asset') }}/assets/images/slider-image/sample-2.jpg);">
                        <div class="container">
                            <div class="slider-content-1 slider-animated-1 text-left">
                                <span class="animated">100% NATURAL</span>
                                <h1 class="animated">
                                    Organic Fruits <br />
                                    Summer Drinks
                                </h1>
                                <p class="animated">fresh New pack Brusting Fruits</p>
                                <a href="{{ url('category/all_product') }}" class="shop-btn animated">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item End -->
                </div>
            </div>
            <!-- Slider Arae End -->
            <!-- Static Area Start -->
            <section class="static-area mtb-60px">
                <div class="container">
                    <div class="static-area-wrap">
                        <div class="row">
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0">
                                    <img src="{{ asset('frontend_asset') }}/assets/images/icons/static-icons-1.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Free Shipping</h4>
                                        <p>On all orders over $75.00</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0 pt-res-xs-20">
                                    <img src="{{ asset('frontend_asset') }}/assets/images/icons/static-icons-2.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Free Returns</h4>
                                        <p>Returns are free within 9 days</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pt-res-md-30 pb-res-sm-30 pb-res-xs-0 pt-res-xs-20">
                                    <img src="{{ asset('frontend_asset') }}/assets/images/icons/static-icons-3.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>100% Payment Secure</h4>
                                        <p>Your payment are safe with us.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pt-res-md-30 pb-res-sm-30 pt-res-xs-20">
                                    <img src="{{ asset('frontend_asset') }}/assets/images/icons/static-icons-4.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Support 24/7</h4>
                                        <p>Contact us 24 hours a day</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Static Area End -->
            <!-- Best Sells Area Start -->
            <section class="best-sells-area mb-30px">
                <div class="container">
                    <!-- Section Title Start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>Best Sellers</h2>
                                <p>Add bestselling products to weekly line up</p>
                            </div>
                        </div>
                    </div>
                    <!-- Section Title End -->
                    <!-- Best Sell Slider Carousel Start -->
                    <div class="best-sell-slider owl-carousel owl-nav-style">
                        <!-- Single Item -->
                        @forelse ($topProducts as $key => $best_seller)

                          <article class="list-product">
                              <div class="img-block">
                                  <a href="{{ url('Frontend/single_card') }}/{{ $best_seller->slug }}" class="thumbnail">
                                      <img class="first-img" src="{{ asset('frontend_asset/product_photo') }}/{{ $best_seller->product_thumbnail_photo }}" alt=""/>
                                      <img class="second-img" src="{{ asset('frontend_asset/product_photo') }}/{{ $best_seller->product_thumbnail_photo }}" alt="" />

                                  <div class="quick-view">

                                  </div>
                              </div>
                              <ul class="product-flag">
                                  <li class="new">New</li>
                              </ul>
                              <div class="product-decs">
                                  <a class="inner-link" href="shop-4-column.html"><span>{{ $best_seller->product_name }}</span></a>
                                  <h2><a href="{{ url('Frontend/single_card') }}/{{ $best_seller->slug }}" class="product-link">{{ $best_seller->product_title }}</a></h2>
                               <div class="rating-product">
                                  @for ($i=1; $i <=review_star_count($best_seller->id); $i++)
                                    <i class="ion-android-star"></i>
                                  @endfor
                                  @if (review_star_count($best_seller->id)==0)
                                    No Review Yet
                                  @endif
                                </div>
                                  <div class="pricing-meta">
                                      <ul>
                                        @if ($best_seller->offer_price=="")
                                          <li class="old-price not-cut">${{ $best_seller->product_price }}</li>
                                          @else
                                               <li class="old-price">${{ $best_seller->product_price }}</li>
                                            <li class="discount-price">- {{ $best_seller->offer_price }}%</li>
                                            <li class="current-price">${{ $best_seller->product_price-($best_seller->product_price/100)*$best_seller->offer_price }}</li>

                                        @endif
                                      </ul>
                                  </div>
                              </div>
                              <div class="add-to-link">
                                  <ul>

                                      <li>
                                          <a><i class="ion-android-favorite-outline"></i></a>
                                      </li>

                                  </ul>
                              </div>
                          </article>
                        @empty

                        @endforelse

                        <!-- Single Item -->

                        <!-- Single Item -->
                    </div>
                    <!-- Best Sells Carousel End -->
                </div>
            </section>
            <!-- Best Sells Slider End -->

            <!-- Category Area Start -->
            <section class="categorie-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title mt-res-sx-30px mt-res-md-30px">
                                <h2>All Categories </h2>
                                <p>Add Popular Categories to weekly line up</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Category Slider Start -->
               {{-- @include("Frontend.includes.category_slider") --}}
               <div class="category-slider owl-carousel owl-nav-style">
                   <!-- Single item -->
                   @forelse ($active_categorys as  $active_categorys_value)

                     <div class="category-item">
                         <div class="category-list mb-30px">
                              <div class="category-thumb">
                                  <a href="{{ url('shop_categorys') }}/{{ $active_categorys_value->id  }}">
                                      <img src="{{ asset('uplodes/category_photo') }}/{{ $active_categorys_value->category_photo }}" alt="" width="50">
                                  </a>
                              </div>
                              <div class="desc-listcategoreis">
                                  <div class="name_categories">
                                      <h4>{{ $active_categorys_value->category_name }}</h4>
                                  </div>
                                  {{-- <span class="number_product">{{ App\Sub_category::category_product_count($active_categorys_value->id) }}</span> --}}

                                  <span style="color:#111;">{{ category_product($active_categorys_value->id) }}</span>

                                  <a href="{{ url('shop_categorys') }}/{{ $active_categorys_value->id  }}"> Shop Now<i class="ion-android-arrow-dropright-circle"></i></a>
                              </div>
                         </div>
                     </div>

                   @empty

                   @endforelse


               </div>

                        <!-- Single item -->
                    </div>
                </div>
            </section>
            <!-- Category Area End  -->
            <!-- Hot deal area Start -->
            <section class="hot-deal-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Section Title -->
                                    <div class="section-title">
                                        <h2>Hot Deals</h2>
                                        <p>Add hot products to weekly line up</p>
                                    </div>
                                    <!-- Section Title End-->
                                </div>
                            </div>
                            <!-- Hot Deal Slider Start -->
                            <div class="hot-deal owl-carousel owl-nav-style">
                                <!--  Single item -->
                                @forelse ($offerProducts as  $value)

                                  @if (Carbon\Carbon::now()->format('Y-m-d') > $value->validity_date)
                                    @else

                                  <article class="list-product">
                                      <div class="img-block">
                                          <a href="{{ url('Frontend/single_card') }}/{{ $value->slug}}" class="thumbnail">
                                              <img class="first-img" src="{{ asset('frontend_asset/product_photo') }}/{{ $value->offer_realsion_product_date->product_thumbnail_photo }}" alt=""/>
                                              <img class="second-img"  src="{{ asset('frontend_asset/product_photo') }}/{{ $value->offer_realsion_product_date->product_thumbnail_photo }}" alt=""/>

                                          </a>
                                          <div class="quick-view">

                                          </div>
                                      </div>
                                      <ul class="product-flag">
                                          <li class="new">New{{ $value->id }}</li>
                                      </ul>

                                      <div class="product-decs">
                                          <a class="inner-link" href="{{ url('Frontend/single_card') }}/{{ $value->slug}}"><span>{{ $value->offer_realsion_product_date->relationship_with_category_table->sub_category_name  }}</span></a>
                                          <h2><a href="{{ url('Frontend/single_card') }}/{{ $value->slug}}" class="product-link">{{ $value->offer_realsion_product_date->product_name }}</a></h2>
                                          <div class="rating-product">
                                            @for ($i=1; $i <=review_star_count($value->offer_realsion_product_date->id); $i++)
                                              <i class="ion-android-star"></i>
                                            @endfor
                                            @if (review_star_count($value->offer_realsion_product_date->id)==0)
                                              No Review Yet
                                            @endif
                                          </div>
                                          <div class="pricing-meta">
                                              <ul>
                                                  <li class="old-price">$ {{ $value->offer_realsion_product_date->product_price }}</li>
                                                  <li class="current-price">${{ $value->offer_realsion_product_date->product_price-($value->offer_realsion_product_date->product_price/100)*$value->disscount }}</li>
                                                  <li class="discount-price">-{{ $value->disscount }}%</li>
                                              </ul>
                                          </div>
                                           <div class="add-to-link">
                                              <ul>

                                                  <li>
                                                      <a ><i class="ion-android-favorite-outline"></i></a>
                                                  </li>

                                              </ul>
                                          </div>
                                      </div>
                                      <div class="in-stock">Availability: <span>{{ $value->offer_realsion_product_date->product_quantity }} In Stock</span></div>

                                      <div class="clockdiv">
                                          <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                          <div data-countdown="{{ $value->validity_date}}"></div>
                                      </div>
                                  </article>
                                  @endif
                                @empty

                                @endforelse


                                <!--  Single item -->
                            </div>
                            <!-- Hot Deal Slider End -->
                        </div>
                        <!-- New Arrivals Area Start -->
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Section Title -->
                                    <div class="section-title ml-0px mt-res-sx-30px">
                                        <h2>New Arrivals</h2>
                                        <p>Add new products to weekly line up</p>
                                    </div>
                                    <!-- Section Title -->
                                </div>
                            </div>
                            <!-- New Product Slider Start -->
                            <div class="new-product-slider owl-carousel owl-nav-style">
                                <!-- Product Single Item -->
@forelse ($Sub_category_Product as $Sub_category_Product_value)

   <?php
   $sub_category_product_count=App\Product::sub_category_product_count($Sub_category_Product_value->id);
   ?>
   <div class="product-inner-item">
       <article class="list-product mb-30px">
           <div class="img-block">
               <a href="{{ url('all_product') }}/{{ $Sub_category_Product_value->id }}" class="thumbnail">
                   <img class="first-img" src=" {{ asset('uplodes/sub_category_photo') }}/{{ $Sub_category_Product_value->sub_category_photo }}" alt="" />
               </a>
           </div>
           <ul class="product-flag">
               <li class="new">New</li>
           </ul>
           <div class="product-decs">
               <a class="inner-link"><span>{{ $Sub_category_Product_value->sub_category_name }}N</span></a>
               <h2><a class="product-link">Totle product({{ $sub_category_product_count }})</a></h2>


           </div>

       </article>

  </div>

@empty

@endforelse


                            </div>
                            <!-- Product Slider End -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Hot Deal Area End -->
            <!-- Banner Area Start -->
            <div class="banner-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="banner-wrapper">
                                <a href=""><img src="{{asset('frontend_asset')}}/assets/images/banner-image/1.jpg" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 mt-res-sx-30px">
                            <div class="banner-wrapper">
                                <a href=""><img src="{{asset('frontend_asset')}}/assets/images/banner-image/2.jpg" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 mt-res-sx-30px">
                            <div class="banner-wrapper">
                                <a href=""><img src="{{asset('frontend_asset')}}/assets/images/banner-image/3.jpg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Area End -->
            <!-- Feature Area Start -->
            <section class="feature-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>Featured Products</h2>
                                <p>Add products to weekly line up</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Feature Slider Start -->
                    <div class="feature-slider owl-carousel owl-nav-style">
                     @forelse ($active_Product as $active_Product_value)
                        <div class="feature-slider-item">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="{{ url('Frontend/single_card') }}/{{ $active_Product_value->slug }}" class="thumbnail">
                                        <img class="first-img" src="{{asset('frontend_asset/product_photo')}}/{{ $active_Product_value->product_thumbnail_photo }}" alt=""/>
                                        <img class="second-img" src="{{asset('frontend_asset/product_photo')}}/{{ $active_Product_value->product_thumbnail_photo }}" alt=""/>

                                    </a>
                                     <div class="quick-view">

                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="{{ url('Frontend/single_card') }}/{{ $active_Product_value->slug }}"><span>{{ $active_Product_value->product_name }}</span></a>
                                    <h2><a href="{{ url('Frontend/single_card') }}/{{ $active_Product_value->slug }}" class="product-link">{{ $active_Product_value->product_title }}</a></h2>
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
                                    <div class="add-to-link">
                                        <ul>

                                            <li>
                                                <a><i  class="btn ion-android-favorite-outline"></i></a>

                                            </li>

                                        </ul>
                                    </div>

                                </div>
                            </article>

                        </div>
                     @empty

                     @endforelse




                    </div>
                    <!-- Feature Slider End -->
                </div>
            </section>



            <!-- Feature Area End -->
            <!-- Banner Area 2 Start -->
            <div class="banner-area-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner-inner">
                                <a><img src="{{asset('frontend_asset')}}/assets/images/banner-image/4.jpg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Area 2 End -->
            <!-- Recent Add Product Area Start -->

            <section class="recent-add-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>Recently Added</h2>
                                <p>Add products to weekly line up</p>
                            </div>

                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Recent Product slider Start -->
                    <div class="recent-product-slider owl-carousel owl-nav-style">
                        <!-- Single Item -->
                        @forelse ($active_Product as  $recently_value)
                          @if ($recently_value->created_at->addDays(5) > Carbon\Carbon::now())
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="{{ url('Frontend/single_card') }}/{{ $recently_value->slug }}" class="thumbnail">
                                        <img class="first-img" src="{{asset('frontend_asset/product_photo')}}/{{ $recently_value->product_thumbnail_photo }}" alt="" />
                                        <img class="second-img" src="{{asset('frontend_asset/product_photo')}}/{{ $recently_value->product_thumbnail_photo }}" alt="" />
                                    </a>

                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs">
                                    <a class="inner-link" href="{{ url('Frontend/single_card') }}/{{ $recently_value->slug }}"><span>{{ $recently_value->product_title }}</span></a>
                                    <h2><a href="{{ url('Frontend/single_card') }}/{{ $recently_value->slug }}" class="product-link">{{ $recently_value->product_name }}</a></h2>
                                    <div class="rating-product">
                                      @for ($i=1; $i <=review_star_count($recently_value->id); $i++)
                                        <i class="ion-android-star"></i>
                                      @endfor
                                      @if (review_star_count($recently_value->id)==0)
                                        No Review Yet
                                      @endif
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                          @if ($recently_value->offer_price=="")
                                            <li class="old-price not-cut">${{ $recently_value->product_price }}</li>
                                            @else
                                                 <li class="old-price">${{ $recently_value->product_price }}</li>
                                              <li class="discount-price">- {{ $recently_value->offer_price }}%</li>
                                              <li class="current-price">${{ $recently_value->product_price-($recently_value->product_price/100)*$recently_value->offer_price }}</li>

                                          @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link">
                                    <ul>

                                        <li>

                                            <a><i class="btnss ion-android-favorite-outline"></i></a>

                                        </li>

                                    </ul>
                                </div>
                            </article>
                          @endif

                        @empty

                        @endforelse

                        <!-- Single Item -->

                        <!-- Single Item -->
                    </div>
                    <!-- Recent product slider end -->
                </div>
            </section>
            <!-- Recent product area end -->
            <!-- Brand area start -->
            <div class="brand-area">
                <div class="container">
                    <div class="brand-slider owl-carousel owl-nav-style owl-nav-style-2">
                        <div class="brand-slider-item">
                            <a href="#"><img src="{{asset('frontend_asset')}}/assets/images/brand-logo/1.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="{{asset('frontend_asset')}}/assets/images/brand-logo/2.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="{{asset('frontend_asset')}}/assets/images/brand-logo/3.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="{{asset('frontend_asset')}}/assets/images/brand-logo/4.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="{{asset('frontend_asset')}}/assets/images/brand-logo/5.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="{{asset('frontend_asset')}}/assets/images/brand-logo/1.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="{{asset('frontend_asset')}}/assets/images/brand-logo/2.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Brand area end -->
            <!-- Footer Area start -->



@endsection
 @section('footer_script')
   <script>
   $(document).ready(function(){


   });

   </script>
@endsection
