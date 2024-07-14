@extends('web.app.app')
@section('main-body')
    <div class="page-banner" style="margin-top: 150.639px;">
        <div class="page-banner__wrapper" style="margin-top: 150.639px;">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="shop-default.html">Our Shop</a></li>
                        <li class="breadcrumb-item active">{{ $product->name }}</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <div class="shop-section section-padding-01">
        <div class="container custom-container">

            <!-- Shop Single Product Start -->
            <div class="shop-single-product">
                <div class="row gy-6">
                    <div class="col-md-6">

                        <!-- Shop Single Product Start -->
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
                                            <img src="{{ asset('') }}uploads/products/{{ $product->image }}"
                                                alt="Product" width="532" height="615">
                                        </div>

                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                            {{--
                        <div class="shop-single-product__image-thumbs">
                            <div
                              class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-thumbs">
                                <div class="swiper-wrapper" id="swiper-wrapper-97bce87f98a56c49" aria-live="polite"
                                  style="transform: translate3d(0px, 0px, 0px);">
                                    <div
                                      class="swiper-slide product-image-thumb swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
                                      role="group" aria-label="1 / 4" style="width: 135px; margin-right: 10px;">
                                        <img src="{{ asset('') }}assets/web/images/product/product-3.png" alt="Product"
                        width="126" height="145">
                    </div>
                    <div class="swiper-slide product-image-thumb swiper-slide-visible swiper-slide-next" role="group"
                      aria-label="2 / 4" style="width: 135px; margin-right: 10px;">
                        <img src="{{ asset('') }}assets/web/images/product/product-4.png" alt="Product" width="126"
                          height="145">
                    </div>
                    <div class="swiper-slide product-image-thumb swiper-slide-visible" role="group" aria-label="3 / 4"
                      style="width: 135px; margin-right: 10px;">
                        <img src="{{ asset('') }}assets/web/images/product/product-17.png" alt="Product" width="126"
                          height="145">
                    </div>
                    <div class="swiper-slide product-image-thumb swiper-slide-visible" role="group" aria-label="4 / 4"
                      style="width: 135px; margin-right: 10px;">
                        <img src="{{ asset('') }}assets/web/images/product/product-18.png" alt="Product" width="126"
                          height="145">
                    </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div> --}}

                        </div>
                        <!-- Shop Single Product End -->

                    </div>
                    <div class="col-md-6">

                        <!-- Shop Single Product Content Start -->
                        <div class="shop-single-product__content">
                            <h1 class="shop-single-product__title">{{ $product->name }}</h1>

                            <div class="shop-single-product__price">
                                <span class="sale-price">${{ $product->price }}.<small class="separator">00</small></span>
                            </div>

                            <div class="tutor-course-price-preview__btn">
                                <a class="btn btn-primary btn-hover-secondary w-100"
                                    href="{{ route('checkout.store', ['item' => $product->id, 'type' => '2']) }}"> <i
                                        class="fas fa-shopping-basket"></i> Purchase </a>
                            </div>

                        </div>
                        <!-- Shop Single Product Content End -->

                    </div>
                </div>
            </div>
            <!-- Shop Single Product End -->

            <!-- Shop Product Tabs Start -->
            <div class="shop-product-tabs">

                <ul class="nav">
                    <li><button class="" data-bs-toggle="tab" data-bs-target="#description">Description </button></li>

                    <li><button data-bs-toggle="tab" data-bs-target="#reviews">Reviews (1)</button></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="description">
                        <!-- Shop Product Tabs Item Start -->
                        <div class="shop-product-tabs__item mt-6">

                            <p>{!! $product->description !!}</p>

                        </div>
                        <!-- Shop Product Tabs Item End -->
                    </div>
                    <div class="tab-pane fade " id="information">
                        <!-- Shop Product Tabs Item Start -->
                        <div class="shop-product-tabs__item mt-6">
                            <table class="shop-product-tabs__table">
                                <tbody>
                                    <tr>
                                        <th class="label">Episode</th>
                                        <td class="value">
                                            <p>Episode 1, Episode 2, Episode 3, Episode 4</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="label">Author</th>
                                        <td class="value">
                                            <p>Alexander Morgan</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="label">Language</th>
                                        <td class="value">
                                            <p>English</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Shop Product Tabs Item End -->
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <!-- Shop Product Tabs Item Start -->
                        <div class="shop-product-tabs__item mt-6">
                            <ul class="comment-list">
                                <li>
                                    <!-- Comment Item Start -->
                                    <div class="comment-item">
                                        <div class="comment-item__author">
                                            <img src="{{ asset('') }}assets/web/images/avatar/avatar-02.jpg"
                                                alt="Avatar" width="70" height="70">
                                        </div>
                                        <div class="comment-item__content">
                                            <div class="comment-item__meta">
                                                <div class="comment-item__rating">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <h6 class="comment-item__name">Owen Christ</h6>
                                            </div>
                                            <div class="comment-item__description">
                                                <p>good book</p>
                                            </div>
                                            <div class="comment-item__footer">
                                                <span class="comment-item__datetime">June 16, 2020 at 2:00 am</span>
                                                <a href="#" class="comment-item__reply">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comment Item End -->
                                </li>
                                <li>
                                    <!-- Comment Item Start -->
                                    <div class="comment-item">
                                        <div class="comment-item__author">
                                            <img src="{{ asset('') }}assets/web/images/avatar/avatar-03.jpg"
                                                alt="Avatar" width="70" height="70">
                                        </div>
                                        <div class="comment-item__content">
                                            <div class="comment-item__meta">
                                                <div class="comment-item__rating">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <h6 class="comment-item__name">Owen Christ</h6>
                                            </div>
                                            <div class="comment-item__description">
                                                <p>good book</p>
                                            </div>
                                            <div class="comment-item__footer">
                                                <span class="comment-item__datetime">June 16, 2020 at 2:00 am</span>
                                                <a href="#" class="comment-item__reply">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comment Item End -->
                                </li>
                                <li>
                                    <!-- Comment Item Start -->
                                    <div class="comment-item">
                                        <div class="comment-item__author">
                                            <img src="{{ asset('') }}assets/web/images/avatar/avatar-04.jpg"
                                                alt="Avatar" width="70" height="70">
                                        </div>
                                        <div class="comment-item__content">
                                            <div class="comment-item__meta">
                                                <div class="comment-item__rating">
                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <h6 class="comment-item__name">Owen Christ</h6>
                                            </div>
                                            <div class="comment-item__description">
                                                <p>good book</p>
                                            </div>
                                            <div class="comment-item__footer">
                                                <span class="comment-item__datetime">June 16, 2020 at 2:00 am</span>
                                                <a href="#" class="comment-item__reply">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comment Item End -->
                                </li>
                            </ul>

                            <!-- Comment Form Start -->
                            <div class="comment-form">
                                <form action="#">
                                    <div class="comment-form__notes">
                                        <h4 class="comment-form__title">Add a review</h4>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                    </div>
                                    <div class="comment-form__rating">
                                        <label class="label">Your rating: *</label>
                                        <ul id="rating" class="rating">
                                            <li class="star" title="Poor" data-value="1"><i class="fas fa-star"></i>
                                            </li>
                                            <li class="star" title="Poor" data-value="2"><i class="fas fa-star"></i>
                                            </li>
                                            <li class="star" title="Poor" data-value="3"><i class="fas fa-star"></i>
                                            </li>
                                            <li class="star" title="Poor" data-value="4"><i class="fas fa-star"></i>
                                            </li>
                                            <li class="star" title="Poor" data-value="5"><i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <div class="comment-form__input">
                                                <input type="text" class="form-control" placeholder="Your Name *">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="comment-form__input">
                                                <input type="email" class="form-control" placeholder="Your Email *">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <textarea class="form-control" placeholder="Your Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input form-check">
                                                <input type="checkbox" id="save">
                                                <label for="save">Save my name, email, and website in this browser for
                                                    the
                                                    next time I comment.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <button class="btn btn-primary btn-hover-secondary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Comment Form End -->

                        </div>
                        <!-- Shop Product Tabs Item End -->
                    </div>
                </div>

            </div>
            <!-- Shop Product Tabs End -->

        </div>
    </div>
@endsection
