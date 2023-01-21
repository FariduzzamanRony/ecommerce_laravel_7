<h1>Product kena hoiche?priya</h1>
<style>



</style>
<table border="10"
       style="background-color: aqua; border-color: red blue gold teal; padding:10px;">
   <th style="padding:100px;">Order ID</th>
   <th>Product ID</th>
   <th>Product Photo</th>
   <th>Product quantity</th>
   <th>Product price</th>
   <th>Totle Price</th>
 </tr>

 @foreach ($alll_product_show as  $order_product)
   <tr>
     <td>{{ $order_product->order_id}}</td>
     <td>{{ App\Product::find($order_product->product_id)->product_name }}</td>
     <td><img src=" {{ asset('frontend_asset/product_photo') }}/{{ $order_product->product_photo }}" alt="" width="50" ></a></td>
     <td>{{ $order_product->product_quantity}}</td>
     <td>{{ $order_product->product_price}}</td>
     <td>{{ $order_product->totle_price}}</td>

   </tr>
 @endforeach

</table>
