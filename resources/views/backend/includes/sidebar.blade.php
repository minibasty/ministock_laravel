<aside class="main-sidebar sidebar-dark-olive elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/backend/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @if(Auth::user()->isAdmin == 1)
        <li class="nav-header">ADMIN MANAGE</li>
        <li class="nav-item">
          <a href="{{ url('backend/reports')}}" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Report</p>
          </a></li>
        <li class="nav-item">
          <a href="{{ url('backend/users')}}" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Users</p>
          </a></li>
        <li class="nav-item">
          <a href="{{ url('backend/settings')}}" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Setting</p>
          </a></li>
        @endif
        <li class="nav-header">USER MANAGE</li>
        <li class="nav-item has-treeview {{ (request()->is('backend/products*')) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-cubes"></i>
            <p>
              Products
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/backend/products" class="nav-link {{ (request()->is('backend/products')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/backend/products/create" class="nav-link {{ (request()->is('backend/products/create')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Product</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{url('logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out"></i>
            <p>
              Sign out
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
