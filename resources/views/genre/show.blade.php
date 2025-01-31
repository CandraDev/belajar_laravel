@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Order') }}</div>

                    <div class="card-body">
                        <form action="{{ route('genre.update', $genre->id) }}" method="post" class="p-3">
                            @csrf
                            @method('PATCH')
                            <h2 class="text-center">Show Genre</h2>

                            <div class="mb-3">
                                <label for="genre" class="form-label @error('genre') is-invalid @enderror">Nama
                                    Genre</label>
                                <input type="text" name="genre" id="genre" class="form-control input-group"
                                    value="{{ $genre->genre }}" disabled>
                                @error('genre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <a href="{{ route('genre.index') }}">
                                << Back to Genres</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
