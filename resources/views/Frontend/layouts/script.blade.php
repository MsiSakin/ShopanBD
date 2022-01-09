<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{--toaster--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>

{{--  custome script  --}}
<script>
    $(document).ready(function(){
        $(document).on('click','#quantity',function(){
            let quantity = $('.update_qty').val();

            let product_id = $(this).attr('data-id');

            $.ajax({
            	type:"post",
                url:"/quantity-update",
                data: {quantity:quantity,product_id:product_id},
                success:function(res){

                    $('#subtotal').html(res);
                },
                error:function(){
                    alert(!Error);
                }
            });
        });
    });
</script>

//custom script
<script>
    $(document).ready(function(){
        $("#sub_area").on('change',function(){
            var Id = $("#sub_area option:selected").val();

            $.ajax({
                type:"get",
                url:"/delivery-charge-cal",
                data: {Id:Id},
                success:function(res){

                    $('#append_charge').html(res['delivery_charge']);
                    $('#grand_total').html(res['grand_toal']);
                    document.getElementById("del_charge").value = res['delivery_charge'];
                    document.getElementById("gran_total").value = res['grand_toal'];

                },
                error:function(){
                    alert(!Error);
                }
            })
        });
    });
</script>

