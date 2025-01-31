@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Buku') }}</div>

                    <div class="card-body">
                        <form action="{{ route('buku.store') }}" method="post" class="p-3" enctype="multipart/form-data">
                            @csrf
                            <h2 class="text-center">Create New Buku</h2>

                            <!-- Nama Buku -->
                            <div class="mb-3">
                                <label for="nama_buku" class="form-label @error('nama_buku') is-invalid @enderror">Nama
                                    Buku</label>
                                <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                                    placeholder="Enter book name" value="{{ old('nama_buku') }}">
                                @error('nama_buku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Penerbit Selection -->
                            <div class="mb-3">
                                <label for="id_penerbit"
                                    class="form-label @error('id_penerbit') is-invalid @enderror">Penerbit</label>
                                <select class="form-select" id="id_penerbit" name="id_penerbit">
                                    <option value="" disabled selected>Select Penerbit</option>
                                    @foreach ($penerbits as $penerbit)
                                        <option value="{{ $penerbit->id }}">{{ $penerbit->nama_penerbit }}</option>
                                    @endforeach
                                </select>
                                @error('id_penerbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Genre Selection -->
                            <div class="mb-3">
                                <label for="id_genre"
                                    class="form-label @error('id_genre') is-invalid @enderror">Genre</label>
                                <select class="form-select" id="id_genre" name="id_genre">
                                    <option value="" disabled selected>Select Genre</option>
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                    @endforeach
                                </select>
                                @error('id_genre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Harga -->
                            <div class="mb-3">
                                <label for="harga" class="form-label @error('harga') is-invalid @enderror">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="Enter price" value="{{ old('harga') }}">
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Stok -->
                            <div class="mb-3">
                                <label for="stok" class="form-label @error('stok') is-invalid @enderror">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok"
                                    placeholder="Enter stock" value="{{ old('stok') }}">
                                @error('stok')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Cover Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label @error('image') is-invalid @enderror">Cover
                                    Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Stok -->
                            <div class="mb-3">
                                <label for="tanggal_terbit"
                                    class="form-label @error('tanggal_terbit') is-invalid @enderror">Tanggal Terbit</label>
                                <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit"
                                    placeholder="Enter stock" value="{{ old('tanggal_terbit') }}">
                                @error('tanggal_terbit')
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
