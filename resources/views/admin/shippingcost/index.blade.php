@extends('layouts.admin')

@section('content')

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Add New Shipping Cost</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/add-shippingcost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                            <div class="form-group">
                                <label>State</label>
                                <select class="form-control" name="state_id" required>
                                    <option value="">--Select State--</option>
                                    @foreach ($state as $states)
                                        <option value="{{ $states->id }}">{{ $states->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any('state_id'))
                                    <small class="text-danger">{{ $errors->first('state_id') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required>
                                @if ($errors->any('amount'))
                                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Shipping Cost</button>
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
          {{-- <div class="col-sm-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">Add Category</button>
          </div> --}}
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
                    <th>State</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($shipcost as $k=>$val)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>{{ $val->state->name }}</td>
                    <td>{{ $currency->symbol }} @php echo number_format($val->amount)@endphp.00</td>
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
                            <form action="{{ url('admin/delete-shippingcost/'.$val->id) }}" method="POST">
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
                          <h4 class="modal-title">Edit</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('admin/edit-shippingcost/'.$val->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $val->id }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                    <!-- text input -->
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control" name="state_id" required>
                                                <option value="">--Select State--</option>
                                                @foreach ($state as $states)
                                                    <option value="{{ $states->id }} "{{ $states->id == $val->state_id ? 'selected':''  }}>{{ $states->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->any('state_id'))
                                                <small class="text-danger">{{ $errors->first('state_id') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <!-- text input -->
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text" class="form-control" value="{{ $val->amount }}" name="amount" placeholder="Enter Amount" required>
                                            @if ($errors->any('amount'))
                                                <small class="text-danger">{{ $errors->first('amount') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Shipping Cost</button>
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
                <h4 style="background: #dd4b39;color:#fff;padding:10px 20px;margin-top: 30px;">
                    NB: If a state does not exist in the above list, the following
                    "Rest of the state" shipping cost will be applied upon that.
                </h4>

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
