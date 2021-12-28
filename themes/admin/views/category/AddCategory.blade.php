@extends('layouts.admin')
@section('title') Add Category @endsection
@section('category') menu-open @endsection
@section('category-class') active @endsection
@section('addCategory') active @endsection

@section('admin-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="{{ url('/admin/add-category/'.$category['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Category Edit</h3>

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
                                    <label for="Category Name">Category Name</label><span class="text-danger">*</span>
                                    <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name..." value="{{ $category['category_name'] }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="Category Image">Category Image</label><span class="text-danger">*</span>
                                    <input type="file" name="category_image" class="form-control" placeholder="Enter Category Name..." required>
                                </div>
                                <div class="form-group">
                                    <label>Current Image</label><br>

                                    @if(!empty($category['category_image']))
                                            <img width="64" height="60" src="{{asset($category['category_image'])}}" alt="Category Image">
                                    @else
                                            <img width="64" height="50" src="{{asset('category/images/category_image/no-image.png')}}" alt="Category Image">
                                    @endif
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
