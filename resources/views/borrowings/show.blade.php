@extends('layout.main')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Peminjaman #{{ $borrowing->id }}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <h6>Nama Peminjam: {{ $borrowing->member->name }}</h6>
                <h6>Status: {{ ucfirst($borrowing->status) }}</h6>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul Buku</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowing->details as $detail)
                        <tr>
                            <td>{{ $detail->book->title }}</td>
                            <td>{{ $detail->qty }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('borrowings.index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection