<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">SPK</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SPK</a>
        </div>
        <ul class="sidebar-menu mb-5">
            <li class="menu-header">Dashboard</li>

            <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Proses Pemilihan</li>
            @can('isAdmin')
                <li class="{{ request()->is('periode') ? 'active' : '' }}"><a class="nav-link" href="/periode"><i
                            class="fas fa-calendar-check"></i><span>Data Periode</span></a></li>
            @endcan
            <li class="{{ request()->is('kriteria') ? 'active' : '' }}"><a class="nav-link" href="/kriteria"><i
                        class="fas fa-fingerprint"></i><span>Data
                        Kriteria</span></a></li>
            @can('isAdmin')
                <li class="{{ request()->is('pembobotan-kriteria') ? 'active' : '' }}"><a class="nav-link"
                        href="/pembobotan-kriteria"><i class="fas fa-calculator"></i><span>Pembobotan Kriteria</span></a>
                </li>
            @endcan
            <li class="{{ request()->is('bobot_nilai_kriteria') ? 'active' : '' }}"><a class="nav-link"
                    href="/bobot_nilai_kriteria"><i class="fas fa-fingerprint"></i>
                    <span>Bobot nilai kriteria</span></a></li>
            <li class="{{ request()->is('alternatif', 'alternatif/*') ? 'active' : '' }}"><a class="nav-link"
                    href="/alternatif"><i class="fas fa-users"></i><span>Data Alternatif</span></a></li>
            @can('isAdmin')
                <li class="{{ request()->is('perangkingan') ? 'active' : '' }}"><a class="nav-link" href="/perangkingan"><i
                            class="fas fa-calculator"></i></i><span>Perangkingan</span></a>
                </li>
            @endcan
            <li class="{{ request()->is('hasil-perangkingan') ? 'active' : '' }}"><a class="nav-link"
                    href="/hasil-perangkingan"><i class="fas fa-chart-bar"></i><span>Hasil
                        Perangkingan</span></a>
            </li>
            <li class="{{ request()->is('proses-validasi', 'hasil-validasi') ? 'active' : '' }}"><a class="nav-link"
                    href="/hasil-validasi"><i class="fas fa-clipboard-check"></i><span>Hasil
                        Validasi</span></a></li>
            <li class="{{ request()->is('riwayat-bantuan') ? 'active' : '' }}"><a class="nav-link"
                    href="/riwayat-bantuan"><i class="fas fa-history"></i><span>Riwayat Bantuan</span></a></li>
            </li>
            @can('isAdmin')
                <li class="menu-header">Master User</li>
                <li class="{{ request()->is('user') ? 'active' : '' }}"><a class="nav-link" href="/user"><i
                            class="fas fa-users-cog"></i><span>Data User</span></a></li>
                <li class="{{ request()->is('pengaturan') ? 'active' : '' }}"><a class="nav-link" href="/pengaturan"><i
                            class="fas fa-user-cog"></i><span>Pengaturan</span></a></li>
            @endcan
        </ul>
    </aside>
</div>
