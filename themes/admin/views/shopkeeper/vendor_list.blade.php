@extends('layouts.admin')
@section('title') Shopkeeper Request @endsection
@section('vendor') menu-open @endsection
@section('vendor-class') active @endsection
@section('vendor_list') active @endsection
@section('admin-content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Shopkeeper</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shopkeeper List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    
    <div class="row">
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Shopkeeper List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                    <tr>
                        <th style="text-align:center">SL</th>
                        <th style="text-align:center">Name</th>
                        <th style="text-align:center">Email</th>
                        <th style="text-align:center">Phone</th>
                        <th style="text-align:center">Varified Date</th>
                        <th style="text-align:center">Description</th>
                        
                        <th style="text-align:center">Percentage</th>
                        <th style="text-align:center">Status</th>
                        {{-- <th style="text-align:center">Action</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        <div class="active_inactive">
                            <?php $i = 1?>
                            @foreach($shopkeepers as $row)
                                <tr>
                                    <td style="text-align:center">{{$i++}}</td>
                                    <td style="text-align:center">{{$row->name}}</td>
                                    <td style="text-align:center">{{$row->email}}</td>
                                    <td style="text-align:center">{{$row->phone}}</td>
                                    <td style="text-align:center">{{$row->varified_at}}</td>
                                    <td style="text-align:center">{{$row->description}}</td>
                                   
                                    <td style="text-align:center">
                                        <form method="post" action="{{ url('/admin/percentage-update/'.$row->id) }}">
                                            @csrf
                                            <input type="text" name="percentage_value" value="{{$row->percentage}}" placeholder="%" >&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                        
                                    </td>

                                    <td style="text-align:center">
                                        
                                        @if($row->status == 0)
                                        <a href="javascript:;"><span class="badge badge-success activating" record="activating-vendor" recordid="{{$row->id}}">ACTIVE</span></a>
                                           
                                            
                                        @endif
                                        
                                    </td>
                                    
                                    
                                    {{-- <td style="text-align:center">
                                        <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" record="shopkeepers" recordid="{{$row->id}}" title="Delete" style="margin-left: 15px">Delete&nbsp;<i class="fa fa-trash-alt"></i></a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </div>
                    </tbody>
    
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>
@endsection
