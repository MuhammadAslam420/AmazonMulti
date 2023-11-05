<x-base-layout>
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>

                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a href="{{route('login')}}">Login</a></p>
                                        </div>
                                        <x-jet-validation-errors class="mb-4" />

                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" placeholder="Full name" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="user name" name="username"  required autofocus autocomplete="username" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" placeholder="email" name="email" :value="old('email')" required />
                                            </div>
                                            <div class="form-group">
                                                <select name="atype" id="atype" class="form-control">
                                                    <option value="">Select the Account Type</option>
                                                    <option value="USR">Customer</option>
                                                    <option value="VEN">Become a Vendor</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <input type="password" placeholder="password" name="password" required autocomplete="new-password" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" placeholder="password" name="password_confirmation" required autocomplete="new-password" />
                                            </div>


                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="#" class="social-login facebook-login">
                                        <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                        <span>Continue with Facebook</span>
                                    </a>
                                    <a href="#" class="social-login google-login">
                                        <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                        <span>Continue with Google</span>
                                    </a>
                                    <a href="#" class="social-login apple-login">
                                        <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                        <span>Continue with Apple</span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-base-layout>
