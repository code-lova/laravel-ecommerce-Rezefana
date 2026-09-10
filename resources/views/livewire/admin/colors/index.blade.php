<div>

    @include('livewire.admin.colors.livewire_modelform')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Color List</h1>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">Add Brand</button>
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
                <h3 class="card-title">Product Colors</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Color Name</th>
                    <th>color code</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($colors as $k => $color)
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td>{{ $color->color_name }}</td>
                            <td>{{ $color->color_code }}</td>

                            <td>
                                <a href="#" wire:click="editColor({{ $color->id }})" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update-modal-lg"><i class="fas fa-edit"></i>Update</a>
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


</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#modal-lg').modal('hide');
            $('#update-modal-lg').modal('hide');
        });
    </script>
@endpush


