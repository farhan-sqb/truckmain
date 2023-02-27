<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="/" class="">
            <img width="50" height="50" src="{{ asset('user_assets/images/home.png') }}" alt="Logger" />
            <span class="font-weight-bold text-light pl-2">Home Page</span>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="dashboard has-sub">
                    <a class="js-arrow" href="/users/dashboard">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
            </ul>
            <ul class="list-unstyled navbar__list">
                <li class="insurances has-sub">
                    <a class="js-arrow" href="/users/insurances">
                        <i class="fas fa-tachometer-alt"></i>My Insurance</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
