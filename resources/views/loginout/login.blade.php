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
        <div class="loginSection">
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



                <div class="col-12 col-md-7">
                    <div class="px-4">
                        <div class="loginSectionInner">
                            <div class="backHome">
                                <i class="fa-solid fa-chevron-left"></i>
                                <a href="/">Back to Home page</a>
                            </div>
                            <h2 class="mainHeading mt-3">
                                Welcome back to {{ $sitename }}
                            </h2>
                            <p class="subHeading">
                                Let's continue with your trucking insurance coverage!
                            </p>
                            <hr>
                            <form action="/user-login-method" method="POST" class="pt-3" id="loginForm">
                                @csrf
                                <div class="mb-3">
                                    <input class="customInput" type="email" name="loginEmail" id="loginEmail"
                                        placeholder="Email">
                                </div>

                                <div class="passField">
                                    <div>
                                        <input type="password" class="customInput" name="loginPassword" id="loginPassword"
                                            placeholder="Password">
                                    </div>
                                    <div class="showHidePass">
                                        <i class="fas fa-eye-slash" id="eye"></i>
                                    </div>
                                </div>
                                <input class="customBtn fullwidthInput" type="submit" value="CONTINUE">
                            </form>

                            <div class="forgotPass text-center my-3 pt-2">
                                <a href="/password-settings">Forgot your password</a>
                            </div>



                            <div class="alreadyAccount text-center my-3">
                                <p class="text-muted font-weight-bold">Or login with</p>
                                <a href="/google-login" class="btn customBtn fullwidthInput googlesignup">
                                    <img src="{{ asset('assets/images/google.png') }}" alt="Google" class="googleicon">
                                    Login with Google
                                </a>
                            </div>


                            <div class="alreadyAccount text-center">
                                <p>Don't have an account</p>
                                <a href="/sign-up">CREATE AN ACCOUNT</a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="/">
                    <div class="col-12 col-md-5 text-center loginSectionImg"></div>
                </a>
            </div>
        </div>
        </div>
        </div>
    </section>



    <script>
        $(".login").addClass("active");
    </script>

    <!-- password show hide jquery code -->
    <script src="{{ asset('assets/js/password-show-hide.js') }}"></script>

    <!-- form validation jquery -->
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/js/sign-up-validate.js') }}"></script>
@endsection
