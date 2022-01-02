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

    <div class="container">

        <!-- All shop start -->
        <div>
            <div class="mt-lg-5 mb-lg-5 "style="text-align:center">
                <h1> All Shops</h1>
            </div>
            <div>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($shops as $shop)
                        <div class="col-md-4">
                            <a href="shopProducts.html"class="text-decoration-none all-a ">
                            <div class="card"style="margin: 10px 0;">
                                <img src="{{ asset($shop['banner']) }}" class="card-img-top" style="width: 100%;height: 225px;" alt="Shop Image">
                                <div class="card-body">
                                <h5 class="card-title">{{ $shop['shop_name'] }}</h5>
                                <p class="card-text">shop catagories: {{ $shop['shop']['category_name'] ?? ""}}</p>
                                <p class="card-text">{{ $shop['shop_description'] }}</p>
                                </div>
                            </div>

                            </a>
                        </div>
                    @endforeach

                  </div>
            </div>
        </div>

    </div>



@endsection
