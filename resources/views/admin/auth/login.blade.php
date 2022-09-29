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
      @if (Session::has('errors'))
      <div class="alert alert-danger">
        {{ $errors }}
      </div>
      @endif
      @if (Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
      @endif
      <form id="phoneVerificationForm" method="POST" action="{{route('admin.login.verifyotp')}}" >
        @csrf
        <div class="input-group mb-3">
          <input type="number" id="phone_verification" class="form-control" name="phone_verification" value="{{ old('phone') }}"  placeholder="+1********" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password_verification" type="password" class="form-control @error('password') is-invalid @enderror" name="password_verification" placeholder="**********" required autocomplete="current-password">
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
        </div>
        <div id="recaptcha-container"></div>
        <div class="row">
          <div class="col-4">
            <button type="button" onclick="sendOTP();" class="btn btn-primary btn-block">Send OTP</button>
            {{-- <button type="submit" class="btn btn-primary btn-block">Send OTP</button> --}}
          </div>
        </div>
      </form>
      <form id="verificationCodeForm" method="POST" action="" style="display:none;">
        {{-- <form> --}}
          @csrf
          <p class="login-box-msg">Enter your verification code</p>
          <div class="alert alert-danger" id="error" style="display: none;"></div>
          <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
          <div class="input-group mb-3">
            {{-- <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus> --}}
            <input type="hidden" id="phone" name="phone">
            <input type="password" id="password" name="password" hidden>
            <input type="number" id="verification" name="verification_code" class="form-control" placeholder="Verification code">
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
          <div class="row">
            <div class="col-4">
              <button type="button" onclick="verify();" class="btn btn-primary btn-block">Verify</button>
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
  <div id="recaptcha-container"></div>
{{--   @endsection
  @section('custom_js') --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  <script>
  var firebaseConfig = {
  apiKey: "AIzaSyC3w4-caLBBknQBIz0GFcsgrOvzpPR6jbA",
  authDomain: "billpaysave-5e39b.firebaseapp.com",
  projectId: "billpaysave-5e39b",
  storageBucket: "billpaysave-5e39b.appspot.com",
  messagingSenderId: "674117055784",
  appId: "1:674117055784:web:d08771959f38084d254c1d",
  measurementId: "G-03XGQST2D1"
  };
  firebase.initializeApp(firebaseConfig);
  </script>
  <script type="text/javascript">
    window.onload = function () {
        render();
    };
    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container',{
            'size': 'invisible'
        });
        recaptchaVerifier.render();
    }
    function sendOTP() {
        // alert('working');
        var phone_verification = $("#phone_verification").val();
        var password_verification = $("#password_verification").val();
        // alert(password_verification);
        if(isNaN(phone_verification))
        {
            $("#error").text('Please enter valid phone number!');
            $("#error").show().delay(3000).fadeOut();
            return;
        }

        if(phone_verification == 0)
        {
            $("#error").text('Phone number is required!');
            $("#error").show().delay(3000).fadeOut();
            return;
        }

        if(password_verification == 0)
        {
            $("#error").text('Password is required!');
            $("#error").show().delay(3000).fadeOut();
            return;
        }

        $.ajax({
            url: "{{ route('admin.login.checkuser') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                phone: phone_verification,
                password: password_verification,
            },
            success: function(data) {
                if (data.success == false) {
                    alert(data.message);
                    $("#error").text(data.message);
                    $("#error").show().delay(3000).fadeOut();
                } else {
                    firebase.auth().signInWithPhoneNumber('+'+phone_verification, window.recaptchaVerifier).then(function (confirmationResult) {
                        window.confirmationResult = confirmationResult;
                        coderesult = confirmationResult;
                        console.log(coderesult);
                        $("#successAuth").text("Message sent");
                        $("#successAuth").show().delay(3000).fadeOut();
                        $('#phone').val(phone_verification);
                        $('#password').val(password_verification);
                        $('#phoneVerificationForm').hide();       
                        $('#verificationCodeForm').show();       
                        // window.location.href = verifyotpurl
                    }).catch(function (error) {
                        $("#error").text(error.message);
                        $("#error").show().delay(3000).fadeOut();
                    });
                }

            }
        });
    }
    function verify() {
        var code = $("#verification").val();
        // var phone_verification = $('#phone_verification').val();
        
        coderesult.confirm(code).then(function (result) {
            var user = result.user;
            console.log(user);
            $("#successOtpAuth").text("Auth is successful");
            $("#successOtpAuth").show().delay(3000).fadeOut();
            // $('#phone').append(phone_verification);
            // $('#verificationCodeForm').show().delay(3000).fadeOut();
            $('#verificationCodeForm').attr("action","{{route('login.post')}}");

            $('#verificationCodeForm').submit();
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show().delay(3000).fadeOut();
        });
    }
</script>
  @endsection