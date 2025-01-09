@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Data Siswa') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <p>{{ session('success') }}</p>
                        @endif

                        <table class="table text-center">
                            <thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->kelas }}</td>
                                        <td>
                                            <div class="display-flex align-items-center justify-content-center">
                                                <a href="{{ route('siswa.edit', $siswa->id) }}"><button
                                                        class="btn btn-warning">Edit</button></a>
                                                <a href="{{ route('siswa.show', $siswa->id) }}"><button
                                                        class="btn btn-primary">Show</button></a>
                                                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Anda Yakin?')">Delete</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('siswa.create') }}">Add new siswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection