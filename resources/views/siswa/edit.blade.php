@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Data Siswa') }}</div>

                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data"
                            class="p-3">
                            @csrf
                            @method('PUT')
                            <h2 class="text-center">Edit Siswa </h2>
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="number" class="form-control" id="nis" name="nis"
                                    value="{{ $siswa->nis }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $siswa->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin"
                                    value="{{ $siswa->jenis_kelamin }}">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" id="kelas" name="kelas" value="{{ $siswa->kelas }}">
                                    <option value="XI RPL 1">XI RPL 1</option>
                                    <option value="XI RPL 2">XI RPL 2</option>
                                    <option value="XI RPL 3">XI RPL 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Cover</label>
                                <div><img src="{{ asset('/images/siswa/' . $siswa->cover) }}" width="100" class="my-2">
                                </div>
                                <input type="file" class="form-control" id='cover' name="cover">
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
