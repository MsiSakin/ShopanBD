@extends('Frontend.layouts.front_layouts')
@section('section')


    <!-- slider section start -->
    
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
                            <a href="{{ url('/shop/'.$shop['id']) }}"class="text-decoration-none all-a ">
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
