@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Order') }}</div>

                    <div class="card-body">
                        <form action="{{ route('penerbit.store') }}" method="post" class="p-3">
                            @csrf
                            <h2 class="text-center">Create New Penerbit</h2>

                            <!-- Product Selection -->
                            <div class="mb-3">
                                <label for="nama_penerbit"
                                    class="form-label @error('nama_penerbit') is-invalid @enderror">Nama Penerbit</label>
                                <input type="text" name="nama_penerbit" id="nama_penerbit"
                                    class="form-control input-group">
                                @error('nama_penerbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex align-items-center justify-content-center">
                                <input type="submit" class="btn btn-primary w-100" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
