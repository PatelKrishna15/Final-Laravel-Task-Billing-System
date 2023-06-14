@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-2 p-3">

            <form action="{{ route('store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="name" class="form-label ">Company Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Company Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="image" class="form-label">Company Image/Logo</label>
                        <input type="file" class="form-control" id="image" name="image"
                            value="{{ old('image') }}">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <label for="address" class="form-label">Company Address</label><br>
                            <textarea name="address" id="address" style="width: 710px">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="postalcode" class="form-label">Comapny Postalcode</label>
                            <input type="text" class="form-control" name="postalcode"
                                id="postalcode"value="{{ old('postalcode') }}">
                            @error('postalcode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="fax" class="form-label">Company Fax</label>
                            <input type="text" class="form-control" name="fax" id="fax"
                                value="{{ old('fax') }}">
                            @error('fax')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <select id="country_id" class="form-select mt-4" name="country_id">
                                <option>Select Country</option>
                                @forelse ($country as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @empty
                                    <option value="">No country found.</option>
                                @endforelse
                                @error('country_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
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
                            {{-- @php($i = 1)
                            @endphp --}}
                            @foreach ($company as $item)
                                <tr>
                                    {{-- <th scope="row">{{ $i++ }} </th> --}}
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    {{-- <td><img src="{{ asset('images/' . $item->image) }}"></td> --}}
                                    <td>{{ $item->country->name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('edit', encrypt($item->id)) }}"
                                            data-id="{{ $item->id }}">Edit</a>
                                        <a class="btn btn-danger"
                                            href="{{ route('delete', encrypt($item->id)) }}"data-id="{{ $item->id }}">Delete</a>
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
