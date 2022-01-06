@extends('Frontend.layouts.front_layouts')
@section('section')


<!-- slider section start -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="width:100%; height:400px;">
        @foreach ($shop_slider as $key=>$slider)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img src="{{ asset($slider['shop_slider']) }}" class="d-block w-100 banner-img"  alt="...">

          </div>
        @endforeach


    </div>
  </div>
<!-- slider section end -->


<!--Shop product section start-->
<div class="container">
    <div  class="mt-lg-5 mb-lg-5 "style="text-align:center">
      <h1>Products</h1>
    </div>
    <div>
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
          @foreach ($shop_products as $shop_product)
          <div class="col-md-3 mt-3">
            <a class="all-a" href="{{ url('/product-details/'.$shop_product['id']) }}">
              <div class="card h-100">
                <img width="320px" height="163px" src="{{ asset($shop_product['image']) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $shop_product['product_name'] }}</h5>
                  <h6 class="card-title">Price: ${{ $shop_product['price'] }}</h6>
                  <h6 class="card-title">Shop: {{ $shop_product['shop']['shop_name'] }}</h6>
                  <a href="{{ url('/cart/'.$shop_product['id']) }}" class="btn btn-info"><i class="fas fa-cart-plus"></i> Add to cart</a>
                </div>
              </div>
            </a>
          </div>
          @endforeach


      </div>
    </div>
  </div>

<!--Shop Product section end-->

@endsection
