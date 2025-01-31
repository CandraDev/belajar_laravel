@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('List Transaksi') }}</div>

                    <div class="card-body">
                        <table class="table text-center align-middle table-striped">
                            <thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $transaksi->buku->nama_buku }}</td>
                                        <td>{{ $transaksi->pembeli->nama_pembeli }}</td>
                                        <td>{{ $transaksi->jumlah }}</td>
                                        <td>{{ $transaksi->tanggal_transaksi }}</td>
                                        <td>
                                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                                <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure? Deleted data cannot be restored')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('transaksi.create') }}">Add New Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
