@extends('layouts.base') @section('content')
@section('title', 'فعال سازی')

@if (Session::has('step2'))
<script>window.location = "/register";</script>

@endif
<div class="middle-box text-center loginscreen   animated fadeInDown">
	<div>
		<div>

			<!-- <h1 class="logo-name">IN+</h1> -->
			<img src="/images/logo.png" class="logo-name"></img>

		</div>
		<h3>فعال سازی</h3>
		<p>موبایل خود را جهت فعال سازی وارد نمایید</p>
		<form class="m-t" role="form" method="POST" action="{{ route('sendSms') }}">
			{{ csrf_field() }}

			<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
			@if (! Session::has('mobile'))
			<input type="number" autocomplete="off" class="form-control" name="mobile" placeholder="موبایل" required autofocus>
			@endif
				
				@if ($errors->has('mobile'))
				<span class="help-block">
					<strong>{{ $errors->first('mobile') }}</strong>
				</span>
				@endif
			</div>

			@if (Session::has('step1'))
				<div class="form-group{{ $errors->has('verify') ? ' has-error' : '' }}">
				<input type="number" autocomplete="off" class="form-control" name="verify" placeholder="کد تایید" required>@if ($errors->has('verify'))
				<span class="help-block">
					<strong>{{ $errors->first('verify') }}</strong>
				</span>
				@endif
			</div>
			@endif
			
			<!-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<input type="password" class="form-control" name="password" placeholder="Password" required>@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</div> -->
			<!-- <div class="form-group">
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
			</div> -->
			<!-- <div class="form-group">
				<div class="checkbox i-checks">
					<label>
						<input type="checkbox">
						<i></i> Agree the terms and policy </label>
				</div>
			</div> -->
			<button type="submit" class="btn btn-primary block full-width m-b">فعال سازی</button>

			<p class="text-muted text-center">
				<small>آیا نام و رمز عبور دارید؟</small>
			</p>
			<a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">ورود</a>
		</form>
		<p class="m-t">
			<small>Niyamco.com &copy; 2018</small>
		</p>
	</div>
</div>
<style>
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.gray-bg {
	background-image: url("/images/back.jpg");
	background-repeat: no-repeat;
	background-size: cover;
}
</style>

@endsection