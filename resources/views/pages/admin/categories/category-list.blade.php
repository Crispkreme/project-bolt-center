<x-app-layout>

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">

                <x-table.table-top-head 
                    title="Manage Category" 
                    subtitle="Manage your categories" 
                    addTitleText="Add New Category" 
                    importTitleText="Import Category" 
                    isModal="false" 
                    modalTarget="#add-category" 
                    routeTarget="" 
                />

                <div class="card table-list-card category-list-card">
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
                                        <img src="https://dreamspos.dreamstechnologies.com/laravel/template/public/build/img/icons/closes.svg"
                                            alt="img">
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
                        <div class="card" id="category_filter_inputs">
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
                                            <i data-feather="stop-circle" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Status</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12 ms-auto">
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

                        <div class="table-responsive category-list">
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
                                        <th>Category slug</th>
                                        <th>Created On</th>
                                        <th>Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox" value="{{ $category->id }}" />
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>{{ $category->category }}</td>
                                            <td>{{ $category->category_slug }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>
                                                <span class="badge {{ $category->category_status === 'Active' ? 'badge-linesuccess' : 'badge-linedanger' }}">
                                                    {{ $category->category_status }}
                                                </span>
                                            </td>
                                            <td class="action-table-data">
                                                <div class="edit-delete-action">
                                                    <a class="me-2 p-2" href="#" data-bs-toggle="modal" data-bs-target="#edit-category" data-id="{{ $category->id }}">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                    <a class="confirm-text p-2" href="javascript:void(0);" data-id="{{ $category->id }}">
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
