<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('/images/logo.png')}}" alt="BPS Logo" class="brand-image">
        <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Manajemen Anggaran</li>
                <li class="nav-item">
                    <a href="{{ url('/anggaran') }}" class="nav-link">
                        <i class="nav-icon fas fa-digital-tachograph"></i><p>Realisasi</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('anggaran/akun*', 'anggaran/item*', 'anggaran/kmpnen*', 'anggaran/skmpnen*', 'anggaran/kro*', 'anggaran/ro*'))? 'menu-open':'menu-close'}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i><p>Database<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('akun.index') }}" class="nav-link {{ (request()->is('anggaran/akun*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Data Akun</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('item.index') }}" class="nav-link {{ (request()->is('anggaran/item*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Data Detail Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kmpnen.index') }}" class="nav-link {{ (request()->is('anggaran/kmpnen*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Data Komponen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('skmpnen.index') }}" class="nav-link {{ (request()->is('anggaran/skmpnen*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Data Sub Komponen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kro.index') }}" class="nav-link {{ (request()->is('anggaran/kro*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Data KRO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ro.index') }}" class="nav-link {{ (request()->is('anggaran/ro*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Data RO</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
