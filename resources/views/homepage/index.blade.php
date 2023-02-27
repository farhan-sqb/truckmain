@extends('layouts.app')

@section('title')
    Commercial trucking insurance - {{ $sitename }}
@endsection

@section('content')
    <section class="sectionGap">
        <div class="homeBanner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <h2 class="mainHeading">
                            The easiest way to buy and manage commercial trucking insurance
                        </h2>
                        <div class="innerPadding">
                            <p class="subHeading">
                                Get personalized commercial truck insurance quotes and manage your insurance needs with
                                {{ $sitename }}.
                            </p>
                        </div>
                        <a href="/sign-up" class="customBtn">Get Started</a>
                    </div>
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0 text-center">
                        <img class="bannerImage" src="{{ asset('assets/images/truckimage.png') }}" alt="truck">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-down" class="sectionGap">
        <div class="accountSection">
            <div class="row align-items-center">

                <div class="col-12 col-lg-6 text-center accountSectionImg">
                </div>

                <div class="col-12 col-lg-6 accountSectionBg">
                    <div class="px-4">
                        <div class="accountContent">
                            <h2 class="mainHeading">
                                Sign in & create your account in 45 seconds
                            </h2>
                            <p class="subHeading">
                                Just tell us your DOT, and {{ $sitename }} will get to work as your trusted truck
                                insurance
                                provider. Creating a profile with {{ $sitename }} is simple, and rewarding.
                            </p>
                            <div class="mt-3 checkMarkIcon">
                                <p class="subHeading"><i class="mr-2 fa-solid fa-circle-check"></i> <span>Secure for
                                        your company</span></p>
                                <p class="subHeading"><i class="mr-2 fa-solid fa-circle-check"></i> <span>Easy to
                                        use</span></p>
                                <p class="subHeading"><i class="mr-2 fa-solid fa-circle-check"></i> <span>Accessible
                                        from anywhere</span></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    <section data-aos="fade-up" class="sectionGap">
        <div class="customerTeam">
            <div class="container">
                <div class="row align-items-center">
                    <div data-aos="fade-right" class="col-12 col-lg-6">
                        <h2 class="mainHeading">
                            Best-In-Class Customer Success Team
                        </h2>
                        <p class="subHeading">
                            Whether it is your first time calling or you’ve driven a million miles with {{ $sitename }}
                            in
                            your passenger seat, our top-notch team is here to help.
                        </p>

                    </div>
                    <div data-aos="fade-down" class="col-12 col-lg-6 mt-4 mt-lg-0 text-center">
                        <img class="bannerImage" src="assets/images/team.jpg" alt="team">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap DynamicSection">
        <div class="DynamicBanner">
            <div class="container">
                <div class="row">
                    <div class="col text-center DynamicBannerContent">
                        <h2 class="mainHeading" data-aos="fade-up" data-aos-duration="200">
                            Dynamic management at your fingertips
                        </h2>
                        <div class="innerPadding">
                            <p class="subHeading" data-aos="fade-up" data-aos-duration="300">
                                Increase, decrease, and dynamically manage your insurance coverages in your
                                {{ $sitename }}
                                dashboard. No more truck insurance providers with pushy salespeople or pesky emails –
                                keeping more money in your pocket.
                            </p>
                        </div>
                        <div class="innerPadding">
                            <a href="/sign-up" class="customBtn">JOIN TODAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap reviewSection">
        <div class="container">
            <div class="row">
                <div class="text-center reviewHeading">
                    <h2 class="mainHeading">
                        Trusted by 500+ Commercial Trucking Companies
                    </h2>
                    <p class="subHeading">
                        We are for the truckers, their livelihoods, and the companies that forge the way. Here are just
                        a few reviews from truckers we ride shotgun with.
                    </p>
                </div>
                <div class="container">
                    <div class="clientReview">
                        <div class="singleReview text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <img src="assets/images/truck image 2.jpg" alt="client image">
                            <p class="text-center mt-3">
                                "Everyone that I have encontered has been really helpful and has gone above and beyound"
                            </p>
                        </div>

                        <div class="singleReview text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <img src="assets/images/truck image 2.jpg" alt="client image">
                            <p class="text-center mt-3">
                                "Everyone that I have encontered has been really helpful and has gone above and beyound"
                            </p>
                        </div>

                        <div class="singleReview text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <img src="assets/images/truck image 2.jpg" alt="client image">
                            <p class="text-center mt-3">
                                "Everyone that I have encontered has been really helpful and has gone above and beyound"
                            </p>
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
                <a href="/sign-up" class="customBtn">Get started</a>
            </div>
        </div>
    </section>
@endsection
