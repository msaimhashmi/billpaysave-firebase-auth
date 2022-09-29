<!-- jQuery -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>

<!-- endbuild -->
{{-- <script type="text/javascript">
  window.onload = function() {
          if (window.jQuery) {  
              // jQuery is loaded  
              alert("Yeah!");
          } else {
              // jQuery is not loaded
              alert("Doesn't Work");
          }
      }
</script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
 --}}
{{-- <script>
  var firebaseConfig = {
      apiKey: "AIzaSyAghCYqkvCH3WRec-vRzgEkp8eP-XRGMwo",
      authDomain: "billpaysave-93f91.firebaseapp.com",
      databaseURL: "https://PROJECT_ID.firebaseio.com",
      projectId: "billpaysave-93f91",
      storageBucket: "billpaysave-93f91.appspot.com",
      messagingSenderId: "869508341774",
      appId: "1:869508341774:web:0bdc8f7e491969c7b29c5f",
      measurementId: "G-1TSEQ5QGLW"
  };
  firebase.initializeApp(firebaseConfig);
</script> --}}

{{-- <script type="text/javascript">
    window.onload = function () {
        render();
    };
    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
    function sendOTP() {
        var successAuth = false;
        var phone = $("#phone").val();
        var verifyotpurl = window.location = '{{route('admin.login.verifyotp')}}?phone=' + phone;
        firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            var successAuth = true;
            $("#successAuth").text("Message sent");
            $("#successAuth").show();

            setTimeout(function() { 
                window.location.href = verifyotpurl; 
            }, 2000);

        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
        // window.location.href = verifyotpurl;
    }
    function verify() {
        var code = $("#verification").val();
        coderesult.confirm(code).then(function (result) {
            var user = result.user;
            console.log(user);
            $("#successOtpAuth").text("Auth is successful");
            $("#successOtpAuth").show();
            $("#adminLoginForm").submit();
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
</script> --}}

{{-- <script>
    var firebaseConfig = {
        // apiKey: "AIzaSyAghCYqkvCH3WRec-vRzgEkp8eP-XRGMwo",
        // authDomain: "billpaysave-93f91.firebaseapp.com",
        // databaseURL: "https://PROJECT_ID.firebaseio.com",
        // projectId: "billpaysave-93f91",
        // storageBucket: "billpaysave-93f91.appspot.com",
        // messagingSenderId: "869508341774",
        // appId: "1:869508341774:web:0bdc8f7e491969c7b29c5f",
        // measurementId: "G-1TSEQ5QGLW"

        apiKey: "AIzaSyC3w4-caLBBknQBIz0GFcsgrOvzpPR6jbA",
        authDomain: "billpaysave-5e39b.firebaseapp.com",
        projectId: "billpaysave-5e39b",
        storageBucket: "billpaysave-5e39b.appspot.com",
        messagingSenderId: "674117055784",
        appId: "1:674117055784:web:d08771959f38084d254c1d",
        measurementId: "G-03XGQST2D1"
    };
    firebase.initializeApp(firebaseConfig);
</script> --}}
{{-- <script type="text/javascript">
    window.onload = function () {
        render();
    };
    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
    function sendOTP() {
        var phone = $("#phone").val();
        var verifyotpurl = window.location = '{{route('admin.login.verifyotp')}}?phone=' + phone;

        firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth").text("Message sent");
            $("#successAuth").show();
            window.location.href = verifyotpurl;
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
    function verify() {
        var code = $("#verification").val();
        // var adminLoginForm = $("#adminLoginForm").val();

        coderesult.confirm(code).then(function (result) {
            var user = result.user;
            console.log(user);
            $("#successOtpAuth").text("Auth is successful");
            $("#successOtpAuth").show();
            $('#adminLoginForm').submit();
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
</script> --}}