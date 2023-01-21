@extends('layouts.frontend_app')


@section('frontend_content')

            <!-- Header End -->
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Category Product</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <section class="recent-add-area mt-30 mb-30px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>Category Shop</h2>

                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Recent Product slider Start -->
                    <div class="recent-product-slider owl-carousel owl-nav-style">
                        <!-- Single Item -->
                        @forelse ($all_cat_shop as  $shop_value)
                          <article class="list-product">
                              <div class="img-block">
                                  <a href="{{ url('Frontend/single_card') }}/{{ $shop_value->slug }}" class="thumbnail">

                                      <img class="first-img" src="{{asset('frontend_asset/product_photo')}}/{{ $shop_value->product_thumbnail_photo }}" alt="" />
                                      <img class="second-img" src="{{asset('frontend_asset/product_photo')}}/{{ $shop_value->product_thumbnail_photo }}" alt="" />

                                  </a>
                                  <div class="quick-view">

                                  </div>
                              </div>
                              <ul class="product-flag">
                                  <li class="new">New</li>
                              </ul>
                              <div class="product-decs">
                                  <a class="inner-link" href="shop-4-column.html"><span>{{ $shop_value->product_title }}</span></a>
                                  <h2><a href="{{ url('Frontend/single_card') }}/{{ $shop_value->slug }}" class="product-link">{{ $shop_value->product_name }}</a></h2>
                                  <div class="rating-product">
                                    @for ($i=1; $i <=review_star_count($shop_value->id); $i++)
                                      <i class="ion-android-star"></i>
                                    @endfor
                                    @if (review_star_count($shop_value->id)==0)
                                      No Review Yet
                                    @endif
                                  </div>
                                  <div class="pricing-meta">
                                      <ul>

                                          <li class="current-price">${{$shop_value->product_price  }}</li>

                                      </ul>
                                  </div>
                              </div>
                              <div class="add-to-link">
                                  <ul>

                                      <li>
                                          <a ><i class="ion-android-favorite-outline"></i></a>
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
