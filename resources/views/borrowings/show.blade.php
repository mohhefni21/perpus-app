@extends('layout.main')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Peminjaman #{{ $borrowing->id }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Nama Peminjam: <span class="text-primary">{{ $borrowing->member->name }}</span></h6>
                        <h6>Status: 
                            @if($borrowing->status == 'borrowed')
                                <span class="badge badge-warning">Sedang Dipinjam</span>
                            @else
                                <span class="badge badge-success">Sudah Dikembalikan</span>
                            @endif
                        </h6>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <small>Tgl Pinjam: <b>{{ $borrowing->borrow_date }}</b></small><br>
                        <small class="text-danger">Batas Kembali: <b>{{ $borrowing->due_date }}</b></small>
                        @if($borrowing->return_date)
                            <br><small class="text-success">Tgl Kembali: <b>{{ $borrowing->return_date }}</b></small>
                        @endif
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr class="bg-light">
                                <th width="10%">No</th>
                                <th>Judul Buku</th>
                                <th width="20%">Jumlah (Qty)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($borrowing->details as $index => $detail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $detail->book->title }}</td>
                                <td>{{ $detail->qty }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-right mt-4">
                    <a href="{{ route('borrowings.index') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection