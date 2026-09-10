@extends('layouts.admin')

@section('content')
    <!-- /DElete modal -->
    <div class="modal fade" id="ViewCommentModel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">View Comment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="comment_id" name="comment_id">
                    <textarea class="form-control" name="comment" id="view_comment" cols="30" rows="10"></textarea>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->




   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Reviews</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Star Rating</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($reviews as $k=>$val)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>{{ $val->user->name }}</td>
                    <td>{{ $val->products->name }}</td>
                    <td>{{ $val->star_rating }} Star Rating</td>
                    <td>{{date("Y/m/d- h:i:A ", strtotime($val->created_at))}}</td>
                    <td>
                        <button class="btn btn-primary ViewCommentBtn" data-toggle="modal" data-target="#ViewCommentModel" value="{{ $val->id }}"><i class="fas fa-edit"></i>View Comment</button>
                        <a href="{{ url('admin/delete-review/'.$val->id) }}" type="button" class="btn btn-danger" onclick="return confirm('Do you want to execute this command')"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>


                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @section('datatable')

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>

        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).on('click', '.ViewCommentBtn', function (e) {
                    e.preventDefault();

                    var comment_id = $(this).val();
                    $('#comment_id').val(comment_id);
                    $('#ViewCommentModel').modal('show');

                    $.ajax({
                        type: "GET",
                        url: "/admin/view-comment/"+comment_id,
                        success: function (response) {
                            //console.log(response);

                            if(response.status == 200){
                                $('#view_comment').val(response.review.comment);
                                $('#view_comment_id').val(comment_id);
                            }

                        }
                    });
                });
            });
        </script>

    @endsection
@endsection



