<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
		<link href="{{ asset('theme/client/assets/css/bootstrap.min.css') }} " rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{ asset('theme/client/assets/css/tiny-slider.css') }} " rel="stylesheet">
		<link href="{{ asset('theme/client/assets/css/style.css') }} " rel="stylesheet">

		@stack('styles')
	</head>
   <body>

    @include('client.layouts.header')

    @yield('content')

    @include('client.layouts.footer')
    
		<script src="{{ asset('theme/client/assets/js/bootstrap.bundle.min.js') }} "></script>
		<script src="{{ asset('theme/client/assets/js/tiny-slider.js') }} "></script>
		<script src="{{ asset('theme/client/assets/js/custom.js') }} "></script>
		@stack('scripts')
	</body>

</html>
