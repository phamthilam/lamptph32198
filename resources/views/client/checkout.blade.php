@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')

<div class="untree_co-section">
    <div class="container">
    
      <div class="row">
        <div class="col">
          <h2 class="h3 mb-3 text-black">Billing Details</h2>
          <div class="p-3 p-lg-5 border bg-white">
            <div class="form-group row">
              <form action="{{ route('save') }}" method="post">
                @csrf
              <div class="col-md-6">
                <label for="user_name" class="text-black">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ auth()->user()?->name }}"readonly >
              </div>
              <div class="col-md-6">
                <label for="user_email" class="text-black">email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="user_email" name="user_email" value="{{ auth()->user()?->email }}"readonly>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="user_phone" class="text-black">phone </label>
                <input type="text" class="form-control" id="user_phone" name="user_phone" >
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="user_address" class="text-black">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="user_address" placeholder="Street address"id="user_address">
              </div>
            </div>

                <div class="form-group mt-3">
                  <button class="btn btn-black btn-lg py-3 btn-block">đặt hàng</button>
                </div>
                </form>
 </div>
      
              </div>
            </div>
         
  @endsection
  @push('scripts')
      
  @endpush