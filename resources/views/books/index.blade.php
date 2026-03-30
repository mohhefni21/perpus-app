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
                                <h4>Daftar Buku</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ISBN</th>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($books->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak ada data buku.</td>
                                                </tr>
                                            @else
                                                @foreach($books as $book)
                                                    <tr>
                                                    <td>{{ $book->isbn }}</td>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->author }}</td>
                                                    <td>{{ $book->stock }}</td>
                                                    <td>
                                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                                            @csrf @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="float-right">
                                    {{ $books->links() }}
                                </div>
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
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        @endif
    </script>
@endsection