@extends('layout.main')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('members.index') }}">Anggota</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Form Edit Anggota: #{{ $member->id }}</h4>
                        </div>
                        <form action="{{ route('members.update', $member->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name', $member->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon/WA</label>
                                    <input type="text" name="phone" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           value="{{ old('phone', $member->phone) }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="address" 
                                              class="form-control @error('address') is-invalid @enderror" 
                                              style="height: 100px" required>{{ old('address', $member->address) }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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