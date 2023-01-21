<html lang="en">

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jul 2020 04:12:26 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Ecolife - Multipurpose eCommerce HTML Template</title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_asset') }}/assets/images/favicon/favicon.png" />

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&amp;display=swap" rel="stylesheet" />

        <!-- All CSS Flies   -->
        <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->
        <!-- <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/plugins/ionicons.min.css" /> -->
        <!--===== Plugins CSS (All Plugins Files) =====-->
        <!-- <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/plugins/meanmenu.css" />
        <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />
        <link rel="stylesheet" href="assets/css/plugins/owl-carousel.css" />
        <link rel="stylesheet" href="assets/css/plugins/slick.css" /> -->
        <!--===== Main Css Files =====-->
        <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
        <!-- ===== Responsive Css Files ===== -->
        <!-- <link rel="stylesheet" href="assets/css/responsive.css" /> -->

        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

        <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/vendor/plugins.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/style.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/responsive.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
        .count-cart:after {
            position: absolute;
            top: 9px;
            left: -26px;
            right: auto;
            width: 18px;
            height: 18px;
            content: "{{ totel_Card_product_count() }}";
            background: #4fb68d;
            color: #fff;
            line-height: 18px;
            text-align: center;
            border-radius: 50%;
            float: right
        }
        </style>
    </head>

    <body>
        <!-- main layout start from here -->
        <!--====== PRELOADER PART START ======-->

        <!-- <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div> -->

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Start -->
            <header class="main-header">
                <!-- Header Top Start -->
                <div class="header-top-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!--Left Start-->
                            <div class="col-lg-4 col-md-4">
                                <div class="left-text">
                                    <p>Welcome you to Ecolife store!</p>
                                </div>
                            </div>
                            <!--Left End-->
                            <!--Right Start-->
                            <div class="col-lg-8 col-md-8 text-right">
                                <div class="header-right-nav">
                                    <ul class="res-xs-flex">
                                        {{-- <li class="after-n">
                                            <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Compare (0)</a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Wishlist (0)</a>
                                        </li> --}}
                                    </ul>
                                    <div class="dropdown-navs">
                                        <ul>
                                            <!-- Settings Start -->
                                            <li class="dropdown xs-after-n">
                                              @auth
                                                <a class="angle-icon" href="#">{{ Auth::user()->name }}</a>
                                              @endauth
                                              @guest
                                                  <a class="angle-icon" href="#">My Account</a>
                                              @endguest
                                                <ul class="dropdown-nav">
                                                    <li><a href="{{ url('login_Register') }}"> Login/Register</a></li>
                                                </ul>
                                            </li>
                                            <!-- Settings End -->
                                            <!-- Currency Start -->
                                            {{-- <li class="top-10px first-child">
                                                <select>
                                                    <option value="1">USD $</option>
                                                    <option value="2">EUR €</option>
                                                </select>
                                            </li> --}}
                                            <!-- Currency End -->
                                            <!-- Language Start -->
                                            {{-- <li class="top-10px mr-15px">
                                                <select>
                                                    <option value="1">English</option>
                                                    <option value="2">France</option>
                                                </select>
                                            </li> --}}
                                            <!-- Language End -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Right End-->
                        </div>
                    </div>
                </div>
                <!-- Header Top End -->
                <!-- Header Buttom Start -->
                <div class="header-navigation sticky-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Logo Start -->
                            <div class="col-md-2 col-sm-2">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/images/logo/logo.jpg" alt="" /></a>
                                </div>
                            </div>
                            <!-- Logo End -->
                            <!-- Navigation Start -->
                            <div class="col-md-10 col-sm-10">
                                <!--Main Navigation Start -->
                                <div class="main-navigation d-none d-lg-block">
                                    <ul>
                                        <li class="menu-dropdown">
                                            <a href="{{ url('/') }}">Home</a>
                                            {{--  <a href="#">Home <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="sub-menu">

                                                <li class="menu-dropdown position-static">
                                                    <a href="#">Home Medical <i class="ion-ios-arrow-down"></i></a>
                                                    <ul class="sub-menu sub-menu-2">
                                                        <li><a href="index-17.html">Medical 1</a></li>
                                                        <li><a href="index-18.html">Medical 2</a></li>
                                                        <li><a href="index-19.html">Medical 3</a></li>
                                                        <li><a href="index-20.html">Medical 4</a></li>
                                                    </ul>
                                                </li>
                                            </ul> --}}
                                        </li>
                                        <li class="menu-dropdown">
                                            <a href="#">Shop( {{ totel_Sub_category_count() }} ) <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="sub-menu">
                                              <li><a href=" {!! route('category/all_product') !!} ">Category</a></li>
                                              @php
                                                $active_categor=App\Category::all();
                                              @endphp
                                               @foreach($active_categor as $category)


                                                       <li class="menu-dropdown position-static">
                                                           {{-- <a href="{{ url('all_product') }}/{{ $category->id }}">{{ $category->category_name }} <i class="ion-ios-arrow-down"></i></a> --}}

                                                           <a>{{ $category->category_name }} <i class="ion-ios-arrow-down"></i></a>


                                                             <ul class="sub-menu sub-menu-2">
                                                                @foreach ($category->totle_sub_category as $key => $value)
                                                                  <li class="menu-dropdown position-static">
                                                                    <a href="{{url('menu_product')}}/{{ $value->id }}">{{ $value->sub_category_name }} <i class="ion-ios-arrow-down"></i></a>
                                                              {{-- <ul class="sub-menu sub-menu-2">
                                                                @foreach ($value->totle_sub_product as $key => $productss)
                                                          <li><a href="index-9.html">{{ $productss->product_name }}</a></li>
                                                                @endforeach


                                                          </ul> --}}
                                                              </li>

                                                                  @endforeach
                                                             </ul>

                                                       </li>


                                               @endforeach

                                            </ul>
                                        </li>
                                        {{-- <li class="menu-dropdown">
                                            <a href="#">Shop( {{ totel_Sub_category_count() }} ) <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="mega-menu-wrap">
                                                <li>
                                                    <ul>
                                                        <li class="mega-menu-title"><a href="#">Shop Grid</a></li>
                                                        <li><a href="shop-3-column.html">Shop Grid 3 Column</a></li>

                                                        <li><a href=" {!! route('category/all_product') !!} ">All Category Product</a></li>

                                                        <li><a href="shop-left-sidebar.html">Shop Grid Left Sidebar</a></li>
                                                        <li><a href="shop-right-sidebar.html">Shop Grid Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="banner-wrapper">
                                                    <a href="single-product.html"><img src="assets/images/banner-image/banner-menu.jpg" alt="" /></a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                        {{-- <li class="menu-dropdown">
                                            <a href="#">Pages <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ url('about') }}">About Page</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                                <li><a href="compare.html">Compare Page</a></li>
                                                <li><a href="login.html">Login & Regiter Page</a></li>
                                                <li><a href="my-account.html">Account Page</a></li>
                                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                            </ul>
                                        </li> --}}
                                        <li class="menu-dropdown">
                                            <a href="{{ url('single_blog') }}">Blog</a>
                                            {{--   <a href="{{ url('single_blog') }}">Blog <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="sub-menu">
                                                <li class="menu-dropdown position-static">
                                                    <a href="#">Blog Grid <i class="ion-ios-arrow-down"></i></a>
                                                    <ul class="sub-menu sub-menu-2">
                                                        <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                                        <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                                    </ul>
                                                </li>


                                            </ul> --}}
                                        </li>
                                        <li><a href=" {{ route('contact/dev') }} ">Contact Us</a></li>
                                    </ul>
                                </div>
                                <!--Main Navigation End -->
                                <!--Header Bottom Account Start -->
                                <div class="header_account_area">
                                    <!--Seach Area Start -->
                                    <div class="header_account_list search_list">
                                        <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>


        <div class="dropdown_search" style="bottom:-68px;">
                                                   <form action="{{url('search')}}" method="GET" >

                                                       <input type="text"  name="product" placeholder="Search here">
                                                      <div class="search-category">


                                                          <select  name="category">
                                                             <option value="ALL" {{request('category') == "ALL" ? 'selected' : ''}}>All Categories</option>
                                                            @php
                                                              $active_categor=App\Category::all();
                                                            @endphp
                                                             @foreach($active_categor as $category)
                                                                     <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                                             @endforeach
                                                         </select>



                                                      </div>
                                                      <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                                  </form>
                                              </div>
                                    </div>
                                    <!--Seach Area End -->
                                    <!--Contact info Start -->
                                    <div class="contact-link">
                                        <div class="phone">
                                            <p>Call us:</p>
                                            <a href="tel:(+800)345678">01759814232</a>
                                        </div>
                                    </div>
                                    <!--Contact info End -->
                                    <!--Cart info Start -->
                                    @php
                                      $sums=0;
                                    @endphp
                                 @foreach (card_price_aitems() as  $totle_product_price_count)
                                   @if ($totle_product_price_count->product->offer_price=="")
                                     @php
                                       $sums+=$totle_product_price_count->product->product_price* $totle_product_price_count->product_quantity;
                                     @endphp
                                   @else
                                     @php
                                     $ttt=$totle_product_price_count->product->product_price-($totle_product_price_count->product->product_price*$totle_product_price_count->product->offer_price )/100;

                                     @endphp
                                     @php
                                         $sums+=$ttt*$totle_product_price_count->product_quantity
                                     @endphp


                                  @endif
                                 @endforeach
                                 <style>
                                 .scroll {
  max-height: 400px;
  overflow-y: auto;
}
                                 </style>
                                    <div class="cart-info">
                                        <div class="mini-cart-warp">

                                            <a href="#" class="count-cart"><span>${{ $sums }}</span></a>
                                            <div class="mini-cart-content scroll">

                                             @php
                                               $sum=0;
                                             @endphp
                                               @forelse (Card_aitems() as  $Card_aitems_value)
                                                 <ul>
                                                     <li class="single-shopping-cart">
                                                         <div class="shopping-cart-img">
                                                             <a href="{{ url('Frontend/single_card') }}/{{ $Card_aitems_value->product->slug }}"><img src=" {{ asset('frontend_asset/product_photo') }}/{{ $Card_aitems_value->product->product_thumbnail_photo }}" alt="" ></a>
                                                             <span class="product-quantity">{{ $Card_aitems_value->product_quantity }}</span>
                                                         </div>
                                                         <div class="shopping-cart-title">
                                                             <h4><a href="{{ url('Frontend/single_card') }}/{{ $Card_aitems_value->product->slug }}">{{ $Card_aitems_value->product->product_title}}</a></h4>



                                                                        @if ($Card_aitems_value->product->offer_price=="")
                                                                          <span>${{ $Card_aitems_value->product->product_price* $Card_aitems_value->product_quantity }}</span>
                                                                         @else
                                                                           @php
                                                                         $ttt=$Card_aitems_value->product->product_price-($Card_aitems_value->product->product_price*$Card_aitems_value->product->offer_price )/100;

                                                                           @endphp
                                                                        <span>$  {{ $ttt*$Card_aitems_value->product_quantity }}</span>

                                                                        @endif



                                                             {{-- <span>${{ $Card_aitems_value->product->offer_price  }}</span> --}}
                                                          @if ($Card_aitems_value->product->offer_price=="")
                                                            @php
                                                              $sum+=$Card_aitems_value->product->product_price* $Card_aitems_value->product_quantity;
                                                            @endphp
                                                          @else
                                                            @php
                                                          $ttt=$Card_aitems_value->product->product_price-($Card_aitems_value->product->product_price*$Card_aitems_value->product->offer_price )/100;

                                                            @endphp
                                                            @php
                                                                $sum+=$ttt*$Card_aitems_value->product_quantity
                                                            @endphp


                                                         @endif


                                                             <div class="shopping-cart-delete">
                                                                 <a href="{{ url('product_delete') }}/{{ $Card_aitems_value->id }}"><i class="ion-android-cancel"></i></a>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                               @empty

                                               @endforelse


                                                <div class="shopping-cart-total">
                                                    <h4>Subtotal : <span>${{ $sum }}</span></h4>

                                                    <h4 class="shop-total">Total : <span>${{ $sum }}</span></h4>
                                                </div>
                                                <div class="shopping-cart-btn text-center">
                                                    <a class="default-btn" href="{{ url('all_card/product') }}">Add To Card</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cart info End -->
                                </div>
                            </div>
                        </div>
                        <!-- mobile menu -->
                        <div class="mobile-menu-area">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li>
                                            <a href="{{ url('/') }}">HOME</a>
                                        </li>
                                        <li>
                                            <a href="#">Shop</a>
                                            <ul>
                                              @php
                                                $mobile_categpry=App\Category::all();
                                              @endphp
                                                     <li><a href=" {!! route('category/all_product') !!} ">All Category</a></li>
                                              @foreach ($mobile_categpry as  $mobile_value)
                                                <li>
                                                    <a>{{ $mobile_value->category_name }}</a>
                                                    <ul>
                                                        @foreach ($mobile_value->totle_sub_category as $valuesss)
                                                        <li><a href="{{url('menu_product')}}/{{ $valuesss->id }}">{{ $valuesss->sub_category_name }}</a>
                                                          {{-- <ul>
                                                              @foreach ($valuesss->totle_sub_product as $productss_mobile)
                                                               <li><a href="">{{ $productss_mobile->product_name }}</a></li>
                                                              @endforeach
                                                          </ul> --}}

                                                        </li>
                                                          @endforeach
                                                    </ul>
                                                </li>

                                                @endforeach


                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Pages</a>
                                            <ul>
                                                <li><a href="about.html">About Page</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                                <li><a href="compare.html">Compare Page</a></li>
                                                <li><a href="login.html">Login & Regiter Page</a></li>
                                                <li><a href="my-account.html">Account Page</a></li>
                                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                                <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                                <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                                                <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- mobile menu end-->
                    </div>
                </div>
                <!--Header Bottom Account End -->
            </header>






