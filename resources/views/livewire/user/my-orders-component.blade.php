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
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="card ">
                            <div class="card-header">
                                <h1 class="card-title">All Orders details</h1>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped">
                                        <thead>
                                            <tr>
                                                <th>Order_Id</th>
                                                <th>Subtotal</th>
                                                <th>Discount</th>
                                                <th>Delivery Charges</th>
                                                <th>Tax</th>
                                                <th>Total</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th> Mobile</th>
                                                <th>ZipCode</th>
                                                <th>Status</th>
                                                <th> Order Date</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>Rs.{{$order->subtotal}}</td>
                                                <td>Rs.{{$order->discount}}</td>
                                                <td>Rs.{{$order->delivery_charges}}</td>
                                                <td>Rs.{{$order->tax}}</td>
                                                <td>Rs.{{$order->total}}</td>
                                                <td>{{$order->firstname}}</td>
                                                <td>{{$order->lastname}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->mobile}}</td>
                                                <td>{{$order->zipcode}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td><a href="{{route('my.order-detail',['order_id'=>$order->id])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $orders->links("pagination::bootstrap-4")}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
