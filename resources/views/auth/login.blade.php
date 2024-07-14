@extends('web.app.app')

@section('main-body')
    <div class="page-banner bg-color-11" style="margin-top: 150.639px;">
        <div class="page-banner__wrapper" style="margin-top: 150.639px;">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="course-grid-left-sidebar.html">Login</a></li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

            </div>
        </div>
    </div>
    <section class="form-page js-mouse-move-container">


        <section class="bg-light py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="card shadow rounded-16 p-4">
                            <h2 class="text-center text-30 font-weight-bold mb-4">Login</h2>
                            <p class="text-center mb-3">Don't have an account yet? <a href="{{ route('register') }}"
                                    class="text-primary">Sign up for free</a></p>

                            <form class="row g-3" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="email"
                                        class="form-label text-16 font-weight-bold text-dark mb-2">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-12">
                                    <label for="password"
                                        class="form-label text-16 font-weight-bold text-dark mb-2">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" id="submit"
                                        class="btn btn-primary btn-block text-18 font-weight-bold">Login</button>
                                </div>
                            </form>

                            <p class="text-center mt-3">Forgot your password? <a href="{{ route('password.request') }}"
                                    class="text-primary">Reset password</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
@endsection
