@extends('layouts.app')

@section('title')
    Help & Support | {{ $sitename }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/help-support.css') }}">
@endsection


@section('content')
    @if (session()->has('alertMsg'))
        <div class="alert font-weight-bold text-center alert-{{ session()->get('type') }} alert-dismissible fade show"
            role="alert">
            {{ session()->get('alertMsg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <section class="sectionGap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mainHeading text-center">
                        Help & Support
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="mainHeading mediumFont text-center">
                        Frequently Asked Questions
                    </h3>
                    <div class="accordionPart">


                        @forelse ($faqs as $key => $item)
                            <div class="accordionrows">
                                <button class="accordion">
                                    {{ $item->question }}
                                </button>
                                <div class="panel">
                                    <p>
                                        {{ $item->answer }}
                                    </p>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center contactMore">
                    <h2 class="mainHeading mediumFont text-center">
                        Still have a question?
                    </h2>
                    <p class="subHeading">
                        If you cannot find answer to your question in our FAQ, you can always contact us. We will answer you
                        shortly!
                    </p>
                </div>
            </div>
            <div class="row sectionGap">
                <div class="col-12 col-md-6 col-lg-4 mt-3 mt-md-2">
                    <div class="singleBox">
                        <i class="fa-regular fa-clock"></i>
                        <b>{{ $brandAddr }}</b>
                        <small>Our Address</small>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-3 mt-md-2">
                    <div class="singleBox">
                        <a class="phoneNumber" href="tel://1-555-555-5555">
                            <i class="fa-solid fa-phone"></i>
                            <span>
                                {{ $contactPhone }}
                            </span>
                        </a>
                        <small>
                            Give us a call
                        </small>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-3 mt-md-2">
                    <div class="singleBox">
                        <a class="mail" href="mailto:{{ $contactEmail }}">
                            <i class="fa-solid fa-user"></i>
                            <span>
                                {{ $contactEmail }}
                            </span>
                        </a>
                        <small>
                            Reach out to us over email
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="container">
            <h3 class="mainHeading text-center mediumFont">
                Contact Us Here
            </h3>

            <div class="contactSection">

                <form id="contactForm" method="POST" action="/send-email">

                    @csrf

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="fullName">Full Name*</label>
                            <input class="customInput" id="fullName" name="fullName" type="text"
                                placeholder="John Smith">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Contact Email*</label>
                            <input class="customInput" id="email" name="email" type="email"
                                placeholder="you@example.com">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="phoneNumber">Phone*</label>
                            <input class="customInput" type="tel" name="phoneNumber" id="phoneNumber"
                                placeholder="Phone"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="comment">TELL US A BIT ABOUT WHY YOU ARE CONTACTING US *</label>
                            <textarea class="customInput" name="comment" id="comment" rows="2" placeholder="Let us know"></textarea>
                            <small>By submitting this form you agree to our terms and conditions and our Privacy Policy
                                which explains how we may collect, use and disclose your personal information including to
                                third parties.</small>
                        </div>
                    </div>

                    <input class="customBtn mediumWidth" class="submit" type="submit" value="Contact Us">
                </form>
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
        $(".help_support").addClass("active");
    </script>
@endsection
