@extends('layouts.app')

@section('title')
    Login To | {{ $sitename }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/signup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endsection


@section('content')
    <section data-aos="fade-down">
        <div class="signUpSection">
            <div class="row align-items-center">


                <div class="col-12 col-md-7 allAlerts">
                    @if (session()->has('alertMsg'))
                        <div class="alert {{ session()->get('type') }} alert-dismissible text-center fade show"
                            role="alert">
                            {{ session()->get('alertMsg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>




                <div class="col-12 col-md-7 signUpSectionBg">
                    <div class="px-5">
                        <div>
                            <div class="backHome">
                                <i class="fa-solid fa-chevron-left"></i>
                                <a href="/">Back to Home page</a>
                            </div>
                            <h2 class="mainHeading mt-3 mr-0 mr-md-5">
                                Create your {{ $sitename }} account to get started
                            </h2>
                            <p class="subHeading">
                                Get the best insurance quote for you in just a few minutes
                            </p>
                            <hr>





                            @if ($otpask == 0)
                                <form action="/signup-new-user" method="POST" id="signUpForm" class="pt-3">

                                    @csrf

                                    <div class="row">
                                        <div class="col-12 col-md-5 mb-2">
                                            <input class="customInput" type="text" name="fname" id="fname"
                                                placeholder="First Name">
                                        </div>
                                        <div class="col-12 col-md-7 mb-2">
                                            <input class="customInput" type="text" name="lname" id="lname"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input class="customInput" type="email" name="email" id="email"
                                            placeholder="Email">
                                        <small class="text-danger font-weight-bold mt-1">
                                            We will send an OTP to your mail for verification.
                                        </small>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-2">
                                            <input class="customInput" type="tel" name="mobileNumber" id="mobileNumber"
                                                placeholder="Phone Number"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>

                                    <div class="passField">
                                        <div>
                                            <input type="password" class="customInput" name="password" id="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="showHidePass">
                                            <i class="fas fa-eye-slash" id="eye"></i>
                                        </div>
                                    </div>
                                    <input class="customBtn fullwidthInput" type="submit" value="START YOUR QUOTE">
                                </form>
                            @else
                                <form action="/verify-user-with-otp" method="POST" id="signUpForm" class="pt-3">

                                    @csrf

                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-2">
                                            <input class="customInput" type="text" name="digits_otp" id="digits_otp"
                                                placeholder="Submit OTP we sent to your email ASAP" required>
                                        </div>
                                    </div>
                                    <input class="customBtn fullwidthInput" type="submit" value="VERIFY OTP">
                                </form>
                            @endif




                            <div class="alreadyAccount text-center mt-3">
                                <p class="text-muted font-weight-bold">Or sign up with</p>
                                <a href="/google-signup" class="btn customBtn fullwidthInput googlesignup">
                                    <img src="{{ asset('assets/images/google.png') }}" alt="Google" class="googleicon">
                                    Signup with Google
                                </a>
                            </div>




                            <div class="alreadyAccount text-center mt-3">
                                <p>Already have an account?</p>
                                <a href="/login">LOGIN</a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="/">
                    <div class="col-12 col-md-5 text-center signUpSectionImg"></div>
                </a>
            </div>
        </div>
        </div>
        </div>
    </section>


    <script>
        $(".signUpBtn").addClass("bg-primary");
    </script>

    <!-- password show hide jquery code -->
    <script src="{{ asset('assets/js/password-show-hide.js') }}"></script>

    <!-- form validation jquery -->
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/js/sign-up-validate.js') }}"></script>
@endsection
