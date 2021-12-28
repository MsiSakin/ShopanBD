<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/logo.svg')}}" alt="Kacha-Bazar" height="100" width="100">
    </div>

    <!-- Navbar -->
    @include('layouts.header')
{{--    <nav class="main-header navbar navbar-expand navbar-white navbar-light">--}}
{{--        <!-- Left navbar links -->--}}
{{--        <ul class="navbar-nav">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="index3.html" class="nav-link">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Contact</a>--}}
{{--            </li>--}}
{{--        </ul>--}}

{{--        <!-- Right navbar links -->--}}
{{--        <ul class="navbar-nav ml-auto">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">--}}
{{--                    Logout--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
{{--        <div class="content-header">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row mb-2">--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <h1 class="m-0">Dashboard</h1>--}}
{{--                    </div><!-- /.col -->--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">Dashboard</li>--}}
{{--                        </ol>--}}
{{--                    </div><!-- /.col -->--}}
{{--                </div><!-- /.row -->--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--        </div>--}}
        <!-- /.content-header -->

        <!-- Main content -->
        
        <?php
        $uri = Route::currentRouteName();
        ?>
        @if($uri == 'home')
            <br>
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            
                            <div class="small-box bg-info">
                        
                                <div class="inner">
                                    <h3>{{$new_order}}</h3>

                                    <p>New Orders</p>
                                </div>
                             
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                           
                               <a href="{{url('/orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$processing_order}}</h3>

                                    <p>Processing Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                               <a href="{{url('/orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        
                         <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{$on_the_way_order}}</h3>

                                    <p>On The Way Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                               <a href="{{url('/orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        
                         <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>{{$canceled_order}}</h3>

                                    <p>Canceled Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{url('/orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                       
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-gradient-gray">
                                <div class="inner">
                                    <h3>{{$delivery}}</h3>

                                    <p>Delivery Order</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                               <a href="{{url('/orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$today_sales}}</h3>

                                    <p>Today Sales</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-gradient-indigo">
                                <div class="inner">
                                    <h3>{{$month_sales}}</h3>

                                    <p>Monthly Sales</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <h3>{{$year_sales}}</h3>

                                    <p>Yearly Sales</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-fuchsia">
                                <div class="inner">
                                    <h3>{{$all_customer}}</h3>

                                    <p>All Customers</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                               <a href="{{url('/customers-details')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    
                    
                    
                   <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                        <thead>
                        <tr>
                            <th style="text-align:center">SL</th>
                            <th style="text-align:center">Order Code</th>
                            <th style="text-align:center">Coupon Discount</th>
                            <th style="text-align:center">Total</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1;?>
                        @foreach($orders as $row)
                            <tr>
                                <td style="text-align:center">{{$i++}}</td>
                                <td style="text-align:center">{{$row['order_code']}}</td>
                                <td style="text-align:center">{{$row['coupon_discount']}}</td>
                                <td style="text-align:center">
                                    {{$row['total']}}
                                </td>
                                <td style="text-align:center">
                                    <a href="{{url('/order-view/'.$row['id'])}}" class="btn btn-sm btn-info" title="Order View">View&nbsp;Order &nbsp;<i class="fas fa-eye"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/invoice/'.$row['id'])}}" class="btn btn-sm btn-success" title="Order View">Invoice print&nbsp;&nbsp;<i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div> 
                    
                    
                    
                    
                    
                </div>
            </section>
        @endif

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')


    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.script')
</body>
</html>
