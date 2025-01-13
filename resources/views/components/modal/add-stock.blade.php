<!-- Add Stock -->
<div class="modal fade" id="add-units">
    <div class="modal-dialog modal-dialog-centered stock-adjust-modal">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add Stock</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="manage-stocks">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-blocks">
                                        <label>Warehouse</label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Lobar Handy</option>
                                            <option>Quaint Warehouse</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-blocks">
                                        <label>Shop</label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Selosy</option>
                                            <option>Logerro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Responsible Person</label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Steven</option>
                                            <option>Gravely</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-blocks search-form mb-0">
                                        <label>Product</label>
                                        <input type="text" class="form-control"
                                            placeholder="Select Product">
                                        <i data-feather="search" class="feather-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Add Stock -->