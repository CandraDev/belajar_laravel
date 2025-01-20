@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Data PPDB') }}</div>

                    <div class="card-body">


                        <table class="table text-center align-middle table-striped">
                            <thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    {{-- <th scope="col">No. Telp</th> --}}
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $user)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $user->nama }}</td>
                                        {{-- <td>{{ $user->telepon->nomor }}</td> --}}
                                        <td>
                                            <div class="display-flex align-items-center justify-content-center">
                                                <div class="mb-2"><a
                                                        href="{{ route('pengguna.edit', $user->id) }}"><button
                                                            class="btn btn-warning">Edit</button></a></div>
                                                <div class="mb-2">
                                                    <a href="{{ route('pengguna.show', $user->id) }}"><button
                                                            class="btn btn-primary">Show</button></a>
                                                </div>
                                                <div class="mb-2">
                                                    {{-- <form action="{{ route('ppdb.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            data-confirm-delete="true">Delete</button>
                                                    </form> --}}

                                                    <a href="{{ route('pengguna.destroy', $user->id) }}"
                                                        class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                                </div>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('pengguna.create') }}">Add new user</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
