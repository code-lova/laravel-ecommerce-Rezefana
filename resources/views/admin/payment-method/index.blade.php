@extends('layouts.admin')

@section('content')

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add New Payment Method</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('admin/add-paymentmethod') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-10">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Payment Name</label>
                        <input type="text" class="form-control" name="payment_name" placeholder="Enter Name" required>
                        @if ($errors->any('payment_name'))
                            <small class="text-danger">{{ $errors->first('payment_name') }}</small>
                        @endif
                    </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-10">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Payment Details</label>
                        <textarea class="form-control" name="payment_details" rows="4" placeholder="Enter details" required></textarea>
                        @if ($errors->any('payment_details'))
                            <small class="text-danger">{{ $errors->first('payment_details') }}</small>
                        @endif
                    </div>
                    </div>

                </div>
                <hr>
                <h4>ACCORDION SECTION</h4>
                <div class="row">
                    <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>HREF</label>
                        <input type="text" class="form-control" name="href" placeholder="Enter href for accordion" required>
                        @if ($errors->any('href'))
                            <small class="text-danger">{{ $errors->first('href') }}</small>
                        @endif
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label>Status Action</label>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3" >
                            <label class="custom-control-label" for="customSwitch3">ON/OFF</label>
                        </div>
                    </div>
                    </div>
                </div>


                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Payment Method</button>
                </div>
            </form>
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
      <div class="col-sm-6">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">Add Payment Method</button>
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
            <h3 class="card-title">Categories</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>S/N</th>
                <th>Payment Name</th>
                <th>Payment Detail(s)</th>
                <th>Href</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($payment as $k=>$val)
              <tr>
                <td>{{ ++$k }}</td>
                <td>{{ $val->payment_name }}</td>
                <td>{{ $val->payment_details }}</td>
                <td>{{ $val->href }}</td>
                <td>
                    @if ($val->status == 1)
                        <span class="badge badge-success">ACTIVE</span>
                    @else
                        <span class="badge badge-danger">NOT-ACTIVE</span>
                    @endif
                </td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-lg{{ $val->id }}"><i class="fas fa-edit"></i>Update</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{ $val->id }}"><i class="fas fa-trash-alt"></i>Delete</button>
                </td>
              </tr>

              <!-- /DElete modal -->
              <div class="modal fade" id="modal-danger{{ $val->id }}">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/delete-payemntmehod/'.$val->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <p>Are You Sure You want to delete this data ? Data can't be retrieve.</p>
                            <input type="hidden" value="{{ $val->id }}">
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-light">Yes.Delete!</button>
                            </div>
                        </form>
                    </div>

                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

              <!-- /.Edit modal-content -->
              <div class="modal fade" id="modal-lg{{ $val->id }}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Payment Method</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/edit-payment/'.$val->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $val->id }}">
                            <div class="row">
                                <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Payment Name</label>
                                    <input type="text" class="form-control" name="payment_name" value="{{ $val->payment_name }}" required>
                                    @if ($errors->any('payment_name'))
                                        <small class="text-danger">{{ $errors->first('payment_name') }}</small>
                                    @endif
                                </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Payment Details</label>
                                    <textarea class="form-control" name="payment_details" rows="3" required>{!! $val->payment_details !!}</textarea>
                                    @if ($errors->any('payment_details'))
                                        <small class="text-danger">{{ $errors->first('payment_details') }}</small>
                                    @endif
                                </div>
                                </div>

                            </div>
                            <hr>
                            <h4>Accordion DATA</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>HREF</label>
                                    <input type="text" class="form-control" name="href" value="{{ $val->href }}" required>
                                    @if ($errors->any('href'))
                                        <small class="text-danger">{{ $errors->first('href') }}</small>
                                    @endif
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Custom Status</label>
                                    <select class="custom-select" name="status">
                                      <option value="1" {{ $val->status == '1' ? 'selected':'' }}>Active</option>
                                      <option value="0" {{ $val->status == '0' ? 'selected':'' }}>Not-Active</option>
                                    </select>
                                </div>
                                </div>
                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                        </form>
                    </div>

                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

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
