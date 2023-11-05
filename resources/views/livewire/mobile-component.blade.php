<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
   @php
                $setting=DB::table('home_page_settings')->find(1);
                @endphp
                @if($setting)
                <a href="/"><img src="{{asset('assets/images')}}/{{$setting->header_logo}}" alt="logo" /></a>
                @else
                <a href="/"><img src="{{asset('assets/images/default.svg')}}" alt="logo" /></a>
                @endif            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">

            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="/deals">Deals</a>

                        </li>
                        <li class="menu-item-has-children">
                            <a href="/">Home</a>

                        </li>
                        <li class="menu-item-has-children">
                            <a href="/shop">shop</a>

                        </li>
                        <!--<li class="menu-item-has-children">-->
                        <!--    <a href="/vendors">Vendors</a>-->

                        <!--</li>-->
                        <li class="menu-item-has-children">
                            <a href="/">About</a>

                        </li>




                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">

                <div class="single-mobile-header-info">
                    <a href="{{route('login')}}"><i class="fa fa-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fa fa-headphones"></i>
                    @if($setting)
                    {{$setting->hot_line}}
                    @else
                    (+092) - 310 - 6473564
                    @endif
                    </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{asset('assets/images/icon-facebook-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{asset('assets/images/icon-twitter-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{asset('assets/images/icon-instagram-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{asset('assets/images/icon-pinterest-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{asset('assets/images/icon-youtube-white.svg')}}" alt="" /></a>
            </div>
            @if($setting)
                        <div class="site-copyright">Copyright 2022 © All rights reserved. Powered by  {{$setting->copy_right}}.</div>
            @else
                        <div class="site-copyright">Copyright 2022 © Aslam. All rights reserved. Powered by Muhammad Aslam.</div>
            @endif
        </div>
    </div>
</div>
