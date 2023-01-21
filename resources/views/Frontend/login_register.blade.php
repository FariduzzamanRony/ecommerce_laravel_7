@extends('layouts.frontend_app')



@section('frontend_content')

<!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Register Page</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Register</li>
                                    <li><a href="{{ url('login') }}">Login</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- login area start -->
            <div class="login-register-area mb-60px mt-53px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#lg1">
                                        <h4>register</h4>
                                    </a>
                                </div>
                                <div class="tab-content">
                                   <div id="lg1" class="tab-pane active">
                                      <div class="login-form-container">
                                          <div class="login-register-form">
                                              <form action="{{ url('customer/register') }}" method="post">
                                                 @csrf
                                                 @error ('name')
                                                   <div class="alert alert-danger">
                                                       {{ $message }}
                                                   </div>
                                                 @enderror
                                                  <input type="text" value="{{ old('name') }}" name="name" placeholder="Username" />
                                                  @error ('email')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                  @enderror
                                                   <input name="email" value="{{ old('email') }}" placeholder="Email" type="email" />
                                                   @error ('password')
                                                     <div class="alert alert-danger">
                                                         {{ $message }}
                                                     </div>
                                                   @enderror
                                                  <input type="password" name="password" placeholder="Password" />
                                                  <div class="button-box">
                                                      <button type="submit"><span>Register</span></button>

                                                      <a href="{{ url('login') }}">Login?</a>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- login area end -->

@endsection
