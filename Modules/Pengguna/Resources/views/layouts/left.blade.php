<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('/images/logo.png')}}" alt="BPS Logo" class="brand-image">
        <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header">Manajemen Pengguna</li>
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link {{ (request()->is('index*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i><p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link  {{ (request()->is('pengguna/role*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i><p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permission.index') }}" class="nav-link  {{ (request()->is('pengguna/permission*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-shield"></i><p>Permissions</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
