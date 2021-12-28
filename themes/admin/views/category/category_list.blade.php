@extends('layouts.admin')
@section('title') Delivery Man List @endsection
@section('category') menu-open @endsection
@section('category-class') active @endsection
@section('categoryList') active @endsection
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
                    <li class="breadcrumb-item active">Category List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>

    <div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                    <tr>
                        <th style="text-align:center">SL</th>
                        <th style="text-align:center">Category Name</th>
                        <th style="text-align:center">Category Image</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>
                        @foreach($category as $row)
                            <tr>
                                <td style="text-align:center">{{$i++}}</td>
                                <td style="text-align:center">{{$row['category_name']}}</td>
                                <td style="text-align:center">

                                    @if(!empty($row['category_image']))
                                            <img width="64" height="40" src="{{asset($row['category_image'])}}" alt="Category Image">
                                    @else
                                            <img width="64" height="40" src="{{asset('category/images/category_image/no-image.png')}}" alt="Category Image">
                                    @endif
                                </td>

                                <td style="text-align:center">

                                    @if($row['status'] == '1')
                                        <a class="updateCategoryStatus" id="category-{{ $row['id'] }}" category_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                                    @else
                                        <a class="updateCategoryStatus" id="category-{{ $row['id'] }}" category_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                                    @endif

                                </td>

                                <td style="text-align:center">
                                    <a href="{{url('/admin/category/edit/'.$row['id'])}}" class="btn btn-sm btn-info" title="Edit">Edit&nbsp;<i class="far fa-edit"></i></i></a>

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
