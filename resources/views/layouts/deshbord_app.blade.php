<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from themepixels.me/demo/starlight/app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Oct 2020 09:48:37 GMT -->

<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="../../../starlight/img/starlight-social.html">
    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta property="og:image" content="../../../starlight/img/starlight-social.html">
    <meta property="og:image:secure_url" content="../../../starlight/img/starlight-social.html">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <!-- ajax -->

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>{{ env('APP_NAME') }}</title>
    <!-- vendor css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link href="{{  asset('deshbord_app') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{  asset('deshbord_app') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{  asset('deshbord_app') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{  asset('deshbord_app') }}/mycollection/font/flaticon.css">
    <link rel="stylesheet" href="{{  asset('deshbord_app') }}/css/starlight.css"> </head>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<!-- data CSS -->

<body>
    <!-- ########## START: LEFT PANEL ########## -->



        <div class="sl-logo"><a href="#"><i class="far fa-star"></i> {{ env('APP_NAME ') }}</a></div>
        <div class="sl-sideleft">
            <div class="input-group input-group-search">
                <input type="search" name="search" class="form-control" placeholder="Search"> <span class="input-group-btn">
                    <button class="btn"><i class="fa fa-search"></i></button>
                </span>


            </div>



    <!--
    <i class="fas fa-layer-group menu-item-icon tx-20"></i>
    <i class="menu-item-icon fas fa-chart-pie tx-20"></i>
    <i class="menu-item-icon fas fa-cog tx-24"></i>
    <i class="menu-item-icon icon fab fa-elementor tx-24"></i>
     <i class="menu-item-icon fas fa-table  tx-20"></i>
    <i class="menu-item-icon fas fa-map-marker-alt tx-24"></i>
    <i class="menu-item-icon far fa-envelope tx-24"></i>
    <i class="menu-item-icon fas fa-file-alt tx-22"></i>
    -->



            <label class="sidebar-label">Navigation</label>
            <div class="sl-sideleft-menu">
                <a href="{{ url('home') }}" class="sl-menu-link @yield('home')">
                    <div class="sl-menu-item"> <i class="fas fa-home tx-22 menu-item-icon icon"></i>
                        <!--            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>--><span class="menu-item-label">Dashboard</span> </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                @if (Auth::user()->role==1)

                   <a href="{{ url('category') }}" class="sl-menu-link @yield('category')">
                      <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Category</span> </div>
                      <!-- menu-item -->
                   </a>
                   <a href="{{ route('sub_category') }}" class="sl-menu-link @yield('sub_category')">
                      <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Sub category</span> </div>
                      <!-- menu-item -->
                   </a>
                      <a href="{{ route('product.index') }}" class="sl-menu-link @yield('proudct')">
                      <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Pruduct</span> </div>
                      <!-- menu-item -->
                   </a>
                      <a href="{{ url('cuopon') }}" class="sl-menu-link @yield('cuopon')">
                      <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">cuopon</span> </div>
                      <!-- menu-item -->
                   </a>
                      <a href="{{ url('customer_order_deatils') }}" class="sl-menu-link @yield('order_deatils')">
                      <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Customer Order</span> </div>
                      <!-- menu-item -->
                   </a>
                   </a>
                      <a href="{{ url('offer_product') }}" class="sl-menu-link @yield('offer_product')">
                      <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label"> Offer Product</span> </div>
                      <!-- menu-item -->
                   </a>
                   </a>
                      <a href="{{ url('postinsert') }}" class="sl-menu-link @yield('ajax')">
                      <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Ajax</span> </div>
                      <!-- menu-item -->
                   </a>
                      <a href="{{ url('ajaxImageUpload') }}" class="sl-menu-link @yield('ajaxphoto')">
                      <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Ajax Photo</span> </div>
                      <!-- menu-item -->
                      <a href="{{ url('new_login') }}" class="sl-menu-link">
                          <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">New login</span> </div>
                          <!-- menu-item -->
                      </a>
                                           <a href="{{ url('contact_dev/show') }}" class="sl-menu-link @yield('contact_dev')">
                                              <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Contact_dev</span> </div>
                                              <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('practice') }}" class="sl-menu-link">
                                              <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Practice</span> </div>
                                              <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('my/protfilio') }}" class="sl-menu-link">
                                              <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Protfilio</span> </div>
                                              <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('new_register') }}" class="sl-menu-link">
                                               <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">NeW Register</span> </div>
                                               <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('home') }}" class="sl-menu-link">
                                               <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Home</span> </div>
                                               <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('my/protfilio') }}" class="sl-menu-link">
                                               <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Protfilio</span> </div>
                                               <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('new_register') }}" class="sl-menu-link">
                                               <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Register</span> </div>
                                               <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('new_login') }}" class="sl-menu-link">
                                               <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">login</span> </div>
                                               <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('practice') }}" class="sl-menu-link">
                                               <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">practice</span> </div>
                                               <!-- menu-item -->
                                           </a>
                                           <a href="{{ route('blog') }}" class="sl-menu-link">
                                               <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">blog</span> </div>
                                               <!-- menu-item -->
                                           </a>
                                           <a href="{{ url('contact') }}" class="sl-menu-link">
                                               <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">contact</span> </div>
                                               <!-- menu-item -->
                                           </a>


                                           <a href="{{ url('user/profile/edit') }}" class="sl-menu-link">
                                             <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Profile Edit</span> </div>
                                             <!-- menu-item -->
                                         </a>
                                         <a href="{{ url('password/change') }}" class="sl-menu-link">
                                             <div class="sl-menu-item"> <i class="fas fa-layer-group menu-item-icon tx-20"></i> <span class="menu-item-label">Password Change</span> </div>
                                             <!-- menu-item -->
                                         </a>
                <!-- sl-menu-link -->


                @else


                @endif

                <!-- sl-menu-link -->