@yield('frontend_content')













{{-- <footer class="footer-area">
   <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- footer single wedget -->
                <div class="col-md-6 col-lg-4">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a href="index.html"><img src="assets/images/logo/footer-logo.png" alt="" /></a>
                    </div>
                    <!-- footer logo -->
                    <div class="about-footer">
                        <p class="text-info">We are a team of designers and developers that create high quality HTML template</p>
                        <div class="need-help">
                            <p class="phone-info">
                                NEED HELP?
                                <span>
                                    01759814232 <br />
                                    01886748327
                                </span>
                            </p>
                        </div>
                        <div class="social-info">
                            <ul>
                                <li>
                                    <a href="#"><i class="ion-social-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-social-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer single wedget -->
                <div class="col-md-6 col-lg-2 mt-res-sx-30px mt-res-md-30px">
                    <div class="single-wedge">
                        <h4 class="footer-herading">Information</h4>
                        <div class="footer-links">
                            <ul>
                                <li><a href="#">Delivery</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Secure Payment</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="#">Sitemap</a></li>
                                <li><a href="#">Stores</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer single wedget -->
                <div class="col-md-6 col-lg-2 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                    <div class="single-wedge">
                        <h4 class="footer-herading">Custom Links</h4>
                        <div class="footer-links">
                            <ul>
                                <li><a href="#">Legal Notice</a></li>
                                <li><a href="#">Prices Drop</a></li>
                                <li><a href="#">New Products</a></li>
                                <li><a href="#">Best Sales</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer single wedget -->
                <div class="col-md-6 col-lg-4 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                    <div class="single-wedge">
                        <h4 class="footer-herading">Newsletter</h4>
                        <div class="subscrib-text">
                            <p>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</p>
                        </div>
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form
                                id="mc-embedded-subscribe-form"
                                class="validate"
                                novalidate=""
                                target="_blank"
                                name="mc-embedded-subscribe-form"
                                method="post"
                                action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                            >
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Enter your email here.." name="EMAIL" value="" />
                                    <div class="mc-news" aria-hidden="true" style="position: absolute; left: -5000px;">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" />
                                    </div>
                                    <div class="clear">
                                        <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Sign Up" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="img_app">
                            <a href="#"><img src="assets/images/icons/app_store.png" alt="" /></a>
                            <a href="#"><img src="assets/images/icons/google_play.png" alt="" /></a>
                        </div>
                    </div>
                </div>
                <!-- footer single wedget -->
            </div>
        </div>
   </div> --}}
   <!--  Footer Bottom Area start -->
   <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <p class="copy-text">Copyright © <a href="https://hasthemes.com/"> HasThemes</a>. All Rights Reserved</p>
                </div>
                <div class="col-md-6 col-lg-8">
                    <img class="payment-img" src="{{ asset('frontend_asset') }}/assets/images/icons/payment.png" alt="" />
                </div>
            </div>
        </div>
   </div>
   <!--  Footer Bottom Area End-->
</footer>
<!--  Footer Area End -->
</div>

<!-- Modal -->
<!-- Modal end -->

<!-- Scripts to be loaded  -->
<!-- JS
============================================ -->

<!--====== Vendors js ======-->
<script src="{{ asset('frontend_asset') }}/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="{{ asset('frontend_asset') }}/assets/js/mixitup.js"></script>


<!--====== Plugins js ======-->
<!-- <script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/popper.min.js"></script>
<script src="assets/js/plugins/meanmenu.js"></script>
<script src="assets/js/plugins/owl-carousel.js"></script>
<script src="assets/js/plugins/jquery.nice-select.js"></script>
<script src="assets/js/plugins/countdown.js"></script>
<script src="assets/js/plugins/elevateZoom.js"></script>
<script src="assets/js/plugins/jquery-ui.min.js"></script>
<script src="assets/js/plugins/slick.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/range-script.js"></script> -->

<!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

<script src="{{ asset('frontend_asset') }}/assets/js/plugins.min.js"></script>

<!-- Main Activation JS -->
<script src=" {{ asset('frontend_asset') }}/assets/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@yield('footer_script')

</body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jul 2020 04:13:35 GMT -->
</html>
