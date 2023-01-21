<div class="category-slider owl-carousel owl-nav-style">
    <!-- Single item -->
    @forelse ($active_categorys as  $active_categorys_value)

      <div class="category-item">
          <div class="category-list mb-30px">
               <div class="category-thumb">
                   <a href="{{ url('shop_category') }}/{{ $active_categorys_value->id  }}">
                       <img src="{{ asset('uplodes/category_photo') }}/{{ $active_categorys_value->category_photo }}" alt="" width="50">
                   </a>
               </div>
               <div class="desc-listcategoreis">
                   <div class="name_categories">
                       <h4>{{ $active_categorys_value->category_name }}</h4>
                   </div>
                   {{-- <span class="number_product">{{ App\Sub_category::category_product_count($active_categorys_value->id) }}</span> --}}

                   <span style="color:#111;">{{ category_product($active_categorys_value->id) }}</span>

                   <a href="{{ url('shop_category') }}/{{ $active_categorys_value->id  }}"> Shop Now<i class="ion-android-arrow-dropright-circle"></i></a>
               </div>
          </div>
      </div>

    @empty

            <div class="data text-center">
             <h3 class="text-center text-danger">Nothing To Show</h3>
            </div>
    @endforelse


</div>
