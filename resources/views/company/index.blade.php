@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="card mt-2 p-3">
                <form action="{{ route('store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name" class="form-label ">Company Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="form-label">Company Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">Company Image/Logo</label>
                            <input type="file" class="form-control" id="image" name="image" >
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="address" class="form-label">Company Address</label><br>
                            <textarea class="form-control" name="address" id="address" style="width: 710px" >{{old('address')}}</textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="postalcode" class="form-label">Comapny Postalcode</label>
                            <input type="text" class="form-control" name="postalcode" id="postalcode"value="{{old('postalcode')}}">
                            @error('postalcode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="fax" class="form-label">Company Fax</label>
                                <input type="text" class="form-control" name="fax" id="fax" value="{{old('fax')}}">
                                @error('fax')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="country_id" class="form-label">Select Country</label>
                                <select id="country_id" class="form-select " class="form-control" name="country_id" >
                                    <option value="" selected disabled>Select Country</option>
                                    @forelse ($country as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @empty
                                    <option value="">No country found.</option>
                                    @endforelse
                                </select>
                                @error('country_id')
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
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $item)
                            {{-- @dd($item->country->name) --}}
                                <tr>
                                    <th scope="row">{{ $i++ }} </th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    
                                    {{-- <td><img src="{{ asset('images/' . $item->image) }}"></td> --}}
                                    <td>{{ $item->country->name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('edit', encrypt($item->id)) }}"
                                            data-id="{{ $item->id }}">Edit</a>
                                        {{-- <a class="btn btn-danger" href="{{ route('company.delete',encrypt($item->id)) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> --}}
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
