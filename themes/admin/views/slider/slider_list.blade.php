@extends('layouts.admin')
@section('title') Slider List @endsection
@section('slider') menu-open @endsection
@section('slider-class') active @endsection
@section('sliderList') active @endsection
@section('admin-content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Slider List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Slider List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>

    <div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Slider List</h3>
                <a href="{{ url('/admin/add-slider') }}" class="btn btn-info btn-sm float-right">Add Slider</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                    <tr>
                        <th style="text-align:center">SL</th>
                        <th style="text-align:center">Category Name</th>
                        <th style="text-align:center">Slider</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>
                        @foreach($slider as $row)
                            <tr>
                                <td style="text-align:center">{{$i++}}</td>
                                <td style="text-align:center">{{$row['category']['category_name'] ?? "-"}}</td>
                                <td style="text-align:center">

                                    @if(!empty($row['slider']))
                                            <img width="64" height="40" src="{{asset($row['slider'])}}" alt="Category Image">
                                    @else
                                            <img width="64" height="40" src="{{asset('category/images/slider_image/no-image.png')}}" alt="Slider Image">
                                    @endif
                                </td>

                                <td style="text-align:center">

                                    @if($row['status'] == '1')
                                        <a class="updateSliderStatus" id="slider-{{ $row['id'] }}" slider_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                                    @else
                                        <a class="updateSliderStatus" id="slider-{{ $row['id'] }}" slider_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                                    @endif

                                </td>

                                <td style="text-align:center">
                                    <a href="{{url('/admin/slider/edit/'.$row['id'])}}" class="btn btn-sm btn-info" title="Edit">Edit&nbsp;<i class="far fa-edit"></i></i></a>

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
