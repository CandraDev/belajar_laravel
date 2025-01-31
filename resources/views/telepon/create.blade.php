@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Data Siswa') }}</div>

                    <div class="card-body">
                        <form action="{{ route('pengguna.store') }}" method="post" enctype="multipart/form-data"
                            class="p-3">
                            @csrf
                            <h2 class="text-center">New Pengguna</h2>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label @error('nama') is-invalid @enderror">Nama
                                    Pengguna</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukan nama pengguna...  ">
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
                                    placeholder="Masukan nama lengkap siswa...  ">
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
