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
                <h3 class="card-title">Users Wishlists</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($wishlist as $k=>$val)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>{{ $val->user->name }}</td>
                    <td>{{ $val->product->name }}</td>
                    <td>{{date("Y/m/d- h:i:A ", strtotime($val->created_at))}}</td>
                    <td>
                        <a href="{{ url('admin/delete-wishlist/'.$val->id) }}" type="button" class="btn btn-danger" onclick="return confirm('Do you want to execute this command')"><i class="fas fa-trash-alt"></i></a>
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

       

    @endsection
@endsection



