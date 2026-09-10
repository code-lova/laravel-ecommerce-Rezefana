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
        <form action="{{ url('admin/store-ads') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Adverts Banner Setting</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Advert 1:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="adv_1" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span>Note: Image must have a dimension 1170 x 150px</span>
                                    @if ($errors->any('adv_1'))
                                        <small class="text-danger">{{ $errors->first('adv_1') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4><b>SECOND Ads Image</b></h4>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Advert 2:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="adv_2" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span>Note: Image must have a dimension 1170 x 150px</span>
                                    @if ($errors->any('adv_2'))
                                        <small class="text-danger">{{ $errors->first('adv_2') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4><b>THIRD Ads Image</b></h4>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Advert 3:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="adv_3" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span>Note: Image must have a dimension 1170 x 150px</span>
                                    @if ($errors->any('adv_3'))
                                        <small class="text-danger">{{ $errors->first('adv_3') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4><b>FOURTH Ad Image</b></h4>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Advert 4:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="adv_4" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span>Note: Image must have a dimension 260 x 1000px</span>
                                    @if ($errors->any('adv_4'))
                                        <small class="text-danger">{{ $errors->first('adv_4') }}</small>
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
                        <h3 class="card-title">Banner Images</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="card-body">
                            <center>
                                <img width="450" height="100" @if($ads)src="{{ asset('uploads/ads/'.$ads->adv_1) }}"@endif alt="image">
                                <p><b>First ads Image</b></p>
                            </center>
                            <hr>
                            <center>
                                <img width="450" height="100" @if($ads)src="{{ asset('uploads/ads/'.$ads->adv_2) }}"@endif alt="image">
                                <p><b>Second ads Image</b></p>
                            </center>
                            <hr>
                            <center>
                                <img width="450" height="100" @if($ads)src="{{ asset('uploads/ads/'.$ads->adv_3) }}"@endif alt="image">
                                <p><b>Third ads Image</b></p>
                            </center>
                            <hr>
                            <center>
                                <img width="200" height="550" @if($ads)src="{{ asset('uploads/ads/'.$ads->adv_4) }}"@endif alt="image">
                                <p><b>Fourth ads Image</b></p>
                            </center>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right">Save Setting</button>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @section('script')

        <script>
            $(function () {
                bsCustomFileInput.init();
            });
        </script>
    @endsection

@endsection
