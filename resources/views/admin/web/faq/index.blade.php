@extends('layouts.admin')

@section('content')


    @include('admin.web.faq.update-model')
    @include('admin.web.faq.delete-model')



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
            <div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Help and Faq Page</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="FaqHelpForm" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div id="resxop"></div>
                                    <br>
                                    <div class="form-group">
                                        <label for="inputName">Faq HTTP</label>
                                        <input type="text" placeholder="Enter name" name="http" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Faq Head</label>
                                        <input type="text" placeholder="Enter name" name="head_title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Faq Question</label>
                                        <input type="text" placeholder="Enter Question?" name="question" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label for="inputName">Faq Answer</label>
                                        <textarea placeholder="Enter Answer" name="answer" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success float-right">Save FaQ</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-8">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Help & FAQ Settings</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="width: 30px">HTTP</th>
                                        <th>Head Title</th>
                                        <th>Question</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($help as $k=>$val)
                                            <tr>
                                                <td>{{ ++$k }}</td>
                                                <td>{{$val->http}}</td>
                                                <td>{{$val->head_title}}</td>
                                                <td>{{$val->question}}</td>
                                                <td>
                                                    <button class="btn btn-info editHelpBtn" data-toggle="modal" data-target="#UpdateHelpModal" value="{{ $val->id }}"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-danger deleteHelpBtn" value="{{ $val->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                    No Data Yet
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div>
                                    {{ $help->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @section('scripts')
         @include('admin.web.web_js')

        <script>
            $(function () {
                bsCustomFileInput.init();
            });
        </script>
    @endsection

@endsection
