@extends('layout.main')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Anggota</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Daftar Anggota Perpustakaan</h4>
                <div class="card-header-action">
                    <a href="{{ route('members.create') }}" class="btn btn-primary">Tambah Anggota</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($members->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data anggota.</td>
                                </tr>
                            @else
                                @foreach($members as $m)
                                <tr>
                                    <td>{{ $m->name }}</td>
                                    <td>{{ $m->phone }}</td>
                                    <td>{{ $m->address }}</td>
                                    <td>
                                        <a href="{{ route('members.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('members.destroy', $m->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus anggota?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection