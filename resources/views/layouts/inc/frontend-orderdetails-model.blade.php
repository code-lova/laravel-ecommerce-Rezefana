<!-- Sign in / Register Modal -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Your Order Detail</a>
                            </li>

                        </ul>
                        <br/>

                        <div class="row">
                            <input type="hidden" name="product_id" id="product_id">

                            <div class="col-lg-10">
                                <label>Product Name</label>
                                <input type="text" id="fetch_item_name" class="form-control" readonly>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>Brand</label>
                                <input type="text" id="fetch_brand" class="form-control" readonly>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>Tracking</label>
                                <input type="text" id="fetch_reference" class="form-control" readonly>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-lg-10">
                                <label>Order Date</label>
                                <input type="text" id="fetch_created_at" class="form-control" readonly>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->
