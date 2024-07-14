@extends('web.app.app')


@section('main-body')
    <div class="page-banner bg-color-11" style="margin-top: 150.639px;">
        <div class="page-banner__wrapper" style="margin-top: 150.639px;">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="course-grid-left-sidebar.html">Checkout</a></li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-50">
                <div class="col-lg-12">
                    <div class="card shadow rounded-16 p-4">
                        <h5 class="text-20 mb-4">Billing Details</h5>
                        <form class="row g-3">
                            <div class="col-sm-6">
                                <label for="name" class="form-label text-16 font-weight-bold text-dark">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="form-label text-16 font-weight-bold text-dark">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label for="phone" class="form-label text-16 font-weight-bold text-dark">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone"
                                    value="{{ Auth::user()->phone }}" readonly>
                            </div>
                            @if (Auth::user()->role == 1)
                                <div class="col-sm-6">
                                    <label for="address"
                                        class="form-label text-16 font-weight-bold text-dark">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" value="{{ Auth::user()->customer->address }}" readonly>
                                </div>
                            @elseif(Auth::user()->role == 2)
                                <div class="col-sm-6">
                                    <label for="address"
                                        class="form-label text-16 font-weight-bold text-dark">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" value="{{ Auth::user()->instructor->address }}" readonly>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="">
                        <div class="pt-4 pb-4 bg-light border rounded-8 shadow-sm">
                            <h5 class="px-4 text-20 font-weight-bold">
                                @if ($type == 1)
                                    Course Checkout
                                @elseif ($type == 2)
                                    Product Checkout
                                @endif
                            </h5>

                            <div class="d-flex justify-content-between px-4 mt-3">
                                <div class="py-2 font-weight-bold text-dark">Product</div>
                                <div class="py-2 font-weight-bold text-dark">Price</div>
                            </div>

                            <div class="d-flex justify-content-between border-top px-4">
                                <div class="py-2 text-muted">
                                    @if ($type == 1)
                                        {{ $singleItem->title }}
                                    @else
                                        {{ $singleItem->name }}
                                    @endif
                                </div>
                                <div class="py-2 text-muted">${{ $singleItem->price }}</div>
                            </div>

                            <div class="d-flex justify-content-between border-top px-4">
                                <div class="py-2 font-weight-bold text-dark">Subtotal</div>
                                <div class="py-2 font-weight-bold text-dark">${{ $singleItem->price }}</div>
                            </div>

                            <div class="d-flex justify-content-between border-top px-4">
                                <div class="py-2 text-dark">Shipping</div>
                                <div class="py-2 text-dark">${{ $singleItem->price }}</div>
                            </div>

                            <div class="d-flex justify-content-between border-top px-4">
                                <div class="py-2 font-weight-bold text-18 text-dark">Total</div>
                                <div class="py-2 font-weight-bold text-18 text-dark">${{ $singleItem->price }}</div>
                            </div>
                        </div>


                        <div class="py-4 px-4 bg-white mt-4 border rounded-8 shadow">
                            <h5 class="text-20 font-weight-bold">
                                Payment
                            </h5>

                            <div class="container mt-3">
                                <ul class="nav nav-pills justify-content-around mt-2" id="paymentTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="bkash-tab" data-bs-toggle="pill"
                                            data-bs-target="#bkash" type="button" role="tab" aria-controls="bkash"
                                            aria-selected="true">
                                            <img src="{{ asset('/') }}assets/web/images/bkash_logo.png" alt="Bkash Logo"
                                                class="payment-logo">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="nagad-tab" data-bs-toggle="pill"
                                            data-bs-target="#nagad" type="button" role="tab" aria-controls="nagad"
                                            aria-selected="false">
                                            <img src="{{ asset('/') }}assets/web/images/nagad_logo.png"
                                                alt="Nagad Logo" class="payment-logo">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="rocket-tab" data-bs-toggle="pill"
                                            data-bs-target="#rocket" type="button" role="tab"
                                            aria-controls="rocket" aria-selected="false">
                                            <img src="{{ asset('/') }}assets/web/images/rocket_logo.png"
                                                alt="Rocket Logo" class="payment-logo">
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content mt-4" id="paymentTabsContent">
                                    <div class="tab-pane fade show active" id="bkash" role="tabpanel"
                                        aria-labelledby="bkash-tab">
                                        <!-- Bkash Payment Form -->
                                        <form class="contact-form" action="{{ route('order.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $type }}" name="type">
                                            <input type="hidden" name="price" value="{{ $singleItem->price }}">
                                            @if ($type == 1)
                                                <input type="hidden" name="name" value="{{ $singleItem->title }}">
                                            @else
                                                <input type="hidden" name="name" value="{{ $singleItem->name }}">
                                            @endif
                                            <input type="hidden" name="payment_type" value="Bkash">
                                            <input type="hidden" value="{{ $singleItem->id }}" name="item_id">
                                            <div class="mb-3">
                                                <label for="bkash-phone" class="form-label">Phone No.</label>
                                                <input type="text" id="bkash-phone" name="phone"
                                                    class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="bkash-transaction-id" class="form-label">Transaction
                                                    ID</label>
                                                <input type="text" id="bkash-transaction-id" name="transaction_id"
                                                    class="form-control" required>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Pay with Bkash</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="nagad" role="tabpanel"
                                        aria-labelledby="nagad-tab">
                                        <!-- Nagad Payment Form -->
                                        <form class="contact-form" action="{{ route('order.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $type }}" name="type">
                                            <input type="hidden" name="price" value="{{ $singleItem->price }}">
                                            @if ($type == 1)
                                                <input type="hidden" name="name" value="{{ $singleItem->title }}">
                                            @else
                                                <input type="hidden" name="name" value="{{ $singleItem->name }}">
                                            @endif
                                            <input type="hidden" name="payment_type" value="Nagad">
                                            <input type="hidden" value="{{ $singleItem->id }}" name="item_id">
                                            <div class="mb-3">
                                                <label for="nagad-phone" class="form-label">Phone No.</label>
                                                <input type="text" id="nagad-phone" name="phone" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nagad-transaction-id" class="form-label">Transaction
                                                    ID</label>
                                                <input type="text" id="nagad-transaction-id" name="transaction_id"
                                                    class="form-control" required>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-warning">Pay with Nagad</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="rocket" role="tabpanel"
                                        aria-labelledby="rocket-tab">
                                        <!-- Rocket Payment Form -->
                                        <form class="contact-form" action="{{ route('order.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $type }}" name="type">
                                            <input type="hidden" name="price" value="{{ $singleItem->price }}">
                                            @if ($type == 1)
                                                <input type="hidden" name="name" value="{{ $singleItem->title }}">
                                            @else
                                                <input type="hidden" name="name" value="{{ $singleItem->name }}">
                                            @endif
                                            <input type="hidden" name="payment_type" value="Rocket">
                                            <input type="hidden" value="{{ $singleItem->id }}" name="item_id">
                                            <div class="mb-3">
                                                <label for="rocket-phone" class="form-label">Phone No.</label>
                                                <input type="text" id="rocket-phone" name="phone"
                                                    class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="rocket-transaction-id" class="form-label">Transaction
                                                    ID</label>
                                                <input type="text" id="rocket-transaction-id" name="transaction_id"
                                                    class="form-control" required>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-purple">Pay with Rocket</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-accent col-12 text-white">Place order</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
    </section>
@endsection
