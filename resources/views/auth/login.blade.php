@extends('layouts.master')
@section('page-title')
@endsection
@section('meta-description')
@endsection
@section('main-content')
<div id="login-section" class="login-sec">
    <div class="container">
        <div class="row hero-info">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="info">
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
                    <h1>Login</h1>
                    <p>Enter your phone number to get a login code.</p>
                    <div class="input-group">
                        <form>
                            <input  type="number" id="phone_verification" class="form-control" name="phone_verification" placeholder="+1XXXXXXXXXX">
                            <button type="button" onclick="sendOTP();" class="btn btn-light">Send code</button>
                        </form>
                        <p>Don’t have an account? <a href="#">Call us to signup</a></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 right-img">
                <img src="{{ URL::to('/') }}/frontend/assets/img/landing-page-hero-image.svg" alt="">
            </div>
        </div>
    </div>
</div>
<div id="verification-section" class="verify-sec" style="display:none;">
    <div class="container">
        <div class="row hero-info">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                @if (Session::has('errors'))
                <div class="alert alert-danger">
                    {{ $errors }}
                </div>
                @endif
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ $success }}
                </div>
                @endif
                <div class="info">
                    <h1>Verify</h1>
                    <p>Enter the code you have recieved.</p>
                    <div class="input-group">
                        <form id="loginForm" method="POST" action="" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                            @csrf
                            <input type="hidden" id="phone" name="phone">
                            <input type="hidden" id="verification" name="verification_code">
                            <input type="text" id="digit-1" class="single_code" name="digit-1" data-next="digit-2" />
                            <input type="text" id="digit-2" class="single_code" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                            <input type="text" id="digit-3" class="single_code" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                            <input type="text" id="digit-4" class="single_code" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                            <input type="text" id="digit-5" class="single_code" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                            <input type="text" id="digit-6" class="single_code" name="digit-6" data-next="digit-7" data-previous="digit-5" />
                        </form>
                        <button type="button" onclick="verify();" class="btn btn-light">Verify</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 right-img">
                <img src="{{ URL::to('/') }}/frontend/assets/img/Verify-Page-image.svg" alt="">
            </div>
        </div>
    </div>
</div>
<div id="recaptcha-container"></div>
@endsection
@section('custom_js')
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
        var phone_verification = $("#phone_verification").val();
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

        if(phone_verification.length > 15)
        {
            $("#error").text('Max length is 15!');
            $("#error").show().delay(3000).fadeOut();
            return;
        }
        $.ajax({
            url: "{{ route('login.checkuser') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                phone: phone_verification,
            },
            success: function(data) {
                if (data.success == false) {
                    // alert(data.message);
                    $("#error").text(data.message);
                    $("#error").show().delay(3000).fadeOut();

                    // $.each(data.errors, function(index, value)
                    // {
                    //     if (value.length != 0)
                    //     {
                    //         // $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                    //         $("#error").text(value);
                    //         $("#error").show().delay(3000).fadeOut();
                    //     }
                    // });

                } else {
                    firebase.auth().signInWithPhoneNumber('+'+phone_verification, window.recaptchaVerifier).then(function (confirmationResult) {
                        window.confirmationResult = confirmationResult;
                        coderesult = confirmationResult;
                        console.log(coderesult);
                        $("#successAuth").text("Message sent");
                        $("#successAuth").show().delay(3000).fadeOut();
                        $("#login-section").hide();
                        $("#verification-section").show();
                        $('#phone').val(phone_verification);
                        
                    }).catch(function (error) {
                        $("#error").text(error.message);
                        $("#error").show().delay(3000).fadeOut();
                    });
                }

            }
        });
    }
    function verify() {


        var single_code = '';
        $(".single_code").each(function(){
            single_code += $(this).val();
        });

        var verification = $('#verification').val(single_code);

        var code = verification.val();

        // var phone_verification = $('#phone_verification').val();
        coderesult.confirm(code).then(function (result) {
            var user = result.user;
            console.log(user);
            $("#successOtpAuth").text("Auth is successful");
            $("#successOtpAuth").show().delay(3000).fadeOut();
            // $('#phone').append(phone_verification);
            // $('#loginForm').submit();
            $('#loginForm').attr("action","{{route('login.post')}}");
            $('#loginForm').submit();
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show().delay(3000).fadeOut();
        });
    }
</script>
@endsection