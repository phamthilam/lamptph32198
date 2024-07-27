@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')

<div class="untree_co-section">
    <div class="container">

      <div class="block">
        <div class="row justify-content-center">
          <center><h2>Đăng nhập</h2></center>
         
           <form action="{{route('showforgotpassword')}}" method="POST">
              @csrf
              <div class="row">
              
              <div class="form-group">
                <label class="text-black" for="email">Nhập mật khẩu đã dăng ký</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
             

              <button type="submit" class="btn btn-primary-hover-outline mt-4">Đăng nhập</button>
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