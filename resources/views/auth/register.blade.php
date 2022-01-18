@extends('layouts.base') 
@section('content') 
<style>
	.gray-bg{
		background-color: #22869d;
	}
</style>
@section('title', 'ثبت نام')
<style>
#timer{
	color: red;
	font-size: 2rem;
}
</style>

<div class="middle-box text-center loginscreen   animated fadeInDown">
	<div>
		<div>

			<img height="150" src="{{ asset('/images/logo.png') }}" class="logo-name"></img>

		</div>
		<h3 style="color: white;">ثبت نام در سامانه</h3>
		<form class="m-t" role="form" method="POST" action="{{ route('register.new') }}">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
				<input type="number" class="form-control" name="mobile" placeholder="موبایل" required>
				@if ($errors->has('mobile'))
				<span class="help-block">
					<strong>{{ $errors->first('mobile') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<input type="email" class="form-control" name="email" placeholder="ایمیل" required>
				@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group{{ $errors->has('name_family') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="name_family" placeholder="نام و نام خانوادگی" required>
				@if ($errors->has('name_family'))
				<span class="help-block">
					<strong>{{ $errors->first('name_family') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<input type="password" class="form-control" name="password" placeholder="رمز عبور" required>@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تکرار رمز عبور" required>
			</div>
			<div class="form-group">
			<input class="btn btn-primary block full-width m-b" type="submit" value="ثبت نام"/>
			
			<a style="color: white;" href="{{ route('login')}}" class="stretched-link">ورود</a>
		</form>

		
	</div>
</div>


@endsection