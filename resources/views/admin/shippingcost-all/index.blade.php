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
                <h3 class="card-title">All Shipping Cost- Shipping Cost (Rest of the state)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h4 style="background: #dd4b39;color:#fff;padding:10px 20px;">
                    NB: The following "Rest of the state" have their shipping cost when price is set.
                </h4>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Edit amount of (Rest of the state)</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('admin/shipping-cost-all') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Set Amount</label>
                                    <input type="text" name="amount" @if($shipcostall)value="{{ $shipcostall->amount }}" @endif class="form-control form-control-border">
                                    @if ($errors->any('amount'))
                                        <small class="text-danger">{{ $errors->first('amount') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-success">Save Shipping Cost!</button>
                        </div>
                    </form>
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
