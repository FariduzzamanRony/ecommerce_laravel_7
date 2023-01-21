@extends('layouts.frontend_app')


@section('frontend_content')


  <div id="main">
           <!-- Header Start -->

           <!-- Header End -->
           <!-- Breadcrumb Area start -->
           <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Blog Post</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li>Blog List Left Sidebar</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- Shop Category Area End -->
            <div class="shop-category-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="single-blog-post blog-grid-post">
                                        <div class="blog-post-media">
                                            <div class="blog-image">
                                                <a href="#"><img src="{{asset('frontend_asset\assets\images\blog-image\blog-2.jpg')}}" alt="bl" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 align-self-center align-items-center">
                                    <div class="blog-post-content-inner">
                                        <h4 class="blog-title"><a href="#">This is Third Post For XipBlog</a></h4>
                                        <ul class="blog-page-meta">
                                            <li>
                                                <a href="#"><i class="ion-person"></i> Admin</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-calendar"></i> 24 April, 2020</a>
                                            </li>
                                        </ul>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos nobis modi
                                            temporibus recusandae.
                                        </p>
                                        <a class="read-more-btn" href="blog-single-left-sidebar.html"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                                    </div>
                                </div>
                                <!-- single blog post -->
                            </div>
                            <div class="row mt-50">
                                <div class="col-lg-5 col-md-6">
                                    <div class="single-blog-post blog-grid-post">
                                        <div class="blog-post-media">
                                            <div class="blog-gallery">
                                                <div class="gallery-item">
                                                    <a href="#"><img src="{{asset('frontend_asset\assets\images\blog-image\blog-2.jpg')}}" alt="r" /></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a href="#"><img src="{{asset('frontend_asset\assets\images\blog-image\blog-3.jpg')}}" alt="r" /></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a href="#"><img src="{{asset('frontend_asset\assets\images\blog-image\blog-4.jpg')}}" alt="r" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 align-self-center align-items-center">
                                    <div class="blog-post-content-inner">
                                        <h4 class="blog-title"><a href="#">This is Third Post For XipBlog</a></h4>
                                        <ul class="blog-page-meta">
                                            <li>
                                                <a href="#"><i class="ion-person"></i> Admin</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-calendar"></i> 24 April, 2020</a>
                                            </li>
                                        </ul>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos nobis modi
                                            temporibus recusandae.
                                        </p>
                                        <a class="read-more-btn" href="blog-single-left-sidebar.html"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                                    </div>
                                </div>
                                <!-- single blog post -->
                            </div>
                            <div class="row mt-50">
                                <div class="col-lg-5 col-md-6">
                                    <div class="single-blog-post blog-grid-post">
                                        <div class="blog-post-media">
                                            <div class="blog-image">
                                                <a href="#"><img src="{!! asset('frontend_asset') !!}/assets/images/blog-image/blog-3.jpg" alt="blog" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 align-self-center align-items-center">
                                    <div class="blog-post-content-inner">
                                        <h4 class="blog-title"><a href="#">This is Third Post For XipBlog</a></h4>
                                        <ul class="blog-page-meta">
                                            <li>
                                                <a href="#"><i class="ion-person"></i> Admin</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-calendar"></i> 24 April, 2020</a>
                                            </li>
                                        </ul>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos nobis modi
                                            temporibus recusandae.
                                        </p>
                                        <a class="read-more-btn" href="blog-single-left-sidebar.html"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                                    </div>
                                </div>
                                <!-- single blog post -->
                            </div>
                            <!-- single blog post -->
                            <div class="row mt-50">
                                <div class="col-lg-5 col-md-6">
                                    <div class="single-blog-post blog-grid-post">
                                        <div class="blog-post-media">
                                            <div class="blog-image">
                                                <a href="#"><img src="{!! asset('frontend_asset') !!}/assets/images/blog-image/blog-4.jpg" alt="blog" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 align-self-center align-items-center">
                                    <div class="blog-post-content-inner">
                                        <h4 class="blog-title"><a href="#">This is Third Post For XipBlog</a></h4>
                                        <ul class="blog-page-meta">
                                            <li>
                                                <a href="#"><i class="ion-person"></i> Admin</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-calendar"></i> 24 April, 2020</a>
                                            </li>
                                        </ul>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos nobis modi
                                            temporibus recusandae.
                                        </p>
                                        <a class="read-more-btn" href="blog-single-left-sidebar.html"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                                    </div>
                                </div>
                                <!-- single blog post -->
                            </div>
                            <!--  Pagination Area Start -->
                            <div class="pro-pagination-style text-center">
                                <ul>
                                    <li>
                                        <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                                    </li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li>
                                        <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!--  Pagination Area End -->
                        </div>
                        <!-- Sidebar Area Start -->
                        <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-res-md-60px mb-res-sm-60px">
                            <div class="left-sidebar">
                                <!-- Sidebar single item -->
                                <div class="sidebar-widget">
                                    <div class="main-heading">
                                        <h2>Search</h2>
                                    </div>
                                    <div class="search-widget">
                                        <form action="#">
                                            <input placeholder="Search entire store here ..." type="text" />
                                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Sidebar single item -->
                                <!-- Sidebar single item -->
                                <div class="sidebar-widget mt-40">
                                    <div class="main-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="category-post">
                                        <ul>
                                            <li><a href="#">Dresses (20)</a></li>
                                            <li><a href="#">Jackets & Coats (9)</a></li>
                                            <li><a href="#">Sweaters (5)</a></li>
                                            <li><a href="#">Jeans (11)</a></li>
                                            <li><a href="#">Blouses & Shirts (3)</a></li>
                                            <li><a href="#">Electronic Cigarettes (6)</a></li>
                                            <li><a href="#">Bags & Cases (4)</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Sidebar single item -->
                                <div class="sidebar-widget mt-40">
                                    <div class="main-heading">
                                        <h2>Recent Post</h2>
                                    </div>
                                    <div class="recent-post-widget">

                                        <div class="recent-single-post d-flex">
                                            <div class="thumb-side">
                                                <a href="#"><img src="{!! asset('frontend_asset') !!}/assets/images/blog-image/blog-2.jpg" alt="" /></a>
                                            </div>
                                            <div class="media-side">
                                                <h5><a href="#">This Is Secound Post For XipBlog </a></h5>
                                                <span class="date">APRIL 25, 2020</span>
                                            </div>
                                        </div>
                                        <div class="recent-single-post d-flex">
                                            <div class="thumb-side">
                                                <a href="#"><img src="{!! asset('frontend_asset') !!}/assets/images/blog-image/blog-2.jpg" alt="" /></a>
                                            </div>
                                            <div class="media-side">
                                                <h5><a href="#">This Is Secound Post For XipBlog </a></h5>
                                                <span class="date">APRIL 25, 2020</span>
                                            </div>
                                        </div>
                                        <div class="recent-single-post d-flex">
                                            <div class="thumb-side">
                                                <a href="#"><img src="{!! asset('frontend_asset') !!}/assets/images/blog-image/blog-3.jpg" alt="" /></a>
                                            </div>
                                            <div class="media-side">
                                                <h5><a href="#">This Is Third Post For XipBlog </a></h5>
                                                <span class="date">APRIL 26, 2020</span>
                                            </div>
                                        </div>
                                        <div class="recent-single-post d-flex">
                                            <div class="thumb-side m-0px">
                                                <a href="#"><img src="{!! asset('frontend_asset') !!}/assets/images/blog-image/blog-4.jpg" alt="" /></a>
                                            </div>
                                            <div class="media-side">
                                                <h5><a href="#">This Is Fourth Post For XipBlog </a></h5>
                                                <span class="date">APRIL 27, 2020</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sidebar single item -->
                                <div class="sidebar-widget mt-40">
                                    <div class="main-heading">
                                        <h2>Tag</h2>
                                    </div>
                                    <div class="sidebar-widget-tag">
                                        <ul>
                                            <li><a href="#">Fresh Fruit</a></li>
                                            <li><a href="#"> Fresh Vegetables</a></li>
                                            <li><a href="#">Fresh Salad</a></li>
                                            <li><a href="#"> Butter & Eggs</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Sidebar single item -->
                            </div>
                        </div>
                        <!-- Sidebar Area End -->
                    </div>
                </div>
            </div>
            <!-- Shop Category Area End -->
            <!-- Footer Area start -->

        </div>

@endsection
