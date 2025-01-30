<x-app-layout>

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">

                <x-table.table-top-head 
                    title="Manage Product" 
                    subtitle="Manage your products" 
                    addTitleText="Add New Product" 
                    importTitleText="Import Product" 
                    :isModal="false" 
                    modalTarget="" 
                    routeTarget="{{ route('admin.product.add') }}" 
                />

                <div class="card table-list-card product-list-card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a href="javascript:void(0);" class="btn btn-searchset">
                                        <i data-feather="search" class="feather-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <i data-feather="filter" class="filter-icon"></i>
                                    <span>
                                        <img src="{{ asset('images/svg/closes.svg') }}" alt="img">
                                    </span>
                                </a>
                            </div>
                            <div class="form-sort">
                                <i data-feather="sliders" class="info-img"></i>
                                <select class="select">
                                    <option>Sort by Date</option>
                                    <option>14 09 23</option>
                                    <option>11 09 23</option>
                                </select>
                            </div>
                        </div>

                        <div class="card mb-0" id="product_filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="box" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>
                                                            Lenovo 3rd Generation</option>
                                                        <option>Nike Jordan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="stop-circle" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Categroy</option>
                                                        <option>Laptop</option>
                                                        <option>Shoe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="git-merge" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Sub Category</option>
                                                        <option>Computers</option>
                                                        <option>Fruits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i class="fas fa-money-bill info-img"></i>
                                                    <select class="select">
                                                        <option>Price</option>
                                                        <option>$12500.00</option>
                                                        <option>$12500.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <a class="btn btn-filters ms-auto"> 
                                                        <i data-feather="search" class="feather-search"></i> 
                                                        Search 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive product-list">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th class="no-sort">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Product</th>
                                        <th>Product Code</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Description</th>
                                        <th>Created by</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="productimgname">
                                                    <a href="javascript:void(0);">{{ $product->product }}</a>
                                                </div>
                                            </td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->sub_category }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <div class="userimgname">
                                                    <a href="javascript:void(0);">{{ $product->created_by }}</a>
                                                </div>
                                            </td>
                                            <td class="action-table-data">
                                                <div class="edit-delete-action">
                                                    <a class="me-2 p-2" href="">
                                                        {{-- {{ route('admin.product.edit', ['id' => $product->id]) }} --}}
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                    <a class="p-2 delete-product" href="#" data-id="{{ $product->id }}">
                                                        <i data-feather="trash-2" class="feather-trash-2"></i>
                                                    </a> 
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.delete-product').forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const productId = this.getAttribute('data-id');

                        if (!productId) {
                            console.error('Product ID is missing.');
                            return;
                        }

                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: `/admin/category/delete/${productId}`,
                                    type: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function (response) {
                                        if (response.success) {
                                            Swal.fire('Deleted!', 'Product has been deleted.', 'success')
                                            .then(() => {
                                                location.reload();
                                            });
                                            document.querySelector(`tr[data-id="${productId}"]`).remove();
                                        } else {
                                            Swal.fire('Error!', response.message, 'error');
                                        }
                                    },
                                    error: function (error) {
                                        console.error('Error deleting product:', error);
                                        Swal.fire('Error!', 'An error occurred while deleting the product.', 'error');
                                    }
                                });
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
    
</x-app-layout>