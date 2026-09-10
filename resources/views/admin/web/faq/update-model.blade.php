<div class="modal fade" id="UpdateHelpModal">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update FAQ</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="UpdateHelpFORM" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div id="repps"></div>
                <br>
                <input type="hidden" name="help_id" id="help_id">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Faq HTTP</label>
                                <input type="text" name="http" id="edit_http" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Faq Head Title</label>
                                <input type="text" name="head_title" id="edit_head_title" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Faq Question</label>
                                <input type="text" name="question" id="edit_question" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Faq Answer</label>
                                <textarea name="answer" id="edit_answer" class="form-control" rows="6"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update FaQ</button>
                    </div>
            </div>
        </form>

    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
