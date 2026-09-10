<div>

    @include('livewire.admin.sizes.livewire_modelform')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Size List</h1>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">Add Size</button>
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
                <h3 class="card-title">Product Sizes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Size Name</th>
                    <th>Size code</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($size as $k => $sizes)
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td>{{ $sizes->size_name }}</td>
                            <td>{{ $sizes->size_code }}</td>

                            <td>
                                <a href="#" wire:click="editSize({{ $sizes->id }})" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update-modal-lg"><i class="fas fa-edit"></i>Update</a>
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


