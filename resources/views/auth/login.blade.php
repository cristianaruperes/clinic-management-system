@extends('layouts.login')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
           <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf

                <span class="login100-form-title p-b-33">
                    <img src="{{ asset('logo-adinata.png') }}" width="100%" class="rounded" alt="logo">
                </span>

                @error('message')
                    <span class="alert alert-danger m-b-16" style="display: block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @error('password')
                    <span class="alert alert-danger m-b-16" style="display: block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="wrap-input100 validate-input" data-validate = "Username is required">
                    <input class="input100" id="username" type="text" name="username" placeholder="{{ __('Username') }}">

                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input m-b-16" data-validate="Password is required">
                    <input class="input100" id="password" type="password" name="password" placeholder="{{ __('Password') }}">

                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                
                <div class="contact100-form-checkbox m-l-4">
                    <input class="input-checkbox100" id="checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="label-checkbox100" for="checkbox">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn">
                        Sign in
                    </button>
                </div>

                {{-- <div class="text-center p-t-45 p-b-4">
                    <span class="txt1">
                        Forgot
                    </span>

                    @if (Route::has('password.request'))
                        <a class="txt2 hov1" href="{{ route('password.request') }}">
                            {{ __('Username / Password?') }}
                        </a>
                    @endif
                </div> --}}
                
            </form>
        </div>
    </div>
</div>
@endsection
