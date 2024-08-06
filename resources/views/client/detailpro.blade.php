@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')

<div class="container">
    <div class="row mb-5 mt-3">
      <div class="col">
      <img src="{{ asset('storage/' . $product->image) }}" alt="">
      </div>
      <div class="col">
       <h1>{{$product->name}}</h1>
       <h2 class="text-danger mt-3"><b>{{$product->price}}</b></h2>
       <p class="mt-3"><b>{{$product->description}}</b></p>
    
     
        <form action="{{route('add')}}" method="post">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <label class="form-check-label mb-3 mt-3"><b>Color</b></label>
            @foreach($colors as $id => $name)
                <div class="form-check">
                    <input type="radio" class="form-check-input"
                           id="radio_color_{{ $id }}" name="product_color_id" value="{{ $id }}">
                    <label class="form-check-label" for="radio_color_{{ $id }}">{{ $name }}</label>
                </div>
            @endforeach

            <label class="form-check-label mb-3 mt-3"><b>Size</b></label>
            @foreach($sizes as $id => $name)
                <div class="form-check">
                    <input type="radio" class="form-check-input"
                           id="radio_size_{{ $id }}" name="product_size_id" value="{{ $id }}">
                    <label class="form-check-label" for="radio_size_{{ $id }}">{{ $name }}</label>
                </div>
            @endforeach

            <div class="mb-3 mt-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control"
                       min="1" required value="1"
                       id="quantity" placeholder="Enter quantity" name="quantity">
            </div>

            <button class="btn btn-primary" type="submit">Thêm vào giỏ hàng</button>
        </form>
   
</div>
    </div>
</div>

@endsection
@push('scripts')
    
@endpush