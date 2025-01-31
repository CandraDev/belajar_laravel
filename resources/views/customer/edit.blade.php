@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Data Customer') }}</div>

                    <div class="card-body">
                        <form action="{{ route('customer.update', $customer->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Customer Name : </label>
                                <input type="text" class="form-control" name="name_customer"
                                    value="{{ $customer->name_customer }}">
                            </div>
                            <div class="mb-3">
                                <label>Gender : </label>
                                <select name="gender" class="form-select">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Contact: </label>
                                <input type="text" class="form-control" name="contact" value="{{ $customer->contact }}">
                            </div>
                            <button type="submit" class="btn btn-success" name="save">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
