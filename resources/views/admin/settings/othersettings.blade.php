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

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                          <h4>Nav Tabs inside <small>Other Page Settings</small></h4>
                        </div>
                    </div>
                    <!-- ./row -->
                    <div class="row">
                        <div class="col-12 col-sm-12">
                          <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="custom-tabs-one-ads-tab" data-toggle="pill" href="#custom-tabs-one-ads" role="tab" aria-controls="custom-tabs-one-ads" aria-selected="true">Call to Action</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-one-sponsors-tab" data-toggle="pill" href="#custom-tabs-one-sponsors" role="tab" aria-controls="custom-tabs-one-sponsors" aria-selected="false">Other Settings</a>
                                </li>
                              </ul>
                            </div>
                            <div class="card-body">
                              <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-ads" role="tabpanel" aria-labelledby="custom-tabs-one-ads-tab">
                                    <form id="CtaForm" method="POST">
                                        <div id="res"></div>
                                        <br>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputName">Call to action heading 1 </label>
                                                <input type="text" @if($cta)value="{{ $cta->cta_heading_1 }}" @endif name="cta_heading_1" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputDescription">Call to action Sub heading 1</label>
                                                <input type="text" @if($cta)value="{{ $cta->cta_sub_1 }}" @endif name="cta_sub_1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputName">Call to action heading 2 </label>
                                                <input type="text" @if($cta)value="{{ $cta->cta_heading_2 }}" @endif name="cta_heading_2" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputDescription">Call to action Sub heading 2</label>
                                                <input type="text" @if($cta)value="{{ $cta->cta_sub_2 }}" @endif name="cta_sub_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputName">Call to action heading 3 </label>
                                                <input type="text" @if($cta)value="{{ $cta->cta_heading_3 }}" @endif name="cta_heading_3" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputDescription">Call to action Sub heading 3</label>
                                                <input type="text" @if($cta)value="{{ $cta->cta_sub_3 }}" @endif name="cta_sub_3" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputName">Call to action heading 4 </label>
                                                <input type="text" @if($cta)value="{{ $cta->cta_heading_4 }}" @endif name="cta_heading_4" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputDescription">Call to action Sub heading 4</label>
                                                <input type="text" @if($cta)value="{{ $cta->cta_sub_4 }}" @endif name="cta_sub_4" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-success" type="submit">Save Setting</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-sponsors" role="tabpanel" aria-labelledby="custom-tabs-one-sponsors-tab">
                                   Other Settings... here
                                </div>

                              </div>
                            </div>
                            <!-- /.card -->
                          </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
 </div>

    @section('scripts')
        <script>
            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('submit', '#CtaForm', function (e) {
                    e.preventDefault();

                    let formData = new FormData($('#CtaForm')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/cta",
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            //console.log(formData);
                            if(response.status == 400)
                            {
                                $('#res').html("");
                                let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                                $("#res").html(error);
                            }
                            else{
                                $('#res').html("");
                                toastr.success(response.message);
                            }
                        }
                    });

                });

                // $(document).on('submit', '#SponsorSwitcher', function (e) {
                //     e.preventDefault();

                //     let formData = new FormData($('#SponsorSwitcher')[0]);

                //     $.ajax({
                //         type: "POST",
                //         url: "/admin/sponsor",
                //         data: formData,
                //         dataType: "json",
                //         contentType: false,
                //         processData: false,
                //         success: function (response) {

                //             if(response.status == 400){
                //                 $('#resp').html("");
                //                 let error = '<span class="text-danger">'+response.msg+'</span>';
                //                 $('#resp').html(error);
                //             }
                //             else{
                //                 $('#resp').html("");
                //                 toastr.success(response.message);
                //             }
                //         }
                //     });
                // });




            });
        </script>

    @endsection


@endsection
