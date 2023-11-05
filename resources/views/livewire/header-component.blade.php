<header class="header-area header-style-1 header-style-5 " style="padding:0; margin:0;" wire:ignore>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block sticky-bar" style="background:#253B53;padding:5px;margin:0;">
        <div class="container">
            <div class="header-wrap" style="margin-left:12px;">
                <div class="logo logo-width-1" >
                @php
                    $setting=DB::table('home_page_settings')->find(1);
                    @endphp
                    @if($setting)
                    <a href="/"><img src="{{asset('assets/images')}}/{{$setting->header_logo}}" style="height:35px;" alt="logo" /></a>
                    @else
                    <a href="/"><img src="{{asset('assets/images/default.svg')}}" alt="logo" /></a>
                    @endif
                </div>
                <div class="header-right mr-5">
                    @livewire('header-search-component')
                    <div class="header-action-right ">
                        <div class="header-action-2">
                                @if(Route::has('login'))
                            @Auth
                            @if(Auth::user()->atype === 'USR')
                            <div class="header-action-icon-2">
                                <a href="#">
                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account-circle</title><path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" /></svg>
                                </a>
                                <a href="#"><span class="lable ml-0">{{Auth::user()->name}}</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{route('my.dashboard')}}"><i class="fa fa-user mr-10"></i>My Account</a>
                                        </li>
                                        <li>
                                            <a href="{{route('my.orders')}}"><i class="fa fa-shopping-bag mr-10"></i>My Orders</a>
                                        </li>
                                        <li><a href="{{route('track-order')}}"><i class="fa fa-shopping-cart mr-10">Track Your Order</i></a></li>
                                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                                            @csrf
                                        </form>

                                    </ul>
                                </div>
                            </div>
                            @elseif(Auth::user()->atype === 'ADM')
                            <div class="header-action-icon-2">
                                <a href="#">
                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account-circle</title><path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" /></svg>
                                </a>
                                <a href="#"><span class="lable ml-0">{{Auth::user()->name}}</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{route('admin.dashboard')}}"><i class="fa fa-user mr-10"></i>My Account</a>
                                        </li>

                                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                                            @csrf
                                        </form>

                                    </ul>
                                </div>
                            </div>
                            @elseif(Auth::user()->atype === "VEN")
                            <div class="header-action-icon-2">
                                <a href="#">
                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account-circle</title><path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" /></svg>
                                </a>
                                <a href="#"><span class="lable ml-0">{{Auth::user()->name}}</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{route('vendor.dashboard')}}"><i class="fa fa-user mr-10"></i>Vendor Account</a>
                                        </li>
                                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                                            @csrf
                                        </form>

                                    </ul>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="header-action-icon-2">
                                <a href="{{route('login')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account-circle</title><path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" /></svg>
                                </a>
                                <a href="{{route('login')}}"><span class="lable ml-0" style="font-size:12px;font-weight:900;color:white">SignIn</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{route('login')}}"><i class="fa fa-user mr-10"></i>SignIn</a>
                                        </li>
                                        <li>
                                            <a href="{{route('register')}}"><i class="fa fa-user mr-10"></i>SignUp</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                            
                            @livewire('wish-list-count-component')
                            @livewire('cart-count-component')
                            @livewire('compare-count-component')
                        
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color " style="margin-top:0;margin-bottom:0;">
        <div class="container" style="margin-top:0;margin-bottom:0;">
            <div class="header-wrap header-space-between position-relative" style="margin-top:0;margin-bottom:0;">
                <div class="logo logo-width-1 d-block d-lg-none">
                     @php
                    $setting=DB::table('home_page_settings')->find(1);
                    @endphp
                    @if($setting)
                    <a href="/"><img src="{{asset('assets/images')}}/{{$setting->header_logo}}" alt="logo" /></a>
                    @else
                    <a href="/"><img src="{{asset('assets/images/default.svg')}}" alt="logo" /></a>
                    @endif
                </div>
                <div class="header-nav d-none d-lg-flex" style="margin-top:0;margin-bottom:0;">
                    @livewire('trending-categories-component')
                    <div class="main-menu  d-none d-lg-block" style="margin:0;padding:0;">
                        @livewire('menu-component')
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{asset('assets/images/icon-headphone-white.svg')}}" style="height:24px;" alt="hotline" />
                    @if($setting)
                    @if($setting->hot_line)
                    <p style="font-size:15px;font-weight:900;">{{ $setting->hot_line }}</p>
                    @else
                    <p>1900 - 888<</p>
                    @endif
                    @else
                    <p>1900 - 888</p>
                    @endif
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="/wishlist">
                              <img src="{{asset('assets/images/icon-heart.svg')}}" alt="logo" />
                                @if(Cart::instance('wishlist')->count() > 0)
                                <span class="pro-count white">{{ Cart::instance('wishlist')->count()}}</span>
                                @else
                                <span class="pro-count white">0</span>
                                @endif
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="/cart">
                                <img src="{{asset('assets/images/icon-cart.svg')}}" alt="logo" />
                                @if(Cart::instance('cart')->count() > 0)
                                <span class="pro-count white">{{ Cart::instance('cart')->count() }}</span>
                                @else
                                <span class="pro-count white">0</span>
                                @endif
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    @if(Cart::instance('cart')->count() > 0)
                                    @foreach(Cart::instance('cart')->content() as $item)
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href=" {{ route('product-detail',['id'=>$item->id]) }}"><img alt="Nest" src="{{asset('assets/images')}}/{{ $item->model->front_image }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="{{ route('product-detail',['id'=>$item->id]) }}">{{ $item->name }}</a></h4>
                                            <h3><span>{{ $item->qty }} × </span>{{ $item->price }}</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-angle-down"></i></a>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif

                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>SubTotal <span>{{ Cart::subtotal() }}</span></h4>
                                        <h4>Total <span>{{ Cart::total() }}</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="/cart">View cart</a>
                                        <a href="/checkout">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
