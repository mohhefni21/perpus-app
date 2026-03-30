<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">SIP</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SIP</a>
        </div>
        <ul class="sidebar-menu mb-5">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            
            <li class="menu-header">Data master</li>
            <li class="{{ request()->is('books*') ? 'active' : '' }}"><a href="{{ route('books.index') }}"
                    class="nav-link"><i class="fas fa-book"></i><span>Daftar Buku</span></a></li>
            <li class="{{ request()->is('members*') ? 'active' : '' }}"><a href="{{ route('members.index') }}"
                    class="nav-link"><i class="fas fa-users"></i><span>Daftar Anggota</span></a></li>

            <li class="menu-header">Peminjaman</li>
            <li class="{{ request()->is('periode') ? 'active' : '' }}"><a class="nav-link" href="/periode"><i
                        class="fas fa-calendar-check"></i><span>Transaksi Peminjaman</span></a></li>
            <li class="{{ request()->is('periode') ? 'active' : '' }}"><a class="nav-link" href="/periode"><i
                        class="fas fa-calendar-check"></i><span>Riwayat Peminjaman</span></a></li>
        </ul>
    </aside>
</div>
