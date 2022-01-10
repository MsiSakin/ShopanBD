@extends('layouts.admin')
@section('title') Shopkeeper Request @endsection
@section('vendor') menu-open @endsection
@section('vendor-class') active @endsection
@section('vendor_details') active @endsection
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
                    <li class="breadcrumb-item active">Shopkeeper Details</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>

    <div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Shopkeeper details</h3>
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
                        <th style="text-align:center">Image</th>
                        <th style="text-align:center">Percentage</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">View Shop</th>

                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>
                        @foreach($shops as $row)
                            <tr>
                                <td style="text-align:center">{{$i++}}</td>
                                <td style="text-align:center">{{$row->shopkeepers->name ?? ""}}</td>
                                <td style="text-align:center">{{$row->shopkeepers->email ?? ""}}</td>
                                <td style="text-align:center">{{$row->shopkeepers->phone ?? ""}}</td>
                                <td style="text-align:center">{{$row->shopkeepers->varified_at ?? ""}}</td>
                                <td style="text-align:center">{{$row->shopkeepers->description ?? ""}}</td>
                                <td style="text-align:center">
                                    @if(!@empty($row->shopkeepers->image))

                                    <img width='40' height='30' src="{{asset($row->shopkeepers->image)}}">
                                    @endif

                                </td>


                                <td style="text-align:center">
                                    {{$row->shopkeepers->percentage ?? ""}}

                                </td>

                                <td style="text-align:center">

                                        @if($row->shopkeepers->status == 0)
                                        <a href="javascript:;">
                                            <span class="badge badge-success activating" record="activating-vendor" recordid="{{$row->shopkeepers->id}}">ACTIVE</span>

                                        </a>
                                        @elseif($row->shopkeepers->status == 1)
                                        <a href="javascript:;">
                                            <span class="badge badge-danger inactivating" record="inactivating-vendor" recordid="{{$row->shopkeepers->id}}">INACTIVE</span>
                                        </a>
                                        @endif




                                </td>

                                <td style="text-align:center">
                                    @if(!empty($row->shopkeepers['id']))
                                      <button type="button" id="viewShop" class="btn btn-sm btn-info" data-id="{{ $row['id'] }}" data-toggle="modal" data-target="#modal-lg">
                                        View Shop
                                      </button>
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




<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Shop Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4><p id="shop-name"></p></h4>

            <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                <thead>
                        <tr>
                            <th style="text-align:center">Shop Category</th>
                            <th style="text-align:center">Shop Address</th>
                            <th style="text-align:center">Shop Phone</th>
                            <th style="text-align:center">Shop Description</th>
                            {{-- <th style="text-align:center">Shop Image</th> --}}
                            <th style="text-align:center">Shop Status</th>
                        </tr>
                </thead>
                <tbody>
                        <tr>
                            <td style="text-align:center" id="shop_category"></td>
                            <td style="text-align:center" id="shop_address"></td>
                            <td style="text-align:center" id="shop_phone"></td>
                            <td style="text-align:center" id="shop_description"></td>
                            {{-- <td style="text-align:center" ><img width='40' height='30' id="shop_image"> </td>                       --}}
                            <td style="text-align:center">
                                <span class="badge badge-success " id="shop_active_status" ></span>
                                <span class="badge badge-danger " id="shop_inactive_status" ></span>
                            </td>
                        </tr>
                </tbody>
            </table>
          {{--  <p>One fine body&hellip;</p>  --}}
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->





@push('scripts')
<script>

    $(document).ready(function(){

        $(document).on('click','#viewShop',function(){
            const id = $(this).attr('data-id');

              $.ajax({
                type: "get",
                url:'/admin/view-shop/'+id,
                data: {
                    id:id
                    },
                success: function (result) {


                   $("#shop-name").html(result['shop']['shop_name']);

                    $("#shop_address").html(result['shop']['shop_address']);
                    $("#shop_phone").html(result['shop']['shop_phone']);
                    $("#shop_description").html(result['shop']['shop_description']);

                    $("#shop_image").html(result['shop']['image_path']);
                    if(result['shop']['shop_status']==1){
                        $("#shop_active_status").html("Active");
                    }else{
                        $("#shop_inactive_status").html("Inactive");
                    }
                    $("#shop_category").html(result['shop']['category']['category_name']);


                },


                error: function () {
                    alert("Content load failed.");
                }
            });

        })



    });





</script>
@endpush



@endsection
