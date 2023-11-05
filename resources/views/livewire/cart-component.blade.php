<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                <i class="fa fa-angle-right"></i> Shop
                <i class="fa fa-shopping-bag"></i> My Cart
            </div>
        </div>
    </div>
    @if (Cart::instance('cart')->count() > 0)
        <div class="container mb-80 mt-50">

            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span
                                class="text-brand">{{ Cart::instance('cart')->count() }}</span> products in your cart
                        </h6>
                        <h6 class="text-body"><a href="#" wire:click.prevent="deleteAll" class="text-muted"><i
                                    class="fa fa-trash mr-5"></i>Clear Cart</a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">

                                    <th scope="col" colspan="2" style="padding-left:30px;">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::instance('cart')->content() as $item)
                                    <tr class="pt-30">

                                        <td class="image product-thumbnail pt-40"><img
                                                src="{{ asset('assets/images') }}/{{ $item->model->front_image }}"
                                                alt="{{ $item->model->name }}"></td>
                                        <td class="product-des product-name">
                                            <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                    href="{{ route('product-detail', ['id' => $item->model->id]) }}">{{ $item->model->name }}</a>
                                            </h6>
                                       
                                        </td>
                                        <td class="price" data-title="Price">
                                            <h4 class="text-body">Rs.{{ $item->model->price }} </h4>
                                        </td>
                                        <td class="text-center detail-info" data-title="Stock">
                                            <div class="detail-extralink mr-15">
                                                <div class="detail-qty border radius" wire:ignore>
                                                    <a href="#" class="qty-down"
                                                        wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i
                                                            class="fa fa-angle-down"></i></a>
                                                    <input type="text" class="qty-val" min="0"
                                                        value="{{ $item->qty }}" data-max="120" pattern="[0-9]*">
                                                    <a href="#" class="qty-up"
                                                        wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i
                                                            class="fa fa-angle-up"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <h4 class="text-brand">Rs.{{ Cart::subtotal() }} </h4>
                                        </td>
                                        <td class="action text-center" data-title="Remove"><a href="#"
                                                class="text-body" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fa fa-trash text-danger"></i></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="cart-action d-flex justify-content-between">
                        <a class="btn " href="/shop"><i class="fa fa-arrow-left mr-10"></i>Continue Shopping</a>
                        <a class="btn  mr-10 mb-sm-15"><i class="fa fa-refresh mr-10"></i>Update Cart</a>
                    </div>
                    <div class="row mt-50">
                        @if(!Session::has('country'))
                        <div class="col-lg-7" >
                            <div class="calculate-shiping p-40 border-radius-15 border">
                                <h4 class="mb-10">Calculate Shipping</h4>
                                <p class="mb-30"><span class="font-lg text-muted">Flat rate(minimum):</span><strong
                                        class="text-brand">Rs.200</strong></p>
                                <form  wire:submit.prevent="applyShippingCharges">
                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <div class="form-group custom_select  row">
                                                <select class="form-control  w-100" name="country_id" wire:model="country_id">
                                                    <option vlaue="">Select Delivery Destination Country</option>
                                                   @foreach($countries as $country)
                                                   <option value="{{$country->id}}">{{$country->name}} rate Rs.({{$country->delivery_charges}})</option>
                                                   @endforeach
                                                </select>
                                                <button type="submit " class="btn mt-5">Delivery Destination</button>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        @endif
                        @if (!Session::has('coupon'))
                            <div class="col-lg-5">

                                <div class="p-40">
                                    <h4 class="mb-10">Apply Coupon</h4>
                                    <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                                    <form wire:submit.prevent="applyCouponCode">
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">
                                                <p>{{ Session::get('message') }}</p>
                                            </div>
                                        @endif
                                        <div class="d-flex justify-content-between">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="coupon-code"
                                                wire:model="couponCode" style="height:56px;">
                                            <button type="submit" class="btn"><i
                                                    class="fa fa-tag mr-10"></i>Apply</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                @if (Session::has('coupon'))
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Discount </h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">({{ Session::get('coupon')['code'] }})
                                                    <a href="#" wire:click.prevent="removeCoupon"><i
                                                            class="fa fa-times text-danger fa-2x"></i></a>
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">SubTotal with Discount </h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">
                                                    {{ number_format($subtotalAfterDiscount, 2) }} </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Tax ({{ config('cart.tax') }})% </h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">
                                                    {{ number_format($taxAfetrDiscount, 2) }} </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="2">
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Estimate for</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h5 class="text-heading text-end">All Over Pakistan 200 shipping Charges</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="2">
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Total</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">
                                                    Rs.{{ number_format($totalAfterDiscount, 2) }}</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                @else
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Subtotal</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">Rs.{{ Cart::subtotal() }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="2">
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Estimate Shipping for</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h5 class="text-heading text-end">Pakistan 200</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="2">
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Total</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">Rs.{{ Cart::total() }}</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                        <a href="/checkout" class="btn mb-20 w-100">Proceed To CheckOut<i
                                class="fa fa-sign-out ml-15"></i></a>
                    </div>
                </div>
            </div>


        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="justify-content:center;">
                    <h1 style="font-size:24px; color:red;margin:40px;">Your cart is empty</h1>
                </div>
            </div>
        </div>
    @endif
</main>
