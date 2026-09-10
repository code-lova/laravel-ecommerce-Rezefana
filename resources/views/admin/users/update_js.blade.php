<script>

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('submit', '#UpdateUserForm', function (e) {
            e.preventDefault();

            var id = $('#user_id').val();
            let formData = new FormData($('#UpdateUserForm')[0]);
            //alert(id);

            $.ajax({
                type: "POST",
                url: "/admin/update-user/"+id,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#res').html("");
                        let error = '<span class="alert alert-danger">'+response.message+'</span>';
                        $("#res").html(error);
                    }
                    else{
                        $('#res').html("");
                        $('#station').load(location.href+' #station');

                        toastr.success(response.message);
                    }
                }
            });
        });


        // $(document).on('submit', '#UpdateLinkFORM', function (e) {
        //     e.preventDefault();

        //     var id = $('#download_id').val();
        //     let formData = new FormData($('#UpdateLinkFORM')[0]);
        //     //alert(id);

        //     $.ajax({
        //         type: "POST",
        //         url: "/admin/update-download/"+id,
        //         data: formData,
        //         dataType: "json",
        //         contentType: false,
        //         processData: false,
        //         success: function (response) {
        //             if(response.status == 400)
        //             {
        //                 $('#res').html("");
        //                 let error = '<span class="alert alert-danger">'+response.message+'</span>';
        //                 $("#res").html(error);
        //             }
        //             else{
        //                 $('#res').html("");
        //                 $('#station').load(location.href+' #station');

        //                 toastr.success(response.message);
        //             }
        //         }
        //     });
        // });




        $(document).on('click', '.blockUserBtn', function (e) {
            e.preventDefault();

            var user_id = $(this).val();
            //alert(user_id);
            $.ajax({
                type: "GET",
                url: "/admin/block-user/"+user_id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200)
                    {
                        $('#station').load(location.href+' #station');
                        toastr.success(response.message);
                    }
                }
            });
        });

        $(document).on('click', '.UnblockUserBtn', function (e) {
            e.preventDefault();

            var user_id = $(this).val();
            //alert(user_id);
            $.ajax({
                type: "GET",
                url: "/admin/unblock-user/"+user_id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200)
                    {
                        $('#station').load(location.href+' #station');
                        toastr.success(response.message);
                    }
                }
            });
        });




    });





    </script>
