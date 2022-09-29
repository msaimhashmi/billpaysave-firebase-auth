@extends('admin.layouts.master')
@section('main-content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Bill Pay</b> Save</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Verify OTP</p>
      <div class="alert alert-danger" id="error" style="display: none;"></div>
      <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

      {{-- <form> --}}
      <form id="adminLoginForm" method="POST" action="{{route('admin.login.post')}}">
        @csrf
        <div class="input-group mb-3">
          <input id="phone" type="hidden" name="phone" value="{{$phone}}">
        </div>
        <div class="input-group mb-3">
          <input  type="text" id="verification" placeholder="Verification code" class="form-control @error('verification') is-invalid @enderror" name="verification" required autocomplete="verification">
          @error('verification')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <button type="button" onclick="verify();" class="btn btn-primary btn-block">Verify OTP</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('admin.login') }}">Resend</a>
      </p>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection
