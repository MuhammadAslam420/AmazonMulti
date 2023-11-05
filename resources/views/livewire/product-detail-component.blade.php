<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                <i class="fa fa-angle-right  mr-5"></i> <a href="/shop">{{$product->category->name}}</a> <i class="fa fa-angle-right  mr-5"></i> {{$product->name}}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery" wire:ignore>
                                <span class="zoom-icon"><i class="fa fa-search text-danger"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{asset('assets/images')}}/{{$product->front_image}}" alt="{{$product->name}}" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('assets/images')}}/{{$product->back_image}}" alt="{{$product->name}}" />
                                    </figure>
                                    @php
                                    $images=explode(",",$product->gallery);
                                    @endphp
                                    @foreach($images as $image)
                                    @if($image)
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('assets/images/gallery') }}/{{ $image }}" alt="product image" />
                                    </figure>

                                    @endif
                                    @endforeach
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div><img src="{{asset('assets/images')}}/{{$product->front_image}}" alt="{{$product->name}}" /></div>
                                    <div><img src="{{asset('assets/images')}}/{{$product->back_image}}" alt="{{$product->name}}" /></div>
                                    @foreach($images as $image)
                                    @if($image)
                                    <div>
                                        <img src="{{asset('assets/images/gallery')}}/{{$image}}" alt="{{$product->name}}" />
                                    </div>

                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock">
                                    @if($product->stock_status === "InStock")
                                    Instock
                                    @else
                                    Out Off Stock
                                    @endif
                                </span>
                                <h2 class="title-detail">{{$product->name}}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">

                                        </div>
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
                                        @if($sale)
                                        @if($sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() )
                                        @if($product->discount > 0)
                                        <span class="current-price text-brand">Rs.{{ $product->discount }}</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">{{ (($product->price - $product->discount ) / 100)  }}% Off</span>
                                            <span class="old-price font-md ml-15">Rs.{{ $product->price }}</span>
                                        </span>
                                        @else
                                        <span class="current-price text-brand">Rs.{{ $product->price }}</span>
                                        @endif
                                        @else
                                        <span class="current-price text-brand">Rs.{{ $product->price }}</span>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">{!! $product->short_description !!}.</p>
                                </div>

                                <div class="detail-extralink mb-50">

                                    <div class="product-extra-link2">
                                        @if($sale)
                                        @if($sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() )
                                        @if($product->discount > 0)
                                        <button type="submit" class="button button-add-to-cart" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->discount }})"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            Add to cart</button>
                                        @else
                                        <button type="submit" class="button button-add-to-cart" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            Add to cart</button>
                                        @endif
                                        @else
                                        <button type="submit" class="button button-add-to-cart" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            Add to cart</button>
                                        @endif
                                        @else
                                        <button type="submit" class="button button-add-to-cart" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->price }})"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            Add to cart</button>
                                        @endif
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="#" wire:click.prevent="addToCompare({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fa fa-random" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="font-xs float-start">
                                    <ul class="float-start mr-50" style="margin-right:100px;">
                                        <li class="mb-5">Type: <span class="text-brand">{{$product->category->name}}</span></li>
                                        <li class="mb-5">MFG:<span class="text-brand"> {{ $product->created_at }}</span></li>

                                    </ul>
                                    <ul class="float-start mr-50" style="margin-right:100px;">
                                        <li class="mb-5">SKU: <a href="#">{{$product->SKU}}</a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag">{{$product->category->name}}</a></li>
                                        <li>Stock:<span class="in-stock text-brand ml-5">{{$product->quantity}} Items {{$product->stock_status}}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{$reviews}})</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>{!! $product->description !!}.</p>

                                    </div>
                                </div>
                                @php
                                $setting=DB::table('home_page_settings')->where('id',1)->first()
                                @endphp
                                <div class="tab-pane fade" id="Vendor-info">
                                    <div class="vendor-logo d-flex mb-30">
                                        @if($product->user_id === 1)
                                        <img src="{{ asset('assets/images/vendor') }}/{{$product->user->profile  }}" alt="{{ $setting->name }}" />
                                        @else
                                        <img src="{{ asset('assets/images/vendor') }}/{{$product->user->profile  }}" alt="" />
                                        @endif

                                        <div class="vendor-name ml-15">
                                            <h6>
                                                @if($product->user_id === 1)

                                                <a href="#">{{ $setting->name }}</a>
                                                @else
                                                <div>
                                                    @if($product->user->profile)
                                                    <img class="img-thumbnail" src="{{ asset('assets/images/vendor') }}/{{$product->user->profile }}" width="120">
                                                    @else
                                                    <img class="img-thumbnail" src="{{ asset('assets/images/vendor/avatar.png') }}" width="120">
                                                    @endif
                                                    @if($product->user->atype === 'VEN' && $product->user->active_status == 1)
                                                    <a href="{{ route('vendors-stores',['id'=>$product->user_id]) }}">{{ $product->user->name }}</a>
                                                    @endif
                                                </div>
                                                @endif
                                            </h6>
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
                                    </div>
                                    <ul class="contact-infor mb-50">
                                        <li><img src="{{asset('assets/images/icon-location.svg')}}" alt="" /><strong>Address: </strong> <span>{{ $product->user->vendor->address }}</span></li>
                                        <li><img src="{{asset('assets/images/icon-contact.svg')}}" alt="" /><strong>Contact Seller:</strong><span>{{ $product->user->vendor->mobile }}</span></li>
                                    </ul>
                                    <div class="d-flex mb-55">
                                        <div class="mr-30">
                                            <p class="text-brand font-xs">Rating</p>
                                            <h4 class="mb-0">
                                                @php
                                                $avg=0;
                                                $avgrating=DB::table('reviews')->where('order_item_id',$product->id)->sum('rating');
                                                @endphp


                                                @if($avgrating)
                                                (avg.rating:&nbsp;{{$avgrating/$reviews}})
                                                @else
                                                (avg.rating 0)
                                                @endif
                                                <div>
                                                    <ul>
                                                        @for($i=1; $i<=5; $i++) @if($avgrating) @if($i<=$avgrating/$reviews) <i class="fa fa-star" aria-hidden="true" style="color:gold;"></i>
                                                            @else
                                                            <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                                            @endif
                                                            @endif
                                                            @endfor
                                                    </ul>
                                                </div>
                                            </h4>
                                        </div>


                                    </div>
                                    <p>{{ $product->user->vendor->address }}</p>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Customer questions & answers</h4>
                                                <div class="comment-list">
                                                    @php
                                                    $reviews=DB::table('reviews')->where('order_item_id',$product->id)->get();
                                                    @endphp
                                                    @foreach($reviews as $review)
                                                    <div class="single-comment justify-content-between d-flex mb-30">
                                                        <div class="user justify-content-between d-flex">

                                                            <div class="desc">
                                                                <div class="d-flex justify-content-between mb-10">
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="font-xs text-muted">{{$review->created_at}} </span>
                                                                    </div>
                                                                    <div>
                                                                        Rating Assign:&nbsp;{{$review->rating}} &nbsp; star
                                                                    </div>

                                                                </div>
                                                                <p class="mb-10">{{$review->comment}} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <h4 class="mb-30">Customer reviews</h4>
                                                <div class="d-flex mb-30">
                                                    <div class="product-rate d-inline-block mr-15">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <h6>
                                                        @php
                                                        $avgrating=0;
                                                        @endphp
                                                        @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                                        @php
                                                        $avgrating=$avgrating + $orderItem->review->rating;
                                                        @endphp
                                                        @endforeach
                                                        @for($i=1; $i<=5; $i++) @if($i<=$avgrating) <i class="fa fa-star" aria-hidden="true" style="color:gold;"></i>
                                                            @else
                                                            <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                                            @endif
                                                            @endfor
                                                            <a href="#" class="count-review"> ( {{$product->orderItems->where('rstatus',1)->count()}} Reviews )</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
