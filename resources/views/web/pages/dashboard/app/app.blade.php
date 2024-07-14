<!DOCTYPE html>
<html class="no-js" lang="en">


    @include('web.inc.head')

    <body class="dashboard-page dashboard-nav-fixed">

        <!-- Dashboard Nav Start -->
        <div class="dashboard-nav offcanvas offcanvas-start" id="offcanvasDashboard">

            <!-- Dashboard Nav Wrapper Start -->
            <div class="dashboard-nav__wrapper">
                <!-- Dashboard Nav Header Start -->
                <div class="offcanvas-header dashboard-nav__header dashboard-nav-header">

                    <div class="dashboard-nav__toggle d-xl-none">
                        <button class="toggle-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
                    </div>

                    <div class="dashboard-nav__logo">
                        <a class="logo" href="{{ route('index') }}"><img src="{{ asset('') }}uploads/content/{{ $content->website_logo }}" width="296" height="64" alt="Logo" width="148"
                              height="62"></a>
                    </div>

                </div>
                <!-- Dashboard Nav Header End -->

                <!-- Dashboard Nav Content Start -->
                <div class="offcanvas-body dashboard-nav__content navScroll">

                    <!-- Dashboard Nav Menu Start -->
                    @include('web.pages.dashboard.components.sidebar')
                    <!-- Dashboard Nav Menu End -->

                </div>
                <!-- Dashboard Nav Content End -->

                <div class="offcanvas-footer"></div>
            </div>
            <!-- Dashboard Nav Wrapper End -->

        </div>
        <!-- Dashboard Nav End -->

        <!-- Dashboard Menu Start -->
        <div class="dashboard-menu">

            <!-- Dashboard Menu Close Start -->
            <div class="dashboard-menu__close">
                <button class="close-btn"><i class="fas fa-times"></i></button>
            </div>
            <!-- Dashboard Menu Close End -->

            <!-- Dashboard Menu Content Start -->
            <div class="dashboard-menu__content">
                <div class="dashboard-menu__image">
                    <img src="assets/images/canvas-menu-image.png" alt="Images" width="984" height="692">
                </div>
                <div class="dashboard-menu__main-menu">
                    <ul class="dashboard-menu__menu-link">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <div class="dashboard-menu__search">
                        <form action="#">
                            <input type="text" placeholder="Search…">
                            <button class="search-btn"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Dashboard Menu Content End -->

        </div>
        <!-- Dashboard Menu End -->


        <!-- Dashboard Main Wrapper Start -->
        <main class="dashboard-main-wrapper">

            <!-- Dashboard Header Start -->
            @include('web.pages.dashboard.components.header')
            <!-- Dashboard Header End -->





            <!-- Dashboard Content Start -->
            <div class="dashboard-content">

            @yield('user-body')


            </div>
            <!-- Dashboard Content End -->


        </main>
        <!-- Dashboard Main Wrapper End -->

        <!-- Edumall Demo Option Start -->

        <!-- Edumall Demo Option End -->



        <!-- JS Vendor, Plugins & Activation Script Files -->

        <!-- Vendors JS -->
        @include('web.inc.script')


    </body>


    <!-- Mirrored from htmldemo.net/edumall/edumall/dashboard-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 14:51:42 GMT -->

</html>
