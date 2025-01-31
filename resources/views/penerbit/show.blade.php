@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Order') }}</div>

                    <div class="card-body">
                        <form action="{{ route('penerbit.update', $penerbit->id) }}" method="post" class="p-3">
                            @csrf
                            @method('PATCH')
                            <h2 class="text-center">Show Penerbit</h2>

                            <div class="mb-3">
                                <label for="nama_penerbit"
                                    class="form-label @error('nama_penerbit') is-invalid @enderror">Nama Penerbit</label>
                                <input type="text" name="nama_penerbit" id="nama_penerbit"
                                    class="form-control input-group" value="{{ $penerbit->nama_penerbit }}" disabled>
                                @error('nama_penerbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <a href="{{ route('penerbit.index') }}">
                                << Back to Penerbits</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
