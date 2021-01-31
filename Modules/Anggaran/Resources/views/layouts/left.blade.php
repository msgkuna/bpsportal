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
                <li class="nav-header"><i class="fas fa-balance-scale"></i> Manajemen Anggaran</li>
                <li class="nav-item">
                    <a href="{{ url('/anggaran') }}" class="nav-link {{ (request()->is('anggaran')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i><p>Realisasi</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ (request()->is(
                    'anggaran/data/akun*',
                    'anggaran/data/detail*',
                    'anggaran/data/komponen*',
                    'anggaran/data/subkomponen*',
                    'anggaran/data/kro*',
                    'anggaran/data/ro*',
                    ))? 'menu-open':'menu-close'}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i><p>Data<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kro.index') }}" class="nav-link {{ (request()->is('anggaran/data/kro*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Klasifikasi RO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ro.index') }}" class="nav-link {{ (request()->is('anggaran/data/ro*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Rincian Output</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kmpnen.index') }}" class="nav-link {{ (request()->is('anggaran/data/komponen*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Komponen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('skmpnen.index') }}" class="nav-link {{ (request()->is('anggaran/data/subkomponen*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Sub Komponen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('akun.index') }}" class="nav-link {{ (request()->is('anggaran/data/akun*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Akun</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('item.index') }}" class="nav-link {{ (request()->is('anggaran/data/detail*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Detail Kegiatan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (request()->is(
                    'anggaran/master/satker*',
                    'anggaran/master/dept*',
                    'anggaran/master/akun*',
                    'anggaran/master/unit*',
                    'anggaran/master/lokasi*',
                    'anggaran/master/kabkota*',
                    'anggaran/master/program*',
                    'anggaran/master/giat*',
                    ))? 'menu-open':'menu-close'}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i><p>Master<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('mdept') }}" class="nav-link {{ (request()->is('anggaran/master/dept*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>K/L</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('munit') }}" class="nav-link {{ (request()->is('anggaran/master/unit*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Eselon I</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mlokasi') }}" class="nav-link {{ (request()->is('anggaran/master/lokasi*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Lokasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mkabkota') }}" class="nav-link {{ (request()->is('anggaran/master/kabkota*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Kabupaten/Kota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('msatker') }}" class="nav-link {{ (request()->is('anggaran/master/satker*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Satuan Kerja BPS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mprogram') }}" class="nav-link {{ (request()->is('anggaran/master/program*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mgiat') }}" class="nav-link {{ (request()->is('anggaran/master/giat*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Aktivitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('makun') }}" class="nav-link {{ (request()->is('anggaran/master/akun*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i><p>Bagan Akun</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dipa') }}" class="nav-link {{ (request()->is('anggaran/dipa')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wallet"></i><p>DIPA Online</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
