


<main class="main pages mb-80">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Vendors
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="archive-header-2 text-center">
                <h1 class="display-2 mb-50">Vendors</h1>
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="sidebar-widget-2 widget_search mb-50">
                            <div class="search-form">
                                <input type="text" placeholder="Search vendors (by address or ID)..." wire:model="search"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-50">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We have <strong class="text-brand">{{ $vendors->count() }}</strong> vendors now</p>
                        </div>
                        <div class="sort-by-product-area">

                            <a href="{{ route('vendors-list') }}" class="btn bg-white btn-sm p-5 mr-10"><img
                                    src="{{ asset('assets/images/list.png') }}"></a>


                            <a href="{{ route('vendors') }}" class="btn bg-white btn-sm p-5 mr-10"><img
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
                                        <option value="desc">Sort by newness</option>
                                        <option value="asc">Sort by Oldest</option>

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row vendor-grid">
                @forelse ($vendors as $vendor )
                <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                    <div class="vendor-wrap mb-40">
                        <div class="vendor-img-action-wrap">
                            <div class="vendor-img">
                                <a href="{{ route('vendors-stores',['id'=>$vendor->user->id]) }}">
                                    @if ($vendor->user->avatar)
                                    <img class="default-img" src="{{ asset('assets/images/vendor') }}/{{ $vendor->user->profile }}" alt="{{ $vendor->user->name }}" style="width:75px;border-radius:55px;" />
                                    @else
                                    <img class="default-img" src="{{asset('assets/images/vendor/vendor-1.png')}}" alt="" />
                                    @endif
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">{{ $vendor->user->name }}</span>
                            </div>
                        </div>
                        <div class="vendor-content-wrap">
                            <div class="d-flex justify-content-between align-items-end mb-30">
                                <div>
                                    <div class="product-category">
                                        <span class="text-muted">Since {{ DATE_FORMAT($vendor->created_at,'Y') }}</span>
                                    </div>
                                    <h4 class="mb-5"><a href="{{ route('vendors-stores',['id'=>$vendor->user->id]) }}">{{ $vendor->store->name }}</a></h4>
                                    <!--<div class="product-rate-cover">-->

                                    <!--    <span class="font-small ml-5 text-warning">Customer Rating: (4.0)</span>-->
                                    <!--</div>-->
                                </div>
                                <div class="mb-10">
                                    @php
                                    $products=DB::table('products')->where('user_id',$vendor->user_id)->count();
                                    @endphp
                                    <span class="font-small total-product">{{ $products }} products</span>
                                </div>
                            </div>
                            <div class="vendor-info mb-30">
                                <!--<ul class="contact-infor text-muted">-->
                                <!--    <li><img src="{{ asset('assets/images/vendor/icons/map.png') }}" alt="" /><strong>Vendor Address: </strong> <span>{{ $vendor->address }}</span></li>-->
                                <!--    <li><img src="{{ asset('assets/images/vendor/icons/mobile.png') }}" alt="" /><strong>Call Us:</strong><span>(+92) - {{ $vendor->mobile }}</span></li>-->
                                <!--    <li><img src="{{ asset('assets/images/vendor/icons/whatsapp.png') }}" alt="" /><strong>WhatsApp:</strong><span> {{ $vendor->whatsapp }}</span></li>-->
                                <!--    <li><img src="{{ asset('assets/images/vendor/icons/facebook.png') }}" alt="" /><strong>Facebook:</strong><span> {{ $vendor->facebook }}</span></li>-->
                                <!--    <li><img src="{{ asset('assets/images/vendor/icons/instagram.png') }}" alt="" /><strong>Instagram:</strong><span> {{ $vendor->instagram }}</span></li>-->
                                <!--</ul>-->
                            </div>
                            <a href="{{ route('vendors-stores',['id'=>$vendor->user->id]) }}" class="btn btn-xs">Visit Store </a>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse

                <!--end vendor card-->


            </div>
            <div class="pagination-area mt-20 mb-20">
              {{$vendors->links()}}
            </div>
        </div>
    </div>
</main>
