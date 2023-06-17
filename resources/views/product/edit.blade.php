@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-2 p-3">
        <form action="{{ route('product.store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id=" id" value="{{$product->id}}">
            <div class="row">
                <div class="col-md-6">
                    <label for="product_name" class="form-label ">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" value="{{$product->product_name}}">
                    @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="col-md-6">
                    <label for="product_img" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="product_img" name="product_img" >
                    <img src="{{asset('images/'.$product->product_img)}}" width="30px">
                    @error('product_img')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="product_price" class="form-label">Product Price</label><br>
                    <input type="text" class="form-control" id="product_price" name="product_price" value="{{$product->product_price}}">
                    @error('product_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="company_id" class="form-label">Select Company</label>
                    <select id="company_id" class="form-select " name="company_id" >
                        <option value="" selected disabled>Select Company Name</option>
                        @forelse ($company as $com)
                        <option value="{{ $com->id }}"{{ $com->company_id == $com->id?'selected':'' }}>{{$com->name}}</option>
                        @empty
                        <option value="">No company found.</option>
                        @endforelse
                    </select>
                    @error('company_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="{{route('product.index')}}">Back</a>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
    </div>
</div>
@endsection