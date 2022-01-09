@extends('Frontend.layouts.front_layouts')
@section('section')

      <!-- main content start -->

      <div class="container">
          <div class="py-5 text-center">

            <h2>Checkout form</h2>

          </div>

          <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                @php
                    $cart_count = \App\Models\Cart::where('session_id',Session::get('session_id'))->count();
                    $cart_sub_total = \App\Models\Cart::where('session_id',Session::get('session_id'))->sum('sub_total');

                @endphp
                <span class="badge badge-secondary badge-pill">{{ $cart_count }}</span>
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">Total</h6>
                  </div>
                  @if(Session::get('coupon_session'))
                     @php
                        $discount = $cart_sub_total * Session::get('coupon_session')['coupon_discount'] / 100;
                        $updated_price = $cart_sub_total - $discount;
                     @endphp
                    <span class="text-muted">৳{{ $updated_price }}</span>
                  @else
                    <span class="text-muted">৳{{ $cart = \App\Models\Cart::where('session_id',Session::get('session_id'))->sum('sub_total') }}</span>
                  @endif

                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">Delivery charge</h6>
                  </div>
                  <span id="append_charge" class="text-muted">৳00</span>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                  <span>Total </span>
                  @if(Session::get('coupon_session'))
                    <strong id="grand_total">৳{{ $updated_price }}</strong>
                  @else
                    <strong id="grand_total">৳{{ $cart }}</strong>
                  @endif
                </li>
              </ul>

            </div>
            <div class="col-md-8 order-md-1">
                {{--custom validation--}}
                <div class="col-lg-12">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-12">
                        @if ($errors->any())
                            <div class="alert alert-danger" style="margin-top:20px">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-1"></div>
                </div>
              <h4 class="mb-3">Billing address</h4>
              <form action="{{ url('/order-place') }}" method="post" class="needs-validation">
                @csrf
                <div class="mb-3">
                  <label for="Phone">Phone</label>
                  <input type="number" class="form-control" name="phone" placeholder="Enter Your Phone Number" required>
                </div>


                <div class="mb-3">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Enter Your Address" required>
                </div>


                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="Area">Area</label>
                    <select class="custom-select d-block w-100" id="area" name="area" required>
                      <option value="">Choose...</option>
                      @php
                          $area = \App\Models\Area::latest()->get()->toArray();
                      @endphp
                      @foreach ($area as $row)
                        <option value="{{ $row['id'] }}">{{ $row['area_name'] }}</option>
                      @endforeach

                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="state">Sub-area</label>
                      @php
                          $SetLocation = \App\Models\SetLocation::latest()->get()->toArray();
                      @endphp
                    <select id="sub_area" name="sub_area_id" class="custom-select d-block w-100" id="state" required>
                      <option value="">Choose...</option>

                      @foreach ($SetLocation as $row)
                        <option value="{{ $row['id'] }}">{{ $row['sub_area_name'] }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                  <div class="custom-control custom-radio">
                    <input id="cashon" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="cashon">Cash on Delivery</label>
                  </div>
                </div>

                @if(Session::get('coupon_session'))
                    <input type="hidden" name="total" value="{{ $updated_price }}">
                    <input type="hidden" id="gran_total" name="grand_toal" value="">
                    <input type="hidden" id="del_charge" name="delivery_charge" >
                @else
                   <input type="hidden" name="total" value="{{ $cart }}">
                   <input type="hidden" id="gran_total" name="grand_toal" value="">
                   <input type="hidden" id="del_charge" name="delivery_charge" value="">
                    {{--  <strong id="grand_total">৳{{ $cart }}</strong>  --}}
                @endif

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Continue to checkout</button>
              </form>
            </div>
          </div>


        </div>

      <!-- main content end -->

@endsection
