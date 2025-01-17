<x-guest-layout>
    
    <div class="account-content">
        <div class="login-wrapper forgot-pass-wrap bg-img">
            <div class="login-content">
                <form action="signin">
                    <div class="login-userset">
                        {{-- <div class="login-logo logo-normal">
                            <img src="https://dreamspos.dreamstechnologies.com/laravel/template/public/build/img/logo.png" alt="img">
                        </div>
                        <a href="https://dreamspos.dreamstechnologies.com/laravel/template/public/index" class="login-logo logo-white">
                            <img src="https://dreamspos.dreamstechnologies.com/laravel/template/public/build/img/logo-white.png" alt="">
                        </a> --}}
                        <div class="login-userheading">
                            <h3>Forgot password?</h3>
                            <h4>If you forgot your password, well, then we’ll email you instructions to reset your password.
                            </h4>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="form-addons">
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="youremail@email.com">
                                <img src="{{ asset('images/svg/mail.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Sign Up</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Return to<a href="{{ route('login') }}" class="hover-a"> login </a></h4>
                        </div>
                        <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                            <p>Copyright &copy; 2023 DreamsPOS. All rights reserved</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
