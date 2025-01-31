@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Order Buku') }}</div>

                    <div class="card-body">
                        <table class="table text-center align-middle table-striped">
                            <thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bukus as $buku)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $buku->nama_buku }}</td>
                                        <td>{{ $buku->penerbit->nama_penerbit }}</td>
                                        <td>{{ $buku->genre->genre }}</td>
                                        <td>{{ $buku->harga }}</td>
                                        <td>{{ $buku->stok }}</td>
                                        <td><img src="{{ asset('images/buku/' . $buku->image) }}" width="100"
                                                alt=""></td>
                                        <td>
                                            <div class="display-flex align-items-center justify-content-center">
                                                <div class="mb-2">
                                                    <a href="{{ route('buku.edit', $buku->id) }}">
                                                        <button class="btn btn-warning">Edit</button>
                                                    </a>
                                                </div>
                                                <div class="mb-2">
                                                    <a href="{{ route('buku.show', $buku->id) }}">
                                                        <button class="btn btn-primary">Show</button>
                                                    </a>
                                                </div>
                                                <div class="mb-2">
                                                    <a href="javascript:void(0);" class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('buku.destroy', $buku->id) }}')">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('buku.create') }}">Add New Buku</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
