<x-app-layout>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">

                <x-table.table-top-head 
                    title="Manage Supplier" 
                    subtitle="Manage your supplier" 
                    addTitleText="Add New Supplier" 
                    importTitleText="Import Supplier" 
                    isModal="false" 
                    modalTarget="#add-entity" 
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
                                </div>
                            </div>
                            <div class="form-sort">
                                <i data-feather="sliders" class="info-img"></i>
                                <select class="select">
                                    <option>Sort by Date</option>
                                    <option>25 9 23</option>
                                    <option>12 9 23</option>
                                </select>
                            </div>
                        </div>
                        <!-- /Filter -->
                        <div class="card" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="user" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Supplier Name</option>
                                                <option>Dazzle Shoes</option>
                                                <option>A-Z Store</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="globe" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Country</option>
                                                <option>Mexico</option>
                                                <option>Italy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <a class="btn btn-filters ms-auto"> 
                                                <i data-feather="search"  class="feather-search"></i> 
                                                Search 
                                            </a>
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
                                        <th>Supplier Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created On</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entities as $supplier)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox" value="{{ $supplier['id'] }}">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="productimgname">
                                                    <a href="javascript:void(0);" class="product-img supplier-img">
                                                        <img 
                                                            src="{{ $supplier['profile'] && file_exists(storage_path('app/public/' . $supplier['profile'])) ? asset('storage/' . $supplier['profile']) : \Laravolt\Avatar\Facade::create($supplier['name'])->toBase64() }}" 
                                                            alt="Supplier" 
                                                            style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                                    </a>
                                                    <div>
                                                        <a href="javascript:void(0);" class="ms-2">{{ $supplier['name'] }}</a>
                                                    </div>
                                                </div>                                                                                             
                                            </td>
                                            <td>{{ $supplier['email'] }}</td>
                                            <td>{{ $supplier['phone'] }}</td>
                                            <td>{!! nl2br(e($supplier['address'])) !!}</td>
                                            <td>
                                                <span class="badge {{ $supplier['entity_status'] === 'Active' ? 'badge-linesuccess' : 'badge-linedanger' }}">
                                                    {{ $supplier['entity_status'] }}
                                                </span>
                                            </td>
                                            <td>{{ $supplier['created_by'] }}</td>
                                            <td>{{ $supplier['created_at'] }}</td>
                                            <td class="action-table-data">
                                                <div class="edit-delete-action">
                                                    <a class="me-2 p-2 mb-0" href="javascript:void(0);">
                                                        <i data-feather="eye" class="action-eye"></i>
                                                    </a>
                                                    <a class="me-2 p-2 mb-0" data-bs-toggle="modal" data-bs-target="#edit-supplier">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                    <a class="me-2 confirm-text p-2 mb-0" href="javascript:void(0);">
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
</x-app-layout>