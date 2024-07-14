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
                    <h2 class="page-banner__main-title">Our Shop</h2>
                </div>
                <!-- Page Banner Caption End -->

            </div>
        </div>
    </div>
    <div class="shop-section section-padding-01">
        <div class="container">

            <div class="row row-cols-xl-5 gy-6">
                @foreach ($products as $data)
                    <div class="col-xl col-lg-3 col-md-4 col-sm-6">

                        <!-- Product Item Start -->
                        @include('web.component.product')
                        <!-- Product Item End -->

                    </div>
                @endforeach


            </div>

            <!-- Page Pagination Start -->
            <div class="col-auto">
                {{ $products->links() }}
            </div>
            <!-- Page Pagination End -->

        </div>
    </div>
@endsection
