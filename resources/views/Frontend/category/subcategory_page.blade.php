@extends('Frontend.layouts.front_layouts')
@section('section')


        <!-- slider section start -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner "style="">
            <div class="carousel-item active">
                <img src="{{ asset('frontend/img/slider1.jpg') }}" class="d-block w-100 banner-img"  alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Second slide label</h1>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item"style="">
                <img src="{{ asset('frontend/img/slider3.jpg') }}" class="d-block w-100 banner-img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Second slide label</h1>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item"style="">
                <img src="{{ asset('frontend/img/slider2.jpg') }}" class="d-block w-100 banner-img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Second slide label</h1>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
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
                    <div class="col-md-3 mt-3">
                        <div class="card h-100">
                        <img width="310px" height="163px" src="{{ asset($sub_product['image']) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sub_product['product_name'] }}</h5>
                            <h6 class="card-title">Price: ${{ $sub_product['price'] }}</h6>
                            <h6 class="card-title">Shop: {{ $sub_product['shop']['shop_name'] }}</h6>
                            <a href="#" class="btn btn-info"><i class="fas fa-cart-plus"></i> Add to cart</a>
                        </div>
                        </div>
                    </div>
                @endforeach
                </div>
              </div>
            </div>
              <!-- product section end -->

          </div>

@endsection
