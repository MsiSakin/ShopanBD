@extends('layouts.admin')
@section('title') Delivery Man List @endsection
@section('deliveryMan') menu-open @endsection
@section('deliveryMan-class') active @endsection
@section('deliveryManList') active @endsection
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
                    <li class="breadcrumb-item active">Delivery Man List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    
    <div class="row">
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Delivery Man List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                    <tr>
                        <th style="text-align:center">SL</th>
                        <th style="text-align:center">Name</th>
                       
                        <th style="text-align:center">Phone</th>
                        <th style="text-align:center">Varified Date</th>
                        <th style="text-align:center">Address</th>
                        
                        <th style="text-align:center">Image</th>
                        <th style="text-align:center">Document Image</th>
                        <th style="text-align:center">Document No</th>
                        <th style="text-align:center">Status</th>
                        
                        
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>
                        @foreach($deliveryMans as $row)
                            <tr>
                                <td style="text-align:center">{{$i++}}</td>
                                <td style="text-align:center">{{$row->name}}</td>
                                
                                <td style="text-align:center">{{$row->phone}}</td>
                                <td style="text-align:center">{{$row->varified_at}}</td>
                                <td style="text-align:center">{{$row->address}}</td>
                                <td style="text-align:center"> <img width="50" height="40" src="{{asset($row->image)}}" ></td>
                                <td style="text-align:center"><img width="50" height="40" src="{{asset($row->document_image)}}"></td>
                                <td style="text-align:center">{{$row->document_no}}</td>
                                <td style="text-align:center">
                                    
                                    @if($row->status == 1)
                                    
                                    <a href="javascript:;"><span class="badge badge-danger inactivatingDeliveryMan" record="inactivating-deliveryMan" recordid="{{$row->id}}">INACTIVE</span></a>
                                        @else
                                        <a href="javascript:;"><span class="badge badge-success activatingDeliveryMan" record="activating-deliveryMan" recordid="{{$row->id}}">ACTIVE</span></a>
                                    @endif
                                    
                                </td>
                                
                                
                                
                                {{-- <td style="text-align:center">
                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" record="shopkeepers" recordid="{{$row->id}}" title="Delete" style="margin-left: 15px">Delete&nbsp;<i class="fa fa-trash-alt"></i></a>
                                </td> --}}
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
