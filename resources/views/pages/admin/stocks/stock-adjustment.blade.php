<x-app-layout>

    <div class="page-wrapper">
        <div class="content">

            <x-table.table-top-head 
                title="Stock Adjustment" 
                subtitle="Manage your stock adjustment" 
                addTitleText="Add New Stock" 
                importTitleText="Import Stock" 
                isModal="true" 
                modalTarget="#add-stock" 
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
                                        <i data-feather="layout" class="feather-search feather-20"></i>
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
                                                    <span class="status-label"><i data-feather="menu"
                                                            class="feather-menu"></i>Shop</span>
                                                    <input type="checkbox" id="option1" class="check" checked>
                                                    <label for="option1" class="checktoggle"> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                    <span class="status-label"><i data-feather="menu"
                                                            class="feather-menu"></i>Product</span>
                                                    <input type="checkbox" id="option2" class="check" checked>
                                                    <label for="option2" class="checktoggle"> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                    <span class="status-label"><i data-feather="menu"
                                                            class="feather-menu"></i>Reference No</span>
                                                    <input type="checkbox" id="option3" class="check" checked>
                                                    <label for="option3" class="checktoggle"> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                    <span class="status-label"><i data-feather="menu"
                                                            class="feather-menu"></i>Date</span>
                                                    <input type="checkbox" id="option4" class="check" checked>
                                                    <label for="option4" class="checktoggle"> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                    <span class="status-label"><i data-feather="menu"
                                                            class="feather-menu"></i>Responsible Person</span>
                                                    <input type="checkbox" id="option5" class="check" checked>
                                                    <label for="option5" class="checktoggle"> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                    <span class="status-label"><i data-feather="menu"
                                                            class="feather-menu"></i>Notes</span>
                                                    <input type="checkbox" id="option6" class="check" checked>
                                                    <label for="option6" class="checktoggle"> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                    <span class="status-label"><i data-feather="menu"
                                                            class="feather-menu"></i>Quantity</span>
                                                    <input type="checkbox" id="option7" class="check" checked>
                                                    <label for="option7" class="checktoggle"> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                                    <span class="status-label"><i data-feather="menu"
                                                            class="feather-menu"></i>Actions</span>
                                                    <input type="checkbox" id="option8" class="check" checked>
                                                    <label for="option8" class="checktoggle"> </label>
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

                    <div class="card" id="stock_filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="archive" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Warehouse</option>
                                            <option>Lobar Handy</option>
                                            <option>Quaint Warehouse</option>
                                            <option>Traditional Warehouse</option>
                                            <option>Cool Warehouse</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="box" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Product</option>
                                            <option>Nike Jordan</option>
                                            <option>Apple Series 5 Watch</option>
                                            <option>Amazon Echo Dot</option>
                                            <option>Lobar Handy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="calendar" class="info-img"></i>
                                        <div class="input-groupicon">
                                            <input type="text" class="datetimepicker" placeholder="Choose Date">
                                        </div>
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
                                <div class="col-lg-4 col-sm-6 col-12 ms-auto">
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
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Product Code</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Quantity</th>
                                    <th>Selling Price</th>
                                    <th>Buying Price</th>
                                    <th>Discount</th>
                                    <th>Supplier</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Updated On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stockAdjustments as $stockAdjustment)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>{{ $stockAdjustment['product_name'] }}</td>
                                        <td>{{ $stockAdjustment['description'] }}</td>
                                        <td>{{ $stockAdjustment['product_code'] }}</td>
                                        <td>{{ $stockAdjustment['category_name'] }}</td>
                                        <td>{{ $stockAdjustment['sub_category_name'] }}</td>
                                        <td>{{ $stockAdjustment['quantity'] }}</td>
                                        <td>{{ $stockAdjustment['selling_price'] }}</td>
                                        <td>{{ $stockAdjustment['buying_price'] }}</td>
                                        <td>{{ $stockAdjustment['discount'] }}</td>
                                        <td>
                                            <div class="productimgname">
                                                <a href="javascript:void(0);" class="product-img stock-img">
                                                    <img src="{{ $stockAdjustment['supplier_profile'] && file_exists(storage_path('app/public/' . $stockAdjustment['supplier_profile'])) ? asset('storage/' . $stockAdjustment['supplier_profile']) : \Laravolt\Avatar\Facade::create($stockAdjustment['supplier'])->toBase64() }}" alt="Supplier" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                                </a>
                                                <div>
                                                    <a href="javascript:void(0);" class="ms-2">{{ $stockAdjustment['supplier'] }}</a>
                                                </div>
                                            </div>         
                                        </td>
                                        <td>{{ $stockAdjustment['created_by'] }}</td>
                                        <td>{{ $stockAdjustment['editor'] }}</td>
                                        <td>{{ $stockAdjustment['created_on'] }}</td>
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

    <x-modal.add-stock />

    <x-modal.edit-units />

</x-app-layout>
