<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:rgb(90, 23, 197);">

    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="">
            <img src="images/lg.png" style="width: 35px">
        </div>
        <a href="/">  <div class="sidebar-brand-text mx-3">Admin Rotiku</a></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link {{ Request::is('/admin*') ? 'active' : '' }}" aria-current="page"  href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        barang
    </div>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="create">
            <i class="fas fa-clipboard-list"></i>
            <span>Order</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="nampil">
            <i class="fas fa-clipboard-list"></i>
            <span>Manage User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('/roti') ? 'active' : '' }}" href="roti">
            <i class="fas fa-clipboard-list"></i>
            <span>Data Roti</span>
        </a>
    </li>
    
    <li class="nav-item">
    <form action="{{ url('/logout') }}" method="post">
        @csrf
           <button type="submit" class="btn btn-outline-warning "><i class="bi bi-box-arrow-right">Logout</i></button>
      </form>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>