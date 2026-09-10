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
                <h3 class="card-title">List Of Currencies</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Country</th>
                          <th>Currency</th>
                          <th>Name</th>
                          <th>Symbol</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                          @foreach ($currency as $k=>$val)
                              <tr>
                                  <td>{{ ++$k }}</td>
                                  <td>{{ $val->country }}</td>
                                  <td>#{{ $val->currency }}</td>
                                  <td>{{ $val->name }}</td>
                                  <td>{{ $val->symbol }}</td>
                                  <td>
                                      @if ($val->status == 1)
                                          <span class="badge badge-success">In-Use</span>
                                      @else
                                          <span class="badge badge-danger">Not-Used</span>
                                      @endif
                                  </td>
                                  <td>
                                      @if ($val->status == 0)
                                          <a href="{{ url('admin/activate-currency/'.$val->id) }}" type="button" class="btn btn-sm btn-primary">Activate</a>
                                      @endif
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
