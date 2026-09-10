<!-- Brand CREATE modal -->
<div wire:ignore.self class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add New Product Brand</h4>
            <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div wire:loading class="p-2 text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden"></span>
            </div><b class="text-primary"> Creating New Brand Record...</b>
            <p></p>
        </div>
        <div wire:loading.remove>
            <div class="modal-body">
                <form wire:submit.prevent="StoreBrand">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" wire:model.defer="name" class="form-control" placeholder="Enter Brand Name">
                                @if ($errors->any('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Brand Slug</label>
                            <input type="text" class="form-control" wire:model.defer="slug" placeholder="Enter Brand Slug">
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
                                <label>Select Category</label>
                                <select name="category_id" required class="form-control" wire:model.defer="category_id">
                                    <option value="">--Select a category--</option>
                                    @foreach ($categories as $items)
                                    <option value="{{ $items->id }}">{{ $items->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any('category_id'))
                                    <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                @endif
                            </div>
                        </div>

                    </div>

                    <hr>
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status Action</label>
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" wire:model.defer="status" class="custom-control-input" id="customSwitch3" >
                                    <label class="custom-control-label" for="customSwitch3">ON/OFF</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" wire:click="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<!-- Brand UPDATE modal -->
<div wire:ignore.self class="modal fade" id="update-modal-lg">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Product Brand</h4>
            <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div wire:loading class="p-2 text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden"></span>
            </div><b class="text-primary"> Loading Record...</b>
            <p></p>
        </div>
        <div wire:loading.remove>
            <div class="modal-body">
                <form wire:submit.prevent="UpdateBrand">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" wire:model.defer="name" class="form-control" placeholder="Enter Brand Name">
                            @if ($errors->any('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Brand Slug</label>
                            <input type="text" class="form-control" wire:model.defer="slug" placeholder="Enter Brand Slug">
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
                                <label>Select Category</label>
                                <select name="category_id" required class="form-control" wire:model.defer="category_id">
                                    <option value="">--Select a category--</option>
                                    @foreach ($categories as $items)
                                    <option value="{{ $items->id }}">{{ $items->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any('category_id'))
                                    <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                @endif
                            </div>
                        </div>

                    </div>

                    <hr>
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status Action</label>
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" wire:model.defer="status" class="custom-control-input" id="customSwitch2" >
                                    <label class="custom-control-label" for="customSwitch2">ON/OFF</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" wire:click="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- /DElete modal -->
<div wire:ignore.self class="modal fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Delete Data</h4>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div wire:loading class="p-2 text-center">
            <div class="spinner-border text-default" role="status">
                <span class="visually-hidden"></span>
            </div><b class="text-default"> Processing....</b>
            <p></p>
        </div>
        <div wire:loading.remove>
            <div class="modal-body">
                <form wire:submit.prevent="destroyBrand">
                    @csrf
                    <p>Are You Sure You want to delete this data ? Data can't be retrieve.</p>
                    <div class="modal-footer justify-content-between">
                        <button type="button" wire:click="closeModal" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Yes.Delete!</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
