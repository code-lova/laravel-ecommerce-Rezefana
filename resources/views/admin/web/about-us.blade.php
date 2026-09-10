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
            <div id="section">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Us</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="AboutUsSettingForm" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div id="respon"></div>
                                    <br>
                                    <div class="form-group">
                                        <label for="inputName">Banner Title </label>
                                        <input type="text" placeholder="Enter Heading" @if($about)value="{{ $about->banner_title }}" @endif name="banner_title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Banner Sub Title</label>
                                        <input type="text" placeholder="Enter banner_sub_title" @if($about)value="{{ $about->banner_sub_title }}" @endif name="banner_sub_title" class="form-control">
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Banner Image</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="banner" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Image 1</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="img_1" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Image 2</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="img_2" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>About Us Header Section</h4>
                                    <div class="form-group">
                                        <label for="inputName">Our Vision Details</label>
                                        <textarea id="mysummernote" placeholder="Enter details here..."  name="our_vision" class="form-control" rows="7">@if($about){{ $about->our_vision }} @endif</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Our Mission Details</label>
                                        <textarea id="mysummernote2" placeholder="Enter details here..."  name="our_mission" class="form-control" rows="7">@if($about){{ $about->our_mission }} @endif</textarea>
                                    </div>
                                    <hr>
                                    <h4>Who We are Header Section</h4>
                                    <div class="form-group">
                                        <label for="inputDescription">First Section</label>
                                        <textarea id="mysummernote3" placeholder="Enter details here..."  name="who_we_are_1" class="form-control" rows="7">@if($about){{ $about->who_we_are_1 }} @endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Section Section</label>
                                        <textarea id="mysummernote4" placeholder="Enter details here..."  name="who_we_are_2" class="form-control" rows="7">@if($about){{ $about->who_we_are_2 }} @endif</textarea>
                                    </div>


                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success float-right">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4">
                        <div id="sections">
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
                                    <img width="300px" @if($about)src="{{ asset('uploads/about/'.$about->banner) }}"@endif alt="image">
                                </center>
                                <hr>
                                <center>
                                    <img width="300px" @if($about)src="{{ asset('uploads/about/'.$about->img_1) }}"@endif alt="image">
                                </center>
                                <hr>
                                <center>
                                    <img width="300px" @if($about)src="{{ asset('uploads/about/'.$about->img_2) }}"@endif alt="image">
                                </center>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @section('scripts')

        <script>


            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                    $(document).on('submit', '#AboutUsSettingForm', function (e) {
                    e.preventDefault();

                    let formData = new FormData($('#AboutUsSettingForm')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/store-about",
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            //console.log(formData);
                            if(response.status == 400)
                            {
                                $('#respon').html("");
                                let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                                $("#respon").html(error);
                            }
                            else{
                                $('#respon').html("");
                                $('#sections').load(location.href+' #sections');
                                toastr.success(response.message);
                            }
                        }
                    });

                });

            });

            $(function () {
                bsCustomFileInput.init();
            });
        </script>

    @endsection

@endsection
