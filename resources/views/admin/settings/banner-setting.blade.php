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
        <form action="{{ url('admin/store-banner') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Top Banner Setting</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">First Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner1_first_note }}" @endif name="banner1_first_note" class="form-control">
                            @if ($errors->any('banner1_first_note'))
                                <small class="text-danger">{{ $errors->first('banner1_first_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Second Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner1_second_note }}" @endif name="banner1_second_note" class="form-control">
                            @if ($errors->any('banner1_second_note'))
                                <small class="text-danger">{{ $errors->first('banner1_second_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Third Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner1_third_note }}" @endif name="banner1_third_note" class="form-control">
                            @if ($errors->any('banner1_third_note'))
                                <small class="text-danger">{{ $errors->first('banner1_third_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Fourth Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner1_fourth_note }}" @endif name="banner1_fourth_note" class="form-control">
                            @if ($errors->any('banner2_first_note'))
                                <small class="text-danger">{{ $errors->first('banner2_first_note') }}</small>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">banner 1:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="banner1_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span>Note: Image must have a dimension 376 x 500px</span>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4><b>SECOND banner</b></h4>
                        <div class="form-group">
                            <label for="inputName">First Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner2_first_note }}" @endif name="banner2_first_note" class="form-control">
                            @if ($errors->any('banner2_first_note'))
                                <small class="text-danger">{{ $errors->first('banner2_first_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Second Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner2_second_note }}" @endif name="banner2_second_note" class="form-control">
                            @if ($errors->any('banner2_second_note'))
                                <small class="text-danger">{{ $errors->first('banner2_second_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Third Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner2_third_note }}" @endif name="banner2_third_note" class="form-control">
                            @if ($errors->any('banner2_third_note'))
                                <small class="text-danger">{{ $errors->first('banner2_third_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Fourth Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner2_fourth_note }}" @endif name="banner2_fourth_note" class="form-control">
                            @if ($errors->any('banner2_fourth_note'))
                                <small class="text-danger">{{ $errors->first('banner2_fourth_note') }}</small>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">banner 2:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="banner2_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span>Note: Image must have a dimension 376 x 240px</span>

                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4><b>THIRD banner</b></h4>
                        <div class="form-group">
                            <label for="inputName">First Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner3_first_note }}" @endif name="banner3_first_note" class="form-control">
                            @if ($errors->any('banner3_first_note'))
                                <small class="text-danger">{{ $errors->first('banner3_first_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Second Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner3_second_note }}" @endif name="banner3_second_note" class="form-control">
                            @if ($errors->any('banner3_second_note'))
                                <small class="text-danger">{{ $errors->first('banner3_second_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Third Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner3_third_note }}" @endif name="banner3_third_note" class="form-control">
                            @if ($errors->any('banner3_third_note'))
                                <small class="text-danger">{{ $errors->first('banner3_third_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Fourth Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner3_fourth_note }}" @endif name="banner3_fourth_note" class="form-control">
                            @if ($errors->any('banner3_fourth_note'))
                                <small class="text-danger">{{ $errors->first('banner3_fourth_note') }}</small>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">banner 3:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="banner3_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span>Note: Image must have a dimension 376 x 240px</span>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4><b>FOURTH BANNER</b></h4>
                        <div class="form-group">
                            <label for="inputName">First Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner4_first_note }}" @endif name="banner4_first_note" class="form-control">
                            @if ($errors->any('banner4_first_note'))
                                <small class="text-danger">{{ $errors->first('banner4_first_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Second Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner4_second_note }}" @endif name="banner4_second_note" class="form-control">
                            @if ($errors->any('banner4_second_note'))
                                <small class="text-danger">{{ $errors->first('banner4_second_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Third Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner4_third_note }}" @endif name="banner4_third_note" class="form-control">
                            @if ($errors->any('banner4_third_note'))
                                <small class="text-danger">{{ $errors->first('banner4_third_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Fourth Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner4_fourth_note }}" @endif name="banner4_fourth_note" class="form-control">
                            @if ($errors->any('banner4_fourth_note'))
                                <small class="text-danger">{{ $errors->first('banner4_fourth_note') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputName">Fifth Note</label>
                            <input type="text" id="inputName" @if($banner)value="{{ $banner->banner4_fifth_note }}" @endif name="banner4_fifth_note" class="form-control">
                            @if ($errors->any('banner4_fifth_note'))
                                <small class="text-danger">{{ $errors->first('banner4_fifth_note') }}</small>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">banner 4:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="banner4_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <span>Note: Image must have a dimension 376 x 500px</span>
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
                                <img width="400" height="450" @if($banner)src="{{ asset('uploads/banner/'.$banner->banner1_image) }}"@endif alt="image">
                                <p><b>First banner Image</b></p>
                            </center>
                            <hr>
                            <center>
                                <img width="450" height="250" @if($banner)src="{{ asset('uploads/banner/'.$banner->banner2_image) }}"@endif alt="image">
                                <p><b>Second banner Image</b></p>
                            </center>
                            <hr>
                            <center>
                                <img width="450" height="250" @if($banner)src="{{ asset('uploads/banner/'.$banner->banner3_image) }}"@endif alt="image">
                                <p><b>Third banner Image</b></p>
                            </center>
                            <hr>
                            <center>
                                <img width="350" height="450" @if($banner)src="{{ asset('uploads/banner/'.$banner->banner4_image) }}"@endif alt="image">
                                <p><b>Fourth banner Image</b></p>
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
