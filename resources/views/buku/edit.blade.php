@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Transaksi') }}</div>

                    <div class="card-body">
                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" class="p-3"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h2 class="text-center">Edit Transaksi</h2>

                            <div class="mb-3">
                                <label for="id_buku" class="form-label">Buku</label>
                                <select class="form-select" id="id_buku" name="id_buku">
                                    <option value="" disabled>Select Buku</option>
                                    @foreach ($bukus as $buku)
                                        <option value="{{ $buku->id }}"
                                            {{ $transaksi->id_buku == $buku->id ? 'selected' : '' }}>
                                            {{ $buku->nama_buku }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="input-group form-control"
                                    min="0" value="{{ $transaksi->jumlah }}">
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                                    value="{{ $transaksi->tanggal_transaksi }}">
                            </div>

                            <div class="mb-3">
                                <label for="id_pembeli" class="form-label">Pembeli</label>
                                <select class="form-select" id="id_pembeli" name="id_pembeli">
                                    <option value="" disabled>Select Pembeli</option>
                                    @foreach ($pembelis as $pembeli)
                                        <option value="{{ $pembeli->id }}"
                                            {{ $transaksi->id_pembeli == $pembeli->id ? 'selected' : '' }}>
                                            {{ $pembeli->nama_pembeli }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3 d-flex align-items-center justify-content-center">
                                <input type="submit" class="btn btn-primary w-100" value="Update Transaksi">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
