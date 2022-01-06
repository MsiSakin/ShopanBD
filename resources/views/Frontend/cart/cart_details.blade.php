@extends('Frontend.layouts.front_layouts')
@section('section')

<div class="container">

    <!-- cart page start-->
      <section>
          <div class="row">
              <div class="col-lg-12">
                  <div>
                      <table class="w-100 my-5">
                          <thead>
                              <tr>
                                  <th class="pb-3">Super Shop</th>
                                  <th class="pb-3">Price</th>
                                  <th class="pb-3">Quantity</th>
                                  <th class="pb-3">Total</th>
                              </tr>
                          </thead>
                          <tbody>

                              @foreach ($cart_details as $cart)

                                <tr>
                                  <td class="me-lg-4"><img style="width: 150px; height:150px;" src="{{ $cart['product']['image'] }}" style="height: 60px;padding-top:5px;"alt=""> {{ $cart['product']['product_name'] }} | <b>shopname : </b> {{ $cart['shop']['shop_name'] }}</td>


                                  <td>${{ $cart['price'] }}</td>
                                  <td>

                                        <div>
                                        <a href="{{ url('/update-quantity-minus/'.$cart['id']) }}" class="btn btn-info btn-sm"  style="text-decoration:none" class="text-lg">-</a>
                                        <input readonly style="border:0;padding:10px;width:40px;" name="quantity" id="" min="1" value="{{ $cart['quantity'] }}">
                                        <a href="{{ url('/update-quantity-plus/'.$cart['id']) }}" style="text-decoration:none" class="btn btn-info btn-sm">+</a>
                                        </div>

                                  </td>
                                  <td id="subtotal">
                                      {{ $cart['sub_total'] }}
                                  </td>
                                  <td><i class="fas fa-times"></i></td>
                              </tr>


                              @endforeach
                          </tbody>
                      </table>

                  </div>
              </div>
          </div>
      </section>
      <div class="row">
            <div class="col-lg-6 py-lg-5">
                @if(Session::get('coupon_session'))

                    @else
                <h5 class="page-header py-3">Discount Code</h5>
                <form action="{{ url('/apply-coupon') }}" method="post">
                @csrf
                    <input class="p-1" type="text" name="coupon_name" placeholder="Enter your coupon code">
                    <button type="submit" class="btn btn-info">Apply Coupon</button>
                </form>
                @endif
            </div>
            <div class="col-lg-6 py-lg-5">
                <h5 class="page-header py-3">Cart Total</h5>
                <ul >
                    <li class="d-flex align-center justify-content-between border p-3 "><span>Subtotal</span>
                        <span>
                        ৳{{ $total }}
                        </span>
                    </li>
                    @if(Session::get('coupon_session'))
                    <li class="d-flex align-center justify-content-between border p-3 "><span>Coupon Discount</span>
                    <span>
                        {{ Session::get('coupon_session')['coupon_discount'] }}%&nbsp;(৳ {{ $discount = $total * Session::get('coupon_session')['coupon_discount'] / 100 }}) - ৳{{ $updated_price = $total - $discount }}
                    </span>
                    </li>
                    @endif

                    @if(Session::get('coupon_session'))
                    <li class="d-flex align-center justify-content-between border p-3"> <span>Total</span>
                    <span>৳{{ $updated_price }}</span>
                    </li>
                    @else
                    <li class="d-flex align-center justify-content-between border p-3"> <span>Total</span>
                    <span>৳{{ $total }}</span>
                    </li>
                    @endif
                </ul>

                <a href="{{ url('/checkout') }}" class="btn btn-info float-right">Checkout</a>


            </div>
      </div>
</div>


@endsection
