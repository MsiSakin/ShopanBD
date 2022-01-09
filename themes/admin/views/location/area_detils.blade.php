@extends('layouts.admin')
@section('title') Area Lists @endsection
@section('location') menu-open @endsection
@section('location-class') active @endsection
@section('locationList') active @endsection
@section('admin-content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Area List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Area List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>

    <div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Area List</h3>
                <a href="{{ url('/admin/add-location') }}" class="btn btn-info float-right">Set Location</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                    <tr>
                        <th style="text-align:center">SL</th>
                        <th style="text-align:center">Area Name</th>
                        <th style="text-align:center">Sub Area Name</th>
                        <th style="text-align:center">Delivery Charge</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>

                            <tr>
                                <td style="text-align:center"></td>
                                <td style="text-align:center"></td>
                                <td style="text-align:center"></td>
                                <td style="text-align:center"></td>
                                <td style="text-align:center">
                                    <a href="" class="btn btn-sm btn-info" title="Edit">Edit&nbsp;<i class="far fa-edit"></i></i></a>
                                </td>

                            </tr>

                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>
@endsection
