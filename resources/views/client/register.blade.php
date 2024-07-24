@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')

<div class="untree_co-section">
    <div class="container">

      <div class="block">
        <div class="row justify-content-center">
          <center><h2>Đăng ký</h2></center>
            <form>
              <div class="row">
              
              <div class="form-group">
                <label class="text-black" for="email">Email</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label class="text-black" for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password">
              </div>
              <div class="form-group">
                <label class="text-black" for="password_confirm">Mật khẩu</label>
                <input type="password_confirm" class="form-control" id="password_confirm">
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