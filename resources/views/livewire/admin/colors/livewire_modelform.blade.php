<!-- color CREATE modal -->
<div wire:ignore.self class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add New Product Color</h4>
            <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div wire:loading class="p-2 text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden"></span>
            </div><b class="text-primary"> Creating New Color Record...</b>
            <p></p>
        </div>
        <div wire:loading.remove>
            <div class="modal-body">
                <form wire:submit.prevent="StoreColor">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Color Name</label>
                            <input type="text" wire:model.defer="color_name" class="form-control" placeholder="Enter color name">
                            @if ($errors->any('color_name'))
                                <small class="text-danger">{{ $errors->first('color_name') }}</small>
                            @endif
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Color Code</label>
                            <input type="text" class="form-control" wire:model.defer="color_code" placeholder="Enter color code">
                                @if ($errors->any('color_code'))
                                    <small class="text-danger">{{ $errors->first('color_code') }}</small>
                                @endif
                        </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" wire:click="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Color</button>
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




<!-- Color UPDATE modal -->
<div wire:ignore.self class="modal fade" id="update-modal-lg">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Product Color</h4>
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
                <form wire:submit.prevent="UpdateColor">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Color Name</label>
                            <input type="text" wire:model.defer="color_name" class="form-control" placeholder="Enter color Name">
                            @if ($errors->any('color_name'))
                                <small class="text-danger">{{ $errors->first('color_name') }}</small>
                            @endif
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Color Code</label>
                            <input type="text" class="form-control" wire:model.defer="color_code" placeholder="Enter Brand Slug">
                                @if ($errors->any('color_code'))
                                    <small class="text-danger">{{ $errors->first('color_code') }}</small>
                                @endif
                        </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" wire:click="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Color</button>
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

