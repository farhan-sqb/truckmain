@extends('layouts.app')

@section('title')
    User Reviews | {{ $sitename }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/reviews.css') }}">
@endsection


@section('content')
    <section class="reviewSection">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="reviewContent">
                        <h2 class="mainHeading">
                            What Our Customers Say about {{ $sitename }}
                        </h2>
                        <p class="subHeading">
                            Trust and loyalty are big for our customers. We work hard to earn their business and keep it.
                            Hear from them!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="mainHeading">
                        Trusted by lots of Commercial Trucking Companies
                    </h3>
                </div>
            </div>


            @forelse ($reviews as $key => $item)
                @if (($key + 1) % 2 == 0)
                    <div class="singleReview sectionGap">
                        <div>
                            <img src="{{ $item->image }}" alt="client image">
                        </div>
                        <div class="clientReview leftArrow">
                            <blockquote>
                                {{ $item->review }}
                            </blockquote>
                        </div>
                    </div>
                @else
                    <div class="singleReview sectionGap">
                        <div class="clientReview rightArrow">
                            <blockquote>
                                {{ $item->review }}
                            </blockquote>
                        </div>
                        <div>
                            <img src="{{ $item->image }}" alt="client image">
                        </div>
                    </div>
                @endif



            @empty
            @endforelse


            @if ($number == 5)
                <center>
                    <a href="/all-reviews" class="btn btn-danger px-3 btn-sm">Show All Reviews</a>
                </center>
            @endif



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

    <script>
        $(".reviews").addClass("active");
    </script>
@endsection
