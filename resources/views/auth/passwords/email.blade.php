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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="px-5 py-5 md:px-2 md:py-2 bg-white shadow-md rounded-md">
                    <h3 class="text-3xl">{{ __('Reset Password') }}</h3>

                    @if (session('status'))
                    <div class="alert alert-success mt-4">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="pt-5" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">
                                {{ __('Email Address') }}
                            </label>

                            <input id="email" type="email" name="email"
                              class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                              required autocomplete="email" autofocus>

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection