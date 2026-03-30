@extends('layout.main')

@section('main-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Dashboard</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Dashboard</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5>Sistem Informasi Perpustakaan</h5>
                            </div>
                            <div class="card-body">
                                <p>Halo <b>{{ Auth::user()->name }}</b></b>
                                </p>
                                <p>Selamat datang di Sistem Informasi Perpustakaan!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        @if (session()->has('success'))
            iziToast.success({
                title: 'Berhasil',
                message: '{{ session('success') }}', // Wrap in single quotes
                position: 'topRight'
            });
        @endif
    </script>
@endsection
