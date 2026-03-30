@extends('layout.main')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Perpustakaan</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary"><i class="fas fa-book"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Total Buku</h4></div>
                        <div class="card-body">{{ $total_books }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info"><i class="fas fa-users"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Anggota</h4></div>
                        <div class="card-body">{{ $total_members }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning"><i class="fas fa-book-reader"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Dipinjam</h4></div>
                        <div class="card-body">{{ $active_borrow }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Terlambat</h4></div>
                        <div class="card-body">{{ $overdue_count }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Sistem Informasi Perpustakaan</h4>
                    </div>
                    <div class="card-body text-center py-5">
                        <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
                        <p class="text-muted">Selamat datang di Sistem Informasi Perpustakaan. Kelola data buku dan transaksi dengan mudah di sini.</p>
                        <div class="mt-4">
                            <a href="{{ route('borrowings.create') }}" class="btn btn-primary btn-lg">Buat Transaksi Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection