@extends('layouts.admin')
@section('title') Coupon List @endsection
@section('coupon') menu-open @endsection
@section('coupon-class') active @endsection
@section('CouponList') active @endsection
@section('admin-content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Coupon List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>

    <div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Coupon List</h3>
                <a href="{{ url('/admin/add-coupon') }}" class="btn btn-info btn-sm float-right">Add Coupon</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                    <tr>
                        <th style="text-align:center">SL</th>
                        <th style="text-align:center">Coupon Name</th>
                        <th style="text-align:center">Discount(%)</th>
                        <th style="text-align:center">Validity</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>
                        @foreach($coupon as $row)
                            <tr>
                                <td style="text-align:center">{{$i++}}</td>
                                <td style="text-align:center">{{$row['coupon_name']}}</td>
                                <td style="text-align:center">{{$row['discount']}}</td>
                                <td style="text-align:center">{{$row['validity']}}</td>
                                <td style="text-align:center">
                                    @if($row['status'] == '1')
                                        <a class="updateCouponStatus" id="coupon-{{ $row['id'] }}" coupon_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                                    @else
                                        <a class="updateCouponStatus" id="coupon-{{ $row['id'] }}" coupon_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                                    @endif
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
@endsection
