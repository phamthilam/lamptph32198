<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
        <a class="navbar-brand" href="">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('showHome')}}">Trang chủ</a>
                </li>
                <li><a class="nav-link" href="{{route('showShop')}}">Sản phẩm</a></li>
                <li><a class="nav-link" href="{{route('showAbout')}}">Giới thiệu</a></li>
                <li><a class="nav-link" href="{{route('showContact')}}">Liên hệ</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <div class="nav-link dropdown">
                        <img class="dropdown-toggle" src="{{ asset('theme/client/assets/images/user.svg') }}" alt="" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown">
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('showLogin')}}">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                <li><a class="nav-link" href=""><img src="{{ asset('theme/client/assets/images/cart.svg') }}"></a></li>
            </ul>
        </div>
    </div>
        
</nav>
<!-- End Header/Navigation -->

<!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
                        <p><a href="" class="btn btn-secondary me-2">Shop Now</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('theme/client/assets/images/couch.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>