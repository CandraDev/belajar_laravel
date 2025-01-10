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
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Asal Sekolah</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppdb as $siswa)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $siswa->nama_lengkap }}</td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td>{{ $siswa->telepon }}</td>
                                        <td>{{ $siswa->asal_sekolah }}</td>
                                        <td>
                                            <div class="display-flex align-items-center justify-content-center">
                                                <div class="mb-2"><a href="{{ route('ppdb.edit', $siswa->id) }}"><button
                                                            class="btn btn-warning">Edit</button></a></div>
                                                <div class="mb-2">
                                                    <a href="{{ route('ppdb.show', $siswa->id) }}"><button
                                                            class="btn btn-primary">Show</button></a>
                                                </div>
                                                <div class="mb-2">
                                                    {{-- <form action="{{ route('ppdb.destroy', $siswa->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            data-confirm-delete="true">Delete</button>
                                                    </form> --}}

                                                    <a href="{{ route('ppdb.destroy', $siswa->id) }}"
                                                        class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                                </div>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('ppdb.create') }}">Add new siswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
