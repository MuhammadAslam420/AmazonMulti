<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                <i class="fa fa-arrow-right"></i> Shop <i class="fa fa-arrow-right"></i> Compare
            </div>
        </div>
    </div>
    @if(Session::has('warning'))
    <div class="alert-laert-danger">{{ Session::get('warning') }}</div>
    @endif

    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <h1 class="heading-2 mb-10">Products Compare</h1>
                <h6 class="text-body mb-40">There are <span class="text-brand">{{ Cart::instance('compare')->count() }}</span> products to compare</h6>
                <div class="table-responsive">
                    <table class="table text-center table-compare">
                        <tbody>
                            <tr class="pr_image">
                                <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
                                 @foreach(Cart::instance('compare')->content() as $item)
                                 <td class="row_img"><img src="{{ asset('assets/images') }}/{{ $item->model->front_image }}" alt="compare-img" /></td>

                                 @endforeach
                            </tr>
                            <tr class="pr_title">
                                <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                @foreach (Cart::instance('compare')->content() as $item)
                                <td class="product_name">
                                    <h6><a href="{{ route('product-detail',['id'=>$item->id]) }}" class="text-heading">{{ $item->name }}</a></h6>
                                </td>

                                @endforeach

                            </tr>
                            <tr class="pr_price">
                                <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                @foreach (Cart::instance('compare')->content() as $item )
                                <td class="product_price">
                                    <h4 class="price text-brand">{{ $item->price }}</h4>
                                </td>
                                @endforeach

                            </tr>

                            <tr class="description">
                                <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                @foreach (Cart::instance('compare')->content() as $item )
                                <td class="row_text font-xs">
                                    <p class="font-sm text-muted">{{ $item->model->description }}</p>
                                </td>
                                @endforeach

                            </tr>
                            <tr class="pr_stock">
                                <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                @foreach (Cart::instance('compare')->content() as $item )
                                <td class="row_stock"><span class="stock-status in-stock mb-0">{{ $item->model->stock_status }}</span></td>
                                @endforeach
                            </tr>

                            <tr class="pr_add_to_cart">
                                <td class="text-muted font-sm fw-600 font-heading">Buy now</td>
                              @foreach(Cart::instance('compare')->content() as  $item)
                              <td class="row_btn">
                                <button class="btn btn-sm" wire:click.prevent="store({{$item->id}},'{{$item->name}}',{{$item->price}})"><i class="fa fa-shopping-bag mr-5"></i>Add to cart</button>
                            </td>
                              @endforeach
                            </tr>
                            <tr class="pr_remove text-muted">
                                <td class="text-muted font-md fw-600"></td>
                              @foreach(Cart::instance('compare')->content() as $item)
                              <td class="row_remove">
                                <a href="#" class="text-muted" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fa fa-trash mr-5"></i><span>Remove</span> </a>
                            </td>

                              @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
