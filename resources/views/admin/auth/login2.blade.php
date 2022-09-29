<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Laravel 8 Phone Number OTP Auth Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 550px">
        <div class="alert alert-danger" id="error" style="display: none;"></div>
        <h3>Add Phone Number</h3>
        <div class="alert alert-success" id="successAuth" style="display: none;"></div>
         @if($errors->any())
          <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong>
                @endforeach
          </div>
         @endif
        <form>
            <label>Phone Number:</label>
            <input type="text" id="phone_verification" class="form-control" name="phone_verification" placeholder="+91 ********">
            <div id="recaptcha-container"></div>
            <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
        </form>

        <div class="mb-5 mt-5">
            <h3>Add verification code</h3>
            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
            {{-- <form> --}}
            <form id="adminLoginForm" method="POST" action="{{route('admin.login.post')}}">
              @csrf
                <input type="hidden" id="phone" name="phone">
                <input type="text" id="verification" name="verification_code" class="form-control" placeholder="Verification code">
                <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

    <script>
        var firebaseConfig = {

          // saimdigitalop
          apiKey: "AIzaSyC3w4-caLBBknQBIz0GFcsgrOvzpPR6jbA",
          authDomain: "billpaysave-5e39b.firebaseapp.com",
          projectId: "billpaysave-5e39b",
          storageBucket: "billpaysave-5e39b.appspot.com",
          messagingSenderId: "674117055784",
          appId: "1:674117055784:web:d08771959f38084d254c1d",
          measurementId: "G-03XGQST2D1"

          // saimhashmii433
          // apiKey: "AIzaSyAghCYqkvCH3WRec-vRzgEkp8eP-XRGMwo",
          // authDomain: "billpaysave-93f91.firebaseapp.com",
          // databaseURL: "https://PROJECT_ID.firebaseio.com",
          // projectId: "billpaysave-93f91",
          // storageBucket: "billpaysave-93f91.appspot.com",
          // messagingSenderId: "869508341774",
          // appId: "1:869508341774:web:0bdc8f7e491969c7b29c5f",
          // measurementId: "G-1TSEQ5QGLW"
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
                $("#error").show();
            }

            $.ajax({
                url: "{{ route('admin.login.checkuser') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    phone: phone_verification,
                },
                success: function(data) {
                    if (data.success == false) {
                        // alert(data.message);
                        $("#error").text(data.message);
                        $("#error").show();

                        // $.each(data.errors, function(index, value)
                        // {
                        //     if (value.length != 0)
                        //     {
                        //         // $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                        //         $("#error").text(value);
                        //         $("#error").show();
                        //     }
                        // });

                    } else {
                        firebase.auth().signInWithPhoneNumber(phone_verification, window.recaptchaVerifier).then(function (confirmationResult) {
                            window.confirmationResult = confirmationResult;
                            coderesult = confirmationResult;
                            console.log(coderesult);
                            $("#successAuth").text("Message sent");
                            $("#successAuth").show();
                            $('#phone').val(phone_verification);
                            // window.location.href = verifyotpurl
                        }).catch(function (error) {
                            $("#error").text(error.message);
                            $("#error").show();
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
                $("#successOtpAuth").show();
                // $('#phone').append(phone_verification);
                $('#adminLoginForm').submit();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>
</body>
</html>