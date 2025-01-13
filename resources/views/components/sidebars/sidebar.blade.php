<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main</h6>
                    <ul>
                        <li class="">
                                <a href="{{ route('admin.dashboard') }}">
                                        <i data-feather="grid"></i>
                                        <span>Dashboard</span>
                                </a>
                        </li>
                        {{-- <li class="submenu">
                                <a href="javascript:void(0);" class="active subdrop">
                                        <i data-feather="grid"></i>
                                        <span>Dashboard</span>
                                        <span class="menu-arrow"></span>
                                </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/index"
                                        class="active">Admin Dashboard</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/sales-dashboard"
                                        class="">Sales Dashboard</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=" "><i
                                    data-feather="smartphone"></i><span>Application</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/chat"
                                        class="">Chat</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);" class="">Call<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a class=""
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/video-call">Video
                                                Call</a></li>
                                        <li><a class=""
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/audio-call">Audio
                                                Call</a></li>
                                        <li><a class=""
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/call-history">Call
                                                History</a></li>
                                    </ul>
                                </li>
                                <li><a class=""
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/calendar">Calendar</a>
                                </li>
                                <li><a class=""
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/email">Email</a>
                                </li>
                                <li><a class=""
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/todo">To
                                        Do</a></li>
                                <li><a class=""
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/notes">Notes</a>
                                </li>
                                <li><a class=""
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/file-manager">File
                                        Manager</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/social-feed"
                                        class="">Social Feed</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/kanban-view"
                                        class="">Kanban</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Inventory</h6>
                    <ul>
                        <li class="">
                            <a href="{{ route('admin.product.list') }}">
                                <i data-feather="box"></i>
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.product.add') }}">
                                <i data-feather="plus-square"></i>
                                <span>Create Product</span>
                            </a>
                        </li>
                        {{-- <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/expired-products">
                                        <i data-feather="codesandbox"></i>
                                        <span>Expired Products</span>
                                </a>
                        </li> --}}
                        <li class="">
                                <a href="{{ route('admin.stock.low') }}">
                                        <i data-feather="trending-down"></i>
                                        <span>Low Stocks</span>
                                </a>
                        </li>
                        <li class="">
                                <a href="{{ route('admin.category.list') }}"><i
                                    data-feather="codepen"></i>
                                    <span>Category</span>
                                </a>
                        </li>
                        {{-- <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/sub-categories">
                                        <i data-feather="speaker"></i>
                                        <span>Sub Category</span>
                                </a>
                        </li> --}}
                        {{-- <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/brand-list">
                                        <i data-feather="tag"></i>
                                        <span>Brands</span>
                                </a>
                        </li> --}}
                        <li class="">
                                <a href="{{ route('admin.unit.list') }}">
                                        <i data-feather="speaker"></i>
                                        <span>Units</span>
                                </a>
                        </li>
                        {{-- <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/varriant-attributes">
                                        <i data-feather="layers"></i>
                                        <span>Variant Attributes</span>
                                </a>
                        </li> --}}
                        {{-- <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/warranty">
                                        <i data-feather="bookmark"></i>
                                        <span>Warranties</span>
                                </a>
                        </li> --}}
                        {{-- <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/barcode">
                                        <i data-feather="align-justify"></i>
                                        <span>Print Barcode</span>
                                </a>
                        </li> --}}
                        {{-- <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/qrcode">
                                        <i data-feather="maximize"></i>
                                        <span>Print QR Code</span>
                                </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Stock</h6>
                    <ul>
                        <li class="">
                                <a href="{{ route('admin.stock.list') }}">
                                        <i data-feather="package"></i>
                                        <span>Manage Stock</span>
                                </a>
                        </li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/stock-adjustment">
                                        <i data-feather="clipboard"></i><span>Stock
                                    Adjustment</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/stock-transfer">
                                        <i data-feather="truck"></i><span>Stock
                                    Transfer</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Sales</h6>
                    <ul>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/sales-list">
                                        <i data-feather="shopping-cart"></i><span>Sales</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/invoice-report">
                                        <i data-feather="file-text"></i><span>Invoices</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/sales-returns">
                                        <i data-feather="copy"></i><span>Sales
                                    Return</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/quotation-list">
                                        <i data-feather="save"></i><span>Quotation</span></a>
                        </li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/pos">
                                        <i data-feather="hard-drive"></i><span>POS</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Promo</h6>
                    <ul>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/coupons">
                                        <i data-feather="shopping-cart"></i><span>Coupons</span></a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Purchases</h6>
                    <ul>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/purchase-list">
                                        <i data-feather="shopping-bag"></i><span>Purchases</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/purchase-order-report">
                                        <i data-feather="file-minus"></i><span>Purchase Order</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/purchase-returns">
                                        <i data-feather="refresh-cw"></i><span>Purchase
                                    Return</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Finance & Accounts</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i
                                    data-feather="file-text"></i><span>Expenses</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/expense-list"
                                        class="">Expenses</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/expense-category"
                                        class="">Expense
                                        Category</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Peoples</h6>
                    <ul>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/customers">
                                        <i data-feather="user"></i><span>Customers</span></a>
                        </li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/suppliers">
                                        <i data-feather="users"></i><span>Suppliers</span></a>
                        </li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/store-list">
                                        <i data-feather="home"></i><span>Stores</span></a>
                        </li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/warehouse">
                                        <i data-feather="archive"></i><span>Warehouses</span></a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">HRM</h6>
                    <ul>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/employees-grid">
                                        <i data-feather="user"></i><span>Employees</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/department-grid">
                                        <i data-feather="users"></i><span>Departments</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/designation">
                                        <i data-feather="git-merge"></i><span>Designation</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/shift">
                                        <i data-feather="shuffle"></i><span>Shifts</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i
                                    data-feather="book-open"></i><span>Attendence</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/attendance-employee"
                                        class="">Employee</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/attendance-admin"
                                        class="">Admin</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i
                                    data-feather="calendar"></i><span>Leaves</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/leaves-admin"
                                        class="">Admin Leaves</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/leaves-employee"
                                        class="">Employee
                                        Leaves</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/leave-types"
                                        class="">Leave Types</a></li>
                            </ul>
                        </li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/holidays">
                                        <i data-feather="credit-card"></i><span>Holidays</span></a>
                        </li>
                        <li class="submenu">
                            <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/payroll-list"
                                class=""><i data-feather="dollar-sign"></i><span>Payroll</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/payroll-list"
                                        class="">Employee Salary</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/payslip"
                                        class="">Payslip</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Reports</h6>
                    <ul>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/sales-report">
                                        <i data-feather="bar-chart-2"></i><span>Sales
                                    Report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/purchase-report">
                                        <i data-feather="pie-chart"></i><span>Purchase
                                    report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/inventory-report">
                                        <i data-feather="inbox"></i><span>Inventory
                                    Report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/invoice-report">
                                        <i data-feather="file"></i><span>Invoice
                                    Report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/supplier-report">
                                        <i data-feather="user-check"></i><span>Supplier
                                    Report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/customer-report">
                                        <i data-feather="user"></i><span>Customer
                                    Report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/expense-report">
                                        <i data-feather="file"></i><span>Expense
                                    Report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/income-report">
                                        <i data-feather="bar-chart"></i><span>Income
                                    Report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/tax-reports">
                                        <i data-feather="database"></i><span>Tax
                                    Report</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/profit-and-loss">
                                        <i data-feather="pie-chart"></i><span>Profit &
                                    Loss</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">User Management</h6>
                    <ul>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/users">
                                        <i data-feather="user-check"></i><span>Users</span></a>
                        </li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/roles-permissions">
                                        <i data-feather="shield"></i><span>Roles &
                                    Permissions</span></a></li>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/delete-account">
                                        <i data-feather="lock"></i><span>Delete Account
                                    Request</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Pages</h6>
                    <ul>
                        <li class="">
                                <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/profile">
                                        <i data-feather="user"></i><span>Profile</span></a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i
                                    data-feather="shield"></i><span>Authentication</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/signin">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/signin-2">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/signin-3">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/register">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/register-2">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/register-3">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                        Password<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/forgot-password">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/forgot-password-2">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/forgot-password-3">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                        Password<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/reset-password">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/reset-password-2">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/reset-password-3">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Email
                                        Verification<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/email-verification">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/email-verification-2">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/email-verification-3">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step
                                        Verification<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/two-step-verification">Cover</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/two-step-verification-2">Illustration</a>
                                        </li>
                                        <li><a
                                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/two-step-verification-3">Basic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/lock-screen">Lock
                                        Screen</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="file-minus"></i><span>Error
                                    Pages</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/error-404">404
                                        Error </a></li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/error-500">500
                                        Error </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i
                                    data-feather="map"></i><span>Places</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/countries"
                                        class="">Countries</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/states"
                                        class="">States</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/blank-page"><i
                                    data-feather="file"></i><span>Blank Page</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/coming-soon"><i
                                    data-feather="send"></i><span>Coming Soon</span>
                            </a>
                        </li>
                        <li class="">
                            <a
                                href="https://dreamspos.dreamstechnologies.com/laravel/template/public/under-maintenance"><i
                                    data-feather="alert-triangle"></i><span>Under
                                    Maintenance</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Settings</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i data-feather="settings"></i><span>General
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/general-settings"
                                        class="">Profile</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/security-settings"
                                        class="">Security</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/notification"
                                        class="">Notifications</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/connected-apps"
                                        class="">Connected
                                        Apps</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i data-feather="globe"></i><span>Website
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/system-settings"
                                        class="">System
                                        Settings</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/company-settings"
                                        class="">Company
                                        Settings </a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/localization-settings"
                                        class="">Localization</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/prefixes"
                                        class="">Prefixes</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/preference"
                                        class="">Preference</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/appearance"
                                        class="">Appearance</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/social-authentication"
                                        class="">Social
                                        Authentication</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/language-settings"
                                        class="">Language</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i data-feather="smartphone"></i>
                                <span>App Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/invoice-settings"
                                        class="">Invoice</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/printer-settings"
                                        class="">Printer</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/pos-settings"
                                        class="">POS</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/custom-fields"
                                        class="">Custom Fields</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i data-feather="monitor"></i>
                                <span>System Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/email-settings"
                                        class="">Email</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/sms-gateway"
                                        class="">SMS Gateways</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/otp-settings"
                                        class="">OTP</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/gdpr-settings"
                                        class="">GDPR Cookies</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i data-feather="dollar-sign"></i>
                                <span>Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/payment-gateway-settings"
                                        class="">Payment
                                        Gateway</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/bank-settings-grid"
                                        class="">Bank
                                        Accounts</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/tax-rates"
                                        class="">Tax Rates</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/currency-settings"
                                        class="">Currencies</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=" "><i data-feather="hexagon"></i>
                                <span>Other Settings</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/storage-settings"
                                        class="">Storage</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ban-ip-address"
                                        class="">Ban IP
                                        Address</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/signin"><i
                                    data-feather="log-out"></i><span>Logout</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">UI Interface</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="">
                                <i data-feather="layers"></i><span>Base UI</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-alerts"
                                        class="">Alerts</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-accordion"
                                        class="">Accordion</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-avatar"
                                        class="">Avatar</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-badges"
                                        class="">Badges</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-borders"
                                        class="">Border</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-buttons"
                                        class="">Buttons</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-buttons-group"
                                        class="">Button
                                        Group</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-breadcrumb"
                                        class="">Breadcrumb</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-cards"
                                        class="">Card</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-carousel"
                                        class="">Carousel</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-colors"
                                        class="">Colors</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-dropdowns"
                                        class="">Dropdowns</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-grid"
                                        class="">Grid</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-images"
                                        class="">Images</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-lightbox"
                                        class="">Lightbox</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-media"
                                        class="">Media</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-modals"
                                        class="">Modals</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-offcanvas"
                                        class="">Offcanvas</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-pagination"
                                        class="">Pagination</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-popovers"
                                        class="">Popovers</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-progress"
                                        class="">Progress</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-placeholders"
                                        class="">Placeholders</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-rangeslider"
                                        class="">Range Slider</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-spinner"
                                        class="">Spinner</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-sweetalerts"
                                        class="">Sweet Alerts</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-nav-tabs"
                                        class="">Tabs</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-toasts"
                                        class="">Toasts</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-tooltips"
                                        class="">Tooltips</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-typography"
                                        class="">Typography</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-video"
                                        class="">Video</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-sortable"
                                        class="">Sortable</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-swiperjs"
                                        class="">Swiperjs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="">
                                <i data-feather="layers"></i><span>Advanced UI</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-ribbon"
                                        class="">Ribbon</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-clipboard"
                                        class="">Clipboard</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-drag-drop"
                                        class="">Drag & Drop</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-rating"
                                        class="">Rating</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-text-editor"
                                        class="">Text Editor</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-counter"
                                        class="">Counter</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-scrollbar"
                                        class="">Scrollbar</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-stickynote"
                                        class="">Sticky Note</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/ui-timeline"
                                        class="">Timeline</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i data-feather="bar-chart-2"></i>
                                <span>Charts</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/chart-apex"
                                        class="">Apex Charts</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/chart-c3"
                                        class="">Chart C3</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/chart-js"
                                        class="">Chart Js</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/chart-morris"
                                        class="">Morris Charts</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/chart-flot"
                                        class="">Flot Charts</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/chart-peity"
                                        class="">Peity Charts</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i data-feather="database"></i>
                                <span>Icons</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-fontawesome"
                                        class="">Fontawesome
                                        Icons</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-feather"
                                        class="">Feather Icons</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-ionic"
                                        class="">Ionic Icons</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-material"
                                        class="">Material Icons</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-pe7"
                                        class="">Pe7 Icons</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-simpleline"
                                        class="">Simpleline
                                        Icons</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-themify"
                                        class="">Themify Icons</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-weather"
                                        class="">Weather Icons</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-typicon"
                                        class="">Typicon Icons</a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-flag"
                                        class="">Flag Icons</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-tabler"
                                        class="">Tabler Icons</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-bootstrap"
                                        class="">Bootstrap Icons</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/icon-remix"
                                        class="">Remix Icons</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="">
                                <i data-feather="edit"></i><span>Forms</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);" class="">Form
                                        Elements<span class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-basic-inputs"
                                                class="">Basic
                                                Inputs</a></li>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-checkbox-radios"
                                                class="">Checkbox
                                                & Radios</a></li>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-input-groups"
                                                class="">Input
                                                Groups</a></li>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-grid-gutters"
                                                class="">Grid &
                                                Gutters</a></li>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-select"
                                                class="">Form
                                                Select</a></li>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-mask"
                                                class="">Input
                                                Masks</a></li>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-fileupload"
                                                class="">File
                                                Uploads</a></li>
                                    </ul>
                                </li>
                                <li class="submenu submenu-two">
                                    <a href="javascript:void(0);" class="">Layouts<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-horizontal"
                                                class="">Horizontal
                                                Form</a></li>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-vertical"
                                                class="">Vertical
                                                Form</a></li>
                                        <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-floating-labels"
                                                class="">Floating
                                                Labels</a></li>
                                    </ul>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-validation"
                                        class="">Form
                                        Validation</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-select2"
                                        class="">Select2</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-wizard"
                                        class="">Form Wizard</a></li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/form-pickers"
                                        class="">Form Picker</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class=""><i
                                    data-feather="columns"></i><span>Tables</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/tables-basic"
                                        class="">Basic Tables </a>
                                </li>
                                <li><a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/data-tables"
                                        class="">Data Table </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="">
                                <i data-feather="map"></i><span>Maps</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/maps-vector">Vector</a>
                                </li>
                                <li><a
                                        href="https://dreamspos.dreamstechnologies.com/laravel/template/public/maps-leaflet">Leaflet</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Help</h6>
                    <ul>
                        <li><a href="javascript:void(0);"><i
                                    data-feather="file-text"></i><span>Documentation</span></a></li>
                        <li><a href="javascript:void(0);"><i data-feather="lock"></i><span>Changelog
                                    v2.0.8</span></a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="file-minus"></i><span>Multi
                                    Level</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Level 1.1</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a href="javascript:void(0);">Level 2.1</a></li>
                                        <li class="submenu submenu-two submenu-three"><a
                                                href="javascript:void(0);">Level 2.2<span
                                                    class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                <li><a href="javascript:void(0);">Level 3.2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
