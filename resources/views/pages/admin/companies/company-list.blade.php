<x-app-layout>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">

                <x-table.table-top-head 
                    title="Manage Company" 
                    subtitle="Manage your Companies" 
                    addTitleText="Add New Company" 
                    importTitleText="Import Company" 
                    isModal="false" 
                    modalTarget="#add-company" 
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
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-filter" id="filter_search">
                                        <i data-feather="filter" class="filter-icon"></i>
                                        <span>
                                            <img src="{{ asset('images/svg/closes.svg') }}" alt="img">
                                        </span>
                                    </a>
                                    <div class="layout-hide-box">
                                        <a href="javascript:void(0);" class="me-3 layout-box">
                                            <i data-feather="layout" class="feather-search"></i>
                                        </a>
                                        <div class="layout-drop-item card">
                                            <div class="drop-item-head">
                                                <h5>Want to manage datatable?</h5>
                                                <p>Please drag and drop your column to reorder your table and enable see option as you want.</p>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div
                                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                        <span class="status-label">
                                                            <i data-feather="menu" class="feather-menu"></i>
                                                            Shop
                                                        </span>
                                                        <input type="checkbox" id="option1" class="check" checked>
                                                        <label for="option1" class="checktoggle"></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                        <span class="status-label">
                                                            <i data-feather="menu" class="feather-menu"></i>
                                                            Product
                                                        </span>
                                                        <input type="checkbox" id="option2" class="check" checked>
                                                        <label for="option2" class="checktoggle"></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                        <span class="status-label">
                                                            <i data-feather="menu" class="feather-menu"></i>
                                                            Reference No
                                                        </span>
                                                        <input type="checkbox" id="option3" class="check" checked>
                                                        <label for="option3" class="checktoggle"></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                        <span class="status-label">
                                                            <i data-feather="menu" class="feather-menu"></i>
                                                            Date
                                                        </span>
                                                        <input type="checkbox" id="option4" class="check" checked>
                                                        <label for="option4" class="checktoggle"></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                        <span class="status-label">
                                                            <i data-feather="menu" class="feather-menu"></i>
                                                            Responsible Person
                                                        </span>
                                                        <input type="checkbox" id="option5" class="check" checked>
                                                        <label for="option5" class="checktoggle"></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                        <span class="status-label">
                                                            <i data-feather="menu" class="feather-menu"></i>
                                                            Notes
                                                        </span>
                                                        <input type="checkbox" id="option6" class="check" checked>
                                                        <label for="option6" class="checktoggle"> </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                        <span class="status-label">
                                                            <i data-feather="menu" class="feather-menu"></i>
                                                            Quantity
                                                        </span>
                                                        <input type="checkbox" id="option7" class="check" checked>
                                                        <label for="option7" class="checktoggle"> </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div
                                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                        <span class="status-label">
                                                            <i data-feather="menu" class="feather-menu"></i>
                                                            Actions
                                                        </span>
                                                        <input type="checkbox" id="option8" class="check" checked>
                                                        <label for="option8" class="checktoggle"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="archive" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Warehouse</option>
                                                <option>Legendary</option>
                                                <option>Determined</option>
                                                <option>Sincere</option>
                                                <option>Pretty</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="user" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Person</option>
                                                <option>Steven</option>
                                                <option>Gravely</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <div class="input-groupicon">
                                                <input type="text" class="datetimepicker" placeholder="Created Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="user" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Status</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12 ms-auto">
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
                        <!-- /Filter -->

                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th class="no-sort">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Company</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>URL</th>
                                        <th>Created By</th>
                                        <th>Created On</th>
                                        <th>Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox" value="{{ $company->id }}" />
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>{{ $company->company_name }}</td>
                                            <td>{{ $company->company_phone }}</td>
                                            <td>{{ $company->company_email }}</td>
                                            <td>{!! nl2br(e($company->address)) !!}</td>
                                            <td>
                                                <a href="{{ $company->company_website }}" target="_blank">
                                                    {{ $company->company_website }}
                                                </a>
                                            </td>
                                            <td>{{ $company->role }}</td>
                                            <td>{{ \Carbon\Carbon::parse($company->created_at)->format('F j, Y') }}</td>
                                            <td>
                                                <span class="badge {{ $company->company_status === 'Active' ? 'badge-linesuccess' : 'badge-linedanger' }}">
                                                    {{ $company->company_status }}
                                                </span>
                                            </td>
                                            <td class="action-table-data">
                                                <div class="edit-delete-action">
                                                    <a class="me-2 p-2" href="#" data-bs-toggle="modal" data-bs-target="#edit-details" data-id="{{ $company->id }}">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                    <a class="delete-category p-2" href="javascript:void(0);" data-id="{{ $company->id }}">
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
                document.querySelectorAll('.delete-category').forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const companyId = this.getAttribute('data-id');

                        if (!companyId) {
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
                                    url: `/admin/company/delete/${companyId}`,
                                    type: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function (response) {
                                        if (response.success) {
                                            Swal.fire('Deleted!', 'Category has been deleted.', 'success')
                                            .then(() => {
                                                location.reload();
                                            });
                                            document.querySelector(`tr[data-id="${companyId}"]`).remove();
                                        } else {
                                            Swal.fire('Error!', response.message, 'error');
                                        }
                                    },
                                    error: function (error) {
                                        console.error('Error deleting category:', error);
                                        Swal.fire('Error!', 'An error occurred while deleting the category.', 'error');
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
