@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
          <div class="row">
            <center><h2 class="section-title">Tất cả sản phẩm</h2></center>
              <!-- Start Column 1 -->
              @foreach ($products as $item )
            <div class="col-12 col-md-4 col-lg-3 mb-5 mt-3">
                <a class="product-item" href="{{route('detailPro', $item->id)}}">
                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{$item->name}}</h3>
                    <strong class="product-price">{{$item->price}}</strong>

                 <span class="icon-cross">
                          <img src="{{ asset('theme/client/assets/images/cross.svg') }}" class="img-fluid">
                    </span>
                </a>
            </div> 
              
              @endforeach

          </div>
    </div>
</div>

@endsection
@push('scripts')
    
@endpush