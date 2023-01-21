@extends('layouts.frontend_app')


@section('frontend_content')



   <!-- Breadcrumb Area start -->
        <section class="breadcrumb-area">
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-content">
                           <h1 class="breadcrumb-hrading">Shop Page</h1>
                           <ul class="breadcrumb-links">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Shop Grid</li>
                           </ul>
                        </div>
                    </div>
                </div>
           </div>
        </section>



   <section id="products">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="main-hader">
                           <h2 data-aos="fade-down" style="text-align: center; padding-bottom: 50px;">All Categorys Products</h2> </div>
                   </div>
               </div>

               <div class="row">
                     <div class="col-lg-12">
                   <div class="group text-center">
                       <button type="button" class="btnnn" data-filter="all">All</button>
                       @forelse ($active_categoory as $active_categoory_value)


                          <button type="button" class="btnnn" data-filter=".category_id_{{ $active_categoory_value->id }}">{{ $active_categoory_value->category_name }}</button>

                       @empty

                       @endforelse

                   </div>    </div>
               </div>
               <div class="row galmix">
                  @forelse ($active_Sub_category_Prooduct as   $active_Sub_category_Prooduct_value)
                     <div class="col-lg-3 col-md-6 col-sm-6 mix category_id_{{ $active_Sub_category_Prooduct_value->category_id }}">
                        <a href="{{ url('all_product') }}/{{ $active_Sub_category_Prooduct_value->id }}">
                             <div class="products-main">
                                 <div class="products-item"> <img src="{{  asset('uplodes/sub_category_photo')  }}/{{ $active_Sub_category_Prooduct_value->sub_category_photo }}" class="img-fluid"> </div>
                                 <p>{{ $active_Sub_category_Prooduct_value->sub_category_name }}</p>
                             </div>
                        </a>
                     </div>
                  @empty

                  @endforelse


               </div>
           </div>
       </section>







@endsection
