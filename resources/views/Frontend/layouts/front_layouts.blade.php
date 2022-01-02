<!doctype html>
<html lang="en">
  <head>
    @include('Frontend.layouts.head')
  </head>
  <body>
      <div class="wrapper">

    <!-- nav section start -->
        @include('Frontend.layouts.header')
    <!-- nav section end -->



    {{--  main section  --}}
        @yield('section')
    {{-- end main section  --}}



    <!-- Footer -->
        @include('Frontend.layouts.footer')
    <!-- Footer -->


    <!--  JavaScript -->
        @include('Frontend.layouts.script')
     <!--  JavaScript -->
 </div>
  </body>

</html>
