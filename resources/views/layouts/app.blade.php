<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>سامانه ثبت نام - @yield('title') </title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ mix('css/vendor.css') }}" />
	<link rel="stylesheet" href="{{ mix('css/app.css') }}" />

	<link href="{{ asset('/css/fonts.css') }}" rel="stylesheet">



</head>

<body class="rtls" style="font-family: iranyekan;">

	<!-- Wrapper-->
	<div id="wrapper">

		<!-- Navigation -->
		@include('layouts.navigation')

		<!-- Page wraper -->
		<div id="page-wrapper" class="gray-bg">

			<!-- Page wrapper -->
			@include('layouts.topnavbar')

			<!-- Main view  -->
			{{--@yield('content')--}}
			<div class="wrapper wrapper-content animated fadeInRight">
				<router-view name="main" :key="$route.fullPath"></router-view>
			</div>

			<!-- Footer -->
			@include('layouts.footer')

		</div>
		<!-- End page wrapper-->

	</div>
	<!-- End wrapper-->

    <script src="{{ mix('js/app.js') }}"></script>

	<script src="{{ mix('js/base.js') }}"></script>

	<!-- <script src="{{ asset('/js/messages_fa_val.js') }}"></script> -->

	
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->









	@section('scripts') @show

</body>

</html>