@extends('layout.main')

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Buku</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('books.index') }}">Buku</a></div>
                    <div class="breadcrumb-item">Edit</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Form Edit Buku: {{ $book->title }}</h4>
                            </div>
                            <form action="{{ route('books.update', $book->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" 
                                               value="{{ old('isbn', $book->isbn) }}" required>
                                        @error('isbn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                               value="{{ old('title', $book->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Penulis</label>
                                        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" 
                                               value="{{ old('author', $book->author) }}" required>
                                        @error('author')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" 
                                               value="{{ old('stock', $book->stock) }}" required>
                                        @error('stock')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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