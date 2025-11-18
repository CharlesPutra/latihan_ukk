@extends('layout.navbar')

@section('navbar')
    <div class="container my-5">
        <h2 class="mb-4 text-center">Daftar Barang</h2>

        <!-- TABLE -->
        <div class="table-responsive">
            <a href="{{ route('barang.create') }}" class="btn btn-primary  mb-2">Tambah data</a>
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $i => $data)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td><img src="{{ asset('storage/' . $data->image) }}" alt=""></td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->harga_barang }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>
                                <form action="{{ route('barang.destroy', $data->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
