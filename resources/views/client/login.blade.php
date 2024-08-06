@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')

<div class="untree_co-section">
    <div class="container">

      <div class="block">
        <div class="row justify-content-center">
          <center><h2>Đăng nhập</h2></center>
          @if (session('message'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
           <form action="{{route('showLogin')}}" method="POST">
              @csrf
              <div class="row">
              
              <div class="form-group">
                <label class="text-black" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <label class="text-black" for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
            </div>

              <button type="submit" class="btn btn-primary-hover-outline mt-4">Đăng nhập</button>
            </form>
            <a href="{{route('showforgotpassword')}}">Quên mật khẩu</a>
  <a href="{{route('showRegister')}}">Đăng ký</a>
  
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