<script>

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on('submit', '#ProfileSettingForm', function (e) {
        e.preventDefault();

            var id = $('#user_id').val();
            let formData = new FormData($('#ProfileSettingForm')[0]);
            //alert(id);

            $.ajax({
                type: "POST",
                url: "/user/update_account/"+id,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400){
                        $('#res').html("");
                        let error = '<p style="color:red">'+response.message+'</p>';
                        $("#res").html(error);
                    }else{
                        $('#res').html("");
                        $('#station').load(location.href+' #station');
                        toastr.success(response.message);
                    }
                }
            });
        });




        //Updating userpassword
        $(document).on('submit', '#updatePasswordForm', function (e) {
        e.preventDefault();

            var id = $('#user_id').val();
            let formData = new FormData($('#updatePasswordForm')[0]);
            //alert(id);

            $.ajax({
                type: "POST",
                url: "/user/update-password/"+id,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400){
                        $('#ressp').html("");
                        let error = '<p style="color:red">'+response.message+'</p>';
                        $("#ressp").html(error);
                    }else if(response.status == 200){
                        $('#ressp').html("");
                        $('#updatePasswordForm').find('input').val("");
                        toastr.success(response.message);
                    }else if(response.status == 403){
                        toastr.error(response.message);
                    }else if(response.status == 404){
                        toastr.warning(response.message);
                    }
                }
            });
        });

        //Storing Favoirite products into favourite table
        $(document).on('click', '.AddToFavourite', function (e) {
        e.preventDefault();

            var $prod = $(this).val();
            //let formData = new FormData($('#AddToFavourite')[0]);
            //alert($prod);

            $.ajax({
                type: "POST",
                url: "/add-favourite/"+$prod,
                dataType: "json",
                success: function (response) {
                    if(response.status == 400){
                        toastr.warning(response.message);
                    }
                    else if(response.status == 200){
                        $('#station').load(location.href+' #station');
                        toastr.success(response.message);
                    }
                    else if(response.status == 404){
                        toastr.error(response.message);
                    }
                    else if(response.status == 501){
                        toastr.info(response.message);
                    }
                }
            });
        });

        //This is to Fetch the data from database with ajax
        $(document).ready(function () {
            $(document).on('click', '.fetchDetailsBtn', function (e) {
                e.preventDefault();

                var product_id = $(this).val();
                $('#product_id').val(product_id);
                $('#orderDetailsModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/user/fetch-details/"+product_id,
                    success: function (response) {
                    //console.log(response);

                    if(response.status == 200){
                        $('#fetch_delivery_status').val(response.product.delivery_status);
                        $('#fetch_color').val(response.product.color);
                        $('#fetch_size').val(response.product.size);
                        $('#fetch_brand').val(response.product.brand);
                        $('#fetch_reference').val(response.product.reference);
                        $('#fetch_item_name').val(response.product.item_name);
                        $('#fetch_created_at').val(response.product.created_at);
                        $('#fetch_product_id').val(product_id);
                        }else{
                            toastr.info(response.message);
                        }
                    }
                });

            });
        });











    });




</script>
