@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Pembeli') }}</div>

                    <div class="card-body">
                        <form action="{{ route('pembeli.update', $pembeli->id) }}" method="post" class="p-3">
                            @csrf
                            @method('PATCH')
                            <h2 class="text-center">Edit Pembeli</h2>

                            <div class="mb-3">
                                <label for="nama_pembeli"
                                    class="form-label @error('nama_pembeli') is-invalid @enderror">Nama
                                    Pembeli</label>
                                <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control input-group"
                                    value="{{ $pembeli->nama_pembeli }}">
                                @error('nama_pembeli')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label for="jenis_kelamin"
                                    class="form-label @error('jenis_kelamin') is-invalid @enderror">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-control input-group" value="{{ $pembeli->jenis_kelamin }}">
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                                <label for="telepon"
                                    class="form-l   abel @error('telepon') is-invalid @enderror">Telepon</label>
                                <input type="text" name="telepon" id="telepon" class="form-control input-group"
                                    value="{{ $pembeli->telepon }}">
                                @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex align-items-center justify-content-center">
                                <input type="submit" class="btn btn-primary w-100" value="Update Pembeli">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
