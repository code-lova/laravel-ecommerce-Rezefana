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
            <a href="{{ url('admin/market/products') }}" type="button" class="btn btn-default float-right">Go Back</a>
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
                <h3 class="card-title">Edit Fetched Product Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form action="{{ url('admin/market/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div id="res"></div>
                        <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Main Category</label>
                                        <select class="custom-select" name="cat_id" id="category_dd">
                                            <option value="">--Select Main Category--</option>
                                            @foreach ($category as $categories)
                                                <option value="{{ $categories->id }}" {{ $categories->id == $product->cat_id ? 'selected':'' }}>
                                                    {{ $categories->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->any('cat_id'))
                                            <small class="text-danger">{{ $errors->first('cat_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="custom-select" name="sub_cat_id" id="subcategory_dd">
                                            <option value="">--Choose a sub category--</option>
                                            @foreach ($sub_category as $subcategories)
                                                <option value="{{ $subcategories->id }}" {{ $subcategories->id == $product->sub_cat_id ? 'selected':'' }}>
                                                    {{ $subcategories->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->any('sub_cat_id'))
                                            <small class="text-danger">{{ $errors->first('sub_cat_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>End Category</label>
                                        <select class="custom-select" name="end_cat_id" id="endcategory_dd">
                                            <option value="">--Choose a End category--</option>
                                                @foreach ($end_category as $endcategories)
                                                    <option value="{{ $endcategories->id }}" {{ $endcategories->id == $product->end_cat_id ? 'selected':'' }}>
                                                        {{ $endcategories->name }}
                                                    </option>
                                                @endforeach
                                        </select>
                                        @if ($errors->any('end_cat_id'))
                                            <small class="text-danger">{{ $errors->first('end_cat_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter Product Name">
                                        @if ($errors->any('name'))
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" placeholder="Enter slug Name">
                                        @if ($errors->any('slug'))
                                            <small class="text-danger">{{ $errors->first('slug') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Product Brand</label>
                                        <select class="custom-select" name="brand">
                                            <option value="">--Select a Brand--</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':'' }}>
                                                {{ $brand->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->any('brand'))
                                            <small class="text-danger">{{ $errors->first('brand') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Size</label>
                                        <div class="select2-purple">
                                            <select class="select2" multiple="multiple" name="product_size_id[]" data-placeholder="Add another product size" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                @foreach ($size as $sizes)
                                                    <option value="{{ $sizes->id }}">{{ $sizes->size_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->any('product_size_id'))
                                                <small class="text-danger">{{ $errors->first('product_size_id') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Color</label>
                                        <select class="select2" multiple="multiple" name="product_color_id[]" data-placeholder="Add another product color" style="width: 100%;">
                                            @foreach ($color as $colors)
                                                <option value="{{ $colors->id }}">{{ $colors->color_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->any('product_color_id'))
                                                <small class="text-danger">{{ $errors->first('product_color_id') }}</small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <h5>Available Product Sizes</h5>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body table-responsive p-0" >
                                            <table class="table table-sm table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Sizes</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($product->ProductSize as $k => $psize)
                                                        <tr>
                                                            <td>{{ ++$k }}</td>
                                                            <td>{{ $psize->psizeName->size_name }}</td>
                                                            <td>
                                                                <a href="{{ url('admin/delete_psize/'.$psize->id) }}" type="button" onclick="return confirm('Do you want to execute this command.?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td>
                                                                <div class="col-span">No Product Sizes Found</div>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <h5>Available Product Colors</h5>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-sm table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Colors</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($product->ProductColor as $k => $pcolor)
                                                    <tr>
                                                        <td>{{ ++$k }}</td>
                                                        <td>{{ $pcolor->pcolorName->color_name }}</td>
                                                        <td>
                                                            <a href="{{ url('admin/delete_pcolor/'.$pcolor->id) }}" type="button" onclick="return confirm('Do you want to execute this command.?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td>
                                                                <div class="col-span">No Product Colors Found</div>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-10">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <input name="short_description" value="{{ $product->short_description }}" class="form-control" placeholder="Enter Short Description">
                                        @if ($errors->any('short_description'))
                                            <small class="text-danger">{{ $errors->first('short_description') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Long Description (Max: 500 words)</label>
                                        <textarea name="description" id="mysummernote" class="form-control" rows="3" placeholder="Enter Long Description">{!! $product->description !!}</textarea>
                                        @if ($errors->any('description'))
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Original Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">{{ $currency->symbol }}</span>
                                            </div>
                                            <input type="text" name="original_price" class="form-control" value="{{ $product->original_price }}">
                                            <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @if ($errors->any('original_price'))
                                            <small class="text-danger">{{ $errors->first('original_price') }}</small>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Selling Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">{{ $currency->symbol }}</span>
                                            </div>
                                            <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                                            <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @if ($errors->any('selling_price'))
                                            <small class="text-danger">{{ $errors->first('selling_price') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input type="text" name="quantity" class="form-control"  placeholder="Enter Quantity" value="{{ $product->quantity }}">
                                        @if ($errors->any('quantity'))
                                            <small class="text-danger">{{ $errors->first('quantity') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Trending</label>
                                    <select class="custom-select" name="trending">
                                        <option value="1" {{ $product->trending == '1' ? 'selected':'' }}>ON</option>
                                        <option value="0" {{ $product->trending == '0' ? 'selected':'' }}>OFF</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Action</label>
                                    <select class="custom-select" name="status">
                                        <option value="1" {{ $product->status == '1' ? 'selected':'' }}>ON</option>
                                        <option value="0" {{ $product->status == '0' ? 'selected':'' }}>OFF</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <hr>
                            <h4>PRODUCT IMAGE</h4>
                            <div class="row">
                                <div class="col-sm-10">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image[]" multiple class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose Product Image's</label>
                                                @if ($errors->any('image'))
                                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Available Product Images</h4>
                            <div class="row">
                                @if($product->ProductsImages)
                                    @foreach ($product->ProductsImages as $image)
                                        <div class="col-md-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <img src="{{ asset('uploads/products/'.$image->image) }}" class="rounded" alt="img" style="width:150px;height:150px;" />
                                                <a href="{{ url('admin/product_image/'.$image->id.'/delete') }}" onclick="return confirm('Do you want to execute this command.?')" class="d-block text-center">Delete</a>
                                            </div>
                                        </div>
                                    @endforeach

                                @else
                                    <h5>Product Image is Unavailable</h5>
                                @endif

                            </div>
                            <hr>
                            <h4>SEO DATA</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}" placeholder="Enter Meta Title">
                                        @if ($errors->any('meta_title'))
                                            <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" rows="3" placeholder="Enter Meta Keyword">{!! $product->meta_keyword !!}</textarea>
                                        @if ($errors->any('meta_keyword'))
                                            <small class="text-danger">{{ $errors->first('meta_keyword') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter Meta Description">{!! $product->meta_description !!}</textarea>
                                        @if ($errors->any('meta_description'))
                                            <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <a href="{{ url('admin/market/products') }}" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>

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


    @section('dynamics')
        <script>
            $(document).ready(function () {
                $('#category_dd').change(function (e) {
                    e.preventDefault();

                    var IdCategory = this.value;
                    //alert(IdCategory);
                    $('#subcategory_dd').html('');

                    $.ajax({
                        type: "POST",
                        url: "/admin/api/fetch-subcategory",
                        data: {cat_id: IdCategory,_token:"{{ csrf_token() }}"},
                        dataType: 'json',
                        success: function (response) {
                            $('#subcategory_dd').html('<option value="">Select Sub-Category</option>');
                            $.each(response.subcategory,function(CreateProduct, val){
                                $('#subcategory_dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                            });
                            $('#endcategory_dd').html('<option value="">Select End-Category</option>');
                        }
                    });

                });
                $('#subcategory_dd').change(function (e) {
                    e.preventDefault();

                    var IdSubCategory = this.value;
                    //alert(IdSubCategory);
                    $('#endcategory_dd').html('');

                    $.ajax({
                        type: "POST",
                        url: "/admin/api/fetch-endcategory",
                        data: {sub_cat_id: IdSubCategory,_token:"{{ csrf_token() }}"},
                        dataType: 'json',
                        success: function (response) {
                            $('#endcategory_dd').html('<option value="">Select End-Category</option>');
                            $.each(response.endcategory,function(CreateProduct, val){
                                $('#endcategory_dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                            });
                        }
                    });

                });
            });
        </script>
    @endsection


@endsection
