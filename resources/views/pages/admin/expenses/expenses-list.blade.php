<x-app-layout>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                
                <x-table.table-top-head 
                    title="Manage Expense" 
                    subtitle="Manage your expense" 
                    addTitleText="Add New Expense" 
                    importTitleText="Import Expense" 
                    isModal="false" 
                    modalTarget="#add-expense"
                    routeTarget="" 
                />

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
                                    <option>11 09 23</option>
                                    <option>20 09 23</option>
                                </select>
                            </div>
                        </div>

                        <div class="card" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="user" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Name</option>
                                                <option>Macbook pro</option>
                                                <option>Orange</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="stop-circle" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Status</option>
                                                <option>Computers</option>
                                                <option>Fruits</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <div class="input-groupicon">
                                                <input type="text" class="datetimepicker" placeholder="From Date - To Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="file-text" class="info-img"></i>
                                            <div class="input-groupicon">
                                                <input type="text" class="datetimepicker" placeholder="Enter Reference">
                                            </div>
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
                                        <th>Expenses</th>
                                        <th>Purpose</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Expense Date</th>
                                    </tr>
                                </thead>
                                <tbody class="Expense-list-blk">
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>{{ $expense['expenses'] }}</td>
                                            <td>{{ $expense['purpose'] ?? 'N/A' }}</td>
                                            <td>{{ $expense['description'] ?? 'No description' }}</td>
                                            <td>&#8369; {{ number_format($expense['amount'], 2) }}</td>
                                            <td>
                                                @switch($expense['expense_status'])
                                                    @case('Active')
                                                        <span class="badge badge-linesuccess">Active</span>
                                                        @break
                                                    @case('Inactive')
                                                        <span class="badge badge-linedanger">Inactive</span>
                                                        @break
                                                    @default
                                                        <span class="badge badge-secondary">Unknown</span>
                                                @endswitch
                                            </td>
                                            <td>{{ $expense['created_by'] ?? 'Unknown' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($expense['created_at'])->format('F j, Y') }}</td>
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