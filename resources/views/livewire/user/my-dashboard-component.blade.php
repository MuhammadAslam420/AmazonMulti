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
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fa fa-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fa fa-shopping-bag mr-10"></i>Orders</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fa fa-user mr-10"></i>Account details</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Hello {{Auth::user()->name}}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card " style="background:red;">
                                                        <div class="card-header">
                                                            <h2 class="card-title text-light">My Orders</h2>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="text-center text-light">{{$myOrders}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="card " style="background:red;">
                                                        <div class="card-header">
                                                            <h2 class="card-title text-light">My Orders Cost</h2>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="text-center text-light">{{$cost}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Subtotal</th>
                                                            <th>Tax</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orders as $order)
                                                        <tr>
                                                            <td>#{{$order->id}}</td>
                                                            <td>{{$order->subtotal}}</td>
                                                            <td>{{$order->tax}}</td>
                                                            <td>{{$order->status}}</td>
                                                            <td>{{$order->total}}</td>
                                                            <td><a href="{{route('my.order-detail',['order_id'=>$order->id])}}" class="btn btn-danger">View</a></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab" wire:ignore>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <form wire:submit.prevent="updateUser">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="name" type="text" wire:model="name" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>User Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="username" type="text" wire:model="username" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Mobile <span class="required">*</span></label>
                                                        <input required="" class="form-control" type="text" name="mobile" wire:model="mobile" />
                                                    </div>
                                                    <div class=" form-group col-md-12">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="email" type="text" wire:model="email" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Password <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="password" type="password" wire:model="password" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                    </div>
                                                </div>
                                            </form>
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
