@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Data Siswa') }}</div>

                    <div class="card-body">
                        <form action="{{ route('ppdb.update', $siswa->id) }}" method="post" enctype="multipart/form-data"
                            class="p-3">
                            @csrf
                            @method('PUT')
                            <h2 class="text-center">New Siswa PPDB</h2>
                            <div class="mb-3">
                                <label for="nama_lengkap"
                                    class="form-label @error('nama_lengkap') is-invalid @enderror">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    value="{{ $siswa->nama_lengkap }}" placeholder="Masukan nama lengkap siswa...  "
                                    disabled>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin"
                                    class="form-label @error('jenis_kelamin') is-invalid @enderror">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" disabled>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label @error('agama') is-invalid @enderror">Agama</label>
                                <select class="form-select" id="agama" name="agama" disabled>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label @error('alamat') is-invalid @enderror">Alamat
                                </label>
                                <textarea class="form-control" id="alamat" rows="3" name="alamat"
                                    placeholder="Masukan alamat terkini siswa..." disabled>{{ $siswa->alamat }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label @error('telepon') is-invalid @enderror">Nomor
                                    Telepon</label>
                                <input type="phone" class="form-control" id="telepon" name="telepon"
                                    value="{{ $siswa->telepon }}" placeholder="Masukan nama lengkap siswa...  " disabled>
                                @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="asal_sekolah"
                                    class="form-label @error('asal_sekolah') is-invalid @enderror">Asal
                                    Sekolah</label>
                                <input type="phone" class="form-control" id="asal_sekolah" name="asal_sekolah"
                                    value="{{ $siswa->asal_sekolah }}" placeholder="Masukan asal sekolah siswa...  "
                                    disabled>
                                @error('asal_sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                        <a href="{{ route('ppdb.index') }}">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
