<footer class="main">
    <section class="section-padding mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                    <div class="product-list-small animated animated">
                        @foreach ($bestproducts as $item )
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ route('product-detail',['id'=>$item->product_id]) }}"><img src="{{asset('assets/images')}}/{{ $item->product->front_image }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{route('product-detail',['id'=>$item->product_id])  }}">{{ $item->product->name }}</a>
                                </h6>

                                <div class="product-price">
                                    <span>Rs.{{ $item->price }}</span>
                                    {{-- <span class="old-price">$33.8</span> --}}
                                </div>
                            </div>
                        </article>

                        @endforeach

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                    <div class="product-list-small animated animated">
                        @foreach ($trendings as $trending )
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ route('product-detail',['id'=>$trending->id]) }}"><img src="{{asset('assets/images')}}/{{ $trending->front_image }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{ route('product-detail',['id'=>$trending->id]) }}">{{ $trending->name }}</a>
                                </h6>
                                <div class="product-price">

                                    <span>Rs.{{ $trending->price }}</span>
                                </div>
                            </div>
                        </article>
                        @endforeach

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                    <div class="product-list-small animated animated">
                        @foreach ($recents as $recent )
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href=" {{ route('product-detail',['id'=>$recent->id]) }} "><img src="{{asset('assets/images')}}/{{ $recent->front_image }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{ route('product-detail',['id'=>$recent->id]) }}">{{ $recent->name }}</a>
                                </h6>

                                <div class="product-price">

                                    <span>Rs.{{ $recent->price }}</span>
                                </div>
                            </div>
                        </article>

                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End 4 columns-->
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                            @if($setting)
                            @if($setting->footer_logo)
                            <a href="/" class="mb-15"><img src="{{asset('assets/images')}}/{{ $setting->footer_logo }}" alt="logo" /></a>
                            <p class="font-lg text-heading">{{ $setting->name }}</p>
                            @else
                            <a href="/" class="mb-15"><img src="{{asset('assets/images/default.svg')}}" alt="logo" /></a>
                            <p class="font-lg text-heading">Awesome grocery store website template</p>
                            @endif
                            @else
                            <a href="/" class="mb-15"><img src="{{asset('assets/images/default.svg')}}" alt="logo" /></a>
                            <p class="font-lg text-heading">Awesome grocery store website template</p>
                            @endif
                        </div>
                        <ul class="contact-infor">
                            @if($setting)
                            @if($setting->address)
                            <li><img src="{{asset('assets/images/icon-location.svg')}}" alt="" /><strong>Address: </strong> <span>{{ $setting->address }}</span></li>
                            @else
                            <li><img src="{{asset('assets/images/icon-location.svg')}}" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                            @endif
                            @if($setting->mobile)
                            <li><img src="{{asset('assets/images/icon-contact.svg')}}" alt="" /><strong>Call Us:</strong><span>(+92) -{{$setting->mobile}}</span></li>
                            @else
                            <li><img src="{{asset('assets/images/icon-contact.svg')}}" alt="" /><strong>Call Us:</strong><span>(+92) - 540-025-124553</span></li>
                            @endif
                            @if($setting->email)
                            <li><img src="{{asset('assets/images/icon-email-2.svg')}}" alt="" /><strong>Email:</strong><span>{{ $setting->email }}</span></li>
                            @else
                            <li><img src="{{asset('assets/images/icon-email-2.svg')}}" alt="" /><strong>Email:</strong><span><a  class="__cf_email__" >[email&#160;protected]</a></span></li>
                            @endif
                            @if($setting->time)
                            <li><img src="{{asset('assets/images/icon-clock.svg')}}" alt="" /><strong>Hours:</strong><span>{{ $setting->time }}</span></li>
                            @else
                            <li><img src="{{asset('assets/images/icon-clock.svg')}}" alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                            @endif
                            @else
                            <li><img src="{{asset('assets/images/icon-location.svg')}}" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                            <li><img src="{{asset('assets/images/icon-contact.svg')}}" alt="" /><strong>Call Us:</strong><span>(+92) - 540-025-124553</span></li>
                            <li><img src="{{asset('assets/images/icon-email-2.svg')}}" alt="" /><strong>Email:</strong><span><a  class="__cf_email__" >[email&#160;protected]</a></span></li>
                            <li><img src="{{asset('assets/images/icon-clock.svg')}}" alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                            @endif

                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    @if ($setting)
                    @if($setting->name)
                    <h4 class="widget-title">{{ $setting->name }}</h4>
                    @else
                    <h4 class="widget-title">Company</h4>
                    @endif
                    @else
                    <h4 class="widget-title">Company</h4>
                    @endif
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="/about">About Us</a></li>
                        @if($setting)
                        @if($setting->terms_status)

                        <li><a href="{{route('terms-services')}}">Terms &amp; Conditions</a></li>
                        @endif
                        @if($setting->privacy_status)
                        <li><a href="{{route('terms-services')}}">Privacy Policy</a></li>
                        @endif
                        @endif
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="#">Support Center</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ route('login') }}">Sign In</a></li>
                        <li><a href="/cart">View Cart</a></li>
                        <li><a href="/wishlist">My Wishlist</a></li>
                        <li><a href="{{route('track-order')}}">Track My Order</a></li>


                    </ul>

                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title">Corporate</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ route('register') }}">Become a Vendor</a></li>

                        <li><a href="/vendors">Our vendors</a></li>
                        <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                            <h4 class="widget-title">Install App</h4>
                            <p class="">From App Store or Google Play</p>
                            <div class="download-app">
                                <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{asset('assets/images/app-store.jpg')}}" alt="" /></a>
                                <a href="#" class="hover-up mb-sm-2"><img src="{{asset('assets/images/google-play.jpg')}}" alt="" /></a>
                            </div>
                            <p class="mb-20">Secured Payment Gateways</p>
                            <img class="" src="{{asset('assets/images/payment-method.png')}}" alt="" />
                        </div>
                    </ul>
                </div>


            </div>
        </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                @if($setting)
                @if($setting->copy_right)
                <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">{{ $setting->name }}</strong> - {{ $setting->copy_right }}</p>
                @else
                <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">Muhammad Aslam</strong> - Laravel Developer <br />All rights reserved</p>

                @endif
                @else
                <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">Muhammad Aslam</strong> - Laravel Developer <br />All rights reserved</p>
                @endif
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="{{asset('assets/images/phone-call.svg')}}" alt="hotline" />
                    @if ($setting)
                    @if ($setting->hot_line)
                    <p>{{ $setting->hot_line }}<span>Working {{ $setting->time }}</span></p>
                    @else
                    <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
                    @endif
                    @else
                    <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
                    @endif
                </div>
                <div class="hotline d-lg-inline-flex">
                    <img src="{{asset('assets/images/phone-call.svg')}}" alt="hotline" />
                    @if ($setting)
                    @if ($setting->hot_line)
                    <p>{{ $setting->hot_line }}<span>24/7 Support Center</span></p>
                    @else
                    <p>1900 - 8888<span>24/7 Support Center</span></p>
                    @endif
                    @else
                    <p>1900 - 8888<span>24/7 Support Center</span></p>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    @if($setting)
                    @if ($setting->facebook)
                    <a href="{{ $setting->facebook }}"><img src="{{asset('assets/images/icon-facebook-white.svg')}}" alt="" /></a>
                    @else
                    <a href="#"><img src="{{asset('assets/images/icon-facebook-white.svg')}}" alt="" /></a>
                    @endif
                    @if ($setting->twitter)
                    <a href="{{ $setting->twitter }}"><img src="{{asset('assets/images/icon-twitter-white.svg')}}" alt="" /></a>

                    @else
                    <a href="#"><img src="{{asset('assets/images/icon-twitter-white.svg')}}" alt="" /></a>

                    @endif
                    @if ($setting->instagram)
                    <a href="{{ $setting->instagram }}"><img src="{{asset('assets/images/icon-instagram-white.svg')}}" alt="" /></a>

                    @else
                    <a href="#"><img src="{{asset('assets/images/icon-instagram-white.svg')}}" alt="" /></a>

                    @endif
                    @if ($setting->pintreset)
                    <a href="{{ $setting->pintreset }}"><img src="{{asset('assets/images/icon-pinterest-white.svg')}}" alt="" /></a>

                    @else
                    <a href="#"><img src="{{asset('assets/images/icon-pinterest-white.svg')}}" alt="" /></a>

                    @endif
                    @if ($setting->youtube)
                    <a href="{{ $setting->youtube }}"><img src="{{asset('assets/images/icon-youtube-white.svg')}}" alt="" /></a>
                    @else
                    <a href="#"><img src="{{asset('assets/images/icon-youtube-white.svg')}}" alt="" /></a>
                    @endif
                    @else
                    <a href="#"><img src="{{asset('assets/images/icon-facebook-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('assets/images/icon-twitter-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('assets/images/icon-instagram-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('assets/images/icon-pinterest-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('assets/images/icon-youtube-white.svg')}}" alt="" /></a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</footer>
