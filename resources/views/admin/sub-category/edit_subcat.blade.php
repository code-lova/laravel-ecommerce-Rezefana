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


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Sub Categories</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ url('admin/update-subcategory/'.$val->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $val->id }}">
                        <div class="row">
                            <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $val->name }}" required>
                                @if ($errors->any('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $val->slug }}"  required>
                                    @if ($errors->any('slug'))
                                        <small class="text-danger">{{ $errors->first('slug') }}</small>
                                    @endif
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="3" required>{!! $val->description !!}</textarea>
                                @if ($errors->any('description'))
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                @endif
                            </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="cat_id" required>
                                        <option value="">--Select a Category--</option>
                                        @foreach ($cat as $category)
                                            <option value="{{ $category->id }}" {{ $val->cat_id == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->any('slug'))
                                        <small class="text-danger">{{ $errors->first('slug') }}</small>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <hr>
                        <h4>SEO DATA</h4>
                        <div class="row">
                            <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $val->meta_title }}" required>
                                @if ($errors->any('meta_title'))
                                    <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                                @endif
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Custom Status</label>
                                <select class="custom-select" name="status">
                                <option value="1" {{ $val->status == '1' ? 'selected':'' }}>Active</option>
                                <option value="0" {{ $val->status == '0' ? 'selected':'' }}>Not-Active</option>
                                </select>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta Keyword</label>
                                <textarea class="form-control" name="meta_keyword" rows="3" required>{!! $val->meta_keyword !!}</textarea>
                                @if ($errors->any('meta_keyword'))
                                    <small class="text-danger">{{ $errors->first('meta_keyword') }}</small>
                                @endif
                            </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                <label>Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="3" required>{!! $val->meta_description !!}</textarea>
                                @if ($errors->any('meta_description'))
                                    <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                                @endif
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <a href="{{ url('admin/sub-category') }}" type="button" class="btn btn-default">Go Back</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @section('datatable')

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endsection
@endsection
