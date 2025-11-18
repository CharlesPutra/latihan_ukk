@extends('layout.navbar')

@section('navbar')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-dark text-white text-center">
                <h4 class="mb-0">Form Tambah Transaksi</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="id_barang" class="form-label fw-bold">Pilih Barang</label>

                        <select class="form-select" name="id_barang" id="id_barang" required>
                            <option value="">-- Pilih Barang --</option>

                            @foreach ($barangs as $item)
                                <option value="{{ $item->id }}" data-img="{{ asset('storage/' . $item->image) }}">
                                    {{ $item->nama_barang }} - Rp {{ number_format($item->harga_barang, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="diskon" class="form-label fw-bold">Diskon (%)</label>
                        <input type="number" class="form-control" id="diskon" name="diskon"
                            placeholder="Masukkan diskon (opsional)">
                        <small class="text-muted">Isi 0 jika tidak ada diskon.</small>
                    </div>

                    {{-- <div class="mb-3">
                    <label for="total" class="form-label fw-bold">Total Harga</label>
                    <input type="number" class="form-control" id="total" name="total" readonly placeholder="Akan otomatis terisi">
                </div> --}}

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-4">Simpan</button>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            function formatOption(state) {
                if (!state.id) {
                    return state.text;
                }

                const img = $(state.element).data('img');

                return $(`
                <span style="display:flex; align-items:center;">
                    <img src="${img}" style="width:40px; height:40px; object-fit:cover; margin-right:10px; border-radius:5px;">
                    ${state.text}
                </span>
            `);
            }

            $('#id_barang').select2({
                templateResult: formatOption,
                templateSelection: formatOption,
                width: '100%'
            });
        });
    </script>

    {{-- <script>
    // Auto hitung total harga
    document.addEventListener('DOMContentLoaded', () => {
        const barangSelect = document.getElementById('id_barang');
        const diskonInput = document.getElementById('diskon');
        const totalInput = document.getElementById('total');
        const hargaBarang = @json($barangs->pluck('harga_barang', 'id'));

        function updateTotal() {
            const selectedId = barangSelect.value;
            const diskon = parseFloat(diskonInput.value) || 0;
            const harga = hargaBarang[selectedId] || 0;
            const total = harga - (harga * diskon / 100);
            totalInput.value = total > 0 ? Math.round(total) : 0;
        }

        barangSelect.addEventListener('change', updateTotal);
        diskonInput.addEventListener('input', updateTotal);
    });
</script> --}}
@endsection
