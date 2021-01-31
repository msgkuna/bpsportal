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
                <li class="nav-header"><i class="fas fa-users"></i> Manajemen Pengguna</li>
                <li class="nav-item">
                    <a href="{{ route('pengguna') }}" class="nav-link {{ (request()->is('pengguna')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house-user"></i><p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('pengguna/user*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i><p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link  {{ (request()->is('pengguna/role*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i><p>Role</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permission.index') }}" class="nav-link  {{ (request()->is('pengguna/permission*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-shield"></i><p>Permission</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