{{--
                 <a href="#" class="sl-menu-link">
              <div class="sl-menu-item">
               <i class="menu-item-icon fas fa-file-alt tx-22"></i>
                <span class="menu-item-label">Pages</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="page-blank.html" class="nav-link">Blank Page</a></li>
                <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
              <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
              <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
            </ul> --}}

            </div>
            <!-- sl-sideleft-menu -->
            <br> </div>
        <!-- sl-sideleft -->
        <div class="sl-header">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="fas fa-bars"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="fas fa-bars"></i></a></div>
            </div>
            <!-- sl-header-left -->
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown"> <span class="logged-name">{{ Auth::user()->name }}<span class="hidden-md-down"> </span></span> <img src="{{  asset('profile_photos') }}/{{ Auth::User()->profile_photo }}" class="wd-32 rounded-circle" alt=""> </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">



                              @if (Auth::user()->role==1)
                                <li><a href="{{ url('user/profile/edit') }}"> Edit Profile</a></li>
                                <li><a href="{{ url('password/change') }}">Password change</a></li>
                                <li><a href="{{ url('data/table') }}">data table</a></li>
@endif
                                <li>
                                   <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> Sign Out</a>

                                   </li>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                  </form>



                            </ul>
                        </div>

                    </div>

                </nav>
                <div class="navicon-right">
                    <a id="btnRightMenu" href="#" class="pos-relative"> <i class="far fa-bell"></i>
                     <span class="square-8 bg-danger"></span>

                    </a>
                </div>

            </div>

        </div>
        <!-- sl-header -->





          <div class="sl-mainpanel">
              <nav class="breadcrumb sl-breadcrumb"> <a class="breadcrumb-item" href="index.html">Starlight</a> <span class="breadcrumb-item active">Dashboard</span>
               </nav>

         @yield('deshbord_content')

          </div>











        <script src="https://kit.fontawesome.com/e2ac29273e.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/jquery/jquery.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/popper.js/popper.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/bootstrap/bootstrap.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/jquery-ui/jquery-ui.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/d3/d3.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/rickshaw/rickshaw.min.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/chart.js/Chart.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/Flot/jquery.flot.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/Flot/jquery.flot.pie.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/Flot/jquery.flot.resize.js"></script>
        <script src="{{  asset('deshbord_app') }}/lib/flot-spline/jquery.flot.spline.js"></script>
        <script src="{{  asset('deshbord_app') }}/js/starlight.js"></script>
        <script src="{{  asset('deshbord_app') }}/js/ResizeSensor.js"></script>
        <script src="{{  asset('deshbord_app') }}/js/dashboard.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        @yield('footer_script')
        <script type="text/javascript">
        $(document).ready(function() {
        $('#category').DataTable();
        } );
        </script>
    </body>

    </html>
