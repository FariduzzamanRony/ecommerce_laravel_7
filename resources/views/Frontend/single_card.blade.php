@extends('layouts.frontend_app')


@section('frontend_content')


            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Single Product datalis</h1>


                                <ul class="breadcrumb-links">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li>{{ $dsfgdfsgd=App\Category::find($single_product_card->relationship_with_category_table->category_id)->category_name}}/{{ $single_product_card->product_name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- Shop details Area start -->
            <section class="product-details-area mtb-60px">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="product-details-img product-details-tab">
                                <div class="zoompro-wrap zoompro-2">
                                    <div class="zoompro-border tttt zoompro-span">

                                        <img class="zoompro"  src="{{asset('frontend_asset/product_photo')}}/{{ $single_product_card->product_thumbnail_photo }}" data-zoom-image="{{asset('frontend_asset/product_photo')}}/{{ $single_product_card->product_thumbnail_photo }}" alt="" />
                                        <style>
                                          .tttt{
                                            width:300;
                                            margin-bottom: 30px;
                                            margin-left: 180px;
                                          }
                                        </style>
                                    </div>
                                </div>
                                <div id="gallery" class="product-dec-slider-2">
                                    <a class="active" data-image="{{asset('frontend_asset/product_photo')}}/{{ $single_product_card->product_thumbnail_photo }}" data-zoom-image="{{asset('frontend_asset/product_photo')}}/{{ $single_product_card->product_thumbnail_photo }}">
                                        <img src="{{asset('frontend_asset/product_photo')}}/{{ $single_product_card->product_thumbnail_photo }}" alt="" />
                                    </a>

                                    @forelse ($single_product_card->relationship_product_table_with_product_multipl_photo as $value)
                                       <a data-image="{{asset('frontend_asset/product_multifull_photo')}}/{{ $value->product_multiful_photo_name }}" data-zoom-image="{{asset('frontend_asset/product_multifull_photo')}}/{{ $value->product_multiful_photo_name }}">
                                           <img src="{{asset('frontend_asset/product_multifull_photo')}}/{{ $value->product_multiful_photo_name }}" alt="" />
                                       </a>
                                    @empty

                                    @endforelse


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="product-details-content">
                                <h2>{{ $single_product_card->product_title }}</h2>

                                <p class="reference">Name: <span> {{ $single_product_card->relationship_with_category_table->sub_category_name}}</span></p>
                                <p class="reference">Categorys: <span> {{ $dsfgdfsgd=App\Category::find($single_product_card->relationship_with_category_table->category_id)->category_name}}</span></p>


                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                      @for ($i=1; $i <=review_star_count($single_product_card->id); $i++)
                                        <i class="ion-android-star"></i>
                                      @endfor

                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">Read reviews ({{ review_customer_count($single_product_card->id)}})</a></span>
                                    @php
                                      session(['totle_review'=>review_customer_count($single_product_card->id)]);
                                      session(['product_id_not_taka_pay_session_value'=>$single_product_card->id]);
                                    @endphp
                                    {{-- <span class="read-review"><a class="reviews" href="#">{{ review_star_count($single_product_card->id)}}Read reviews ({{ review_customer_count($single_product_card->id)}})</a></span> --}}

                                </div>
                                <div class="pricing-meta">
                                    <ul>

                                   @if ($single_product_card->offer_price=="")
   <li class="old-price not-cut">  <strong>Price :</strong>${{ $single_product_card->product_price }}</li>
                                     @else

                                      <li class="old-price not-cut">  <strong>Price :</strong>${{ $single_product_card->product_price-($single_product_card->product_price*$single_product_card->offer_price )/100 }}</li>

                                   @endif


                                    </ul>
                                </div>




                                <form  action="{{ route(('card.store')) }}" method="post">
                                   @csrf
                                     <input  type="hidden" name="product_id" value="{{$single_product_card->id}}">


                                  <div class="pro-details-quality mt-0px">
                                      <div class="cart-plus-minus">
                                         <input class="cart-plus-minus-box" type="text" name="product_quantity" value="1" />
                                     </div>


                                     <div class="pro-details-cart btn-hover">
                                         <button type="submit" class="btna"> + Add To Cart</button>
                                     </div>
                                </div>
                            </form>





                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Shop details Area End -->
            <!-- product details description area start -->
            <div class="description-review-area mb-60px">
                <div class="container">
                    <div class="description-review-wrapper">
                        <div class="description-review-topbar nav">
                            <a data-toggle="tab" href="#des-details1">Description</a>
                            <a class="active" data-toggle="tab" href="#des-details2">Product Details</a>
                            <a data-toggle="tab" href="#des-details3">Reviews ({{ session('totle_review') }})</a>
                        </div>
                        <div class="tab-content description-review-bottom">
                            <div id="des-details2" class="tab-pane active">

                            </div>
                            <div id="des-details1" class="tab-pane">
                                <div class="product-description-wrapper">
                                    <p>{{ $single_product_card->product_long_description }}</p>

                                </div>
                            </div>





                            <div id="des-details3" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="review-wrapper">

                                      {{-- Product Reviews reply  start--}}
                                      @forelse ($all_review as  $reviewss)
                                        <div class="single-review">
                                            <div class="review-img">
                                                  <img class="imgg-revews" src="{{  asset('profile_photos') }}/{{App\User::find($reviewss->user_id)->profile_photo}}" width="100"alt="" />
                                            </div>
                                            <div class="review-content">
                                                <div class="review-top-wrap">
                                                    <div class="review-left">
                                                        <div class="review-name">
                                                            <h4>{{App\User::find($reviewss->user_id)->name }}</h4>
                                                            {{-- <h4>{{$reviewss->user_id }}{{App\User::find($reviewss->user_id)->name }}</h4> --}}
                                                        </div>
                                                        <div class="rating-product">
                                                          @for ($i=1; $i <= $reviewss->star; $i++)
                                                            <i class="ion-android-star"></i>
                                                          @endfor

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="review-bottom">
                                                    <p>
                                                        {{ $reviewss->updated_at->format('Y-m-d') }}.
                                                    </p>
                                                </div>
                                                <div class="review-bottom">
                                                    <p>
                                                        {{ $reviewss->review }}.
                                                    </p>
                                                </div>

                                                @auth


                                                @if (App\User::find(Auth::id())->role==1 )
                                                    @if (App\Ordel_detail::find($reviewss->id)->Admin_reply=='')
                                                  <div class="review-left">

                                                      <a href="#">Reply</a>

                                                  </div>

                                                  <form action="{{ url('Admin_reply/post') }}" method="post">
                                                    @csrf
                                                    <div class="review-left">
                                                        <input type="hidden" name="reviewss_id" value="{{ $reviewss->id }}">

                                                            <textarea name="Admin_reply" placeholder="Message" height="10"></textarea>

                                                            <button type="submit" style="background-color:#4fb68d;color:#fff;">Submit<buttom/>

                                                    </div>


                                              </form>
                                                 @endif
                                                @endif
                                                  @endauth
                                            </div>
                                        </div>

{{-- Product Reviews reply  start--}}

                        {{-- Reviews reply  start--}}

                                 <div class="single-review child-review">
                                                <div class="review-img">
                                                  @if (App\Ordel_detail::find($reviewss->id)->Admin_reply=='')

                                                     @else
                                                       <img src="{{  asset('profile_photos') }}/{{App\User::find(2)->profile_photo}}" alt="" width="80"/>
                                                  @endif

                                                </div>

                                                <div class="review-content">
                                                  <div class="review-name">
                                                    @if (App\Ordel_detail::find($reviewss->id)->Admin_reply=='')

                                                       @else
                                                           <h4>Admin</h4>
                                                    @endif

                                                  </div>
                                                    <div class="review-bottom">
                                                        <p>{{ App\Ordel_detail::find($reviewss->id)->Admin_reply}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                          @empty

                                          @endforelse


                       {{-- Reviews reply  End--}}




                                        </div>
                                    </div>


                                    {{--User Reviews Point  --}}

                                    @auth
                                      @if ($product_kinche_tar_status==1)
                                        @if ($totle_review_active==2)






                                        <div class="col-lg-5">
                                            <div class="ratting-form-wrapper pl-50">

                                                  {{-- @if (App\Ordel_detail::find($Ordel_detail_id)->payment_method==1) --}}
                                                <h3>Add a Review  </h3>



                                                <div class="ratting-form">
                                                  <form action="{{ url('review/post') }}" method="post">
                                                    @csrf

                                                    {{-- <h3>Ordel_details er id</h3> --}}
                                                    <input type="hidden" name="Ordel_detail_id" value="{{ $Ordel_detail_id }}">
                                                  <div class="star-box">
                                                      <span>Your rating:</span>


                                                  </div>
                                                      <table class="table table-bordered " >
                                                         <thead>
                                                             <tr class="text-center">
                                                                <th>TASK</th>
                                                                <th>1 Star</th>
                                                                <th>2 Star</th>
                                                                <th>3 Star</th>
                                                                <th>4 Star</th>
                                                                <th>5 Star</th>
                                                             </tr>
                                                         </thead>
                                                          <tbody>
                                                              <tr>

                                                                   <td> How Many Stars?</td>
                                                                   @error ('star')
                                                                     <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                     </div>

                                                                   @enderror
                                                                  <td> <input class="form-check-input" type="radio" name="star" id="inlineRadio1" value="1"></td>
                                                                  <td> <input class="form-check-input" type="radio" name="star" id="inlineRadio1" value="2"></td>
                                                                  <td> <input class="form-check-input" type="radio" name="star" id="inlineRadio1" value="3"></td>
                                                                  <td> <input class="form-check-input" type="radio" name="star" id="inlineRadio1" value="4"></td>
                                                                  <td> <input class="form-check-input" type="radio" name="star" id="inlineRadio1" value="5"></td>
                                                            </tr>


                                                         </tbody>
                                                         </table>


                                                  <div class="row">
                                                      <div class="col-md-12">

                                                          <div class="rating-form-style form-submit">

                                                            @error ('review')
                                                              <div class="alert alert-danger">
                                                                 {{ $message }}
                                                              </div>

                                                            @enderror
                                                              <textarea name="review" placeholder="Message">{{ old('review') }}</textarea>

                                                          </div>
                                                      </div>
                                                  </div>
                                                    <button type="submit" style="background-color:#4fb68d;color:#fff;">Submit<buttom/>
                                              </form>
                                                </div>
                                                    {{-- @endif --}}
                                            </div>
                                        </div>
                                          @endif
                                        @endif



                                    @endauth
                                    @guest
                                      <div class="ratting-form-wrapper pl-50">
                                          <h3>Please login</h3>
                                          <a href="{{ url('login') }}">Click Hear to login</a>
                                            </div>
                                    @endguest

                                      {{--User Reviews Point End  --}}
                                </div>
                            </div>







                        </div>
                    </div>
                </div>
            </div>
            <!-- product details description area end -->
            <!-- Recent Add Product Area Start -->
            <section class="recent-add-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>You Might Also Like</h2>
                                <p>Add Related products to weekly line up</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Recent Product slider Start -->
                    <div class="recent-product-slider owl-carousel owl-nav-style">
                        <!-- Single Item -->
                        @forelse ($product_releted_product as $product_releted_product_value)
                           <article class="list-product">
                              <div class="img-block">
                                  <a href="{{ url('Frontend/single_card') }}/{{ $product_releted_product_value->slug }}" class="thumbnail">
                                      <img class="first-img" src="{{asset('frontend_asset/product_photo')}}/{{ $product_releted_product_value->product_thumbnail_photo }}" alt="" />
                                      <img class="second-img" src="assets/images/product-image/organic/product-12.jpg" alt="" />
                                  </a>
                                  <div class="quick-view">
                                      <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                          <i class="ion-ios-search-strong"></i>
                                      </a>
                                  </div>
                              </div>
                              <ul class="product-flag">
                                  <li class="new">New</li>
                              </ul>
                              <div class="product-decs">
                                  <a class="inner-link" href="{{ url('Frontend/single_card') }}/{{ $product_releted_product_value->slug }}"><span>{{ $product_releted_product_value->relationship_with_category_table->category_name }}</span></a>
                                  <h2><a href="{{ url('Frontend/single_card') }}/{{ $product_releted_product_value->slug }}" class="product-link">{{ $product_releted_product_value->product_name }}</a></h2>
                                  <h2><a href="{{ url('Frontend/single_card') }}/{{ $product_releted_product_value->slug }}" class="product-link">{{ $product_releted_product_value->product_title }}</a></h2>
                                  <div class="rating-product">
                                    @for ($i=1; $i <=review_star_count($product_releted_product_value->id); $i++)
                                      <i class="ion-android-star"></i>
                                    @endfor
                                    @if (review_star_count($product_releted_product_value->id)==0)
                                      No Review Yet
                                    @endif
                                  </div>
                                  <div class="pricing-meta">
                                      <ul>
                                        @if ($product_releted_product_value->offer_price=="")
                                          <li class="old-price not-cut">${{ $product_releted_product_value->product_price }}</li>
                                          @else
                                               <li class="old-price">${{ $product_releted_product_value->product_price }}</li>
                                            <li class="discount-price">- {{ $product_releted_product_value->offer_price }}%</li>
                                            <li class="current-price">${{ $product_releted_product_value->product_price-($product_releted_product_value->product_price/100)*$product_releted_product_value->offer_price }}</li>

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

                        @endforelse


                    </div>
                    <!-- Recent product slider end -->
                </div>
            </section>
            <!-- Recent product area end -->
            <!-- Recent Add Product Area Start -->
            <section class="recent-add-area mt-30 mb-30px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>In The Same Category</h2>
                                <p>16 other products in the same category:</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Recent Product slider Start -->
                    <div class="recent-product-slider owl-carousel owl-nav-style">
                        <!-- Single Item -->
                        @forelse ($same_category as  $same_category_value)
                          <article class="list-product">
                              <div class="img-block">
                                  <a href="{{ url('Frontend/single_card') }}/{{ $same_category_value->slug }}" class="thumbnail">

                                      <img class="first-img" src="{{asset('frontend_asset/product_photo')}}/{{ $same_category_value->product_thumbnail_photo }}" alt="" />
                                      <img class="second-img" src="{{asset('frontend_asset/product_photo')}}/{{ $same_category_value->product_thumbnail_photo }}" alt="" />

                                  </a>
                                  <div class="quick-view">

                                  </div>
                              </div>
                              <ul class="product-flag">
                                  <li class="new">New</li>
                              </ul>
                              <div class="product-decs">
                                  <a class="inner-link" href="shop-4-column.html"><span>{{ $same_category_value->product_title }}</span></a>
                                  <h2><a href="{{ url('Frontend/single_card') }}/{{ $same_category_value->slug }}" class="product-link">{{ $same_category_value->product_name }}</a></h2>
                                  <div class="rating-product">
                                    @for ($i=1; $i <=review_star_count($same_category_value->id); $i++)
                                      <i class="ion-android-star"></i>
                                    @endfor
                                    @if (review_star_count($same_category_value->id)==0)
                                      No Review Yet
                                    @endif
                                  </div>
                                  <div class="pricing-meta">

                                      <ul>
                                        @if ($same_category_value->offer_price=="")
                                          <li class="old-price not-cut">${{ $same_category_value->product_price }}</li>
                                          @else
                                               <li class="old-price">${{ $same_category_value->product_price }}</li>
                                            <li class="discount-price">- {{ $same_category_value->offer_price }}%</li>
                                            <li class="current-price">${{ $same_category_value->product_price-($same_category_value->product_price/100)*$same_category_value->offer_price }}</li>

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

                        @endforelse

                        <!-- Single Item -->

                        <!-- Single Item -->
                    </div>
                    <!-- Recent product slider end -->
                </div>
            </section>


@endsection
