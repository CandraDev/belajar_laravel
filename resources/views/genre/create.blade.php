@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Genre') }}</div>

                    <div class="card-body">
                        <form action="{{ route('genre.store') }}" method="post" class="p-3">
                            @csrf
                            <h2 class="text-center">Create New Genre</h2>

                            <!-- Product Selection -->
                            <div class="mb-3">
                                <label for="genre" class="form-label @error('genre') is-invalid @enderror">Nama
                                    Genre</label>
                                <input type="text" name="genre" id="genre" class="form-control input-group">
                                @error('genre')
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
