@extends('layout.main')

@section('main-content')
<style>
    .blink-text {
        animation: blinker 1.5s linear infinite;
    }
    @keyframes blinker {
        50% { opacity: 0.3; }
    }
</style>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Riwayat Peminjaman</h1>
        </div>
        <div class="card card-primary">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Peminjam</th>
                                <th>Informasi Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($borrowings->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data peminjaman.</td>
                                </tr>
                            @else
                                @foreach($borrowings as $b)
                                    @php
                                        $isOverdue = $b->status == 'borrowed' && \Carbon\Carbon::parse($b->due_date)->isPast();
                                    @endphp
                                    <tr>
                                        <td>
                                            <strong>{{ $b->member->name }}</strong>
                                        </td>
                                        <td>
                                            <small>Dipinjam: {{ $b->borrow_date }}</small><br>
                                            
                                            <small class="{{ $isOverdue ? 'bg-danger text-white px-1 rounded blink-text' : 'text-danger' }}">
                                                Batas waktu: {{ $b->due_date }}
                                            </small>
                                            
                                            @if($isOverdue)
                                                <span class="badge badge-danger ml-1" style="font-size: 8px;">Terlambat!</span>
                                            @endif
                                            
                                            @if($b->status == 'returned')
                                                <br><small class="text-success">Dikembalikan: {{ $b->return_date }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($isOverdue)
                                                <span class="badge badge-danger">Overdue</span>
                                            @else
                                                <span class="badge badge-{{ $b->status == 'borrowed' ? 'warning' : 'success' }}">
                                                    {{ $b->status == 'borrowed' ? 'Dipinjam' : 'Kembali' }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('borrowings.show', $b->id) }}" class="btn btn-info btn-sm mr-1" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                @if($b->status == 'borrowed')
                                                    <form action="{{ route('borrowings.return', $b->id) }}" method="POST">
                                                        @csrf 
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi pengembalian buku?')">
                                                            <i class="fas fa-check"></i> Kembalikan
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                    {{ $borrowings->links() }}
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
    
    @if (session()->has('error'))
        iziToast.error({
            title: 'Gagal',
            message: '{{ session('error') }}',
            position: 'topRight'
        });
    @endif
</script>
@endsection