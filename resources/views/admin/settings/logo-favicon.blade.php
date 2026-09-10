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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('admin/store-logofav') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Logo & Favicon Setting</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Header Logo:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="logo" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @if ($errors->any('logo'))
                                        <small class="text-danger">{{ $errors->first('logo') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Footer Logo:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="logo2" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @if ($errors->any('logo2'))
                                        <small class="text-danger">{{ $errors->first('logo2') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Favicon:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="favicon" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @if ($errors->any('favicon'))
                                        <small class="text-danger">{{ $errors->first('favicon') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                    <h3 class="card-title">Images</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <center>
                            <img width="200px" @if($logofav)src="{{ asset('uploads/logofav/'.$logofav->logo) }}"@endif alt="image">
                            <p><b>Header Logo</b></p>
                        </center>
                        <hr>
                        <center>
                            <img width="200px" style="background-color: black;" @if($logofav)src="{{ asset('uploads/logofav/'.$logofav->logo2) }}"@endif alt="image">
                            <p><b>Footer Logo</b></p>
                        </center>
                        <hr>
                        <center>
                            <img width="50px" @if($logofav)src="{{ asset('uploads/logofav/'.$logofav->favicon) }}"@endif alt="image">
                            <p><b>Favicon</b></p>
                        </center>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-success float-right">Save Setting</button>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @section('scripts')

        <script>
            $(function () {
                bsCustomFileInput.init();
            });
        </script>
    @endsection

@endsection
