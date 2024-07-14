@extends('web.app.app')
@section('main-body')
<div class="page-banner bg-color-05" style="margin-top: 150.639px;">
    <div class="page-banner__wrapper" style="margin-top: 150.639px;">
        <div class="container">

            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Our BLog</li>
                </ul>
            </div>
            <!-- Page Breadcrumb End -->

            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title">Our BLog</h2>
            </div>
            <!-- Page Banner Caption End -->

        </div>
    </div>
</div>
<div class="row gy-10 grid" style="position: relative; height: 1318.94px;">
    @foreach ($blogs as $blog)
    <div class="col-xl-3 col-lg-4 col-md-6 grid-item" style="position: absolute; left: 0px; top: 0px;">

        <!-- Blog Item Start -->
        @include('web.component.blog')
        <!-- Blog Item End -->

    </div>
    @endforeach


</div>
@endsection