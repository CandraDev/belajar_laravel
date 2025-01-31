@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Transaksi') }}</div>

                    <div class="card-body">
                        <form action="{{ route('transaksi.store') }}" method="post" class="p-3"
                            enctype="multipart/form-data">
                            @csrf
                            <h2 class="text-center">Create New Transaksi</h2>

                            <div class="mb-3">
                                <label for="id_buku" class="form-label @error('id_buku') is-invalid @enderror">Buku</label>
                                <select class="form-select" id="id_buku" name="id_buku">
                                    <option value="" disabled selected>Select Buku</option>
                                    @foreach ($bukus as $buku)
                                        <option value="{{ $buku->id }}">{{ $buku->nama_buku }}</option>
                                    @endforeach
                                </select>
                                @error('id_buku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jumlah"
                                    class="form-label @error('jumlah') is-invalid @enderror">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="input-group form-control"
                                    min="0">
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_transaksi"
                                    class="form-label @error('tanggal_transaksi') is-invalid @enderror">Tanggal
                                    Transaksi</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                                    value="{{ old('tanggal_transaksi') }}">
                                @error('tanggal_transaksi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_pembeli"
                                    class="form-label @error('id_pembeli') is-invalid @enderror">Buku</label>
                                <select class="form-select" id="id_pembeli" name="id_pembeli">
                                    <option value="" disabled selected>Select Pembeli</option>
                                    @foreach ($pembelis as $pembeli)
                                        <option value="{{ $pembeli->id }}">{{ $pembeli->nama_pembeli }}</option>
                                    @endforeach
                                </select>
                                @error('id_pembeli')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3 d-flex align-items-center justify-content-center">
                                <input type="submit" class="btn btn-primary w-100" value="Create Buku">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
