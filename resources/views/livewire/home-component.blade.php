<main class="main" wire:ignore>
    @livewire('home-banner-component')
    <!--End hero slider-->
    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <!--<div class="section-title">-->
            <!--    <div class="title">-->
            <!--        <h3>Featured Categories</h3>-->

            <!--    </div>-->
                <!--<div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>-->
            </div>
            <div class="carausel-10-columns-cover position-relative" >
                <div class="carausel-10-columns" id="carausel-10-columns">
                    @foreach ($categories as $category)
                    <div class="card-2 bg-{{ $category->id }} wow animate__animated animate__fadeInUp" data-wow-delay=".1s" style="background:transparent;" >
                        <figure class="img-hover-scale overflow-hidden" >
                            <a href="{{ route('category', ['id' => $category->id]) }}"><img src="{{ asset('assets/images') }}/{{ $category->logo }}" alt="{{ $category->name }}" /></a>
                        </figure>
                        <h6><a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a></h6>
                        @php
                        $prod_count = DB::table('products')
                        ->where('category_id', $category->id)
                        ->count();
                        @endphp
                        <span>{{ $prod_count }} items</span>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--End category slider-->
     <section class="banners mb-5">
        <div class="container">
            <div class="row">
                @php
                $banner=DB::table('banners')->where('position',1)->where('status',0)->first();
                @endphp
                @if($banner)
                <div class="col-lg-12">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <a href="{{$banner->link}}">
                            <img src="{{asset('assets/images')}}/{{$banner->banner}}"  style="height:300px; width:100%;" alt="" />
                        </a>
                        <div class="banner-text justify-content-center">
                         
                            <a href="{{$banner->link}}" class="btn btn-xs justify-content-center">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                @endif
                @if($sliders)
                @foreach($sliders as $slider)
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <a href="{{$slider->link}}">
                            <img src="{{asset('assets/images')}}/{{$slider->banner}}" alt="" />
                        </a>
                        <div class="banner-text">
                         
                            <a href="{{$slider->link}}" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="{{asset('assets/images/banner-1.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>
                                Everyday Fresh & <br />Clean with Our<br />
                                Products
                            </h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <img src="{{asset('assets/images/banner-2.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>
                                Make your Breakfast<br />
                                Healthy and Easy
                            </h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src="{{asset('assets/images/banner-3.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>The best Organic <br />Products Online</h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--End banners-->
    <section class="product-tabs section-padding position-relative" wire:ignore>
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Popular Products</h3>
                <ul class="nav nav-tabs links" id="myTab" role="tablist">

                    @foreach ($hcategories as $key => $cat)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="nav-tab-{{ $cat->id }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $cat->id }}" type="button" role="tab" aria-controls="tab-{{ $cat->id }}" aria-selected="false">{{ $cat->name }}</button>
                    </li>
                    @endforeach
                </ul>
            </div>
          
            <div class="tab-content" id="myTabContent">
                @foreach ($hcategories as $key => $cat)
                <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="tab-{{ $cat->id }}" role="tabpanel" aria-labelledby="tab-{{ $cat->id }}">
                    <div class="row product-grid-4">
                        @php
                        $c_products = DB::table('products')->where('status',1)
                        ->where('category_id', $cat->id)
                        ->get()
                        ->take($no_of_products);
                        @endphp
                        @foreach ($c_products as $product)
                        @php
                        $witems=Cart::instance('wishlist')->content()->pluck('id');
                        $citems=Cart::instance('comapre')->content()->pluck('id');
                        @endphp
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-10 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                            <img class="default-img" src="{{ asset('assets/images') }}/{{ $product->front_image }}" alt="{{ $product->name }}" />
                                            <img class="hover-img" src="{{ asset('assets/images') }}/{{ $product->back_image }}" alt="{{ $product->name }}" />
                                        </a>
                                    </div>
                                    <div class="product-action-1" style="display:flex;flex-direction:row;" wire:ignore>
                                        @if ($witems->contains($product->id))
                                        <a aria-label="Remove From Wishlist" class="action-btn" href="#" wire:click.prevent="removeFromWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-heart fill-heart text-success"></i></a>
                                        @else
                                        <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-heart"></i></a>
                                        @endif
                                        @if ($citems->contains($product->id))
                                        <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="removeFromCompare({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-random fill-random text-success"></i></a>
                                        @else
                                        <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="addToCompare({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-random"></i></a>
                                        @endif
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal{{$product->id}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('category', ['id' => $cat->id]) }}">{{ $cat->name }}</a>
                                    </div>
                                    <h2><a href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h2>
                                    <div>

                                     
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>Rs.{{ $product->price }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="#" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-shopping-bag mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade custom-modal" id="quickViewModal{{$product->id}}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true" wire:ignore.self>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                                <div class="detail-gallery">
                                                    <span class="zoom-icon"><i class="fa fa-search"></i></span>
                                                     MAIN SLIDES 
                                                    <div class="product-image-slider">
                                                        <figure class="border-radius-10">
                                                            <img src="{{asset('assets/images')}}/{{$product->front_image}}" alt="product image" />
                                                        </figure>
                                                        <figure class="border-radius-10">
                                                            <img src="{{asset('assets/images')}}/{{$product->back_image}}" alt="product image" />
                                                        </figure>

                                                    </div>
                                                     THUMBNAILS 
                                                    <div class="slider-nav-thumbnails">
                                                        <div><img src="{{asset('assets/images')}}/{{$product->front_image}}" alt="product image" /></div>
                                                        <div><img src="{{asset('assets/images')}}/{{$product->back_image}}" alt="product image" /></div>
                                                    </div>
                                                </div>
                                                 End Gallery 
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="detail-info pr-30 pl-30">
                                                    <span class="stock-status out-stock"> Sale Off </span>
                                                    <h3 class="title-detail"><a href="{{ route('product-detail', ['id' => $product->id]) }}" class="text-heading">{{$product->name}}</a></h3>
                                                    <div class="product-detail-rating">
                                                        <div class="product-rate-cover text-end">
                                                            <span class="font-small ml-5 text-muted">
                                                                @php
                                                                $reviews=DB::table('reviews')->where('order_item_id',$product->id)->count();
                                                                @endphp
                                                                @if($reviews)
                                                                ({{$reviews}} reviews)
                                                                @else
                                                                (0 reviews)
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix product-price-cover">
                                                        <div class="product-price primary-color float-left">
                                                            <span class="current-price text-brand">Rs.{{$product->price}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="detail-extralink mb-30">

                                                        <div class="product-extra-link2">
                                                            <button wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->price }})" class="button button-add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                        </div>
                                                    </div>

                                                </div>
                                                 Detail Info 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                   
                </div>
                @endforeach

            </div>
           
        </div>
    </section>
    <section class="banners mb-5">
        <div class="container">
            <div class="row">
                @if($sliders)
                @foreach($sliders as $slider)
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <a href="{{$slider->link}}">
                            <img src="{{asset('assets/images')}}/{{$slider->banner}}" alt="" />
                        </a>
                        <div class="banner-text">
                         
                            <a href="{{$slider->link}}" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="{{asset('assets/images/banner-1.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>
                                Everyday Fresh & <br />Clean with Our<br />
                                Products
                            </h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <img src="{{asset('assets/images/banner-2.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>
                                Make your Breakfast<br />
                                Healthy and Easy
                            </h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src="{{asset('assets/images/banner-3.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>The best Organic <br />Products Online</h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    
    <!--Products Tabs-->
    <section class="section-padding pb-5" wire:ignore>
        <div class="container">
            <div class="section-title wow animate__animated animate__fadeIn">
                <!--<h3 class="">Daily Best Sells</h3>-->
                <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Special
                            Offers</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                    @foreach ($featureds as $fproduct)
                                    @php
                                    $witems=Cart::instance('wishlist')->content()->pluck('id');
                                    $citems=Cart::instance('comapre')->content()->pluck('id');
                                    @endphp
                                    <div class="product-cart-wrap col-md-2">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product-detail', ['id' => $fproduct->id]) }}">
                                                    <img class="default-img" src="{{ asset('assets/images') }}/{{ $fproduct->front_image }}" alt="" />
                                                    <img class="hover-img" src="{{ asset('assets/images') }}/{{ $fproduct->back_image }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">

                                                @if ($witems->contains($fproduct->id))
                                                <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="removeFromWishlist({{ $fproduct->id }},'{{ $fproduct->name }}',{{ $fproduct->price }})"><i class="fa fa-heart fill-heart text-success"></i></a>
                                                @else
                                                <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="addToWishlist({{ $fproduct->id }},'{{ $fproduct->name }}',{{ $fproduct->price }})"><i class="fa fa-heart"></i></a>
                                                @endif
                                                @if ($citems->contains($fproduct->id))
                                                <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="removeFromCompare({{ $fproduct->id }},'{{ $fproduct->name }}',{{ $fproduct->price }})"><i class="fa fa-random fill-random text-success"></i></a>
                                                @else
                                                <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="addToCompare({{ $fproduct->id }},'{{ $fproduct->name }}',{{ $fproduct->price }})"><i class="fa fa-random"></i></a>
                                                @endif
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">
                                                    Featured
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                      
                                            
                                            <h2><a href="{{ route('product-detail', ['id' => $fproduct->id]) }}">{{ $fproduct->name }}</a>
                                            </h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">

                                                <span>Rs.{{ $fproduct->price }}</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ ($fproduct->sale_quantity / 100) * $fproduct->quantity }}%" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold:
                                                    {{ $fproduct->sale_quantity }}/{{ $fproduct->quantity }}</span>
                                            </div>
                                            <a href="#" wire:click.prevent="store({{ $fproduct->id }},'{{ $fproduct->name }}',{{ $fproduct->price }})" class="btn w-100 hover-up"><i class="fa fa-shopping-bag mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>

                                    @endforeach

                                    <!--End product Wrap-->
                                </div>
                            </div>
                        </div>
                        <!--End tab-pane-->
                        <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                    @foreach ($specials as $special)
                                    @php
                                    $witems=Cart::instance('wishlist')->content()->pluck('id');
                                    $citems=Cart::instance('comapre')->content()->pluck('id');
                                    @endphp
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product-detail', ['id' => $special->id]) }}">
                                                    <img class="default-img" src="{{ asset('assets/images') }}/{{ $special->front_image }}" alt="" />
                                                    <img class="hover-img" src="{{ asset('assets/images') }}/{{ $special->back_image }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                @if ($witems->contains($special->id))
                                                <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="removeFromWishlist({{ $special->id }},'{{ $special->name }}',{{ $special->special_offers }})"><i class="fa fa-heart fill-heart text-success"></i></a>
                                                @else
                                                <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="addToWishlist({{ $special->id }},'{{ $special->name }}',{{ $special->special_offers }})"><i class="fa fa-heart"></i></a>
                                                @endif
                                                @if ($citems->contains($special->id))
                                                <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="removeFromCompare({{ $special->id }},'{{ $special->name }}',{{ $special->special_offers }})"><i class="fa fa-random fill-random text-success"></i></a>
                                                @else
                                                <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="addToCompare({{ $special->id }},'{{ $special->name }}',{{ $special->special_offers }})"><i class="fa fa-random"></i></a>
                                                @endif
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">
                                                    Special Offer
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                 
                                            <h2><a href="{{ route('product-detail', ['id' => $special->id]) }}">{{ $special->name }}</a>
                                            </h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>Rs.{{ $special->sepcial_offer }} </span>
                                                <span class="old-price">Rs.{{ $special->price }}</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width:{{ ($special->sale_quantity / 100) * $special->quantity }}%" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold:
                                                    {{ $special->sale_quantity }}/{{ $special->quantity }}</span>
                                            </div>
                                            <a href="#" class="btn w-100 hover-up" wire:click.prevent="store({{ $special->id }},'{{ $special->name }}',{{ $special->special_offer }})"><i class="fa fa-shopping-bag mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--End product Wrap-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                    @foreach ($news as $new)
                                    @php
                                    $witems=Cart::instance('wishlist')->content()->pluck('id');
                                    $citems=Cart::instance('comapre')->content()->pluck('id');
                                    @endphp
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product-detail', ['id' => $new->id]) }}">
                                                    <img class="default-img" src="{{ asset('assets/images') }}/{{ $new->front_image }}" alt="" />
                                                    <img class="hover-img" src="{{ asset('assets/images') }}/{{ $new->back_image }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                @if ($witems->contains($new->id))
                                                <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="removeFromWishlist({{ $new->id }},'{{ $new->name }}',{{ $new->price }})"><i class="fa fa-heart fill-heart text-success"></i></a>
                                                @else
                                                <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="addToWishlist({{ $new->id }},'{{ $new->name }}',{{ $new->price }})"><i class="fa fa-heart"></i></a>
                                                @endif
                                                @if ($citems->contains($new->id))
                                                <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="removeFromCompare({{ $new->id }},'{{ $new->name }}',{{ $new->price }})"><i class="fa fa-random fill-random text-success"></i></a>
                                                @else
                                                <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="addToCompare({{ $new->id }},'{{ $new->name }}',{{ $new->price }})"><i class="fa fa-random"></i></a>
                                                @endif
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">
                                                    New
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                     
                                            <h2><a href="{{ route('product-detail', ['id' => $new->id]) }}">{{ $new->name }}</a>
                                            </h2>
                                            <!--<div class="product-rate d-inline-block">-->
                                            <!--    <div class="product-rating" style="width: 80%"></div>-->
                                            <!--</div>-->
                                            <div class="product-price mt-10">

                                                <span>Rs.{{ $new->price }}</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ ($new->sale_quantity / 100) * $new->quantity }}%" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold:
                                                    {{ $new->sale_quantity }}/{{ $new->quantity }}</span>
                                            </div>
                                            <a href="#" wire:click.prevent="store({{ $new->id }},'{{ $new->name }}',{{ $new->price }})" class="btn w-100 hover-up"><i class="fa fa-shopping-bag mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--End product Wrap-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End tab-content-->
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>
    </section>
    <section class="banners mb-5">
        <div class="container">
            <div class="row">
                @if($sliders)
                @foreach($sliders as $slider)
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <a href="{{$slider->link}}">
                            <img src="{{asset('assets/images')}}/{{$slider->banner}}" alt="" />
                        </a>
                        <div class="banner-text">
                            <!--<h4>-->
                            <!--    Everyday Fresh & <br />Clean with Our<br />-->
                            <!--    Products-->
                            <!--</h4>-->
                            <a href="{{$slider->link}}" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="{{asset('assets/images/banner-1.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>
                                Everyday Fresh & <br />Clean with Our<br />
                                Products
                            </h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <img src="{{asset('assets/images/banner-2.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>
                                Make your Breakfast<br />
                                Healthy and Easy
                            </h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src="{{asset('assets/images/banner-3.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>The best Organic <br />Products Online</h4>
                            <a href="/shop" class="btn btn-xs">Shop Now <i class="fa fa-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--End Best Sales-->
    <section class="section-padding pb-5" wire:ignore>
        <div class="container">
            <!--<div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">-->
            <!--    <h3 class="">Sales On</h3>-->
            <!--    <a class="show-all" href="/deals">-->
            <!--        All Deals-->
            <!--        <i class="fa fa-angle-right"></i>-->
            <!--    </a>-->
            <!--</div>-->
            <div class="row">
                @if ($sale)
                @if ($sproducts->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                @foreach ($sproducts as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href=" {{ route('product-detail', ['id' => $product->id]) }} ">
                                    <img src="{{ asset('assets/images') }}/{{ $product->front_image }}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-countdown-wrap">
                                <div class="deals-countdown" style="display:flex;flex-direction:row;" data-countdown="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s') }}">
                                    {{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s') }}
                                </div>
                            </div>
                            <div class="deals-content ">
                                <h2 style="margin-top:30px;"><a href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                </h2>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>Rs.{{ $product->discount }}</span>
                                        <span class="old-price">Rs.{{ $product->price }}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="#" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->discount }})"><i class="fa fa-shopping-bag mr-5"></i>Add </a>
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
        </div>
    </section>
    <!--End Deals-->

</main
