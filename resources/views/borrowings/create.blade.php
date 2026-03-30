@extends('layout.main')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Peminjaman</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Form Peminjaman Baru</h4>
            </div>
            <form id="formBorrowing">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pilih Anggota</label>
                                <select name="member_id" class="form-control select2" required>
                                    <option value="">-- Cari Anggota --</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Harus Kembali</label>
                                <input type="date" name="due_date" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered" id="bookTable">
                        <thead>
                            <tr>
                                <th>Judul Buku</th>
                                <th width="150">Jumlah (Qty)</th>
                                <th width="50">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="book-row">
                                <td>
                                    <select name="items[0][book_id]" class="form-control" required>
                                        <option value="">-- Pilih Buku --</option>
                                        @foreach($books as $book)
                                            <option value="{{ $book->id }}">{{ $book->title }} (Stok: {{ $book->stock }})</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="items[0][qty]" class="form-control" value="1" min="1">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success btn-sm" id="addBook">
                        <i class="fas fa-plus"></i> Tambah Baris Buku
                    </button>
                </div>
                <div class="card-footer text-right">
                    <button type="button" id="btnSubmit" class="btn btn-primary btn-lg">Simpan Transaksi</button>
                </div>
            </form>
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

<script>
    let rowIdx = 1;

    // Tambah baris buku
    $('#addBook').click(function() {
        let newRow = `
            <tr class="book-row">
                <td>
                    <select name="items[${rowIdx}][book_id]" class="form-control" required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }} (Stok: {{ $book->stock }})</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="items[${rowIdx}][qty]" class="form-control" value="1" min="1">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button>
                </td>
            </tr>`;
        $('#bookTable tbody').append(newRow);
        rowIdx++;
    });

    // Hapus baris buku
    $(document).on('click', '.remove-row', function() {
        if($('.book-row').length > 1) {
            $(this).closest('tr').remove();
        } else {
            alert("Minimal harus meminjam 1 buku.");
        }
    });

    // Submit AJAX
    $('#btnSubmit').click(function() {
        let isValid = true;
    
        $('.book-row select').each(function() {
            if ($(this).val() === "") {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            iziToast.warning({
                title: 'Peringatan',
                message: 'Silahkan pilih buku.',
                position: 'topRight'
            });
            return;
        }

        let data = $('#formBorrowing').serialize();

        $.ajax({
            url: "{{ route('borrowings.store') }}",
            type: "POST",
            data: data,
            success: function(response) {
                iziToast.success({
                    title: 'Berhasil',
                    message: response.message,
                    position: 'topRight'
                });
                setTimeout(() => { window.location.href = "{{ route('borrowings.create') }}"; }, 1500);
            },
            error: function(xhr) {
                let errorMsg = xhr.responseJSON ? xhr.responseJSON.message : 'Terjadi kesalahan sistem.';
                iziToast.error({
                    title: 'Gagal',
                    message: errorMsg,
                    position: 'topRight'
                });
            }
        });
    });
</script>
@endsection