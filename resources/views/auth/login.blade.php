@extends('layouts.login')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 text-center mb-5">
			<h2 class="heading-section">Đăng Nhập</h2>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-4">
			<div class="login-wrap p-0">
                <!-- <h3 class="mb-4 text-center">Have an account?</h3> -->
                <style>
                    input:-webkit-autofill,
                    input:-webkit-autofill:hover,
                    input:-webkit-autofill:focus,
                    input:-webkit-autofill:active {
                        -webkit-transition: "color 9999s ease-out, background-color 9999s ease-out";
                        -webkit-transition-delay: 9999s;
                    }
                </style>
                <!-- @if (Session::has('error'))
                        <div class="alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
                @endif -->
                <form method="POST" action="{{ route('login') }}" class="signin-form">
                    @csrf
                    <div class="form-group">
                        <input value="minhhoang@gmail.com" type="email" class="form-control" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <input value="12345678" id="password-field" type="password" class="form-control" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="{{ route('password.request') }}" style="color: #fff">Forgot Password</a>
                        </div>
                    </div>
                </form>
                <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                <div class="social d-flex text-center">
                    <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                    <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
