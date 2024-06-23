<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Office</div>

    <!-- Nav Item - Pages Collapse Menu -->
    @php
        $segment1 = Request::segment(1);
        $pages = array('clients', 'items');
    @endphp
    <li class="nav-item @if(in_array($segment1, $pages)) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse @if(in_array($segment1, $pages)) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Customer:</h6>
                <a class="collapse-item {{ request()->is('clients') ? 'active' : '' }}" href="{{ url('/clients') }}">Clients</a>
                <a class="collapse-item {{ request()->is('suppliers') ? 'active' : '' }}" href="{{ url('/suppliers') }}">Suppliers</a>
                <a class="collapse-item {{ request()->is('items') ? 'active' : '' }}" href="{{ url('/items') }}">Items</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if($segment1 == 'raw-products') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventory"
           aria-expanded="false" aria-controls="collapseInventory">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Inventory</span>
        </a>
        <div id="collapseInventory" class="collapse @if($segment1 == 'raw-products') show @endif" aria-labelledby="headingInventory" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Inventory:</h6>
                <a class="collapse-item {{ request()->is('raw-products') ? 'active' : '' }}" href="{{ url('/rawproducts') }}">Raw Products</a>
                <a class="collapse-item {{ request()->is('finish-products') ? 'active' : '' }}" href="{{ url('/finishproducts') }}">Finish Products</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Jobs</div>

    <!-- Nav Item - Jobs Collapse Menu -->
    <li class="nav-item {{ request()->is('jobs', '/addjobpage') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobs"
           aria-expanded="@if($segment1 == 'jobs') true @else false @endif" aria-controls="collapseJobs">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Jobs</span>
        </a>
        <div id="collapseJobs" class="collapse @if($segment1 == 'jobs') show @endif" aria-labelledby="headingJobs" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Job Management:</h6>
                <a class="collapse-item {{ request()->is('addjobpage') ? 'active' : '' }}" href="{{ url('/addjobpage') }}">Add Job</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Staffs -->
    <li class="nav-item {{ request()->is('staffs') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/staffs') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Staffs</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
