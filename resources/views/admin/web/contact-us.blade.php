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
                                <h3 class="card-title">Contact Us</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="ContactUsSettingForm" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div id="respon"></div>
                                    <br>
                                    <div class="form-group">
                                        <label for="inputName">Banner Title </label>
                                        <input type="text" placeholder="Enter Heading" @if($contact)value="{{ $contact->banner_title }}" @endif name="banner_title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Banner Sub Title</label>
                                        <input type="text" placeholder="Enter banner_sub_title" @if($contact)value="{{ $contact->banner_sub_title }}" @endif name="banner_sub_title" class="form-control">
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Banner Image</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="banner" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                <span>Note: Image must have a dimension 376 x 240px</span>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <h4>Contact Us Section</h4>
                                    <div class="form-group">
                                        <label for="inputDescription">Contact Title</label>
                                        <input type="text" @if($contact)value="{{ $contact->contact_info }}" @endif name="contact_info" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Contact Details</label>
                                        <textarea id="mysummernote" placeholder="Enter details here..."  name="contact_info_details" class="form-control" rows="7">@if($contact){{ $contact->contact_info_details }} @endif</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Address Head</label>
                                        <input type="text" @if($contact)value="{{ $contact->address_head }}" @endif name="address_head" class="form-control">
                                    </div>

                                    <hr>
                                    <h4>Office time/Days Section</h4>
                                    <div class="form-group">
                                        <label for="inputDescription">Day time Head</label>
                                        <input type="text" @if($contact)value="{{ $contact->days_time_head }}" @endif name="days_time_head" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Days 1</label>
                                        <input type="text" @if($contact)value="{{ $contact->days1 }}" @endif name="days1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Time 1</label>
                                        <input type="text" @if($contact)value="{{ $contact->time1 }}" @endif name="time1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Days 2</label>
                                        <input type="text" @if($contact)value="{{ $contact->days2 }}" @endif name="days2" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Time 2</label>
                                        <input type="text" @if($contact)value="{{ $contact->time2 }}" @endif name="time2" class="form-control">
                                    </div>

                                    <hr>
                                    <h4>Question/contact form Section</h4>
                                    <div class="form-group">
                                        <label for="inputDescription">Question Title</label>
                                        <input type="text" @if($contact)value="{{ $contact->question_head }}" @endif name="question_head" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Question Details</label>
                                        <textarea id="mysummernote2" placeholder="Enter details here..."  name="question_details" class="form-control" rows="7">@if($contact){{ $contact->question_details }} @endif</textarea>
                                    </div>
                                    <hr>
                                    <h4>Store Details Section</h4>
                                    <div class="form-group">
                                        <label for="inputDescription">Store Title</label>
                                        <input type="text" @if($contact)value="{{ $contact->store_heading }}" @endif name="store_heading" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Store Details 1</label>
                                        <textarea id="mysummernote3" placeholder="Enter details here..."  name="store_details_1" class="form-control" rows="7">@if($contact){{ $contact->store_details_1 }} @endif</textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Store Img 1</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="store_img_1" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                <span>Note: Image must have a dimension 376 x 240px</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Store Details 2</label>
                                        <textarea id="mysummernote4" placeholder="Enter details here..."  name="store_details_2" class="form-control" rows="7">@if($contact){{ $contact->store_details_2 }} @endif</textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Store Img 2</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="store_img_2" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                <span>Note: Image must have a dimension 376 x 240px</span>
                                            </div>
                                        </div>
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
                                    <img width="300px" @if($contact)src="{{ asset('uploads/contact/'.$contact->banner) }}"@endif alt="image">
                                </center>
                                <hr>
                                <center>
                                    <img width="300px" @if($contact)src="{{ asset('uploads/contact/'.$contact->store_img_1) }}"@endif alt="image">
                                </center>
                                <hr>
                                <center>
                                    <img width="300px" @if($contact)src="{{ asset('uploads/contact/'.$contact->store_img_2) }}"@endif alt="image">
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

                    $(document).on('submit', '#ContactUsSettingForm', function (e) {
                    e.preventDefault();

                    let formData = new FormData($('#ContactUsSettingForm')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/store-contact",
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
