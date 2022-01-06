@extends('layouts.admin')
@section('title') Add Delivery Man @endsection
@section('deliveryMan') menu-open @endsection
@section('deliveryMan-class') active @endsection
@section('addDeliveryMan') active @endsection

@section('admin-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Delivery Man</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Delivery Man Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('admin.store.deliveryMan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        @if(Session::get('message'))
                        <p class="text-success pl-2">{{ Session::get('message') }}</p>
                    @endif
                        <h3 class="card-title">Delivery Man Add</h3>
        
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name"> Name</label>&nbsp;<span class="text-danger">*</span>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>&nbsp;<span class="text-danger">*</span>
                                    <input name="address" name="address" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>&nbsp;<span class="text-danger">*</span>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                                

                                <div class="form-group">
                                    <label for="image">Image</label>&nbsp;<span class="text-danger">*</span>
                                    <input type="file" name="image" class="form-control" required>
                                </div>

                            </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="docimage">ID Image</label>
                                <input type="file" name="docimage" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="idnumber">ID Number</label>
                                <input type="number" name="idnumber" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>&nbsp;<span class="text-danger">*</span>
                                <input type="password" name="password" class="form-control" required min="8">
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