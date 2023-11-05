<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <h1 class="mb-15">Shop</h1>
                        <div class="breadcrumb">
                            <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                            <i class="fa fa-shopping-bag"></i> Shop <i class="fa fa-angle-right"></i> Fresh & Organic
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-12">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <a href="{{ route('list') }}" class="btn bg-white btn-sm p-5 mr-10"><img
                                src="{{ asset('assets/images/list.png') }}"></a>


                        <a href="{{ route('grid') }}" class="btn bg-white btn-sm p-5 mr-10"><img
                                src="{{ asset('assets/images/grid.png') }}"></a>
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
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>

                                </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach($products as $product)
                    @php
                    $witems=Cart::instance('wishlist')->content()->pluck('id');
                    $citems=Cart::instance('comapre')->content()->pluck('id');
                    @endphp
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('product-detail',['id'=>$product->id])}}">
                                        <img class="default-img" src="{{asset('assets/images')}}/{{$product->front_image}}"
                                            alt="{{$product->slug}}" />
                                        <img class="hover-img" src="{{asset('assets/images')}}/{{$product->back_image}}" alt="{{$product->slug}}" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    @if($witems->contains($product->id))
                                    <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="removeFromWishlist({{$product->id}},'{{$product->name}}',{{$product->price}})"><i
                                            class="fa fa-heart fill-heart text-success"></i></a>
                                    @else
                                    <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->price}})" ><i
                                        class="fa fa-heart"></i></a>
                                    @endif
                                    @if($citems->contains($product->id))
                                    <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="removeFromCompare({{$product->id}},'{{$product->name}}',{{$product->price}})"><i
                                            class="fa fa-random fill-random text-success"></i></a>
                                    @else
                                    <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="addToCompare({{$product->id}},'{{$product->name}}',{{$product->price}})"><i
                                        class="fa fa-random"></i></a>
                                    @endif
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fa fa-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{ route('category',['id'=>$product->category_id]) }}">{{$product->category->name}}</a>
                                </div>
                                <h2><a href="{{route('product-detail',['id'=>$product->id])}}">{{$product->name}}</a></h2>
                                <!--<div class="product-rate-cover">-->
                                <!--    <span class="font-small ml-5 text-muted"> (4.0)</span>-->
                                <!--</div>-->
                                <!--<div>-->
                                <!--    <span class="font-small text-muted">By <a-->
                                <!--            href="vendor-details-1.html">NestFood</a></span>-->
                                <!--</div>-->
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>Rs.{{$product->price}}</span>
                                        <!--<span class="old-price">$32.8</span>-->
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fa fa-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--end product card-->
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        {{$products->links()}}
                    </nav>
                </div>
                <section class="section-padding pb-5">
                    <div class="section-title">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="/deals">
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
        </div>
    </div>
</main>
