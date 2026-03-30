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
                                <h4>Tambah Anggota Baru</h4>
                            </div>
                            <form action="{{ route('members.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon/WA</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Lengkap</label>
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" style="height: 100px">{{ old('address') }}</textarea>
                                        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Daftarkan Anggota</button>
                                    <a href="{{ route('members.index') }}" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection