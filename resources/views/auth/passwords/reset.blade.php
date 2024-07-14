@extends('web.app.app')

@section('main-body')

<div class="page-banner bg-color-05" style="margin-top: 150.639px;">
    <div class="page-banner__wrapper" style="margin-top: 150.639px;">
        <div class="container">

            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ul>
            </div>
            <!-- Page Breadcrumb End -->

            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title">Reset Password</h2>
            </div>
            <!-- Page Banner Caption End -->

        </div>
    </div>
</div>
<div class="main-body">
    <section class="form-page js-mouse-move-container">
        <div class="form-page__content lg:py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 mx-auto">
                        <div class="px-4 py-4 md:px-2 md:py-2 bg-white shadow-md rounded-md">
                            <h3 class="text-3xl">{{ __('Reset Password') }}</h3>
                            <form method="POST" action="{{ route('password.update') }}"
                              class="pt-4 contact-form respondForm__form row g-3">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="col-12">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                      class="form-control @error('email') is-invalid @enderror" name="email"
                                      value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                      class="form-control @error('password') is-invalid @enderror" name="password"
                                      required autocomplete="new-password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password-confirm"
                                      class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                      name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection