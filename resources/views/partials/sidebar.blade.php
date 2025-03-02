<aside class="main-sidebar">
    <section class="sidebar position-relative">
        <div class="d-flex align-items-center logo-box justify-content-start d-md-block d-none">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="logo">
                <div class="logo-mini">
                    <span class="light-logo">
                        <img src="{{ asset('images/favicon_img.png') }}" alt="logo">
                    </span>
                </div>
                <div class="logo-lg">
                    <span class="light-logo fs-36 fw-700">Pay<span class="text-primary">Gate</span></span>
                </div>
            </a>
        </div>
        <!-- User profile widget -->
        <div class="user-profile my-15 px-20 py-10 b-1 rounded10 mx-15">
            <div class="d-flex align-items-center justify-content-between">
                <div class="image d-flex align-items-center">
                    <img src="{{ asset('images/avatar/avatar-13.png') }}" class="rounded-0 me-10" alt="User Image">
                    <div>
                        <h4 class="mb-0 fw-600">{{ Auth::user()->name }}</h4>
                        <p class="mb-0">Super Admin</p>
                    </div>
                </div>
                <div class="info">
                    <a class="dropdown-toggle p-15 d-grid" data-bs-toggle="dropdown" href="#"></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="ti-user"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-lock"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar menu -->
        <div class="multinav">
            <div class="multinav-scroll" style="height: 97%;">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Main Menu</li>
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pos.index') }}">
                            <i class="icon-Box"><span class="path1"></span><span class="path2"></span></i>
                            <span>POS Machines</span>
                        </a>
                    </li>

                    <!-- Tax Profile Menu -->
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Money"><span class="path1"></span><span class="path2"></span></i>
                            <span>Tax Profile</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('tax-profile.index') }}">
                                    <i class="icon-List"></i> View Tax Profiles
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tax-profile.create') }}">
                                    <i class="icon-Add-User"></i> Create Tax Profile
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Settings -->
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Settings"><span class="path1"></span><span class="path2"></span></i>
                            <span>Settings</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('admin.revenue_settings.index') }}">
                                    <i class="icon-Money"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Revenue Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.mining_sites.index') }}">
                                    <i class="icon-Globe"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Mining Sites</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.mineral_deposits.index') }}">
                                    <i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Mineral Deposits</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Payments -->
                    <li class="treeview">
                        <a href="#">
                        <i class="icon-Money"><span class="path1"></span><span class="path2"></span></i>
                        <span>Payments</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('payments.history') }}">
                            <i class="icon-Book"><span class="path1"></span><span class="path2"></span></i> Payment History
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('payments.select') }}">
                            <i class="icon-Wallet"><span class="path1"></span><span class="path2"></span></i> Make Payment
                            </a>
                        </li>
                        </ul>
                    </li>
                  </ul>
            </div>
        </div>
    </section>
</aside>
