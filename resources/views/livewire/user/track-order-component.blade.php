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
                                <h1 class="card-title">Track Your Order</h1>
                            </div>
                            <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="order_id" class="label-control">Order Id</label>
                                                <input type="text" name="order_id" id="order_id" class="form-control" wire:model="order_id">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="billing_email" class="label-control">Order Billing Email Address</label>
                                                <input type="text" name="email" id="billing_email" class="form-control" wire:model="email">
                                            </div>
                                        </div>

                                    </div>

                                <table class="table table-stripped mt-5">
                                    <thead>
                                        <tr>
                                            <th>OrderID</th>
                                            <th>Email Address</th>
                                            <th>Order Status</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->email}}</td>
                                            <td>{{$order->status}}</td>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
