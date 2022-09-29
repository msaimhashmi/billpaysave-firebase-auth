@extends('layouts.app')

@section('content')

<div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        <x-logo/>
        {{-- <div ui-include="'/admin/views/blocks/navbar.brand.html'"></div> --}}
      </div>
    </div>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        {{ __('Login with your') }} <a class="text-primary _600" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a> {{ __('Account') }}
      </div>
      <form name="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="md-form-group float-label">
            <input id="email" type="email" class="md-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" ng-model="user.email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <label>{{ __('E-Mail Address') }}</label>
        </div>
        <div class="md-form-group float-label">
            <input id="password" type="password" class="md-input @error('password') is-invalid @enderror" name="password" required ng-model="user.password" autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          <label>{{ __('Password') }}</label>
        </div>
        <div class="m-b-md">
          <label class="md-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><i class="primary"></i> {{ __('Remember Me') }}
          </label>
        </div>
        <button type="submit" class="btn primary btn-block p-x-md">{{ __('Login') }}</button>
      </form>
    </div>
    <div class="p-v-lg text-center">
        @if (Route::has('password.request'))
            <div class="m-b"><a ui-sref="access.forgot-password" href="{{ route('password.request') }}" class="text-primary _600">{{ __('Forgot Your Password?') }}</a></div>
        @endif
        <div>Do not have an account? <a ui-sref="access.signup" href="{{ route('register') }}" class="text-primary _600">{{__('Register')}}</a></div>
    </div>
</div>

@endsection
