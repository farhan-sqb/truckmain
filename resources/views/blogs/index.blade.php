@extends('layouts.app')

@section('title')
    All Blogs | {{ $sitename }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/blogs.css') }}">
@endsection


@section('content')
    <section class="blogSection">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blogInner">
                        <h2 class="mainHeading">
                            Our Great Blog Post
                        </h2>
                        <p class="subHeading">
                            We pride ourselves on being authorities on all things trucking insurance. From drivers to
                            trucks, we’ve got a story to tell.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sectionGap">
        <div class="blogPostSection">
            <div class="container">
                <h3 class="featureBlogTitle">
                    {{ $sitename }} Blogs
                </h3>
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div id="searchBlogs">


                            @forelse ($blogs as $key => $item)
                                <div class="singleBlogPost">
                                    <div>
                                        <a class="innerBlogContent"
                                            href="/blogs/{{ $item->id }}/{{ $item->blogtitle }}">
                                            <div>
                                                <img class="blogImage" src="{{ $adminLink }}{{ $item->thumbnail }}"
                                                    alt="Blog image">
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
                                                <div class="blogWritterBio mt-3">
                                                    <img src="{{ $item->authorimage }}" alt="Blog writer">
                                                    <div class="bioDetailsContent">
                                                        <p>{{ $item->author }}</p>
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

                            @empty
                            @endforelse

                        </div>
                    </div>







                    <div class="col-12 col-md-5 mobileSearchHide">
                        <div class="blogSearch">
                            <h3 class="featureBlogTitle">
                                Discover Topics That Matter
                            </h3>

                            <div class="searchBlogs">
                                <input class="customInput" type="text" name="blogSearchInput" id="blogSearchInput"
                                    placeholder="Search by title or author">
                                <input class="searchCustomBtn" type="submit" value="Search" onclick="searchBlog()">
                            </div>
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



    <script>
        $(".blogs").addClass("active");
    </script>
@endsection
