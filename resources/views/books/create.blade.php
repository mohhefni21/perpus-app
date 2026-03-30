@extends('layout.main')

@section('main-content')
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
                                <h4>Tambah Buku Baru</h4>
                            </div>
                            <form action="{{ route('books.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') }}" required>
                                        @error('isbn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Penulis</label>
                                        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required>
                                        @error('author')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stok Awal</label>
                                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', 0) }}" required>
                                        @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('books.index') }}" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection