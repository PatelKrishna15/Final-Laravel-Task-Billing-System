@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-2 p-3">
            <form action="{{ route('store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="customer_name" class="form-label ">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name"
                            value="{{ old('customer_name') }}">
                        @error('customer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="industry" class="form-label">Industry</label>
                        <input type="text" class="form-control" name="industry" id="industry"
                            value="{{ old('industry') }}">
                        @error('industry')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" id="contact_person"
                            value="{{ old('contact_person') }}">
                        @error('contact_person')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="customer_img" class="form-label">Customer Image</label>
                        <input type="file" class="form-control" id="customer_img" name="customer_img">
                        @error('customer_img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="postal_code" class="form-label">Customer Postalcode</label>
                        <input type="text" class="form-control" name="postal_code"
                            id="postal_code"value="{{ old('postal_code') }}">
                        @error('postal_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="address" class="form-label">Customer Address</label><br>
                        <textarea class="form-control" name="address" id="address" style="width: 710px">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Store</button>
                    </div>
            </form>
        </div>
    </div>
    <div class="container">

        <h2 align=center>Customer Details</h2>
        <div class="card">
            <div class="row">
                <div class="col md-4 p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Industry</th>
                                <th scope="col">Contact Person</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Customer Image</th>
                                <th scope="col">Address</th>
                                <th scope="col">Postal Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->industry }}</td>
                                    <td>{{ $item->contact_person }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->industry }}</td>
                                    <td>@mdo</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
