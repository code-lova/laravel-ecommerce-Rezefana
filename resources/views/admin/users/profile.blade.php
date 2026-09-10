@extends('layouts.admin')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div id="station">
                        <div class="card-body box-profile" >
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('assets/dist/img/avatar.png') }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $userProfile->name }}</h3>

                            @if ($userProfile->customer_type == 0)
                                <p class="text-muted text-center">Buyer</p>
                            @else
                                <p class="text-muted text-center">Seller</p>
                            @endif

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                <b>IP Address:</b> <a class="float-right"> {{ $userProfile->ip_address }}</a>
                                </li>

                                <li class="list-group-item">
                                <b>Created:</b> <a class="float-right">{{ $userProfile->created_at }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Updated:</b> <a class="float-right">{{ $userProfile->updated_at }}</a>
                                </li>
                            </ul>
                            @if ($userProfile->is_active == 1)
                                <button type="button" value="{{ $userProfile->id }}" class="blockUserBtn btn btn-danger btn-block"><b>Block User Account</b></button>
                            @else
                                <button type="button" value="{{ $userProfile->id }}" class="UnblockUserBtn btn btn-success btn-block"><b>Un-Block User Account</b></button>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Network</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Last Seen</strong>
                        <p class="text-muted">{{ Carbon\Carbon::parse($userProfile->last_seen)->diffForHumans() }}</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Status</strong>
                        @if(Cache::has('User-is-Online' . $userProfile->id))
                            <p>
                                <span class="badge badge-success">ONLINE</span>
                            </p>
                        @else
                            <p>
                                <span class="badge badge-danger">OFFLINE</span>
                            </p>
                        @endif
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i>Registered Time</strong>
                        <p class="text-muted">Email: {{ $userProfile->email_time }}.</p>
                        <p class="text-muted">Phone: {{ $userProfile->phone_time }}.</p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="{{ url('admin/customers') }}">Go Back </a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">
                            <div id="res"></div>
                            <br>
                            <form class="form-horizontal" id="UpdateUserForm" method="POST">
                                <input type="hidden" value="{{ $userProfile->id }}" id="user_id">

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="{{ $userProfile->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" value="{{ $userProfile->email }}" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="role_as">
                                            <option value="1" {{ $userProfile->role_as == '1' ? 'selected': '' }}>ADMIN ACCOUNT</option>
                                            <option value="0" {{ $userProfile->role_as == '0' ? 'selected': '' }}>USER ACCOUNT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Account Type</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="customer_type">
                                            <option value="1" {{ $userProfile->customer_type == '1' ? 'selected': '' }}>SELLER</option>
                                            <option value="0" {{ $userProfile->customer_type == '0' ? 'selected': '' }}>BUYER</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Update Setting</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->





</div>

@section('scripts')

    @include('admin.users.update_js')

@endsection



@endsection
