<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <h1 class="mb-15">Deals</h1>
                        <div class="breadcrumb">
                            <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                            <i class="fa fa-angle-right"></i> Deals
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
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
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach ($products as $product)
                    @php
                        $witems=Cart::instance('wishlist')->content()->pluck('id');
                        $citems=Cart::instance('comapre')->content()->pluck('id');
                        @endphp
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                            <img class="default-img"
                                                src="{{ asset('assets/images') }}/{{ $product->front_image }}"
                                                alt="{{ $product->slug }}" />
                                            <img class="hover-img"
                                                src="{{ asset('assets/images') }}/{{ $product->back_image }}"
                                                alt="{{ $product->slug }}" />
                                        </a>
                                    </div>
                                    <div class="product-action-1" style="display:inline-flex">
                                        @if($witems->contains($product->id))
                                        <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="removeFromWishlist({{$product->id}},'{{$product->name}}',{{$product->deals}})"><i
                                                class="fa fa-heart fill-heart text-success"></i></a>
                                        @else
                                        <a aria-label="Add To Wishlist" class="action-btn" href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->deals}})" ><i
                                            class="fa fa-heart"></i></a>
                                        @endif
                                        @if($citems->contains($product->id))
                                        <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="removeFromCompare({{$product->id}},'{{$product->name}}',{{$product->deals}})"><i
                                                class="fa fa-random fill-random text-success"></i></a>
                                        @else
                                        <a aria-label="Compare" class="action-btn" href="#" wire:click.prevent="addToCompare({{$product->id}},'{{$product->name}}',{{$product->deals}})"><i
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
                                        <a href="{{ route('category',['id'=>$product->category_id]) }}">{{ $product->category->name }}</a>
                                    </div>
                                    <h2><a
                                            href="{{ route('product-detail', ['id' => $product->id]) }}">{{ Str::limit($product->name,14 )}}</a>
                                    </h2>
                                    <!--<div class="product-rate-cover">-->

                                    <!--    <span class="font-small ml-5 text-muted"> (4.0)</span>-->
                                    <!--</div>-->
                                    @if($product->user->atype === 'VEN' && $product->user->active_status == 1)
                                    <div>
                                        <span class="font-small text-muted">By <a
                                                href="{{ route('vendors-stores',['id'=>$product->user_id]) }}">{{$product->user->name}}</a></span>
                                    </div>
                                    @endif
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>Rs.{{ $product->deals }}</span>
                                            <span class="old-price">Rs.{{ $product->price }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->deals}})"><i class="fa fa-shopping-cart mr-5"></i>Add </a>
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
                        {{ $products->links() }}
                    </nav>
                </div>
                {{-- <section class="section-padding pb-5">
                    <div class="section-title">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="shop-grid-right.html">
                            All Deals
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="{{ asset('assets/images/banner-5.png') }}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="vendor-details-1.html">NestFood</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-6.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Old
                                                    El Paso</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$24.85</span>
                                                <span class="old-price">$26.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-7.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="vendor-details-1.html">Progresso</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$12.85</span>
                                                <span class="old-price">$13.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-8.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="vendor-details-1.html">Yoplait</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$15.85</span>
                                                <span class="old-price">$16.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <!--End Deals-->
            </div>
            <div class="col-lg-1-5 primary-sidebar " wire:ignore.self>
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Filter by price</h5>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <h2 class="widget-title" style="font-size:16px;padding-bottom:10px;">Price
                                <span class="text-info">Rs.{{$min_price}} - {{$max_price}}</span>
                            </h2>
                            <div class="widget-content" style="padding-bottom:20px;">
                                <div id="slider" wire:ignore>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Category</h5>
                    <ul>
                        @foreach ($categories as $category )
                        <li>
                            <a href="{{ route('category',['id'=>$category->id]) }}"> <img src="{{ asset('assets/images') }}/{{ $category->logo }}"
                                    alt="" />{{ $category->name }}</a>
                                    @php
                                    $prods=DB::table('products')->where('category_id',$category->id)->count();
                                    @endphp
                                    <span class="count">{{ $prods }}</span>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <!-- Fillter By Price -->


                <!-- Product sidebar Widget -->
                <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                    <h5 class="section-title style-1 mb-30">New products</h5>
                    @foreach ($new as $prod )
                    <div class="single-post clearfix">
                        <div class="image">
                            <img src="{{ asset('assets/images') }}/{{ $prod->front_image }}" alt="{{ $prod->name }}" />
                        </div>
                        <div class="content pt-10">
                            <h5><a href="{{ route('product-detail',['id'=>$prod->name]) }}">{{ $prod->name }}</a></h5>
                            <p class="price mb-0 mt-5">{{ $prod->price }}</p>

                        </div>
                    </div>

                    @endforeach

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
@push('scripts')
	<script>
		var slider=document.getElementById('slider');
		noUiSlider.create(slider,{
			start : [100,10000],
			connect:true,
			range :{
				'min': 100,
				'max' : 10000
			},
			pips:{
				mode:'steps',
				stepped:true,
				density:3
			}
		});
		slider.noUiSlider.on('update',function(value){
			@this.set('min_price',value[0]);
			@this.set('max_price',value[1]);
		});
	</script>
	@endpush
