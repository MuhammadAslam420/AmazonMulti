<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                <i class="fa fa-user ml-2"></i> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            @if(Session::has('message'))
            <div class="alert alert-success text-light">{{Session::get('message')}}</div>
            @endif
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Order Details
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('my.orders')}}" class="btn btn-info btn-medium  pull-right">My Orders</a>
                                        @if($order->status =='ordered')
                                        <a href="#" wire:click.prevent="cancelOrder" style="margin:0 20px;" class="btn btn-danger btn-medium pull-right">Canceled Order </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Order Id</th>
                                        <td>{{$order->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td>{{$order->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Status</th>
                                        <td>{{$order->status}}</td>
                                    </tr>
                                    @if($order->status =='delivered')
                                    <tr>
                                        <th>Order Delivery Date</th>
                                        <td>{{$order->delivered_date}}</td>
                                        @elseif($order->status == 'cancel')
                                        <th>Order Canceled date</th>
                                        <td>{{$order->canceled_date}}</td>
                                        @endif
                                    </tr>

                                </table>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Order Items
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach ($order->orderItem as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{asset('assets/images') }}/{{$item->product->front_image}}" width="120" alt="{{$item->product->name}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('product-detail',['id'=>$item->product->id])}}">{{$item->product->name}}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        <p class="price">Rs.{{$item->price}}</p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Qty:&nbsp;{{$item->quantity}}</h4>
                                    </div>
                                    <div class="price-field sub-total">
                                        <p class="price">Rs.{{$item->price * $item->quantity}}</p>
                                    </div>
                                    @if($order->status =='delivered' && $item->rstatus == false)
                                    <div class="price-field sub-total">
                                        <p class="price"><a class="btn btn-success" href="{{route('my.reviews',['order_item_id'=>$item->id])}}">Write Review</a></p>
                                    </div>
                                    @endif

                                </li>
                                @endforeach

                            </ul>

                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal&nbsp;</span><b class="index">Rs.{{$order->subtotal}}</b></p>
                                <p class="summary-info"><span class="title">Tax&nbsp;</span><b class="index">Rs.{{$order->tax}}</b></p>
                                <p class="summary-info"><span class="title">Shipping Charges&nbsp;</span><b class="index">{{$order->delivery_charges}}</b></p>
                                <p class="summary-info"><span class="title">Total&nbsp;</span><b class="index">Rs.{{$order->total}}</b></p>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Billing Details</h2>

                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tr>
                                    <th>First Name</th>
                                    <td>{{$order->firstname}}</td>

                                    <th>Last Name</th>
                                    <td>{{$order->lastname}}</td>
                                </tr>
                                <tr>
                                    <th>Email </th>
                                    <td>{{$order->email}}</td>

                                    <th>Mobile</th>
                                    <td>{{$order->mobile}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$order->line1}} {{$order->line2}}</td>

                                    <th>City</th>
                                    <td>{{$order->city}}</td>
                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{$order->province}}</td>

                                    <th>Cooutry</th>
                                    <td>{{$order->country}}</td>
                                </tr>
                                <tr>
                                    <th>ZipCode</th>
                                    <td>{{$order->zipcode}}</td>

                                </tr>

                            </table>

                        </div>
                    </div>

                </div>

            </div>
            @if($order->ship_to_different)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Shipping Details</h2>


                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tr>
                                    <th>First Name</th>
                                    <td>{{$order->shipping->firstname}}</td>

                                    <th>Last Name</th>
                                    <td>{{$order->shipping->lastname}}</td>
                                </tr>
                                <tr>
                                    <th>Email </th>
                                    <td>{{$order->shipping->email}}</td>

                                    <th>Mobile</th>
                                    <td>{{$order->shipping->mobile}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$order->shipping->line1}} {{$order->shipping->line2}}</td>

                                    <th>City</th>
                                    <td>{{$order->shipping->city}}</td>
                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{$order->shipping->province}}</td>

                                    <th>Cooutry</th>
                                    <td>{{$order->shipping->country}}</td>
                                </tr>
                                <tr>
                                    <th>ZipCode</th>
                                    <td>{{$order->shipping->zipcode}}</td>

                                </tr>

                            </table>

                        </div>
                    </div>

                </div>

            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Transaction Details</h2>

                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tr>
                                    <th>Transaction Mode</th>
                                    <td>{{$order->transaction->mode}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{$order->transaction->status}}</td>
                                </tr>

                                <th>Transaction Date</th>
                                <td>{{$order->transaction->created_at}}</td>
                                </tr>




                            </table>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</main>
