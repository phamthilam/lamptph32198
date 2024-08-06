@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')

<div class="untree_co-section before-footer-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th>image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-name">Color</th>
                  <th class="product-name">Size</th>
                  <th class="product-quantity">Quantity</th>
                </tr>
              </thead>
              <tbody>
                @if(session()->has('cart'))
                @foreach(session('cart') as $item)
                <tr>
                  <td><img src="{{ asset('storage/' . $item['image']) }}" width="100px"></td>
                  <td class="product-name">
                    <h2 class="h5 text-black">{{$item['name']}}</h2>
                  </td>
                  <td>{{ $item['color']['name'] }}</td>
                  <td>{{ $item['size']['name'] }}</td>
                  <td>{{$item['price']}}</td>
                  <td>
                    <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                      {{-- <div class="input-group-prepend">
                        <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                      </div> --}}
                      <input type="text" class="form-control text-center quantity-amount" value="{{ $item['quantity'] }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
                      {{-- <div class="input-group-append">
                        <button class="btn btn-outline-black increase" type="button">&plus;</button>
                      </div> --}}
                    </div>

                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-20 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">{{ number_format($totalAmount)}}</strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <a href="{{route('checkout')}}"><h3>Proceed To Checkout</h3></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @push('scripts')
      
  @endpush