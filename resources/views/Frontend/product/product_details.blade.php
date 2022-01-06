@extends('Frontend.layouts.front_layouts')
@section('section')

<div class="container">
    <section>
      <div class="row">
        <div class="col-md-6">
          <div>
            <img width="626px" height="417px" src="{{ asset($product_details['image']) }}" style="background: rgb(180, 236, 250);width:100%;border: 1px solid rgb(224, 224, 224)" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <h1>{{ $product_details['product_name'] }}</h1>
          <h4 style="color:red"class="text-mg">${{ $product_details['price'] }}</h4>
          <p>{{ $product_details['short_des'] }}</p>
          <div>
            <button type="button" style="border:0;padding:10px"class="text-lg "id="minus"onclick="changeCounter(minus)">-</button>
            <span type="text" name="" id=""style="width:30px;border:0;padding: 30px;" class="counter">0</span>
            <button type="button"style="border:0;padding:10px"id="plus"onclick="changeCounter(plus)">+</button>
            <a href="{{ url('/cart/'.$product_details['id']) }}">
              <button type="submit"class="btn btn-primary m-3">Add To Cart</button>
            </a>
            <span class="p-md-3"><i class="far fa-heart"></i></span>
          </div>
          <div class="mt-3">
            <p>Shope name: {{ $product_details['shop']['shop_name'] }}</p>
            <p>Share on : <i class="fab fa-facebook-square"></i> <i class="fab fa-instagram-square"></i> <i class="fab fa-twitter-square"></i></p>
          </div>
        </div>
        <div>
          <h5 class="mt-3">Product description</h5>
          <br>{{ $product_details['long_des'] }}</p><br>
        </div>
        <div class="mt-3">
          <h4>Related Products</h4>
          <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
              @foreach ($related_products as $related_product)
               <a href="{{ url('/product-details/'.$related_product['id']) }}"> <div class="card h-100">
                    <img width="310px" height="163px" src="{{ asset($related_product['image']) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $related_product['product_name'] }}</h5>
                        <h6 class="card-title">Price: ${{ $related_product['price'] }}</h6>
                        <h6 class="card-title">Shop: {{ $related_product['shop']['shop_name'] }}</h6>
                        <a href="{{ url('/cart/'.$related_product['id']) }}" class="btn btn-info"><i class="fas fa-cart-plus"></i> Add to cart</a>
                    </div>
                </div></a>
              @endforeach

         </div>
      </div>
    </section>

</div>
@endsection
