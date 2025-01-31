@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Data Siswa') }}</div>

                    <div class="card-body">
                        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="post"
                            enctype="multipart/form-data" class="p-3">
                            @csrf
                            @method('PUT')
                            <h2 class="text-center">New Siswa PPDB</h2>
                            <div class="mb-3">
                                <label for="nama" class="form-label @error('nama') is-invalid @enderror">Nama
                                    Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $pengguna->nama }}" placeholder="Masukan nama lengkap pengguna...  ">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label @error('telepon') is-invalid @enderror">Nomor
                                    Telepon</label>
                                <input type="phone" class="form-control" id="telepon" name="telepon"
                                    placeholder="Masukan nama lengkap siswa...  " value="{{ $pengguna->telepon()->nomor }}">
                                @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex align-items-center justify-content-center ">
                                <input type="submit" class="btn btn-primary w-100" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
