@extends('layouts.admin')
@section('title') Add Coupon @endsection
@section('coupon') menu-open @endsection
@section('coupon-class') active @endsection
@section('addcoupon') active @endsection

@section('admin-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Coupon</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Coupon Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="{{ url('/admin/coupon/store') }}" method="post">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Coupon Add</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->


                    {{--custom validation--}}
                    <div class="col-lg-12">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-12">
                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top:20px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Category Name">Coupon Name</label>
                                    <input type="text" name="coupon_name" class="form-control" placeholder="Enter Coupon Name..." required>
                                </div>

                                <div class="form-group">
                                    <label for="Coupon Discount">Coupon Discount</label>
                                    <input type="number" name="discount" class="form-control" placeholder="Enter Coupon Discount..." required>
                                </div>
                                <div class="form-group">
                                    <label for="Validity">Validity</label>
                                    <input type="date" name="validity" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-success" style="float: right">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





@endsection
