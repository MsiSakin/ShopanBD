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
                                  </td>

                                  <td>${{ $cart['price'] }}</td>
                                  <td>
                                    <div>
                                      <input type="number" min="1" value="{{ $cart['quantity'] }}"  style="border:0;padding:10px; width:80px" name="quantity">
                                      <a href="{{ url('/update-quantity/'.$cart['id']) }}" class="btn btn-sm btn-info" id="quantity" title="Update Quantity"><i class="fas fa-edit"></i></a>
                                    </div>
                                  </td>
                                  <td id="subtotal">{{ $cart['price'] }}</td>
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

              <!-- <div>
                  <a href=""></a>
                  <a href=""></a>
              </div> -->
              <div class="col-lg-6 py-lg-5">

                      <h5 class="page-header py-3">Discount Code</h5>
                      <form action="">
                          <input class="p-1" type="text"placeholder="Enter your coupon code">
                          <button type="submit"class="btn btn-info">Apply Coupon</button>
                      </form>

              </div>
              <div class="col-lg-6 py-lg-5">

                      <h5 class="page-header py-3">Cart Total</h5>
                      <ul >
                          <li class="d-flex align-center justify-content-between border p-3 "><span>Subtotal</span>
                              <span>$1500</span>
                          </li>
                          <li class="d-flex align-center justify-content-between border p-3"> <span>Total</span>
                              <span>$1560</span>
                          </li>
                      </ul>

                      <!-- <button class=" ml-lg-5 d-flex justify-content-center"> -->
                        <!-- Button trigger modal -->
                            <div class="text-right">
                            <button type="button" class="btn btn-info btn-mg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              Confirm checkout
                            </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Please give information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                  </div>
                                  <div class="modal-body">

                                    <input type="number"placeholder="Your phone number">
                                    <input type="text"placeholder="OTP number">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <a href="checkout.html" class="btn btn-primary">submit</a>
                                  </div>
                                </div>
                              </div>
                            </div>


                      <!-- </button> -->

              </div>

      </div>
    <!-- cart page end-->
  </div>


@endsection
