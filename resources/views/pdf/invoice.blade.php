<h1>this invoces doenload in customer</h1>

 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Order id</th>
      <th scope="col">Order Name</th>
      <th scope="col">Coupon Name</th>
        <th scope="col">Sub Totle</th>
        <th scope="col">Disscount(%)</th>

      <th scope="col">Totle</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{ $order_info->id}}</th>
      <th scope="row">{{ Auth::user()->name}}</th>
      <td>
        @if ($order_info->coupon_name=='-')
          No Coupon used
        @else
          {{ $order_info->coupon_name}}
        @endif

      </td>

        <td>{{ $order_info->sub_total}}</td>
          <td>{{ $order_info->disscount_amunt}}</td>
      <td>{{ $order_info->total}}</td>

    </tr>

  </tbody>
</table>
