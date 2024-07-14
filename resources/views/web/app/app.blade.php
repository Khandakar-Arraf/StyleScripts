<!DOCTYPE html>

<html lang="en">

    @include('web.inc.head')

    <body>

        <main class="main-wrapper">

            <!-- Header start -->
            @include('web.inc.header')
            <!-- Header End -->


            @yield('main-body')


            <!-- Footer Start -->
            @include('web.inc.footer')
            <!-- Footer End -->

            <!--Back To Start-->
            <button id="backBtn" class="back-to-top backBtn">
                <i class="arrow-top fas fa-arrow-up"></i>
                <i class="arrow-bottom fas fa-arrow-up"></i>
            </button>
            <!--Back To End-->


        </main>
        @include('web.inc.modals')




        <!-- JS Vendor, Plugins & Activation Script Files -->
        @include('web.inc.script')


    </body>



</html>