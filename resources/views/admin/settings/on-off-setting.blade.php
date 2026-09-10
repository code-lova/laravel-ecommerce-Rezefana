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
                          <h4>Nav Tabs inside Card Header <small>card-tabs / card-outline-tabs</small></h4>
                        </div>
                    </div>
                    <!-- ./row -->
                    <div class="row">
                        <div class="col-12 col-sm-12">
                          <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="custom-tabs-one-ads-tab" data-toggle="pill" href="#custom-tabs-one-ads" role="tab" aria-controls="custom-tabs-one-ads" aria-selected="true">Adverts Settting</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-one-sponsors-tab" data-toggle="pill" href="#custom-tabs-one-sponsors" role="tab" aria-controls="custom-tabs-one-sponsors" aria-selected="false">Sponsors</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-one-subscribers-tab" data-toggle="pill" href="#custom-tabs-one-subscribers" role="tab" aria-controls="custom-tabs-one-subscribers" aria-selected="false">Subscribers</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                                </li>
                              </ul>
                            </div>
                            <div class="card-body">
                              <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-ads" role="tabpanel" aria-labelledby="custom-tabs-one-ads-tab">
                                    <form id="AdSwitcher" method="POST">
                                        <div id="res"></div>
                                        <br>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="inputName">Advert 1:</label>
                                                <select class="custom-select form-control-border" name="ads_1">
                                                    <option value="1"{{ $switcher->ads_1 == '1' ? 'selected':'' }}>ON</option>
                                                    <option value="0"{{ $switcher->ads_1 == '0' ? 'selected':'' }}>OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="inputName">Advert 2:</label>
                                                <select class="custom-select form-control-border" name="ads_2">
                                                    <option value="1"{{ $switcher->ads_2 == '1' ? 'selected':'' }}>ON</option>
                                                    <option value="0"{{ $switcher->ads_2 == '0' ? 'selected':'' }}>OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="inputName">Advert 3:</label>
                                                <select class="custom-select form-control-border" name="ads_3">
                                                    <option value="1"{{ $switcher->ads_3 == '1' ? 'selected':'' }}>ON</option>
                                                    <option value="0"{{ $switcher->ads_3 == '0' ? 'selected':'' }}>OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="inputName">Advert 4:</label>
                                                <select class="custom-select form-control-border" name="ads_4">
                                                    <option value="1"{{ $switcher->ads_4 == '1' ? 'selected':'' }}>ON</option>
                                                    <option value="0"{{ $switcher->ads_4 == '0' ? 'selected':'' }}>OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-success" type="submit">Save Setting</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-sponsors" role="tabpanel" aria-labelledby="custom-tabs-one-sponsors-tab">
                                    <form id="SponsorSwitcher" method="POST">
                                        <div id="resp"></div>
                                        <br>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="inputName">On/Off Sponsors</label>
                                                <select class="custom-select form-control-border" name="sponsors">
                                                    <option value="1"{{ $switcher->sponsors == '1' ? 'selected':'' }}>ON</option>
                                                    <option value="0"{{ $switcher->sponsors == '0' ? 'selected':'' }}>OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-success" type="submit">Save Setting</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-subscribers" role="tabpanel" aria-labelledby="custom-tabs-one-subscribers-tab">
                                    <form id="SubscriberSwitcher" method="POST">
                                        <div id="resp"></div>
                                        <br>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="inputName">On/Off Subscriber</label>
                                                <select class="custom-select form-control-border" name="popup_subscriber">
                                                    <option value="1"{{ $switcher->popup_subscriber == '1' ? 'selected':'' }}>ON</option>
                                                    <option value="0"{{ $switcher->popup_subscriber == '0' ? 'selected':'' }}>OFF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-success" type="submit">Save Setting</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                    Enter other settings here.....
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

                $(document).on('submit', '#AdSwitcher', function (e) {
                    e.preventDefault();

                    let formData = new FormData($('#AdSwitcher')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/ads",
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

                $(document).on('submit', '#SponsorSwitcher', function (e) {
                    e.preventDefault();

                    let formData = new FormData($('#SponsorSwitcher')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/sponsor",
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (response) {

                            if(response.status == 400){
                                $('#resp').html("");
                                let error = '<span class="text-danger">'+response.msg+'</span>';
                                $('#resp').html(error);
                            }
                            else{
                                $('#resp').html("");
                                toastr.success(response.message);
                            }
                        }
                    });
                });

                $(document).on('submit', '#SubscriberSwitcher', function (e) {
                    e.preventDefault();

                    let formData = new FormData($('#SubscriberSwitcher')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/subscriber",
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (response) {

                            if(response.status == 400){
                                $('#resp').html("");
                                let error = '<span class="text-danger">'+response.msg+'</span>';
                                $('#resp').html(error);
                            }
                            else{
                                $('#resp').html("");
                                toastr.success(response.message);
                            }
                        }
                    });
                });



            });
        </script>

    @endsection


@endsection
