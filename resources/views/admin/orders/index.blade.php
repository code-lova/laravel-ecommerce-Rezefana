@extends('layouts.admin')

@section('content')
    <!-- /DElete modal -->
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
                <p>Are You Sure You want to delete this data ? Data can't be retrieve.</p>
                <input type="hidden" id="del_order_id">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="delete_model_btn btn btn-outline-light">Yes.Delete!</button>
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
            <h1>Order List</h1>
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
                <h3 class="card-title">Users Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Product Ref</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Brand</th>
                    <th>Payment Method</th>
                    <th>Created</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $k=>$val)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>{{ $val->user->name }}</td>
                    <td>{{ $val->product->name }}</td>
                    <td>
                        @if ($val->payment_status == 0)
                            <span class="badge badge-warning">PENDING</span>
                        @elseif ($val->payment_status == 1)
                            <span class="badge badge-info">PROCESSING</span>
                        @elseif ($val->payment_status == 2)
                            <span class="badge badge-success">PAID</span>
                        @elseif ($val->payment_status == 3)
                            <span class="badge badge-danger">DECLINED</span>
                        @endif
                    </td>
                    <td>
                        @if ($val->delivery_status == 0)
                            <span class="badge badge-warning">Order Placed</span>
                        @elseif ($val->delivery_status == 1)
                            <span class="badge badge-info">Order in Progress</span>
                        @elseif ($val->delivery_status == 2)
                            <span class="badge badge-success">Shipped</span>
                        @elseif ($val->delivery_status == 3)
                            <span class="badge badge-danger">Delivered</span>
                        @endif
                    </td>
                    <td>#{{ $val->reference }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $currency->symbol }}@php echo number_format($val->price)@endphp.00</td>
                    <td>{{ $val->quantity }}</td>
                    <td>{{ $val->colors->color_code }}</td>
                    <td>{{ $val->sizes->size_name }}</td>
                    <td>{{ $val->brand }}</td>
                    <td>{{ $val->method }}</td>
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



