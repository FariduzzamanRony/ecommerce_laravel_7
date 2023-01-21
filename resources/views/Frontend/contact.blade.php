@extends('layouts.frontend_app')


@section('frontend_content')

            <!-- Header End -->
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Contact Page</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li>Contact Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- contact area start -->
            <div class="contact-area mtb-60px">
                <div class="container">
                    <div class="contact-map mb-10">

                    </div>
                    <div class="custom-row-2">
                        <div class="col-lg-4 col-md-5">
                            <div class="contact-info-wrap">
                                <div class="single-contact-info">
                                    <div class="contact-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                        <p>+0801759814232</p>
                                        <p>+0801886748327</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                        <p><a href="#">webdeveloperrony.com</a></p>
                                        <p><a href="#">protfolio.webdeveloperrony.com</a></p>
                                       <p><a href="#">eecomerch.webdeveloperrony.com</a></p>               
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                        <p>Address goes here,</p>
                                        <p>Dhaka Mirpur-12</p>
                                    </div>
                                </div>
                                <div class="contact-social">
                                    <h3>Follow Us</h3>
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
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="contact-form">
                                <div class="contact-title mb-30">
                                    <h2>Get In Touch</h2>
                                </div>

                                 @if (session('file_success'))
                                    <div class="alert alert-success contact-title mb-30">
                                    <li>{{ session('file_success') }}</li>
                                      </div>
                                 @endif

                                <form class="contact-form-style" id="contact-form" action="{{ route('contact_dev/post') }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input name="contact_name" placeholder="Name*" type="text" />
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="contact_email" placeholder="Email*" type="email" />
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="contact_subject" placeholder="Subject*" type="text" />
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="contact_file" placeholder="Subject*" type="file" />
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="contact_messages" placeholder="Your Message*"></textarea>
                                            <button class="submit" type="submit">SEND</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact area end -->


@endsection
