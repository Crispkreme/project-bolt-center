<!-- Edit Low Stock -->
<div class="modal fade" id="edit-stock">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Edit Low Stocks</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form
                            action="https://dreamspos.dreamstechnologies.com/laravel/template/public/low-stocks">
                            <div class="mb-3">
                                <label class="form-label">Warehouse</label>
                                <input type="text" class="form-control" value="Lavish Warehouse">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Store</label>
                                <input type="text" class="form-control" value="Crinol">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" value="Laptop">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product</label>
                                <input type="text" class="form-control" value="Lenevo 3rd Gen">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-control" value="PT001">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Qty</label>
                                <input type="text" class="form-control" value="15">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Qty Alert</label>
                                <input type="text" class="form-control" value="10">
                            </div>
                            <div class="mb-0">
                                <div
                                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                    <span class="status-label">Status</span>
                                    <input type="checkbox" id="user3" class="check" checked="">
                                    <label for="user3" class="checktoggle"></label>
                                </div>
                            </div>
                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Edit Low Stock -->