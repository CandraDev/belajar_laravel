@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Order Data') }}</div>

                    <div class="card-body">
                        <table class="table text-center align-middle table-striped">
                            <thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $order->product->name_product }}</td>
                                        <td>{{ $order->customer->name_customer }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td><img src="{{ asset('images/product/' . $order->product->cover) }}"
                                                width="100" alt=""></td>
                                        <td>
                                            <div class="display-flex align-items-center justify-content-center">
                                                <div class="mb-2">
                                                    <a href="{{ route('orders.edit', $order->id) }}">
                                                        <button class="btn btn-warning">Edit</button>
                                                    </a>
                                                </div>
                                                <div class="mb-2">
                                                    <a href="{{ route('orders.show', $order->id) }}">
                                                        <button class="btn btn-primary">Show</button>
                                                    </a>
                                                </div>
                                                <div class="mb-2">
                                                    <a href="javascript:void(0);" class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('orders.destroy', $order->id) }}')">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('orders.create') }}">Add New Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
