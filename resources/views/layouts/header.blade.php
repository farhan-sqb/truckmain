    <header>
        <div class="container">
            <div class="menuBar">
                <div>
                    <a href="/">
                        <img src=" {{ $adminLink . $sitelogo }}" alt="logo">
                    </a>
                </div>
                <div class="customNav" id="mobileMenu">
                    <nav>
                        <span class="navClose" id="mobileMenuClose">
                            <i class="fa-solid fa-xmark"></i>
                        </span>
                        <ul id="highlightAnchor">
                            <li><a class="menuLink howitworks" href="/how-it-work">How it works</a></li>
                            <li><a class="menuLink reviews" href="/reviews">Reviews</a></li>
                            <li><a class="menuLink blogs" href="/blogs">Blog</a></li>
                            <li><a class="menuLink help_support" href="/help_support">Help & Support</a></li>
                            <li><a class="menuLink about" href="/about">About</a></li>
                            <li><a class="menuLink dispatchers" href="/dispatchers">Dispatchers</a></li>

                            @if (Cookie::get('loggerEmail'))
                                <li><a class="menuLink login" href="/users/dashboard">Dashboard</a></li>
                            @else
                                <li><a class="menuLink login" href="/login">Sign in</a></li>
                            @endif


                        </ul>

                        <div class="mt-4 mobileSignUp">
                            @if (Cookie::get('loggername'))
                                <a href="/users/logout" class="customBtn signUpBtn">Logout</a>
                            @else
                                <a href="/sign-up" class="customBtn signUpBtn">Sign up</a>
                            @endif
                        </div>
                    </nav>
                </div>
                <div class="signUpPart">
                    <div class="menuClick mr-2" id="mobileMenuShow">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    @if (Cookie::get('loggername'))
                        <a href="/users/logout" class="customBtn signUpBtn signUpPartBtn">Logout</a>
                    @else
                        <a href="/sign-up" class="customBtn signUpBtn signUpPartBtn">Sign up</a>
                    @endif
                </div>

            </div>
        </div>
    </header>
