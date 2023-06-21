@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-2 p-3">
            <form action="{{ route('notes.store') }}" id="formSubmit" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" id="id" value="{{$notes->id}}">
                    <div class="col-md-6">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <select id="customer_name" class="form-select " class="form-control" name="customer_name">
                            <option  selected disabled>Select Customer Name</option>
                                <option value=" {{ $notes->customer_name == 'customer_name' ? 'selected' : ''}}">{{ $notes->customer->customer_name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" value="{{$notes->subject}}">                 
                    </div>
                    <div class="col-md-6">
                        <label for="message" class="form-label">Text</label>
                        <textarea class="form-control" name="message" id="message" value="">{{$notes->message}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <input type="radio" name="status" id="status" value="active"
                     {{ $notes->status == 'on' ? 'checked' : ''}} >Active   
                     
                     <input type="radio" name="status" id="status" value="off"  {{ $notes->status == 'off' ? 'checked' : ''}}>Inactive                      
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="modal-footer">

                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
