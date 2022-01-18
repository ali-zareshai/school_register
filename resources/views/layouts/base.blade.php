<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>سامانه ثبت نام - @yield('title') </title>

		<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
	<link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
	<link href="{{ asset('/css/fonts.css') }}" rel="stylesheet">
	<style>
		*{
			font-family: iranyekan!important;
		}
	</style>
</head>

<body class="gray-bg">



	@yield('content')



	<!-- <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script> -->

	@section('scripts') @show

</body>

</html>