@extends('layouts.app')
@section('content')
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.css"
        rel="stylesheet" />

    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js">
    </script>
    <div class="container">
        <div class="card mt-2 p-3">
            <form action="" id="formSubmit" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <select id="customer_name" class="form-select " class="form-control" name="customer_name">
                            <option value="" selected disabled>Select Customer Name</option>
                            @forelse ($customer as $data)
                                <option value="{{ $data->id }}">{{ $data->customer_name }}</option>
                            @empty
                                <option value="">No country found.</option>
                            @endforelse
                        </select>
                        @error('customer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="company_name" class="form-label">Company Name</label>
                        <select id="company_name" class="form-select " class="form-control" name="company_name">
                            <option value="" selected disabled>Select Company Name</option>
                            @forelse ($company as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @empty
                                <option value="">No country found.</option>
                            @endforelse
                        </select>
                        @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Product Name</label>
                        <select id="product_name" class="form-select " class="form-control" name="product_name">
                            <option value="" selected disabled>Select Customer Name</option>
                            @forelse ($product as $data)
                                <option value="{{ $data->id }}">{{ $data->product_name }}</option>
                            @empty
                                <option value="">No country found.</option>
                            @endforelse
                        </select>
                        @error('product_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> 
                    <div class="col-md-6">
                        <label for="quantity" class="form-label">Quantity</label>
                       
                        @error('quantity')
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
        {{-- <a href="{{route('company.export')}}">Export TO PDF</a> --}}
        <div class="card mt-2 p-3">
            <div class="row">
                <div class="col-12">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($notes as $item)
                                <tr>
                                    <th scope="row">{{ $i++ }} </th>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('notes.edit', encrypt($item->id)) }}"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('notes.delete', encrypt($item->id)) }}"><i
                                                class="fa fa-trash "aria-hidden="true"></i></a>
                                        {{-- <a href="{{route('company.export_ind',$item->id)}}"><i class="fa fa-file-pdf-o" style="font-size:17px;color:red"></i></a> --}}
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