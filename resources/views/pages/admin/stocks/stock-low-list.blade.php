<x-app-layout>
    
    <div class="page-wrapper">
        <div class="content">

            <x-table.table-top-head 
                title="Low Stocks" 
                subtitle="Manage your low stocks" 
                addTitleText="" 
                importTitleText="" 
                isModal="true" 
                modalTarget="#send-email"
                routeTarget="" 
            />

            <div class="table-tab">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Low Stocks</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Out of Stocks</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
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
                                                    <i data-feather="box" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>Lenovo 3rd Generation </option>
                                                        <option>Nike Jordan </option>
                                                        <option>Amazon Echo Dot </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="zap" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Category</option>
                                                        <option>Laptop</option>
                                                        <option>Shoe</option>
                                                        <option>Speaker</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="archive" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Warehouse</option>
                                                        <option>Lavish Warehouse </option>
                                                        <option>Lobar Handy </option>
                                                        <option>Traditional Warehouse </option>
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
                                                <th>Created On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stocks as $stock)
                                                <tr>
                                                    <td>
                                                        <label class="checkboxs">
                                                            <input type="checkbox">
                                                            <span class="checkmarks"></span>
                                                        </label>
                                                    </td>
                                                    <td>{{ $stock['product_name'] }}</td>
                                                    <td>{{ $stock['description'] }}</td>
                                                    <td>{{ $stock['product_code'] }}</td>
                                                    <td>{{ $stock['category_name'] }}</td>
                                                    <td>{{ $stock['sub_category_name'] }}</td>
                                                    <td>{{ $stock['quantity'] }}</td>
                                                    <td>{{ $stock['selling_price'] }}</td>
                                                    <td>{{ $stock['buying_price'] }}</td>
                                                    <td>{{ $stock['discount'] }}</td>
                                                    <td>
                                                        <div class="productimgname">
                                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                                <img src="{{ $stock['supplier_profile'] && file_exists(storage_path('app/public/' . $stock['supplier_profile'])) ? asset('storage/' . $stock['supplier_profile']) : \Laravolt\Avatar\Facade::create($stock['supplier'])->toBase64() }}" alt="Supplier" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                                            </a>
                                                            <div>
                                                                <a href="javascript:void(0);" class="ms-2">{{ $stock['supplier'] }}</a>
                                                            </div>
                                                        </div>         
                                                    </td>
                                                    <td>{{ $stock['created_by'] }}</td>
                                                    <td>{{ $stock['created_on'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /product list -->
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
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
                                        <a class="btn btn-filter" id="filter_search1">
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
                                <div class="card" id="filter_inputs1">
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="box" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>Lenovo 3rd Generation </option>
                                                        <option>Nike Jordan </option>
                                                        <option>Amazon Echo Dot </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="zap" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Category</option>
                                                        <option>Laptop</option>
                                                        <option>Shoe</option>
                                                        <option>Speaker</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <i data-feather="archive" class="info-img"></i>
                                                    <select class="select">
                                                        <option>Choose Warehouse</option>
                                                        <option>Lavish Warehouse </option>
                                                        <option>Lobar Handy </option>
                                                        <option>Traditional Warehouse </option>
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
                                                <th>Created On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stocks as $stock)
                                                <tr>
                                                    <td>
                                                        <label class="checkboxs">
                                                            <input type="checkbox">
                                                            <span class="checkmarks"></span>
                                                        </label>
                                                    </td>
                                                    <td>{{ $stock['product_name'] }}</td>
                                                    <td>{{ $stock['description'] }}</td>
                                                    <td>{{ $stock['product_code'] }}</td>
                                                    <td>{{ $stock['category_name'] }}</td>
                                                    <td>{{ $stock['sub_category_name'] }}</td>
                                                    <td>{{ $stock['quantity'] }}</td>
                                                    <td>{{ $stock['selling_price'] }}</td>
                                                    <td>{{ $stock['buying_price'] }}</td>
                                                    <td>{{ $stock['discount'] }}</td>
                                                    <td>
                                                        <div class="productimgname">
                                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                                <img src="{{ $stock['supplier_profile'] && file_exists(storage_path('app/public/' . $stock['supplier_profile'])) ? asset('storage/' . $stock['supplier_profile']) : \Laravolt\Avatar\Facade::create($stock['supplier'])->toBase64() }}" alt="Supplier" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                                            </a>
                                                            <div>
                                                                <a href="javascript:void(0);" class="ms-2">{{ $stock['supplier'] }}</a>
                                                            </div>
                                                        </div>         
                                                    </td>
                                                    <td>{{ $stock['created_by'] }}</td>
                                                    <td>{{ $stock['created_on'] }}</td>
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
        </div>
    </div>

    <x-modal.send-email-alert-modal />

    <x-modal.edit-stock />

</x-app-layout>
