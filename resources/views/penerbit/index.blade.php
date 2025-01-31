@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Genre Data') }}</div>

                    <div class="card-body">
                        <table class="table text-center align-middle table-striped">
                            <thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Penerbit</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerbits as $penerbit)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $penerbit->nama_penerbit }}</td>
                                        <td>
                                            <div class="display-flex align-items-center justify-content-center">

                                                <div class="mb-2">
                                                    <form action="{{ route('penerbit.destroy', $penerbit->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('penerbit.edit', $penerbit->id) }}"
                                                            class="btn btn-success btn-sm">Edit</a>
                                                        <a href="{{ route('penerbit.show', $penerbit->id) }}"
                                                            class="btn btn-warning btn-sm">Show</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure? Deleted data cannot be restored')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('penerbit.create') }}">Add New Penerbit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
