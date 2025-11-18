@extends('layout.navbar')

@section('navbar')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Transaksi</h4>
            <a href="{{ route('transaksi.create') }}" class="btn btn-success btn-sm mb-2">+ Tambah Transaksi</a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th>Tanggal Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksi as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->barang ? $item->barang->nama_barang : '-' }}</td>
                                <td>Rp {{ number_format($item->barang->harga_barang ?? 0, 0, ',', '.') }}</td>
                                <td>{{ $item->diskon ? $item->diskon . '%' : '-' }}</td>
                                <td><strong>Rp {{ number_format($item->total, 0, ',', '.') }}</strong></td>
                                <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        {{-- <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                                        <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted">Belum ada data transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
