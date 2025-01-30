<!-- Add Adjustment -->
<div class="modal fade" id="add-stock">
    <div class="modal-dialog modal-dialog-centered stock-adjust-modal">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add New Stock</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="stock-adjustment">
                            <div class="input-blocks search-form">
                                <label>Product</label>
                                <input type="text" class="form-control">
                                <i data-feather="search" class="feather-search"></i>
                            </div>
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
                                        <label>Warehouse</label>
                                        <select class="select">
                                            <option>Choose</option>
                                            <option>Lobar Handy</option>
                                            <option>Quaint Warehouse</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="modal-body-table">
                                        <div class="table-responsive">
                                            <table class="table  datanew">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>SKU</th>
                                                        <th>Category</th>
                                                        <th>Qty</th>
                                                        <th>Type</th>
                                                        <th class="no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="productimgname">
                                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                                    <img src="https://dreamspos.dreamstechnologies.com/laravel/template/public/build/img/products/stock-img-02.png" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Nike Jordan</a>
                                                            </div>												
                                                        </td>
                                                        <td>PT002</td>
                                                        <td>Nike</td>
                                                        <td>
                                                            <div class="product-quantity">
                                                                <span class="quantity-btn"><i data-feather="minus-circle" class="feather-search"></i></span>
                                                                <input type="text" class="quntity-input" value="2">
                                                                <span class="quantity-btn">+<i data-feather="plus-circle" class="plus-circle"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <select class="select">
                                                                <option>Addition</option>
                                                                <option>Addition</option>
                                                                <option>Addition</option>
                                                            </select>
                                                        </td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 p-2" href="#" data-bs-toggle="modal" data-bs-target="#edit-units">
                                                                    <i data-feather="edit" class="feather-edit"></i>
                                                                </a>
                                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="input-blocks summer-description-box">
                                    <label>Notes</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">Create Adjustment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Add Adjustment -->