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
                <h3 class="card-title">Cart Items</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Brand</th>
                    <th>Created</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($carts as $k=>$val)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>{{ $val->user->name }}</td>
                    <td>{{ $val->product->name }}</td>
                    <td>{{ $currency->symbol }}@php echo number_format($val->price)@endphp.00</td>
                    <td>{{ $val->quantity }}</td>
                    <td>{{ $val->colors->color_code }}</td>
                    <td>{{ $val->sizes->size_name }}</td>
                    <td>{{ $val->brand }}</td>
                    <td>{{date("Y/m/d- h:i:A ", strtotime($val->created_at))}}</td>
                    <td>
                        <a type="button" href="{{ url('admin/view-order/'.$val->id) }}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
                        <a href="{{ url('admin/delete-orders/'.$val->id) }}" type="button" class="btn btn-danger" onclick="return confirm('Do you want to execute this command')"><i class="fas fa-trash-alt"></i></a>
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



