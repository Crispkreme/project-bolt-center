<form id="add-product-form" action="{{ route('admin.product.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body add-product pb-0">
            <div class="accordion-card-one accordion" id="accordionExample">
                <div class="accordion-item">
                    <div class="accordion-header" id="headingOne">
                        <div class="accordion-button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-controls="collapseOne">
                            <div class="addproduct-icon">
                                <h5>
                                    <i data-feather="info" class="add-info"></i>
                                    <span>Product Information</span>
                                </h5>
                                <a href="javascript:void(0);">
                                    <i data-feather="chevron-down" class="chevron-down-add"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product" id="product-name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="product_slug" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="addservice-info">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="mb-3 add-product">
                                            <div class="add-newplus">
                                                <label class="form-label">Category</label>
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#add-category">
                                                    <i data-feather="plus-circle" class="plus-down-add"></i>
                                                    <span>Add New</span>
                                                </a>
                                            </div>
                                            <select class="select" name="category_id">
                                                <option>Choose</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="mb-3 add-product">
                                            <div class="add-newplus">
                                                <label class="form-label">Sub Category</label>
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#add-sub-category">
                                                    <i data-feather="plus-circle" class="plus-down-add"></i>
                                                    <span>Add New</span>
                                                </a>
                                            </div>
                                            <select class="select" name="sub_category_id">
                                                <option>Choose</option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}">{{ $subCategory->sub_category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks add-product list">
                                            <label>Item Code</label>
                                            <input type="text" id="item-code" name="product_code" class="form-control list" placeholder="Please Enter Item Code" readonly>
                                            <button type="button" class="btn btn-primaryadd" id="generate-code-btn">Generate Code</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Editor -->
                            <div class="col-lg-12">
                                <div class="input-blocks summer-description-box transfer mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control h-100" rows="5" name="description"></textarea>
                                    <p class="mt-1">Maximum 60 Characters</p>
                                </div>
                            </div>
                            <!-- /Editor -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-card-one accordion" id="accordionExample2">
                <div class="accordion-item">
                    <div class="accordion-header" id="headingTwo">
                        <div class="accordion-button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-controls="collapseTwo">
                            <div class="text-editor add-list">
                                <div class="addproduct-icon list icon">
                                    <h5>
                                        <i data-feather="life-buoy" class="add-info"></i>
                                        <span>Pricing & Stocks</span>
                                    </h5>
                                    <a href="javascript:void(0);">
                                        <i data-feather="chevron-down" class="chevron-down-add"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse show"
                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                        <div class="accordion-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks add-product">
                                                <label>Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks add-product">
                                                <label>Selling Price</label>
                                                <input type="text" class="form-control" id="selling-price" name="selling_price">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks add-product">
                                                <label>Buying Price</label>
                                                <input type="text" class="form-control" id="buying-price" name="buying_price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks add-product">
                                                <label>Discount Type</label>
                                                <select class="select" name="discount_type">
                                                    <option>Choose</option>
                                                    <option value="Percentage">Percentage</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks add-product">
                                                <label>Discount Value</label>
                                                <input type="text" placeholder="Discount" id="discount-value" name="discount">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks add-product">
                                                <label>Quantity Alert</label>
                                                <input type="text" class="form-control" id="quantity-alert" name="quantity_alert">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-card-one accordion" id="accordionExample3">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingThree">
                                                <div class="accordion-button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree"
                                                    aria-controls="collapseThree">
                                                    <div class="addproduct-icon list">
                                                        <h5>
                                                            <i data-feather="image" class="add-info"></i>
                                                            <span>Images</span>
                                                        </h5>
                                                        <a href="javascript:void(0);">
                                                            <i data-feather="chevron-down" class="chevron-down-add"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapseThree"
                                                class="accordion-collapse collapse show"
                                                aria-labelledby="headingThree"
                                                data-bs-parent="#accordionExample3">
                                                <div class="accordion-body">
                                                    <div class="text-editor add-list add">
                                                        <div class="col-lg-12">
                                                            <div class="add-choosen">
                                                                <div class="input-blocks">
                                                                    <div class="image-upload">
                                                                        <input type="file">
                                                                        <div class="image-uploads">
                                                                            <i data-feather="plus-circle"
                                                                                class="plus-down-add me-0"></i>
                                                                            <h4>Add Images</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="phone-img">
                                                                    <img src="https://dreamspos.dreamstechnologies.com/laravel/template/public/build/img/products/phone-add-2.png" alt="image">
                                                                    <a href="javascript:void(0);">
                                                                        <i data-feather="x" class="x-square-add remove-product"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="btn-addproduct mb-4">
            <button type="button" class="btn btn-cancel me-2">Cancel</button>
            <button type="submit" class="btn btn-submit">Save Product</button>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productNameInput = document.getElementById('product-name');
            const slugInput = document.getElementById('slug');

            productNameInput.addEventListener('input', function () {
                const productName = this.value;
                const slug = productName
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');

                slugInput.value = slug;
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const generateCodeBtn = document.getElementById('generate-code-btn');
            const itemCodeInput = document.getElementById('item-code');

            generateCodeBtn.addEventListener('click', function () {
                const randomCode = generateItemCode();
                itemCodeInput.value = randomCode;
            });

            function generateItemCode() {
                const prefix = 'PRD-';
                const randomNumber = Math.floor(Math.random() * 900000000) + 100000000;
                return `${prefix}${randomNumber}`;
            }
        });
    </script>
    <script>
        $(document).ready(function () { 
            $('#add-product-form').on('submit', function (e) {

                e.preventDefault();
                let formData = $(this).serialize();
                
                console.log('formData', formData);

                $.ajax({
                    url: '{{ route('admin.product.store') }}',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        if (response.success) {                            
                            Swal.fire('Success!', 'SubCategory added successfully.', 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An unexpected error occurred. Please try again.',
                            });
                        }
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON?.errors;
                        let errorMessages = '';
    
                        if (errors) {
                            for (let field in errors) {
                                errorMessages += errors[field].join('<br>') + '<br>';
                            }
                        } else {
                            errorMessages = 'An unexpected error occurred. Please try again later.';
                        }
                    },
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const numericFields = [
                'quantity',
                'buying-price',
                'quantity-alert',
                'selling-price',
                'discount-value',
            ];

            numericFields.forEach((fieldId) => {
                const field = document.getElementById(fieldId);

                field.addEventListener('keydown', (event) => {
                    const allowedKeys = [
                        'Backspace', 'ArrowLeft', 'ArrowRight', 'Delete', 'Tab', '.',
                    ];
                    const isNumber = /^[0-9]$/.test(event.key);
                    const isAllowedKey = allowedKeys.includes(event.key);

                    if (!isNumber && !isAllowedKey) {
                        event.preventDefault();
                    }
                });

                field.addEventListener('input', () => {
                    field.value = field.value.replace(/[^0-9.]/g, '');
                    if ((field.value.match(/\./g) || []).length > 1) {
                        field.value = field.value.replace(/\.(?=.*\.)/g, '');
                    }
                });
            });
        });

    </script>
@endpush