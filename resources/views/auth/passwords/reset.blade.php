@extends('layouts.login')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
           <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <span class="login100-form-title p-b-33">
                    {{ __('Reset Password') }}
                </span>

                @error('email')
                    <span class="alert alert-danger m-b-16" style="display: block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @error('password')
                    <span class="alert alert-danger m-b-16" style="display: block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" id="email" type="text" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ $email ?? old('email') }}">

                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input class="input100" id="password" type="password" name="password" placeholder="{{ __('Password') }}">

                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input m-b-16" data-validate="Confirm Password is required">
                    <input class="input100" id="password-confirm" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}">

                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn">
                        {{ __('Reset Password') }}
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
