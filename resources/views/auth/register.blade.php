<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('frontend_assets/auth/style.css') }}">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="{{ asset('frontend_assets/images/frontImg.jpg') }}" alt="">
                <div class="text">
                    <div class="login_logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('frontend_assets/img/logo3.png') }}"
                                alt="">
                        </a>
                    </div>
                    <!--<h2 class="text-head">BPM PRO</h2>-->
                    <span class="text-1">Quality Service At An</span>
                    <span class="text-2"> Affordable Price</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="fname" placeholder="Enter first name">
                            </div>
                            @if ($errors->has('fname'))
                                <div class="error" style="color:red;">{{ $errors->first('fname') }}</div>
                            @endif

                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="lname" placeholder="Enter last name">
                            </div>
                            @if ($errors->has('lname'))
                                <div class="error" style="color:red;">{{ $errors->first('lname') }}</div>
                            @endif

                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Enter email">
                            </div>
                            @if ($errors->has('email'))
                                <div class="error" style="color:red;">{{ $errors->first('email') }}</div>
                            @endif

                            <div class="input-box">
                                <i class="fas fa-phone"></i>
                                <input type="text" name="phone" placeholder="+1 123 456 7890" class="phone-format">
                            </div>
                            @if ($errors->has('phone'))
                                <div class="error" style="color:red;">{{ $errors->first('phone') }}</div>
                            @endif

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter password">
                            </div>
                            @if ($errors->has('password'))
                                <div class="error" style="color:red;">{{ $errors->first('password') }}</div>
                            @endif

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="confirm_password" placeholder="Enter confirm password">
                            </div>
                            @if ($errors->has('confirm_password'))
                                <div class="error" style="color:red;">{{ $errors->first('confirm_password') }}</div>
                            @endif

                            <div class="button input-box">
                                <input type="submit" class="submit" value="Submit">
                            </div>
                            <div class="text sign-up-text">Already have an account? <a href="{{ route('login') }}"
                                    class="sign">Login
                                    now</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

<script>
    $(document).ready(function() {
        $('.phone-format').mask('+1 999 999 9999');
    });
</script>
