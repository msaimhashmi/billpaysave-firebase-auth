@extends('admin.layouts.master')
@section('main-content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Bill Pay</b> Save</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <div class="alert alert-danger" id="error" style="display: none;"></div>
      <div class="alert alert-success" id="successAuth" style="display: none;"></div>

      <form>
      {{-- <form id="adminLoginForm" method="POST" action="{{route('admin.login.verifyotp')}}"> --}}
        {{-- @csrf --}}
        <div class="input-group mb-3">
          <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
          @error('phone')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        {{-- <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> --}}
        <div id="recaptcha-container"></div>

        <div class="row">
          <div class="col-4">
            <button type="button" onclick="sendOTP();" class="btn btn-primary btn-block">Send OTP</button>
          </div>
        </div>
      </form>
      <!-- /.social-auth-links -->

      {{-- @if (Route::has('password.request'))
      <p class="mb-1">
        <a href="{{ route('password.request') }}">I forgot my password</a>
      </p>
      @endif --}}
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection
