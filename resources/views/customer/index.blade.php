@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-2 p-3">
            <form action="{{ route('customer.store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="customer_name" class="form-label ">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name"
                            :value="{{ old('customer_name') }}">
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
                        <input type="file" class="form-control" id="customer_img" name="customer_img" >
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
                        <textarea class="form-control" name="address" id="address" >{{ old('address') }}</textarea>
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
                                    <td><img src="{{ asset('c_images/' . $item->customer_img) }}" height="30px" width="50px"></td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->postal_code }}</td>
                                    <td>
                                        <a  href="{{ route('customer.edit', encrypt($item->id)) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a  href="{{route('customer.delete',encrypt($item->id)) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        {{-- <a href=""><i class="fa fa-file-pdf-o" style="font-size:17px;color:red"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
