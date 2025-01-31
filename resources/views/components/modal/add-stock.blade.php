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
                                <ul id="product-search-results" class="dropdown-menu" style="display:none; width:100%;"></ul>
                            </div>                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="modal-body-table">
                                        <div class="table-responsive">
                                            <table class="table datanew" id="selected-products-table">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Category</th>
                                                        <th>Sub Category</th>
                                                        <th>SKU</th>
                                                        <th>Description</th>
                                                        <th>Qty</th>
                                                        <th class="no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="selected-products-body"></tbody>
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
        function toTitleCase(str) {
            return str.replace(/\b\w/g, char => char.toUpperCase());
        }
    </script>
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
                                    let capitalizedProduct = toTitleCase(product.product);

                                    resultHtml += `
                                        <li class="dropdown-item product-item" 
                                            data-product-id="${product.id}" 
                                            data-product-name="${product.product}" 
                                            data-product-sku="${product.product_code}" 
                                            data-product-description="${product.description}"
                                            data-product-category="${product.category}"
                                            data-product-sub_category="${product.sub_category}"
                                        >
                                            ${capitalizedProduct}
                                        </li>`;
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
                let productId = $(this).data('product-id');
                
                if ($(`#selected-products-body tr[data-product-id="${productId}"]`).length === 0) {
                    
                    let category = $(this).data('product-category');
                    let subCategory = $(this).data('product-sub_category');
                    let productName = $(this).data('product-name');
                    let productSKU = $(this).data('product-sku');
                    let productDescription = $(this).data('product-description');

                    let productRow = `
                        <tr data-product-id="${productId}">
                            <td>
                                <div class="productimgname">
                                    <a href="javascript:void(0);">${productName}</a>
                                </div>
                            </td>
                            <td>${category}</td>
                            <td>${subCategory}</td>
                            <td>${productSKU}</td>
                            <td>${productDescription}</td>
                            <td>
                                <div class="product-quantity">
                                    <a href="javascript:void(0);" class="quantity-btn decrement">
                                        <img src="{{ asset('images/svg/minus.svg') }}" alt="Minus">
                                    </a>
                                    <input type="text" class="quntity-input" value="1">
                                    <a href="javascript:void(0);" class="quantity-btn increment">
                                        <img src="{{ asset('images/svg/plus.svg') }}" alt="Plus">
                                    </a>
                                </div>
                            </td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a href="javascript:void(0);" class="p-2 remove-product" style="background-color:red; text-decoration:none;">
                                        <img src="{{ asset('images/svg/trash.svg') }}" alt="Trash" style="filter: invert(100%); width: 15px; height: 15px;">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('#selected-products-body').append(productRow);
                }

                $('#product-search-results').hide();
                $('#search-product').val('');
            });

            $(document).on('click', '.remove-product', function() {
                $(this).closest('tr').remove();
            });

            $(document).on('click', '.increment', function() {
                let qtyInput = $(this).siblings('.quantity-input');
                qtyInput.val(parseInt(qtyInput.val()) + 1);
            });

            $(document).on('click', '.decrement', function() {
                let qtyInput = $(this).siblings('.quantity-input');
                let currentVal = parseInt(qtyInput.val());
                if (currentVal > 1) {
                    qtyInput.val(currentVal - 1);
                }
            });
        });
    </script>
@endpush