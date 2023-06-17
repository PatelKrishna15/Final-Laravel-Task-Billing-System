@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-2 p-3">
            <form action="{{ route('store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name" class="form-label ">Company Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Company Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone"value="{{$data->phone}}">
                    </div>
                    <div class="col-md-4">
                        <label for="image" class="form-label">Company Image/Logo</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <img src="{{asset('images/'.$data->image)}}" height="50" width="50">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="address" class="form-label">Company Address</label><br>
                        <textarea name="address" id="address" style="width: 710px">{{$data->address}}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="postalcode" class="form-label">Comapny Postalcode</label>
                        <input type="text" class="form-control" name="postalcode" id="postalcode" value="{{$data->postalcode}}">
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="fax" class="form-label">Company Fax</label>
                            <input type="text" class="form-control" name="fax" id="fax" value="{{$data->fax}}">
                        </div>
                        <div class="col-md-5">
                            <select id="country_id" class="form-select mt-4" name="country_id">
                                <option value="">Select Country</option>
                                @forelse ($country as $con)
                                    <option value="{{ $con->id }}" {{ $data->country_id == $con->id ? 'selected' : '' }}>{{ $con->name }}</option>
                                @empty
                                    <option value="">No country found.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" href="{{route('company.index')}}">Back</a>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
   
  <div class="container">
        <div class="card mt-2 p-3">
 
          
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
                            <tr>
                                <th scope="row">{{$i++}} </th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                {{-- <td><img src="{{ asset('images/' . $item->image) }}"></td> --}}
                                <td>{{ $item->country->name }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('edit', encrypt($item->id)) }}"
                                        data-id="{{ $item->id }}">Edit</a> 
                                     {{-- <a class="btn btn-danger"data-url="{{ route('delete', $item->id) }}"data-id="{{ $item->id }}">Delete</a> --}}
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
