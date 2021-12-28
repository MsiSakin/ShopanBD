<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/themes/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('layouts.header')
 
  @include('layouts.sidebar')

  

  <section class="content">
    <div class="container-fluid">
      <div class="content-wrapper">
      @yield('admin-content')
      </div>
    </div><!-- /.container-fluid -->
</section>

  
</div>
@include('layouts.footer')
<!-- ./wrapper -->
@include('layouts.script')


</body>
</html>
