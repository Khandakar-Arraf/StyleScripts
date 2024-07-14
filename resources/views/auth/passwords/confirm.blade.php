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
                        <div class="px-5 py-5 md:px-2 md:py-2 bg-white shadow-md rounded-md">
                            <h3 class="text-3xl">Confirm Password</h3>
                            <p class="mt-4">{{ __('Please confirm your password before continuing.') }}</p>

                            <form class="pt-5" method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <div class="mb-4">
                                    <label for="password" class="form-label">
                                        {{ __('Password') }}
                                    </label>

                                    <input id="password" type="password"
                                      class="form-control @error('password') is-invalid @enderror" name="password"
                                      required autocomplete="current-password">

                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-purple-1">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
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