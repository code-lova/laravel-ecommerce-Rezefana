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
          <div class="col-sm-6">
            <a href="{{ url('admin/create-product') }}" type="button" class="btn btn-primary float-right">Add Product</a>
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
                <h3 class="card-title">List of Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Old Price</th>
                    <th>New Price</th>
                    <th>Quantity</th>
                    <th>Trending</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $k => $val )
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->category->name }}</td>
                            <td>{{ $currency->symbol }}@php echo number_format($val->original_price)@endphp.00</td>
                            <td>{{ $currency->symbol }}@php echo number_format($val->selling_price)@endphp.00</td>
                            <td>{{ $val->quantity }}</td>
                            <td>
                                @if ($val->trending == 1)
                                    <span class="badge badge-success">Is Trending</span>
                                @else
                                    <span class="badge badge-danger">Not Trending</span>
                                @endif
                            </td>
                            <td>
                                @if ($val->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Not-Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/market/products/'.$val->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('admin/market/product/'.$val->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this data.?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
