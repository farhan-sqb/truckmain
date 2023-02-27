@extends('layouts.app')

@section('title')
    About Us | {{ $sitename }}
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
                            About {{ $sitename }}
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

    <section class="sectionGap">
        <div class="container">
            <h2 class="mainHeading text-center">
                Our Leadership Team
            </h2>



            <div class="teamMember sectionGap">
                @forelse ($teammember as $key => $member)
                    <div class="singleMenber">
                        <a href="{{ $member->link }}">
                            <img src="{{ $member->image }}" alt="team">
                            <h4 class="my-2">{{ $member->name }}</h4>
                            <p class="subHeading">{{ $member->designation }}</p>
                        </a>
                    </div>

                @empty

                    <center>
                        <h3 class="text-bold">No Member Yet</h3>
                    </center>
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
                <a href="sign-up.html" class="customBtn">Get started</a>
            </div>
        </div>
    </section>


    <script>
        $(".about").addClass("active");
    </script>
@endsection
