@extends('Frontend.layouts.front_layouts')
@section('section')
<!-- catagories section start  -->

    <div class="container">
      <div class="container-fluid">
           <div class="row mt-3">
             <div class="col-lg-3">
               <a href="{{ url('/categories/'.$category['0']['id']) }}">
                 <img style="width: 100%; height: 250px;border-radius:20px;" src="{{ asset($category['0']['category_image'] ?? "") }}" alt="Category Image">
               <div class="card-img-overlay">
                 <button class="btn btn-info"><h3>{{ $category['0']['category_name'] }}</h3></button>
               </div>
               </a>
             </div>

             <div class="col-lg-6">
               <a href="{{ url('/categories/'.$category['1']['id']) }}">
                 <img style="width: 100%;height: 250px;border-radius:20px; border:1px solid rgb(233, 231, 231)" src="{{ asset($category['1']['category_image'] ?? "") }}" alt="Category Image">
               <div class="card-img-overlay">
                 <button class="btn btn-info"><h3>{{ $category['1']['category_name'] ?? "" }}</h3></button>
               </div>
               </a>
             </div>

             <div class="col-lg-3">
               <a href="{{ url('/categories/'.$category['2']['id']) }}">
                 <img style="width: 100%;height: 250px;border-radius:20px;" src="{{ asset($category['2']['category_image'] ?? "") }}" alt="Category Image">
               <div class="card-img-overlay">
                 <!-- <h1 class="card-title text-white categories-title">Medicine</h1>   -->
                 <button class="btn btn-info"><h3>{{ $category['2']['category_name'] ?? "" }}</h3></button>
               </div>
               </a>
             </div>
       </div>

       <div class="row mt-3 mb-5">
           <div class="col-lg-8">
             <a href="{{ url('/categories/'.$category['3']['id']) }}">
               <img style="width: 100%;height: 250px;border-radius:20px;" src="{{ asset($category['3']['category_image'] ?? "")}}" alt="Category Image">
             <div class="card-img-overlay">
               <button class="btn btn-info"><h3>{{ $category['3']['category_name'] ?? "" }}</h3></button>
             </div>
             </a>
           </div>

           <div class="col-lg-4">
             <a href="{{ url('/categories/'.$category['4']['id']) }}">
               <img style="width: 100%;height: 250px;border-radius:20px;" src="{{ asset($category['4']['category_image'] ?? "") }}" alt="Category Image">
             <div class="card-img-overlay">
               <button class="btn btn-info"><h3>{{ $category['4']['category_name'] }}</h3></button>
             </div>
             </a>
           </div>
       </div>
     </div>
   </div>
   <!-- catagories section end  -->




   <div class="container mb-5">
     <div  class="mt-lg-5 mb-lg-5 "style="text-align:center">
       <h1>Products</h1>
     </div>
     <div>
       <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach ($products as $product)
         <a href="{{ url('/product-details/'.$product['id']) }}"><div class="col-md-3 mt-3">
            <div class="card h-100 ">
                <img width="310px" height="163px" src="{{ asset($product['image']) }}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{ $product['product_name'] ?? "" }}</h5>
                <h6 class="card-title">Price: ${{ $product['price'] ?? "" }}</h6>
                <h6 class="card-title">Shop: {{ $product['shop']['shop_name'] ?? ""}}</h6>

                <a href="{{ url('/cart/'.$product['id']) }}" class="btn btn-info"><i class="fas fa-cart-plus"></i> Add to cart</a>

                </div>
            </div>
         </div></a>
         @endforeach
       </div>
     </div>
   </div>
@endsection
