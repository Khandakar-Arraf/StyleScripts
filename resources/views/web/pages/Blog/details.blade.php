@extends('web.app.app')
@section('main-body')
<div class="page-banner" style="margin-top: 150.639px;">
    <div class="page-banner__wrapper" style="margin-top: 150.639px;">
        <div class="container">

            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop-default.html">Our Blog</a></li>
                    <li class="breadcrumb-item active">{{ $blog->name }}</li>
                </ul>
            </div>
            <!-- Page Breadcrumb End -->

        </div>
    </div>
</div>
<div class="shop-section section-padding-01">
    <div class="container custom-container">

        <!-- Blog Single Blog Start -->
        <div class="shop-single-product">
            <div class="row gy-6">
                <div class="col-md-6">

                    <!-- Blog Single Blog Start -->
                    <div class="shop-single-product__images">

                        <div class="shop-single-product__image-main">
                            <div class="shop-single-product__badge">
                                <span class="best-seller">Best Seller</span>
                            </div>

                            <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                                <div class="swiper-wrapper" id="swiper-wrapper-91fb6b910528a32fb" aria-live="polite"
                                  style="transform: translate3d(0px, 0px, 0px);">
                                    <div class="swiper-slide product-image-main swiper-slide-active" role="group"
                                      aria-label="1 / 4" style="width: 570px; margin-right: 10px;">
                                        <img src="{{ asset('') }}uploads/blogs/{{ $blog->image }}" alt="Blog"
                                          width="532" height="615">
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- Blog Single Blog End -->

                </div>
                <div class="col-md-6">

                    <!-- Blog Single Blog Content Start -->
                    <div class="shop-single-product__content">
                        <h1 class="shop-single-product__title">{{ $blog->title }}</h1>
                        <div class="shop-single-product__description">
                            <p>{{ $blog->subtitle }}</p>
                        </div>



                    </div>
                    {!! $blog->description !!}
                    <!-- Blog Single Blog Content End -->

                </div>
            </div>
        </div>
        <!-- Blog Single Blog End -->



    </div>
</div>
@endsection