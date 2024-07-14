@extends('web.app.app')


@section('main-body')
    <div class="page-banner" style="margin-top: 150.639px;">
        <div class="page-banner__wrapper" style="margin-top: 150.639px;">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Courses</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Our Most Popular Courses</h2>


                    </div>

                </div>
            </div>
            @include('web.component.courses')

        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                {{ $courses->links() }}
            </div>
        </div>
        </div>
    </section>
@endsection
