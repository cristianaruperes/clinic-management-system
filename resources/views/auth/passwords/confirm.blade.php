@extends('layouts.login')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
           <form class="login100-form validate-form" method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <span class="login100-form-title p-b-33">
                    {{ __('Confirm Password') }}
                </span>

                <div class="text-center p-b-20">
                    <span class="txt1">
                        {{ __('Please confirm your password before continuing.') }}
                    </span>
                </div>

                @error('password')
                    <span class="alert alert-danger m-b-16" style="display: block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                    <input class="input100" id="password" type="password" name="password" placeholder="{{ __('Password') }}">

                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                
                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn">
                        {{ __('Confirm Password') }}
                    </button>
                </div>

                <div class="text-center p-t-45 p-b-4">
                    <span class="txt1">
                        Forgot
                    </span>

                    @if (Route::has('password.request'))
                        <a class="txt2 hov1" href="{{ route('password.request') }}">
                            {{ __('Username / Password?') }}
                        </a>
                    @endif
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection
