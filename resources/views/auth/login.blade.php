@extends('layouts.base') @section('content') 
@section('title', 'ورود')

<div class="middle-box text-center loginscreen animated fadeInDown">
	<div>
		<div>
			<img width="250" height="250" src="/images/logo.png" class="logo-name"></img>
		</div>
		<h3 style="color:white">سامانه ثبت نام</h3>
		<p style="color:white">برای مشاهده سامانه وارد شوید</p>
		<form class="m-t" role="form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<input id="email" type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="ایمیل/موبایل" required autofocus> 
				@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<input id="password" type="password" name="password" class="form-control" placeholder="رمز عبور" required="">@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</div>
			<button type="submit" class="btn btn-primary block full-width m-b">ورود</button>

		</form>
		<a style="color: white;" href="{{ route('register.show')}}" class="stretched-link">ثبت نام</a>
	</div>
</div>
<style>
	.gray-bg {
	background-image: url("/images/back.jpg");
	background-repeat: no-repeat;
	background-size: cover;
}
</style>

@endsection