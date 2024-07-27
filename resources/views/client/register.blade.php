@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')

<div class="untree_co-section">
    <div class="container">

      <div class="block">
        <div class="row justify-content-center">
          <center><h2>Đăng ký</h2></center>
          @if (session('message'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
            <form action="{{route('showRegister')}}" method="POST">
              @csrf
              <div class="row">
                <div class="form-group">
                  <label class="text-black" for="name">Tên</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              <div class="form-group">
                <label class="text-black" >Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label class="text-black" for="address">địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address">
              </div>
              <div class="form-group">
                <label class="text-black" for="phone">Số điện thoại</label>
                <input type="phone" class="form-control" id="phone" name="phone">
              </div>
              <div class="form-group">
                <label class="text-black" for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label class="text-black" for="password_confirm">Nhập lại mật khẩu</label>
                <input type="password_confirm" class="form-control" id="password_confirm" name="password_confirm">
              </div>
              
            </div>

              <button type="submit" class="btn btn-primary-hover-outline mt-4">Đăng Ký</button>
            </form>

          </div>

        </div>

      </div>

    </div>


  </div>
</div>

<!-- End Contact Form -->
@endsection
@push('scripts')
    
@endpush