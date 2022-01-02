@extends('Frontend.layouts.front_layouts')
@section('section')

<!-- slider section start -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner "style="">

      @foreach ($sliders as $key=>$slider)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="">
          <img src="{{asset($slider['slider'])}}" class="d-block w-100 banner-img" alt="...">
        </div>
      @endforeach
    </div>
  </div>
<!-- slider section end -->


<!-- Sub catagories start  -->
<section class="pt-5 pb-5">
  <div class="container">
      <div class="row mt-5">
          <div class="col-6">
              <h1 class=" mb-4">Sub-Catagories </h1>
          </div>
          <div class="col-6 text-right">
              <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                  <i class="fa fa-arrow-left"></i>
              </a>
              <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                  <i class="fa fa-arrow-right"></i>
              </a>
          </div>
          <div class="col-12">
              <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                  <div class="carousel-inner">
                      <div class="carousel-item active">
                          <div class="row">
                            @foreach ($sub_category as $subcategory)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                  <a class="all-a" href="{{ url('/sub-categories/'.$subcategory['id']) }}">
                                    <img class="img-fluid" alt="100%x280" src="{{ asset($subcategory['sub_category_image']) }}">
                                    <div class="card-body p-1 text-center">
                                        <h5 class="card-title">{{ $subcategory['sub_category_name'] }}</h5>
                                    </div>
                                  </a>
                                </div>
                            </div>
                            @endforeach
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="row">

                            @foreach ($sub_category as $subcategory)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                  <a class="all-a" href="{{ url('/sub-categories/'.$subcategory['id']) }}">
                                    <img class="img-fluid" alt="100%x280" src="{{ asset($subcategory['sub_category_image']) }}">
                                    <div class="card-body p-1 text-center">
                                        <h5 class="card-title">{{ $subcategory['sub_category_name'] }}</h5>
                                    </div>
                                  </a>
                                </div>
                            </div>
                            @endforeach

                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="row">

                            @foreach ($sub_category as $subcategory)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                  <a class="all-a" href="{{ url('/sub-categories/'.$subcategory['id']) }}">
                                    <img class="img-fluid" alt="100%x280" src="{{ asset($subcategory['sub_category_image']) }}">
                                    <div class="card-body p-1 text-center">
                                        <h5 class="card-title">{{ $subcategory['sub_category_name'] }}</h5>
                                    </div>
                                  </a>
                                </div>
                            </div>
                            @endforeach

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Sub catagories end -->

  <div class="container">
      <!-- Product section start -->
    <div>
      <div class="row mt-lg-5 mb-lg-5 ">

        <div class="col-md-10">
          <div class=""style="">
          <h1>Products</h1>
          </div>
        </div>
        <div class="col-md-2"style="">
          <div><a class="all-at" href="{{ url('/shop') }}"><h5>Shop</h5></a></div>
        </div>
      </div>
      <div>

        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            @foreach ($products as $product)
            <div class="col-md-3 mt-3">
                <div class="card h-100">
                <img width="310px" height="163px" src="{{ asset($product['image']) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['product_name'] }}</h5>
                    <h6 class="card-title">Price: ${{ $product['price'] }}</h6>
                    <h6 class="card-title">Shop: {{ $product['shop']['shop_name'] }}</h6>
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
