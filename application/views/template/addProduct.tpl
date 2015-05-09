<div class="modal" id="modal-add-product" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Add Product</h4>
            </div>

            {$form_add.open}

                <div class="modal-body">

                        <div class="message"></div>

                       <fieldset>

                           <div class="col-sm-12">
                            <label for="name">Product Title:*</label>
                            <input type="text" name="title" id="title" value=""
                                   class="form-control" style="min-width: 500px; margin-bottom: 20px;" required autocomplete="off">
                        </div>

                        <div class="col-sm-4">
                            <label for="text">Product Price:*</label>
                            <input type="text" name="price" id="price" value=""
                                   class="form-control" style="max-width: 100px;" autocomplete="off">
                        </div>

                        <div class="col-sm-8">
                            <label for="qty">Quantity:</label>
                            <input type="number" name="qty" id="qty" value=""
                                   class="form-control" style="max-width: 100px;" autocomplete="off">

                        </div>

                       </fieldset>

                </div>

                <div class="modal-footer">

                    <button type="submit"  name="submit" class="btn btn-primary  pull-left btn-lg">Submit</button>
                    <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>

                </div>

            {$form_add.close}

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->