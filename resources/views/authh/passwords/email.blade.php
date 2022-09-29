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
        {{ __('Write email here to get your new password of your') }} <a class="text-primary _600" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a> {{ __('Account') }}
      </div>
      <form name="form" method="POST" action="{{ route('password.email') }}">
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
        <button type="submit" class="btn primary btn-block p-x-md">{{ __('Send Password Reset Link') }}</button>
      </form>
    </div>
    <div class="p-v-lg text-center">
        <div>Do not have an account? <a ui-sref="access.signup" href="{{ route('register') }}" class="text-primary _600">{{__('Register')}}</a></div>
    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
