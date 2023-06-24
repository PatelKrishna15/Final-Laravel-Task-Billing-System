<option value="" selected disabled>Select product</option>
@foreach ($products as $products)
    <option value="{{ $products->id }}">{{ $products->product_name }}({{$products->product_price}})</option>
@endforeach