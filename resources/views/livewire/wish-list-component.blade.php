<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                <i class="fa fa-angle-right"></i>My Wishlist <i class="fa fa-angle-right"></i> Fillter
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-50">
        <div class="row">
            @if(Cart::instance('wishlist')->count() > 0)
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    <h6 class="text-body">There are <span class="text-brand">{{Cart::instance('wishlist')->count()}}</span> products in this list</h6>
                </div>
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist p-1">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" style="padding-left:10px;">Image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::instance('wishlist')->content() as $item)
                            <tr class="pt-30">
                                <td class="image product-thumbnail pt-40"><img src="{{asset('assets/images')}}/{{$item->model->front_image}}" alt="{{$item->model->name}}" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="{{route('product-detail',['id'=>$item->model->id])}}">{{$item->model->name}}</a></h6>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">Rs.{{$item->model->price}}</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <span class="stock-status in-stock mb-0"> {{$item->model->stock_status}} </span>
                                </td>
                                <td class="text-center" data-title="Cart">
                                    <button class="btn btn-sm" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">Add to cart</button>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})" class="text-body"><i class="fa fa-trash text-danger fa-2x"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    <h6 class="text-body">There are <span class="text-brand">0</span> No's of product's in this list</h6>
                </div>
                
            </div>
            @endif
        </div>
    </div>
</main>