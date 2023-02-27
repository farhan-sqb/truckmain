@extends('layouts.app')

@section('title')
    Our Privacy Policy | {{ $sitename }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endsection


@section('content')
    <section class="aboutSection">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center ">
                    <div class="aboutContent">
                        <h2 class="mainHeading text-center">
                            Our Privacy Policy
                        </h2>
                        <p class="subHeading">
                            We understand the short roads and the long journey that truckers face. We purpose-built our
                            company to support you beyond just a policy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="container">
            <div class="aboutContent detailsAbout">
                @forelse ($textdata as $textdata)
                    {!! $textdata->pagecontent !!}
                @empty
                @endforelse
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


    <script>
        $(".privacy").addClass("active");
    </script>
@endsection
