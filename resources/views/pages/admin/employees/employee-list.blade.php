<x-app-layout>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">

                <x-table.table-top-head 
                    title="Employees" 
                    subtitle="Manage your Employees" 
                    addTitleText="Add New Employee" 
                    importTitleText="" 
                    isModal="false" 
                    modalTarget="" 
                    routeTarget="{{ route('admin.employee.add') }}" 
                />

                <div class="card">
                    <div class="card-body pb-0">
                        <div class="table-top table-top-two table-top-new">
                            <div class="search-set mb-0">
                                <div class="total-employees">
                                    <h6>
                                        <i data-feather="users" class="feather-user"></i>
                                        Total Employees
                                        <span>21</span>
                                    </h6>
                                </div>
                                <div class="search-input relative">
                                    <a href="javascript:void(0);" class="btn btn-searchset absolute left-3 top-1/2 transform -translate-y-1/2">
                                        <i data-feather="search" class="feather-search"></i>
                                    </a>
                                    <input type="search" class="form-control pl-10" id="search-box" placeholder="Search...">
                                </div>
                            </div>
                            <div class="search-path d-flex align-items-center search-path-new">
                                <div class="d-flex">
                                    <a class="btn btn-filter" id="filter_search">
                                        <i data-feather="filter" class="filter-icon"></i>
                                        <span>
                                            <img src="{{ asset('images/svg/closes.svg') }}" alt="img">
                                        </span>
                                    </a>
                                    <a href="{{ asset('images/svg/list.svg') }}" class="btn-list">
                                        <i data-feather="list" class="feather-user"></i>
                                    </a>
                                    <a href="{{ asset('images/svg/grid.svg') }}" class="btn-grid active">
                                        <i data-feather="grid" class="feather-user"></i>
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

                        </div>
                        <!-- /Filter -->
                        <div class="card" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="user" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Name</option>
                                                <option>Mitchum Daniel</option>
                                                <option>Susan Lopez</option>
                                                <option>Robert Grossman</option>
                                                <option>Janet Hembre</option>
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
                    </div>
                </div>
                <!-- /product list -->

                <div class="employee-grid-widget">
                    <div class="row">
                        @foreach ($employees as $employee)
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="employee-grid-profile">
                                    <div class="profile-head">
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                        <div class="profile-head-action">
                                            <span class="badge {{ $employee->isActive ? 'badge-linesuccess' : 'badge-linedanger' }} text-center w-auto me-1">
                                                {{ $employee->isActive ? 'Active' : 'Inactive' }}
                                            </span>
                                            <div class="dropdown profile-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i data-feather="more-vertical" class="feather-user"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        {{-- {{ url('/edit-employee', $employee->id) }} --}}
                                                        <a href="" class="dropdown-item">
                                                            <i data-feather="edit" class="info-img"></i>Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item confirm-text mb-0">
                                                            <i data-feather="trash-2" class="info-img"></i>Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-info">
                                        <div class="profile-pic {{ $employee->isActive ? 'active-profile' : '' }}">
                                            <img src="{{ $employee->profile ?? asset('images/svg/profile.svg') }}" alt="Profile Picture" style="width:80px;height:80px;">
                                        </div>
                                        <h5>EMP ID: {{ $employee->emp_id }}</h5>
                                        <h4>{{ $employee->name }}</h4>
                                        <span>{{ $employee->designation }}</span>
                                    </div>
                                    <ul class="department">
                                        <li>
                                            Joined
                                            <span>{{ \Carbon\Carbon::parse($employee->hired_date)->format('d M Y') }}</span>
                                        </li>
                                        <li>
                                            Department
                                            <span>{{ $employee->role }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row custom-pagination">
                        <div class="col-md-12">
                            <div class="paginations d-flex justify-content-end mb-3">
                                @if ($employees->onFirstPage())
                                    <span class="disabled"><i class="fas fa-chevron-left"></i></span>
                                @else
                                    <a href="{{ $employees->previousPageUrl() }}" rel="prev"><i class="fas fa-chevron-left"></i></a>
                                @endif
                
                                <ul class="d-flex align-items-center page-wrap">
                                    @foreach ($employees->getUrlRange(1, $employees->lastPage()) as $page => $url)
                                        <li>
                                            <a href="{{ $url }}" class="{{ $page == $employees->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                
                                @if ($employees->hasMorePages())
                                    <a href="{{ $employees->nextPageUrl() }}" rel="next"><i class="fas fa-chevron-right"></i></a>
                                @else
                                    <span class="disabled"><i class="fas fa-chevron-right"></i></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        
    @endpush
    
</x-app-layout>
