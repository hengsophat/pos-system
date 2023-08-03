<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                   

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">0</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            @if(Auth::user()->can('pos.menu'))
                            <li>
                                <a href="{{ route('pos') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>POS</span>
                                </a>
                            </li>
                            @endif
                            <li class="menu-title">Pages</li>
                            @if(Auth::user()->can('all.role.permission.menu'))
                            <!-- <li>
                                <a href="#permission" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Roles And Permission</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false" id="permission">
                                    <li><a href="{{ route('all.permission') }}">All Permission</a></li>
                                    <li><a href="{{ route('all.roles') }}">All Role</a></li>
                                    <li><a href="{{ route('add.roles.permission') }}">Roles in Permission</a></li>
                                    <li><a href="{{ route('all.roles.permission') }}">All Roles in Permission</a></li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="#admin" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Setting Admin User</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false" id="admin">
                                    <li><a href="{{ route('all.admin') }}">All Admin</a></li>
                                    <li><a href="{{ route('all.roles.permission') }}">All Roles in Permission</a></li>
                                </ul>
                            </li>
                            @endif
                            <!-- @if(Auth::user()->can('employee.menu'))
                            <li>
                                <a href="#permission" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Employee Manage</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false" id="permission">
                                    @if(Auth::user()->can('employee.all'))
                                    <li><a href="{{ route('all.employee') }}">All Employee</a></li>
                                    @endif
                                    @if(Auth::user()->can('employee.add'))
                                    <li><a href="{{ route('add.employee') }}">Add Employee</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif -->
                            @if(Auth::user()->can('category.menu'))
                            <li>
                                <a href="#category" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Category</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false" id="category">
                                    @if(Auth::user()->can('category.all'))
                                    <li><a href="{{ route('all.category') }}">All Category</a></li> 
                                    @endif
                                </ul>
                            </li>
                            @endif
                            @if(Auth::user()->can('product.menu'))
                            <li>
                                <a href="#product" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Product</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false" id="product">
                                    @if(Auth::user()->can('product.all'))
                                    <li><a href="{{ route('all.product') }}">All Product</a></li>
                                    @endif
                                    @if(Auth::user()->can('product.add'))
                                    <li><a href="{{ route('add.product') }}">Add Product</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                            @if(Auth::user()->can('sales.menu'))
                            <li>
                                <a href="#order" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Sales</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false" id="order">
                                    @if(Auth::user()->can('sales.pending'))
                                    <li><a href="{{ route('pending.order') }}">Pending Sales</a></li>
                                    @endif
                                    @if(Auth::user()->can('sales.complete'))
                                    <li><a href="{{ route('complete.order') }}">Complete Sales</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                            <li>
                                <a href="#order" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Customer</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false" id="order">
                                    <li><a href="{{ route('all.customer') }}">All Customer</a></li>
                                    <li><a href="{{ route('add.customer') }}">Add Customer</a></li>
                                </ul>
                            </li>
                            @if(Auth::user()->can('stock.menu'))
                            <li>
                                <a href="#stock" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Stock Manage</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false" id="stock">
                                    @if(Auth::user()->can('stock.balance'))
                                    <li><a href="{{ route('stock.manage') }}">Stock Balance</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>