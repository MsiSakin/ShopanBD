@extends('layouts.admin')
@section('title') Add Slider @endsection
@section('slider') menu-open @endsection
@section('slider-class') active @endsection
@section('addSlider') active @endsection

@section('admin-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Slider Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="{{ url('/admin/slider-store') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Slider Add</h3>

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
                                    <label for="Select Category Name">Select Category</label><span class="text-danger">*</span>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                       @foreach ($category as $row)
                                        <option value="{{ $row['id'] }}">{{ $row['category_name'] }}</option>
                                       @endforeach
                                      </select>
                                </div>

                                <div class="form-group">
                                    <label for="Slider Image">Slider Image</label><span class="text-danger">*</span>
                                    <input type="file" name="slider_image[]" class="form-control" placeholder="Enter Slider Name..." required multiple>
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
