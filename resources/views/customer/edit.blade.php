@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-2 p-3">
            <form action="{{ route('customer.store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="customer_name" class="form-label ">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ $customer->customer_name }}">
                   
                    </div>
                    <div class="col-md-4">
                        <label for="industry" class="form-label">Industry</label>
                        <input type="text" class="form-control" name="industry" id="industry"
                            value="{{ $customer->industry }}">
                     
                    </div>
                    <div class="col-md-4">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" id="contact_person"
                            value="{{$customer->contact_person}}">
                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                            value="{{ $customer->phone }}">
                    
                    </div>
                    <div class="col-md-4">
                        <label for="customer_img" class="form-label">Customer Image</label>
                        <input type="file" class="form-control" id="customer_img" name="customer_img" >
                        <img src="{{asset('c_images/'.$customer->customer_img)}}">
                      
                    </div>
                    <div class="col-md-4">
                        <label for="postal_code" class="form-label">Customer Postalcode</label>
                        <input type="text" class="form-control" name="postal_code"
                            id="postal_code"value="{{ $customer->postal_code }}">
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="address" class="form-label">Customer Address</label><br>
                        <textarea class="form-control" name="address" id="address" >{{$customer->address}}</textarea>
                        
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
    
@endsection