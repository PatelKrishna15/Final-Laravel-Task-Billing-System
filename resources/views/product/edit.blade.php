<div class="container">
    <div class="card mt-2 p-3">
        <form action="{{ route('product.store') }}" id="formSubmit" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id=" id" value="{{$item->id}}">
            <div class="row">
                <div class="col-md-6">
                    <label for="product_name" class="form-label ">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" value="{{$item->company_name}}">
                    @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="col-md-6">
                    <label for="product_img" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="product_img" name="product_img" >
                    <img src="{{asset('images/'.$item->company_name)}}">
                    @error('product_img')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="product_price" class="form-label">Product Price</label><br>
                    <input type="text" class="form-control" id="product_price" name="product_price" value="{{$item->company_name}}">
                    @error('product_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="product_company" class="form-label">Select Company</label>
                    <select id="product_company" class="form-select " name="product_company" >
                        <option value="" selected disabled>Select Company Name</option>
                        @forelse ($company as $data)
                        <option value="{{ $data->id }}">{{ $data->name ==$data->id?'selected':'' }}</option>
                        @empty
                        <option value="">No company found.</option>
                        @endforelse
                    </select>
                    @error('product_company')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="{{route('product.index')}}">Back</a>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Store</button>
                </div>
        </form>
    </div>
</div>