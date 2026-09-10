@extends('layouts.admin')

@section('content')

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
                <h3 class="card-title">All Users Account Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="datatable">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Verified</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $k=>$val)
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->username }}</td>
                            <td>
                                @if ($val->email_status == 1)
                                    <span class="badge badge-success">Verified</span>
                                @else
                                    <span class="badge badge-danger">Unverified</span>
                                @endif
                            </td>
                            <td>
                                @if ($val->is_active == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Banned</span>
                                @endif
                            </td>
                            <td>
                                @if ($val->role_as == 1)
                                    <span class="badge badge-info">Admin</span>
                                @else
                                    <span class="badge badge-warning">User</span>
                                @endif
                            </td>
                            <td>{{ $val->created_at->format('m/y/d') }}</td>
                            <td>
                                @if ($val->role_as == 1)
                                    <a type="button" href="{{ url('admin/edit-user/'.$val->id) }}" class="btn btn-primary"><i class="fas fa-user"></i></a>
                                @else
                                    <a type="button" href="{{ url('admin/edit-user/'.$val->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                @endif
                                @if ($val->role_as == 0)
                                    <button class="btn btn-danger deleteUserBtn" value="{{ $val->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>
                                @else
                                    <button class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i></button>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
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

  <!-- /.Delete modal -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Delete Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <input type="hidden" id="del_user_id">
                <p>Are you sure you want to delete this data with all it's Transaction?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                <button type="button" class="delete_model_btn btn btn-outline-light">DELETE</button>
            </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

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

                $(document).on('click', '.deleteUserBtn', function (e) {
                    e.preventDefault();

                    var user_id = $(this).val();
                    $('#deleteModal').modal('show');
                    $('#del_user_id').val(user_id);

                    $(document).on('click', '.delete_model_btn', function (e) {
                        e.preventDefault();

                        var id = $('#del_user_id').val();

                        $.ajax({
                            type: "POST",
                            url: "/admin/destroy-user/"+id,
                            dataType: "json",
                            success: function (response) {
                                if(response.status == 404)
                                {
                                    $('#deleteModal').modal('hide');
                                    toastr.error(response.message);
                                }
                                else{
                                    $('#deleteModal').modal('hide');
                                    $('#datatable').load(location.href+' #datatable');
                                    toastr.success(response.message);
                                }
                            }
                        });
                    });
                });
            });


        </script>
    @endsection

@endsection
