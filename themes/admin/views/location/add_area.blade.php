@extends('layouts.admin')
@section('title') Add Area @endsection
@section('location') menu-open @endsection
@section('location-class') active @endsection
@section('addLocation') active @endsection

@section('admin-content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Area</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Location Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="{{ url('/admin/area-store') }}" method="post" >
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add Area</h3>

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
                                    <label for="Area Name">Area Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Area Name" name="area_name" required>
                                </div>
                            </div>
                        </div>

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
