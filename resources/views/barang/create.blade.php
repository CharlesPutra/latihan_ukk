@extends('layout.navbar')

@section('navbar')
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-dark text-white text-center py-3 rounded-top-4">
            <h4 class="mb-0 fw-semibold">🛒 Form Tambah Data Barang</h4>
        </div>

        <div class="card-body p-4 bg-light">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukkan nama barang" required>
                    <div class="invalid-feedback">Nama barang wajib diisi.</div>
                </div>

                <div class="mb-3">
                    <label for="harga_barang" class="form-label fw-semibold">Harga Barang</label>
                    <input type="number" name="harga_barang" id="harga_barang" class="form-control" placeholder="Masukkan harga barang" required>
                    <div class="invalid-feedback">Harga barang wajib diisi.</div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" placeholder="Masukkan deskripsi barang..."></textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png">
                    <small class="text-muted">Format yang diperbolehkan: JPG, JPEG, PNG (maks. 2MB)</small>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark px-5 py-2 fw-semibold">
                        Simpan Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Optional Bootstrap Validation Script --}}
<script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
@endsection
