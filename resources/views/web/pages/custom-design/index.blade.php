@extends('web.app.app')
@section('main-body')
    <div class="page-banner bg-color-05" style="margin-top: 150.639px;">
        <div class="page-banner__wrapper" style="margin-top: 150.639px;">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Our Shop</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

                <!-- Page Banner Caption Start -->
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Design Your Custom custom items</h2>
                </div>
                <!-- Page Banner Caption End -->

            </div>
        </div>
    </div>
    <div class="shop-section section-padding-01">
        <div class="container">

            <div class="row row-cols-xl-5 gy-6">
                @foreach ($customdesigns as $data)
                    <div class="col-xl col-lg-3 col-md-4 col-sm-6">

                        <!-- customdesigns Item Start -->
                        @include('web.component.customdesign')
                        <!-- customdesigns Item End -->

                    </div>
                @endforeach


            </div>

            <!-- Page Pagination Start -->
            <div class="page-pagination">
                <ul class="pagination justify-content-center">
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                </ul>
            </div>
            <!-- Page Pagination End -->

        </div>
    </div>
@endsection
