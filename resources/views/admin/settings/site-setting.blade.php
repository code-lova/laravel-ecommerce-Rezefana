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

                    <form action="{{ url('admin/store_site_setting') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">General Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="res"></div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Website Title</label>
                                            <input type="text" name="title" @if($settings)value="{{ $settings->title }}" @endif class="form-control form-control-border">
                                            @if ($errors->any('title'))
                                                <small class="text-danger">{{ $errors->first('title') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Company/WebApp Name</label>
                                            <input type="text" name="site_name" @if($settings)value="{{ $settings->site_name }}" @endif class="form-control form-control-border">
                                            @if ($errors->any('site_name'))
                                                <small class="text-danger">{{ $errors->first('site_name') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Opening Hours</label>
                                            <input type="text" name="opening_days" @if($settings)value="{{ $settings->opening_days }}" @endif class="form-control form-control-border">
                                            @if ($errors->any('opening_days'))
                                                <small class="text-danger">{{ $errors->first('opening_days') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Live Chat ID</label>
                                            <input type="text" name="live_chat_id" @if($settings)value="{{ $settings->live_chat_id }}" @endif class="form-control form-control-border">
                                            @if ($errors->any('live_chat_id'))
                                                <small class="text-danger">{{ $errors->first('live_chat_id') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Company Email</label>
                                            <input type="email" name="email" @if($settings)value="{{ $settings->email }}" @endif class="form-control form-control-border">
                                            @if ($errors->any('email'))
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Company Mobile</label>
                                            <input type="text" name="mobile" max="16" @if($settings)value="{{ $settings->mobile }}" @endif class="form-control form-control-border">
                                            @if ($errors->any('mobile'))
                                                <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Company Address</label>
                                            <textarea class="form-control form-control-border" rows="3" name="address">@if($settings){{ $settings->address }} @endif</textarea>
                                            @if ($errors->any('address'))
                                                <small class="text-danger">{{ $errors->first('address') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">WebSite Description</label>
                                            <textarea class="form-control form-control-border" rows="3" name="site_desc">@if($settings){{ $settings->site_desc }} @endif</textarea>
                                            @if ($errors->any('site_desc'))
                                                <small class="text-danger">{{ $errors->first('site_desc') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">SEO Keywords</label>
                                            <textarea class="form-control form-control-border" rows="5" name="keywords">@if($settings){{ $settings->keywords }} @endif</textarea>
                                            @if ($errors->any('keywords'))
                                                <small class="text-danger">{{ $errors->first('keywords') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h4>Switch Section</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Registration ON/OFF</label>
                                            <select class="custom-select form-control-border" name="registration">
                                                <option value="1"{{ $settings->registration == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->registration == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Email Notify ON/OFF </label>
                                            <select class="custom-select form-control-border" name="email_notify">
                                                <option value="1"{{ $settings->email_notify == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->email_notify == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Payment ON/OFF</label>
                                            <select class="custom-select form-control-border" name="payment">
                                                <option value="1"{{ $settings->payment == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->payment == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Seller ON/OFF </label>
                                            <select class="custom-select form-control-border" name="seller">
                                                <option value="1"{{ $settings->seller == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->seller == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn btn-success">SAVE SETTING!</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

 </div>

@endsection
