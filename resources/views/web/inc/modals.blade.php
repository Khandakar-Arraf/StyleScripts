<!-- Log In Modal Start -->
<div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-dialog-centered modal-login">

        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>

            <!-- Modal Content Start -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <p class="modal-description">Don't have an account yet? <button data-bs-toggle="modal"
                          data-bs-target="#registerModal">Sign up for free</button></p>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="modal-form">
                            <label class="form-label">User email</label>
                            <input type="text" class="form-control" name="email" placeholder="Your user email">
                        </div>
                        <div class="modal-form">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="modal-form d-flex justify-content-between flex-wrap gap-2">
                            <div class="form-check">
                                <input type="checkbox" id="rememberme">
                                <label for="rememberme">Remember me</label>
                            </div>
                            <div class="text-end">
                                <a class="modal-form__link" href="{{ route('password.request') }}">Forgot your password?</a>
                            </div>
                        </div>
                        <div class="modal-form">
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Log In</button>
                        </div>
                    </form>


                </div>
            </div>
            <!-- Modal Content End -->

        </div>
        <!-- Modal Wrapper End -->

    </div>
</div>
<!-- Log In Modal End -->

<!-- Log In Modal Start -->
<div class="modal fade" id="registerModal">
    <div class="modal-dialog modal-dialog-centered modal-register">

        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>

            <!-- Modal Content Start -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign Up</h5>
                    <p class="modal-description">Already have an account? <button data-bs-toggle="modal"
                          data-bs-target="#loginModal">Log in</button></p>
                </div>
                <div class="modal-body">

                    <form class="contact-form respondForm__form row y-gap-20 pt-30" action="{{ route('register') }}"
                      method="POST">
                        @csrf


                        <div class="col-md-6">
                            <label class="form-label">Email address *</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                            @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone *</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Phone" required>
                            @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Username *</label>
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                            @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Password *</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Re-Enter Password *</label>
                            <input type="password" class="form-control" name="password_confirmation"
                              placeholder="Re-Enter Password" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Role *</label>
                            <select name="role" class="form-control">
                                <option value="">Select a role</option>
                                <option value="1">Customer</option>
                                <option value="2">Instructor</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input type="checkbox" id="privacy" name="privacy" class="form-check-input" required>
                                <label for="privacy" class="form-check-label">Accept the Terms and Privacy
                                    Policy</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Register</button>
                        </div>
                    </form>


                </div>
            </div>
            <!-- Modal Content End -->

        </div>
        <!-- Modal Wrapper End -->

    </div>
</div>
<!-- Log In Modal End -->
