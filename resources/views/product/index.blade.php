@extends('layouts.app')
@section('content')
<div class="container">
    
    <div class="card mt-2 p-3">
        <form action="{{ route('product.store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="product_name" class="form-label ">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" value="{{old('product_name')}}">
                    @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="col-md-6">
                    <label for="product_img" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="product_img" name="product_img" >
                    @error('product_img')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="product_price" class="form-label">Product Price</label><br>
                    <input type="text" class="form-control" id="product_price" name="product_price" value="{{old('product_price')}}">
                    @error('product_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="company_id" class="form-label">Select Company</label>
                    <select id="company_id" class="form-select " name="company_id" >
                        <option value="" selected disabled>Select Company Name</option>
                        @forelse ($company as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
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
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Store</button>
                </div>
        </form>
    </div>
</div>
<div class="container">

    <div class="card mt-2 p-3">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Company</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                        {{-- @dd($item->product_company) --}}
                            <tr>
                                <th scope="row">{{ $i++ }} </th>
                                <td>{{ $item->product_name }}</td>
                                <td><img src="{{ asset('images/' . $item->product_img) }}" height="30px" width="50px"></td>
                                <td>{{ $item->product_price}}</td>
                                <td>{{ $item->company->name}}</td>
                                <td>
                                    <a  href="{{ route('product.edit', encrypt($item->id)) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a  href="{{route('product.delete',encrypt($item->id=random_int(0,1445654))) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-file-pdf-o" style="font-size:17px;color:red"></i></a>
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