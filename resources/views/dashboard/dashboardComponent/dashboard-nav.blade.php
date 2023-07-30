@include('dashboard.dashboardComponent.header')

<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{url('/dashboard')}}" class="text-nowrap logo-img">
                    <img src="{{url('dashbord/assets/images/logos/dark-logo.svg')}}" width="180" alt=""/>
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{url('/dashboard')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    @if($is_admin?? true)
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Users</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('users')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                                <span class="hide-menu">List Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url("create")}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                                <span class="hide-menu">Create User</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Vendors</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('vendors')}}" aria-expanded="false">
                            <span>
                              <i class="ti ti-folder"></i>
                            </span>
                                <span class="hide-menu">List Vendors</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url("vendors/create")}}" aria-expanded="false">
                            <span>
                              <i class="ti ti-folder-plus"></i>
                            </span>
                                <span class="hide-menu">Create Vendor</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Brands</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('brands')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-brand-apple"></i>
                </span>
                                <span class="hide-menu">List Brands</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url("brands/create")}}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-grid-add"></i>
                </span>
                                <span class="hide-menu">Create Brands</span>
                            </a>
                        </li>


                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Items</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('items')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-backpack"></i>
                </span>
                                <span class="hide-menu">List Items</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url("items/create")}}" aria-expanded="false">
                <span>
                  <i class="ti ti-playlist-add"></i>
                </span>
                                <span class="hide-menu">Create Items</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Inventories</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('inventory')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-backpack"></i>
                </span>
                                <span class="hide-menu">List Inventories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url("inventory/create")}}" aria-expanded="false">
                <span>
                  <i class="ti ti-playlist-add"></i>
                </span>
                                <span class="hide-menu">Create Inventories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url("inventory/add")}}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout"></i>
                </span>
                                <span class="hide-menu">Add To Inventories</span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Cart</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{url('cart')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                            <span class="hide-menu">Cart Item</span>
                        </a>
                    </li>

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Profile</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('profile.edit')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="sidebar-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();" aria-expanded="false">
                            <span>
                              <i class="ti ti-logout"></i>
                            </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
