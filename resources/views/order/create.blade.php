@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Order') }}</div>

                    <div class="card-body">
                        <form action="{{ route('orders.store') }}" method="post" class="p-3">
                            @csrf
                            <h2 class="text-center">Create New Order</h2>

                            <!-- Product Selection -->
                            <div class="mb-3">
                                <label for="id_product"
                                    class="form-label @error('id_product') is-invalid @enderror">Product</label>
                                <select class="form-select" id="id_product" name="id_product">
                                    <option value="" disabled selected>Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name_product }}</option>
                                    @endforeach
                                </select>
                                @error('id_product')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Customer Selection -->
                            <div class="mb-3">
                                <label for="id_customer"
                                    class="form-label @error('id_customer') is-invalid @enderror">Customer</label>
                                <select class="form-select" id="id_customer" name="id_customer">
                                    <option value="" disabled selected>Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name_customer }}</option>
                                    @endforeach
                                </select>
                                @error('id_customer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="mb-3">
                                <label for="quantity"
                                    class="form-label @error('quantity') is-invalid @enderror">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    placeholder="Enter quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Order Date -->
                            <div class="mb-3">
                                <label for="order_date" class="form-label @error('order_date') is-invalid @enderror">Order
                                    Date</label>
                                <input type="date" class="form-control" id="order_date" name="order_date"
                                    value="{{ old('order_date') }}">
                                @error('order_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3 d-flex align-items-center justify-content-center">
                                <input type="submit" class="btn btn-primary w-100" value="Create Order">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
