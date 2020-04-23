<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="GZU ADMIN | LOGIN" />
	<meta name="author" content="joemags" />
	<title>GZU Admin | Login</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="{!! asset('assets/fonts/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{!! asset('assets/plugins/iconic/css/material-design-iconic-font.min.css') !!}">
	<!-- bootstrap -->
	<link href="{!! asset('assets/plugins/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="{!! asset('assets/css/pages/extra_pages.css') !!}">
	<!-- favicon -->
	<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}"/>

	<style>
	
	@media (max-width: 411px){
		.container-login100{
			padding: 0px;
		}
		.wrap-login100{
			width: 100%;
			border-radius: 0;
		}
	}
	</style>
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
						@csrf

					<span class="login100-form-logo">
						<img alt="" src="{!! asset('assets/img/portal.png') !!}">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						GZU STAFF
					</span>
					<div class="wrap-input100 validate-input {{ $errors->has('staff_id') ? 'alert-validate' : '' }}" 
						data-validate="{{ $errors->has('staff_id') ?  $errors->first('staff_id') : 'Enter your Staff ID' }}">
						<input  style="text-transform:uppercase" class="input100" type="text" name="staff_id" value="{{ old('staff_id') }}" placeholder="Staff ID">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input {{ $errors->has('password') ? 'alert-validate' : '' }}"
						 data-validate="{{ $errors->has('password') ?  $errors->first('password') : 'Enter password' }}">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1" href="javascript:;">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/extra-pages/pages.js') }}"></script>
	<!-- end js include path -->
</body>

</html>