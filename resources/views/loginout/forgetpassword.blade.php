@extends('layouts.app')

@section('title')
    Forget Your Password? Get it again by - {{ $sitename }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/signup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forgotPassword.css') }}">
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



                <div class="col-12 col-md-6">
                    <div class="forgotSection">
                        <div class="px-4">
                            <h2 class="mainHeading mt-3">
                                Forgot Your Password?
                            </h2>
                            <p class="subHeading">
                                Let's help you with that!
                            </p>
                            <hr>





                            @if (session()->has('askotp'))
                                <form action="/verify-opt-for-changong-password" method="POST" id="signUpForm"
                                    class="pt-3">

                                    @csrf

                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-2">
                                            <input class="customInput" type="text" name="pass_change_otp" id="digits_otp"
                                                placeholder="Submit OTP we sent to your email ASAP" required>
                                        </div>
                                    </div>
                                    <input class="customBtn fullwidthInput" type="submit" value="VERIFY OTP">
                                </form>
                            @else
                                <form action="/change--users-password" method="POST" class="pt-3" id="forgotPassForm">
                                    @csrf
                                    <div class="mb-2">
                                        <input class="customInput" type="email" name="useremail" id="forgotEmail"
                                            placeholder="Current Email">
                                        <small class="text-danger font-weight-bold mt-1">
                                            We will send an OTP to your existing email for verification.
                                        </small>
                                    </div>

                                    <div class="passField">
                                        <div>
                                            <input type="password" class="customInput" name="newPassword" id="password"
                                                placeholder="New Password">
                                        </div>
                                        <div class="showHidePass">
                                            <i class="fas fa-eye-slash" id="eye"></i>
                                        </div>
                                    </div>

                                    <input class="customBtn fullwidthInput" type="submit" value="CHANGE PASSWORD">

                                </form>
                            @endif





                            <div class="forgotPass text-center my-3 pt-2">
                                <a href="/login">Back to login</a>
                            </div>


                            <div class="alreadyAccount text-center">
                                <p>Don't have an account</p>
                                <a href="/sign-up">CREATE AN ACCOUNT</a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="/">
                    <div class="col-12 col-md-6 text-center forgotSectionImg"></div>
                </a>
            </div>
        </div>
        </div>
        </div>
    </section>


    <!-- password show hide jquery code -->
    <script src="{{ asset('assets/js/password-show-hide.js') }}"></script>

    <!-- form validation jquery -->
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/js/sign-up-validate.js') }}"></script>
@endsection
