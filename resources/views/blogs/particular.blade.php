@extends('layouts.app')

@section('title')
    BlogTitle | {{ $sitename }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/blog-publish-page.css') }}">
@endsection


@section('content')
    @forelse ($getBlog as $item)
        <section class="articleHeroSection" style="background-image: url('{{ $item->thumbnail }}')">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="articleHeroSectionContent">
                            <h2 class="mainHeading">
                                {{ $item->blogtitle }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sectionGap">
            <div class="container">
                <div class="blogWritterBio mt-3">
                    <div>
                        <a href="/blogs"> <i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <img src=" {{ $item->authorimage }}" alt="Blog writer">
                    <div class="bioDetailsContent">
                        <p> {{ $item->author }}</p>
                        <p class="blogPubDate">
                            <?php
                            $year = date('M d Y', strtotime($item->time));
                            echo $year;
                            ?>
                        </p>
                    </div>
                </div>
                <div class="blogMainThought py-3">
                    {!! $item->content !!}
                </div>

            </div>
        </section>




        @forelse ($nextBlog as $item)
            <section class="sectionGap">
                <div class="singleBlogPost">
                    <div>
                        <a class="innerBlogContent" href="/blogs/{{ $item->id }}/{{ $item->blogtitle }}">
                            <div>
                                <img class="blogImage" src="{{ $item->thumbnail }}" alt="Blog image">
                            </div>
                            <div class="blogContent">
                                <div class="blogContentInner">
                                    <h3 class="blogTitle">
                                        {{ $item->blogtitle }}
                                    </h3>
                                    <p class="blogDes">
                                        <?php
                                        $description = $item->content;
                                        $shortdesc = substr($description, 0, 200) . '...';
                                        echo $shortdesc;
                                        ?>
                                    </p>
                                </div>
                                <div class="blogWritterBio my-2">
                                    <img src="{{ $item->authorimage }}" alt="Blog post writer image">
                                    <div class="bioDetailsContent">
                                        <p> {{ $item->author }}</p>
                                        <?php
                                        $year = date('M d Y', strtotime($item->time));
                                        echo $year;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        @empty
        @endforelse


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

    @empty
    @endforelse






    <script>
        $(".blogs").addClass("active");
    </script>
@endsection
