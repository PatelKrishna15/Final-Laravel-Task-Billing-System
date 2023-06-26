@extends('layouts.app')
@section('content')
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.css"
        rel="stylesheet" />

    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js">
    </script>
    <div class="container">
        <div class="card mt-2 p-3">
            <form action="{{ route('payment.store') }}" id="formSubmit" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
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
                    </div>
                    <div class="col-md-6">
                        <label for="company_name" class="form-label">Company Name</label>
                        <select id="company_name" class="form-control" name="company_name">
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
                    <div class="col-md-4">
                        <label for="product_name" class="form-label">Product Name</label>
                        <select id="product_name" class="form-select " class="form-control" name="product_name">

                        </select>
                        @error('product_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" class="form-control dynamic" id="qty" step="1" min="1"
                            max="300" name="quantity" value="1">

                        @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                        @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="payment_method" class="form-label">Product Name</label>
                    <select id="payment_method" class="form-select " class="form-control" name="payment_method">
                        <option value="" selected disabled>Select Product Name</option>
                        <option value="in_cash">In Cash</option>
                        <option value="bank_card">Bank Card</option>
                        <option value="overbooking">Overbooking</option>
                        <option value="credit invoice">Credit invoice</option>
                        <option value="purchase_invoice">Purchase invoice</option>
                    </select>
                    @error('payment_method')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Start_Date</th>
                                <th scope="col">End_Date</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment as $item)
                                <tr>
                                    {{-- @dd($item->customer_name) --}}
                                    <th scope="row">{{ $i++ }} </th>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->company_name }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>{{ $item->result }}</td>
                                    <td> <a href="{{ route('payment.delete', encrypt($item->id)) }}"><i
                                                class="fa fa-trash "aria-hidden="true"></i></a>
                                            <a href="{{ route('payment.mail_pdf', encrypt($item->id) )}}"><i
                                                    class="fa fa-file-pdf-o"
                                                    style="font-size:17px;color:red"></i></a>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#company_name").on('change', function() {

                let company = $("#company_name").val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('getproducts') }}",
                    data: {
                        company_id: company,
                    },
                    success: function(data) {
                        $("#product_name").html("");
                        $("#product_name").html(data);
                    }
                });
            });
        });
    </script>
@endsection
