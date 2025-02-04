<x-app-layout>

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">

                <x-table.table-top-head 
                    title="Manage Sub Category" 
                    subtitle="Manage your sub categories" 
                    addTitleText="Add New Sub Category" 
                    importTitleText="Import Sub Category" 
                    isModal="false" 
                    modalTarget="#add-sub-category" 
                    routeTarget="" 
                />

                <!-- /product list -->
                <div class="card table-list-card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input relative">
                                    <a href="javascript:void(0);" class="btn btn-searchset absolute left-3 top-1/2 transform -translate-y-1/2">
                                        <i data-feather="search" class="feather-search"></i>
                                    </a>
                                    <input type="search" class="form-control pl-10" id="search-box" placeholder="Search...">
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
                                    <option>Newest</option>
                                    <option>Oldest</option>
                                </select>
                            </div>
                        </div>

                        <!-- /Filter -->
                        <div class="card" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="zap" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Category</option>
                                                <option>Laptop</option>
                                                <option>Electronics</option>
                                                <option>Shoe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="zap" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose SubCategory</option>
                                                <option>Fruits</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="stop-circle" class="info-img"></i>
                                            <select class="select">
                                                <option>Category Code</option>
                                                <option>CT001</option>
                                                <option>CT002</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12 ms-auto">
                                        <div class="input-blocks">
                                            <a class="btn btn-filters ms-auto"> <i data-feather="search"
                                                    class="feather-search"></i> Search </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Filter -->

                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th class="no-sort">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Category</th>
                                        <th>Parent Category</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subCategories as $subCategory)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox" value="{{ $subCategory->id }}" />
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>{{ $subCategory->category }}</td> 
                                            <td>{{ $subCategory->sub_category }}</td>
                                            <td>{{ $subCategory->sub_category_slug }}</td>
                                            <td>{{ $subCategory->description }}</td>
                                            <td>{{ $subCategory->role }}</td>
                                            <td>
                                                <span class="badge {{ $subCategory->sub_category_status === 'Active' ? 'badge-linesuccess' : 'badge-linedanger' }}">
                                                    {{ $subCategory->sub_category_status }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($subCategory->created_at)->format('F j, Y') }}</td>
                                            
                                            <td class="action-table-data">
                                                <div class="edit-delete-action">
                                                    <a class="me-2 p-2y" href="#" data-bs-toggle="modal" data-bs-target="#edit-sub-category" data-id="{{ $subCategory->id }}">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                    <a class="p-2 delete-category" href="#" data-id="{{ $subCategory->id }}">
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
                <!-- /product list -->
                
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#add-sub-category').on('show.bs.modal', function () {
                    $('#add-sub-category-form')[0].reset();
                    $('#response-message').html('');
                });
        
                $('#add-sub-category').on('hidden.bs.modal', function () {
                    $('#response-message').html('');
                });
            });
        </script> 
        <script>
            $(document).ready(function () {
                $(document).on('click', '.edit-delete-action a[data-bs-target="#edit-sub-category"]', function (e) {
                    e.preventDefault();
                    let subCategoryId = $(this).data('id');

                    $.ajax({
                        url: `/admin/sub/category/${subCategoryId}/edit`,
                        method: 'GET',
                        success: function (data) {

                            const categoryIdSelect = document.getElementById('edit-category-id');
                            const subCategoryIdInput = document.getElementById('edit-sub-category-id');
                            const subCategoryInput = document.getElementById('sub-category');
                            const descriptionInput = document.getElementById('edit-sub-description');
                            const subCategoryStatusSelect = document.getElementById('edit-sub-category-status');

                            if (subCategoryIdInput && categoryIdSelect && subCategoryInput && descriptionInput && subCategoryStatusSelect) {
                                subCategoryIdInput.value = data.id;
                                categoryIdSelect.value = data.category_id;
                                subCategoryInput.value = data.sub_category;
                                descriptionInput.value = data.description;
                                subCategoryStatusSelect.value = data.sub_category_status;

                                $('#edit-sub-category').modal('show');
                            } else {
                                console.error('Input fields are missing in the modal.');
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An unexpected error occurred. Please try again later.',
                            });
                        },
                    });
                });

                $('#edit-sub-category-form').on('submit', function (e) {
                    e.preventDefault();
                    let formData = $(this).serialize();
        
                    $.ajax({
                        url: '{{ route('admin.sub.category.update') }}',
                        method: 'POST',
                        data: formData,
                        success: function (response) {
                            if (response.success) {
                                $('#edit-sub-category').modal('hide');
    
                                Swal.fire('Success!', 'SubCategory updated successfully.', 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Failed to update subcategory. Please try again.',
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
        
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                html: errorMessages,
                            });
                        },
                    });
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.delete-category').forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const subCategoryId = this.getAttribute('data-id');

                        if (!subCategoryId) {
                            console.error('Category ID is missing.');
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
                                    url: `/admin/sub/category/delete/${subCategoryId}`,
                                    type: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function (response) {
                                        if (response.success) {
                                            Swal.fire('Deleted!', 'SubCategory has been deleted.', 'success').then(() => {
                                                location.reload();
                                            });
                                            document.querySelector(`tr[data-id="${subCategoryId}"]`).remove();                                        
                                        } else {
                                            Swal.fire('Error!', response.message, 'error');
                                        }
                                    },
                                    error: function (error) {
                                        console.error('Error deleting category:', error);
                                        Swal.fire('Error!', 'An error occurred while deleting the subcategory.', 'error');
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