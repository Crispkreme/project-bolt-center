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
                                <div class="search-input">
                                    <a href="" class="btn btn-searchset">
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
                                            <td>{{ $subCategory->category }}</td> <!-- Parent category -->
                                            <td>{{ $subCategory->sub_category }}</td> <!-- Sub category -->
                                            <td>{{ $subCategory->sub_category_slug }}</td> <!-- Slug -->
                                            <td>{{ $subCategory->description }}</td> <!-- Description -->
                                            <td>{{ $subCategory->role }}</td> <!-- Created By (User Role) -->
                                            <td>
                                                <span class="badge {{ $subCategory->sub_category_status === 'Active' ? 'badge-linesuccess' : 'badge-linedanger' }}">
                                                    {{ $subCategory->sub_category_status }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($subCategory->created_at)->format('F j, Y') }}</td> <!-- Created On -->
                                            <td class="action-table-data">
                                                <div class="edit-delete-action">
                                                    <a class="me-2 p-2 edit-category" href="#" data-bs-toggle="modal" data-bs-target="#edit-category" data-id="{{ $subCategory->id }}">
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
        
                $('#add-sub-category-form').on('submit', function (e) {
                    e.preventDefault();
                    let formData = $(this).serialize();
                    $('#response-message').html('');
        
                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: formData,
                        success: function (response) {
                            if (response.success) {
                                $('#add-sub-category').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'SubCategory has been added successfully.',
                                    timer: 1500,
                                    showConfirmButton: false,
                                });
        
                                setTimeout(function () {
                                    location.reload();
                                }, 1500);
                            } else {
                                $('#add-sub-category').modal('hide');
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
        
                            $('#add-sub-category').modal('hide');
                                Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                html: errorMessages,
                            });
                        },
                    });
                });
        
                $('#add-sub-category').on('hidden.bs.modal', function () {
                    $('#response-message').html('');
                });
            });
        </script>     
    @endpush
</x-app-layout>