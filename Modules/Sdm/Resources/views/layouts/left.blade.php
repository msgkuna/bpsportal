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
                <li class="nav-header">Manajemen SDM</li>
                <li class="nav-item">
                    <a href="{{url('/sdm')}}" class="nav-link {{ (request()->is('sdm')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i><p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pegawai.index') }}" class="nav-link {{ (request()->is('pegawai*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i><p>Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i><p>Mitra</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i><p>PPNPN</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i><p>Tim Kerja</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('bank*','agama', 'status*', 'pendidikan','jabatan', 'tugas*', 'kawin', 'satker', 'pangkat'))? 'menu-open':'menu-close'}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i><p>Master Table<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('agama') }}" class="nav-link {{ (request()->is('agama')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Agama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pendidikan') }}" class="nav-link {{ (request()->is('pendidikan')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Pendidikan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jabatan') }}" class="nav-link {{ (request()->is('jabatan')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('tugas') }}" class="nav-link {{ (request()->is('tugas*')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Tugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kawin') }}" class="nav-link {{ (request()->is('kawin')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Kawin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('satker') }}" class="nav-link {{ (request()->is('satker')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Satuan Kerja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pangkat') }}" class="nav-link {{ (request()->is('pangkat')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Pangkat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('status') }}" class="nav-link {{ (request()->is('status')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Status Kepegawaian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('bank') }}" class="nav-link {{ (request()->is('bank*')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Bank</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('fungsional*', 'jenjang*'))? 'menu-open':'menu-close'}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i><p>Master Fungsional<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('fungsional') }}" class="nav-link {{ (request()->is('fungsional*')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Jabatan Fungsional</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('jenjang') }}" class="nav-link {{ (request()->is('jenjang*')) ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle"></i><p>Jenjang Jabatan</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
