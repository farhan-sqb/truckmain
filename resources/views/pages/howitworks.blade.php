@extends('layouts.app')

@section('title')
    How it works | {{ $sitename }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/how-it-work.css') }}">
@endsection


@section('content')
    <section class="workSection">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="workInner">
                        <h2 class="mainHeading">
                            How it Works
                        </h2>
                        <p class="subHeading">
                            Trucking can be complicated so we made getting insurance easy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="createProfile">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 text-right">
                        <img src="assets/images/create-profile.webp" alt="create profile">
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <div class="content">
                            <h3 class="contentHeading">1. Create your {{ $sitename }} profile</h3>
                            <p class="subHeading">Just tell us your DOT, and {{ $sitename }} will get to work. Creating
                                a profile
                                with {{ $sitename }} is simple, and rewarding.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="createProfile">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <div class="content">
                            <h3 class="contentHeading">2. Add your company’s information</h3>
                            <p class="subHeading">Add the drivers, vehicles, and freight that you want covered. You’ll get
                                the best policy based on your unique trucking business.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-left">
                        <img src="assets/images/company-profile.webp" alt="create profile">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="createProfile">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 text-right">
                        <img src="assets/images/get-quote.webp" alt="get quote">
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <div class="content">
                            <h3 class="contentHeading">
                                3. Get your quote
                            </h3>
                            <p class="subHeading">
                                We make it easy to get your quote
                                use our platform to do it yourself or just give us a call.
                            </p>
                            <a href="login.html" class="customBtn normalBtnWidth">GET STARTED</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="sectionGap getStartedSection">
        <div class="container text-center">
            <h2 class="mainHeading">
                Hit the road today with {{ $sitename }}
            </h2>
            <div class="innerPadding mt-2">
                <a href="sign-up.html" class="customBtn">Get started</a>
            </div>
        </div>
    </section>

    <script>
        $(".howitworks").addClass("active");
    </script>
@endsection
