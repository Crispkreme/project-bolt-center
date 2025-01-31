<form id="edit-product-form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="product_id" value="{{ $productData->product_id }}">
    <input type="hidden" name="user_id" value="{{ $productData->user_id }}">

    <div class="card">
        <div class="card-body add-product pb-0">
            <div class="accordion-card-one accordion" id="accordionExample">
                <div class="accordion-item">
                    <div class="accordion-header" id="headingOne">
                        <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne">
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
                            <!-- Product Name & Slug Input -->
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product" id="product-name" value="{{ $productData->product }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="product_slug" value="{{ $productData->product_slug }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Category, Sub Category, Supplier & Item Code -->
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Category</label>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add-category">
                                            <i data-feather="plus-circle" class="plus-down-add"></i>
                                            <span>Add New</span>
                                        </a>
                                        <select class="select" name="category_id">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $productData->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Sub Category</label>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add-sub-category">
                                            <i data-feather="plus-circle" class="plus-down-add"></i>
                                            <span>Add New</span>
                                        </a>
                                        <select class="select" name="sub_category_id">
                                            <option value="">Choose Sub Category</option>
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}" {{ $productData->sub_category_id == $subCategory->id ? 'selected' : '' }}>
                                                    {{ $subCategory->sub_category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="mb-3 add-product">
                                        <label class="form-label">Supplier</label>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add-entity">
                                            <i data-feather="plus-circle" class="plus-down-add"></i>
                                            <span>Add New</span>
                                        </a>
                                        <select class="select" name="supplier_id">
                                            <option value="">Choose Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" {{ $productData->supplier_id == $supplier->id ? 'selected' : '' }}>
                                                    {{ $supplier->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks add-product list">
                                        <label>Item Code</label>
                                        <input type="text" id="item-code" name="product_code" class="form-control list" value="{{ $productData->product_code }}" placeholder="Please Enter Item Code" readonly>
                                        <button type="button" class="btn btn-primaryadd">Generate Code</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-lg-12">
                                <div class="input-blocks summer-description-box transfer mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control h-100" rows="5" name="description">{{ $productData->description }}</textarea>
                                    <p class="mt-1">Maximum 60 Characters</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing and Stock Information -->
                <div class="accordion-card-one accordion" id="accordionExample2">
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingTwo">
                            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo">
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
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks add-product">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $productData->quantity }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks add-product">
                                            <label>Selling Price</label>
                                            <input type="text" class="form-control" id="selling-price" name="selling_price" value="{{ $productData->selling_price }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks add-product">
                                            <label>Buying Price</label>
                                            <input type="text" class="form-control" id="buying-price" name="buying_price" value="{{ $productData->buying_price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks add-product">
                                            <label>Discount Type</label>
                                            <select class="select" name="discount_type">
                                                <option value="Percentage" {{ $productData->discount_type == 'Percentage' ? 'selected' : '' }}>Percentage</option>
                                                <option value="Cash" {{ $productData->discount_type == 'Cash' ? 'selected' : '' }}>Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks add-product">
                                            <label>Discount Value</label>
                                            <input type="text" placeholder="Discount" id="discount-value" name="discount" value="{{ $productData->discount }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="input-blocks add-product">
                                            <label>Quantity Alert</label>
                                            <input type="text" class="form-control" id="quantity-alert" name="quantity_alert" value="{{ $productData->quantity_alert }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Images Section -->
                    <div class="accordion-card-one accordion" id="accordionExample3">
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingThree">
                                <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree">
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
                            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
                                <div class="accordion-body">
                                    <div class="col-lg-12">
                                        <div class="add-choosen">
                                            <div class="input-blocks">
                                                <div class="image-upload">
                                                    <input type="file" id="image-upload-input" name="product_image[]" multiple accept="image/*">
                                                    <div class="image-uploads">
                                                        <i data-feather="plus-circle" class="plus-down-add me-0"></i>
                                                        <h4>Add Images</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="image-repeater-container" style="display: flex;">
                                                @foreach ($productData->product_image as $image)
                                                    <div class="phone-img">
                                                        <img src="{{ asset('storage/'.$image->product_image) }}" alt="Uploaded image" style="width: 100px; height: 100px; object-fit: cover;">
                                                        <a href="javascript:void(0);" class="remove-image-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">Update Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const imageUploadInput = document.getElementById('image-upload-input');
            const imageRepeaterContainer = document.getElementById('image-repeater-container');

            imageUploadInput.addEventListener('change', (event) => {
                const files = event.target.files;
                const maxSize = 2 * 1024 * 1024;

                Array.from(files).forEach((file) => {
                    if (!file.type.startsWith('image/')) {
                        alert("Only image files are allowed.");
                        return;
                    }

                    if (file.size > maxSize) {
                        alert(`"${file.name}" is too large. Maximum size allowed is 2MB.`);
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const newImage = document.createElement('div');
                        newImage.classList.add('phone-img');
                        newImage.innerHTML = `
                            <img src="${e.target.result}" alt="Uploaded image" style="width: 100px; height: 100px; object-fit: cover;">
                            <a href="javascript:void(0);" class="remove-image-btn" style="display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </a>
                        `;

                        imageRepeaterContainer.appendChild(newImage);
                        newImage.querySelector('.remove-image-btn').addEventListener('click', () => newImage.remove());
                    };

                    reader.readAsDataURL(file);
                });
            });

            document.querySelectorAll('.remove-image-btn').forEach((button) => {
                button.addEventListener('click', () => {
                    const imageId = button.getAttribute('data-image-id');
                    fetch(`/delete-image/${imageId}`, { method: 'DELETE' });
                    button.parentElement.remove();
                });
            });
        });
    </script>
@endpush
