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
                                <input type="text" class="form-control" name="search-product" id="search-product">
                                <i data-feather="search" class="feather-search"></i>
                                <ul id="product-search-results" class="dropdown-menu" style="display: none;"></ul>
                            </div>                            
                            <div class="row">
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
                                        <label>Supplier</label>
                                        <select class="select" name="supplier_id">
                                            <option>Choose Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-blocks">
                                        <label>Discount Type</label>
                                        <select class="select" name="discount_type">
                                            <option>Choose</option>
                                            <option value="Percentage">Percentage</option>
                                            <option value="Cash">Cash</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-blocks">
                                        <label>Discount Value</label>
                                        <input type="text" placeholder="Discount" id="discount-value" name="discount">
                                    </div>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#search-product').on('keyup', function() {
                let query = $(this).val();

                if (query.length > 2) { 
                    $.ajax({
                        url: '/search/products',
                        method: 'GET',
                        data: { query: query },
                        success: function(response) {
                            let resultHtml = '';
                            
                            if (response.length > 0) {
                                response.forEach(function(product) {
                                    resultHtml += `<li class="dropdown-item product-item" data-product-id="${product.id}">${product.product}</li>`;
                                });
                                $('#product-search-results').html(resultHtml).show();
                            } else {
                                $('#product-search-results').html('<li class="dropdown-item">No products found</li>').show();
                            }
                        }
                    });
                } else {
                    $('#product-search-results').hide();
                }
            });

            $(document).on('click', '.product-item', function() {
                let productName = $(this).text();
                $('#search-product').val(productName);
                $('#product-search-results').hide();
            });
        });

    </script>
@endpush