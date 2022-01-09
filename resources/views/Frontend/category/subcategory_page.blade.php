@extends('Frontend.layouts.front_layouts')
@section('section')


<!-- slider section start -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner " style="width:100%; height:400px;">

      @foreach ($sliders as $key=>$slider)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="">
          <img  src="{{asset($slider['slider'])}}" class="d-block w-100 banner-img" alt="...">
        </div>
      @endforeach
    </div>
  </div>
<!-- slider section end -->



        <!--Shop product section start-->
        <!-- <div class="container"> -->
          <div class="container">

              <!-- Catagories section end -->
              <!-- Product section start -->
            <div>
              <div class="row mt-lg-5 mb-lg-5 ">
                <div class="col-md-4"style="text-align:center">
                  <div><h5></h5></div>
                </div>
                <div class="col-md-4">
                  <div class=""style="text-align:center">
                  <h1> Sub-catagories Products</h1>
                  </div>
                </div>
                <div class="col-md-4"style="text-align:center">
                  <div><a class="all-at" href=""><h5></h5></a></div>
                </div>
              </div>
              <div>
                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                @foreach ($sub_cat_products as $sub_product)
                    <a href="{{ url('/product-details/'.$sub_product['id']) }}"><div class="col-md-3 mt-3">
                        <div class="card h-100">
                        <img width="310px" height="163px" src="{{ asset($sub_product['image']) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sub_product['product_name'] }}</h5>
                            <h6 class="card-title">Price: ${{ $sub_product['price'] }}</h6>
                            <h6 class="card-title">Shop: {{ $sub_product['shop']['shop_name'] }}</h6>
                            <a href="{{ url('/cart/'.$sub_product['id']) }}" class="btn btn-info"><i class="fas fa-cart-plus"></i> Add to cart</a>
                        </div>
                        </div>
                    </div></a>
                @endforeach
                </div>
              </div>
            </div>
              <!-- product section end -->

          </div>

@endsection
