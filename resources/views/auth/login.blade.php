<x-guest-layout>

    <div class="account-content">
        <div class="login-wrapper bg-img">
            <div class="login-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-userset">
                        {{-- <div class="login-logo logo-normal">
                                <img src="https://dreamspos.dreamstechnologies.com/laravel/template/public/build/img/logo.png" alt="img">
                            </div>
                            <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/index" class="login-logo logo-white">
                                <img src="https://dreamspos.dreamstechnologies.com/laravel/template/public/build/img/logo-white.png" alt="">
                            </a> --}}
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Access the Dreamspos panel using your email and passcode.</h4>
                        </div>
                        <div class="form-login mb-3">
                            <label class="form-label">Email Address</label>
                            <div class="form-addons">
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="youremail@email.com">
                                <img src="{{ asset('images/svg/mail.svg') }}" alt="img">
                            </div>
                            <div class="text-danger pt-2"></div>
                        </div>
                        <div class="form-login mb-3">
                            <label class="form-label">Password</label>
                            <div class="pass-group">
                                <input type="password" class="pass-input form-control" id="password" name="password"
                                    value="123456">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                            <div class="text-danger pt-2"></div>
                        </div>
                        <div class="form-login authentication-check">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                            <input type="checkbox" class="form-control">
                                            <span class="checkmarks"></span>
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="text-end">
                                        <a class="forgot-link" href="{{ route('password.request') }}">Forgot
                                            Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Sign In</button>
                        </div>
                        <div class="signinform">
                            <h4>New on our platform?<a
                                    href="https://dreamspos.dreamstechnologies.com/laravel/template/public/register"
                                    class="hover-a"> Create an account</a>
                            </h4>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
