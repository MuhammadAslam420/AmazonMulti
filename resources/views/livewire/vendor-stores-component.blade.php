<main class="main" wire:ignore.self>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                <i class="fa fa-angle-right"></i> Store <i class="fa fa-angle-right"></i> {{ $user->store->name }}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="archive-header-2 text-center pt-80 pb-50">
            <h1 class="display-2 mb-50"> {{ $user->store->name }} Store</h1>
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    {{-- <div class="sidebar-widget-2 widget_search mb-50">
                        <div class="search-form">
                                <input type="search" placeholder="Search in this store..." wire:model="search" />
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        @php
                        $products1=DB::table('products')->where('user_id',$user->id)->count();
                        @endphp
                        <p>We found <strong class="text-brand">{{ $products1 }}</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <select class="form-control" name="post-per-page" class="use-chosen" wire:model="pagesize">
                                    <option value="12" selected="selected">12 per page</option>
                                    <option value="16">16 per page</option>
                                    <option value="18">18 per page</option>
                                    <option value="21">21 per page</option>
                                    <option value="24">24 per page</option>
                                    <option value="30">30 per page</option>
                                    <option value="32">32 per page</option>
                                </select>
                            </div>

                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <select class="form-control" name="orderby" class="use-chosen" wire:model="sorting">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="desc">Sort by newness</option>
                                    <option value="asc">Sort by Oldest</option>

                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach ($products as $product )
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="{{ asset('assets/images') }}/{{ $product->front_image }}" alt="" />
                                        <img class="hover-img" src="{{ asset('assets/images') }}/{{ $product->back_image }}" alt="" />
                                    </a>
                                </div>
                                <!--<div class="product-action-1" style="display:inline-flex">-->
                                <!--    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>-->
                                <!--    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fa fa-retweet"></i></a>-->
                                <!--    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fa fa-eye"></i></a>-->
                                <!--</div>-->
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{ route('vendors-stores',['id'=>$user->id]) }}">{{ $user->store->name }} Store</a>
                                </div>
                                <h2><a href="{{ route('product-detail',['id'=>$product->id]) }}">{{ $product->name }}</a></h2>
                                <!--<div class="product-rate-cover">-->
                                <!--    <div class="product-rate d-inline-block">-->
                                <!--        <div class="product-rating" style="width: 90%"></div>-->
                                <!--    </div>-->
                                <!--    <span class="font-small ml-5 text-muted"> (4.0)</span>-->
                                <!--</div>-->
                                <div>
                                    <span class="font-small text-muted">By <a href="{{ route('category',['id'=>$product->category_id]) }}">{{ $product->category->name }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>Rs.{{ $product->price }}</span>
                                        <!--<span class="old-price">{{ $product->price }}</span>-->
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="#" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-shopping-bag mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                {{ $products->links() }}
                <!--product grid-->

                <section class="section-padding pb-5">
                    <div class="section-title">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="shop-grid-right.html">
                            All Deals
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <div class="row">
                        @if($sale)
                       @if($deals->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                       @foreach($deals as $deal)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="{{ route('product-detail',['id'=>$deal->id]) }}">
                                            <img src="{{ asset('assets/images/banner-5.png') }}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')}}"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="{{ route('product-detail',['id'=>$deal->id]) }}">{{ $deal->name }}</a>
                                        </h2>


                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>Rs.{{ $deal->deals }}</span>
                                                <span class="old-price">Rs.{{ $deal->price }}</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="#" wire:click.prevent="store({{ $deal->id }},'{{ $deal->name }}',{{ $deal->deals }})"><i
                                                        class="fa fa-shopping-bag mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endif

                    </div>

                </section>
                <!--End Deals-->
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-store-info mb-30 bg-3 border-0">
                    <div class="vendor-logo mb-30">
                        <img src="{{ asset('assets/images/vendor/stores') }}/{{ $user->store->logo }}" alt="" />
                    </div>
                    <div class="vendor-info">
                        <div class="product-category">
                            <span class="text-muted">Since {{ DATE_FORMAT($user->vendor->created_at,'Y') }}</span>
                        </div>
                        <!--<h4 class="mb-5"><a href="vendor-details-1.html" class="text-heading"></a></h4>-->
                        <!--<div class="product-rate-cover mb-15">-->
                        <!--    <div class="product-rate d-inline-block">-->
                        <!--        <div class="product-rating" style="width: 90%"></div>-->
                        <!--    </div>-->
                        <!--    <span class="font-small ml-5 text-muted"> (4.0)</span>-->
                        <!--</div>-->
                     
                        <div class="follow-social mb-20">
                            <h6 class="mb-15">Follow Us</h6>
                            <ul class="social-network">
                                <li class="hover-up">
                                    <a href="{{ $user->vendor->facebook }}">
                                        <img src="{{ asset('assets/images/vendor/icons/facebook.png') }}" alt="" />
                                    </a>
                                </li>
                                <li class="hover-up">
                                    <a href="{{ $user->vendor->instagram }}">
                                        <img src="{{ asset('assets/images/vendor/icons/instagram.png') }}" alt="" />
                                    </a>
                                </li>
                                <li class="hover-up">
                                    <a href="{{ $user->vendor->youtube }}">
                                        <img src="{{ asset('assets/images/vendor/icons/youtube-subscription.png') }}" alt="" />
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="vendor-info">
                            <!--<ul class="font-sm mb-20">-->
                            <!--    <li><img class="mr-5" src="{{ asset('assets/images/vendor/icons/map.png') }}" alt="" /><strong></strong> <span>{{ $user->vendor->address }}</span></li>-->
                            <!--    <li><img class="mr-5" src="{{ asset('assets/images/vendor/icons/mobile.png') }}" alt="" /><strong></strong><span>(+92) - {{ $user->vendor->mobile }}</span></li>-->
                            <!--</ul>-->
                            <!--<a href="#" class="btn btn-xs">{{$user->vendor->whatsapp}}<img class="ml-5" src="{{ asset('assets/images/vendor/icons/whatsapp.png') }}" alt="" /> </a>-->
                        </div>
                    </div>
                </div>
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Category</h5>
                    <ul>
                        @foreach($categories as $category)
                        <li>
                         <a href="{{ route('category',['id'=>$category->id]) }}"> <img src="{{ asset('assets/images') }}/{{ $category->logo }}"
                                 alt="" />{{ $category->name }}</a>
                                 @php
                                 $product=DB::table('products')->where('category_id',$category->id)->count();
                                 @endphp
                                 <span class="count">{{ $product }}</span>
                     </li>
                        @endforeach

                    </ul>
                </div>

                <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                    <img src="assets/imgs/banner/banner-11.png" alt="" />
                    <div class="banner-text">
                        <span>Oganic</span>
                        <h4>
                            Save 17% <br />
                            on <span class="text-brand">Oganic</span><br />
                            Juice
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
