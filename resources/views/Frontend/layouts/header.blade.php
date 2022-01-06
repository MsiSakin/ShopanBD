
      <nav class="navbar navbar-light nav "style="background-color: #87CEFA;">
        <div class="container-fluid p-2">
          <a href="{{ url('/') }}" class="navbar-brand">Shopanbd</a>
          <form class="d-flex">
            <input class="form-control  " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-info mr-4 " type="submit"><i class="fas fa-search"></i></button>
            <span class="text-center">0</span>
                <a href="{{ url('/cart-details') }}"><span class="text-center all-a "><i class="fas fa-shopping-cart text-center mr-3"></i></span></a>
                <a href=""><span class="text-center all-a"><i class="fas fa-user text-center mr-3"></i></span></a>
           </form>
        </div>
      </nav>
