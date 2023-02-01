<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('assets-login/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets-login/css/style.css')}}">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title" <a id="account">Sign up </a></h2>
                        <form method="POST" action="{{ route('register') }}">
                         @csrf
                            <div class="form-group">
                                <label for="name" value="{{ __('Name') }}"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"  placeholder="Your Name"/>
                            </div>
                            <div class="form-group">

                                <label for="email" value="{{ __('Email') }}"><i class="zmdi zmdi-email"></i></label>
                                <input id="email" type="email" name="email" :value="old('email')" required placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password" value="{{ __('Password') }}"><i class="zmdi zmdi-lock"></i></label>
                                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" value="{{ __('Confirm Password') }}"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"  placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets-login/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#member" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets-login/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#account" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title" <a id="member">Log in</a></h2>
                        <form m method="POST" action="{{ route('login') }}">
                            <div class="form-group">
                                <label for="name" value="{{ __('Name') }}"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"  placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="password" value="{{ __('Password') }}"><i class="zmdi zmdi-lock"></i></label>
                                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>