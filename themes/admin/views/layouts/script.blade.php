<!-- jQuery -->
<script src="/themes/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/themes/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/themes/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/themes/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/themes/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/themes/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/themes/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/themes/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/themes/admin/plugins/moment/moment.min.js"></script>
<script src="/themes/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/themes/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/themes/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/themes/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/themes/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/themes/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/themes/admin/dist/js/pages/dashboard.js"></script>

{{--data table--}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

{{--sweet alert--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // sweet alert
    $(document).on("click",".sa-delete",function () {
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="/admin/delete-"+record+"/"+recordid;
            }
        })
    })
</script>


{{--  custome script  --}}
{{-- <script>
   $(document).on("click",".active",function () {

    var record = $(this).attr('record');
    var recordid = $(this).attr('recordid');

    $.ajax({
               type:'post',
               url:'/admin/shopkeeper-status/'+record+"/"+recordid,
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               data:{record:record,recordid:recordid},
               success:function(res){
                   alert(res);
               },
               error:function(){
                   alert("Eroor!");
               }

    });
    })
</script> --}}





{{--  custom script  --}}
<script>
// Activating vendor
$(document).on("click",".activating",function () {
    var record = $(this).attr('record');
    var recordid = $(this).attr('recordid');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to activate this vendor!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="/admin/"+record+"/"+recordid;
        }
    })
})
</script>




<script>

    // InActivating vendor
    $(document).on("click",".inactivating",function () {
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Inactivate this vendor!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="/admin/"+record+"/"+recordid;
            }
        })
    })
    </script>





<script>

    // InActivating Delivery Man
    $(document).on("click",".inactivatingDeliveryMan",function () {
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Inactivate this Delivery Man!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="/admin/"+record+"/"+recordid;
            }
        })
    })
    </script>




<script>

    // Activating Delivery Man
    $(document).on("click",".activatingDeliveryMan",function () {
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Activate this Delivery Man!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="/admin/"+record+"/"+recordid;
            }
        })
    })
    </script>


    <script>
        $(document).on("click",".updateCategoryStatus",function () {
            var status = $(this).children("i").attr('status');
            var category_id = $(this).attr('category_id');

            $.ajax({
                type:"post",
                url:"/admin/category-status",
                data:{status:status,category_id:category_id},
                success:function(res){
                    if(res['status'] == 0){
                        $("#category-"+category_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                    }else if(res['status'] == 1){

                        $("#category-"+category_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                    }
                },
                error:function(){
                    alert("Error!");
                }

            });

        })
  </script>

  
  <script>
    $(document).on("click",".updateSubCategoryStatus",function () {
        var status = $(this).children("i").attr('status');
        var subcategory_id = $(this).attr('subcategory_id');

        $.ajax({
            type:"post",
            url:"/admin/subcategory-status",
            data:{status:status,subcategory_id:subcategory_id},
            success:function(res){
                if(res['status'] == 0){
                    $("#subcategory-"+subcategory_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                }else if(res['status'] == 1){

                    $("#subcategory-"+subcategory_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                }
            },
            error:function(){
                alert("Error!");
            }

        });

    })
</script>
