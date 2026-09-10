<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //Add new faq and help
        $(document).on('submit', '#FaqHelpForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#FaqHelpForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-faq",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#resxop').html("");
                        let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                        $("#resxop").html(error);
                    }
                    else{
                        $('#resxop').html("");
                        $('#FaqHelpForm').find('input').val("");
                        $('#FaqHelpForm').find('textarea').val("");
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });


        //This Fetch the requested FAQ and Help ID and data from database
        $(document).on('click', '.editHelpBtn', function (e) {
            e.preventDefault();

            var faq_id = $(this).val();
            $('#help_id').val(faq_id);
            $('#UpdateHelpModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-faq/"+faq_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404){
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_http').val(response.faq.http);
                        $('#edit_head_title').val(response.faq.head_title);
                        $('#edit_question').val(response.faq.question);
                        $('#edit_answer').val(response.faq.answer);
                        $('#edit_help_id').val(help_id);
                    }
                }
            });
        });


         //This is for Updating the FAq
         $(document).on('submit', '#UpdateHelpFORM', function (e) {
            e.preventDefault();

            var id = $('#help_id').val();
            let EditformData = new FormData($('#UpdateHelpFORM')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-faq/"+id,
                data: EditformData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#repps').html("");
                        let error = '<span class="alert alert-danger">'+response.message+'</span>';
                        $("#repps").html(error);
                    }
                    else if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#repps').html("");
                        $('#UpdateHelpModal').modal('hide');
                        $('#UpdateHelpModal').find('input').val("");
                        $('#UpdateHelpModal').find('textarea').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });


        //This is for deleting the Faq
        $(document).on('click', '.deleteHelpBtn', function (e) {
            e.preventDefault();

            var faq_id = $(this).val();
            $('#deleteModal').modal('show');
            $('#del_help_id').val(faq_id);
        });

        //deleting the Faq ID
        $(document).on('click', '.delete_model_btn', function (e) {
            e.preventDefault();

            var id = $('#del_help_id').val();

            $.ajax({
                type: "DELETE",
                url: "/admin/delete-faq/"+id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 404)
                    {
                        $('#deleteModal').modal('hide');
                        toastr.error(response.msg);
                    }
                    else{
                        $('#deleteModal').modal('hide');
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });






    });
</script>
