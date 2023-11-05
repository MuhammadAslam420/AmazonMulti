<div id="content" wire:ignore>

    <!-- Topbar -->
    @livewire('admin.top-header-component')
    <!-- End of Topbar -->
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @elseif(Session::has('warning'))
    <div class="alert alert-danger">{{Session::get('warning')}}</div>
    @endif
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Products Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order Description</th>
                                <th>Tax</th>
                                <th>SubTotal</th>
                                <th>Order.Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Order Description</th>
                                <th>Tax</th>
                                <th>SubTotal</th>
                                <th>Order.Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>
                                    <div>
                                        <h5>
                                            <img src="{{asset('assets/images/users')}}/{{$order->user->profile}}" style="width:50px;border-radius:51px;" alt="{{$order->user->name}}">
                                        </h5>
                                        <span>{{$order->firstname}}&nbsp;{{$order->lastname}}</span><br>
                                        <span>{{$order->email}}&nbsp;{{$order->mobile}}</span><br>
                                        <span>{{$order->line1}}&nbsp;{{$order->line2}}</span><br>
                                        <span>{{$order->city}},{{$order->province}},{{$order->country}}</span><br>
                                        <span>{{$order->zipcode}}</span>
                                    </div>
                                </td>

                                <td>{{$order->tax}}</td>
                                <td>{{$order->subtotal}}</td>
                                <td>{{$order->total}}</td>
                                <td>
                                    @if($order->status === 'ordered')
                                    <a href="#" class="btn btn-primary">{{$order->status}}</a>
                                    @else
                                    {{$order->status}}
                                    @endif
                                </td>

                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.order-detail',['id'=>$order->id])}}"><i class="fa fa-eye text-primary"></i></a>
                                    <a href="#"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <img src="{{asset('assets/images/no-records.png')}}" class="img-fluid" style="height:30vh;" alt="">
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    {{$orders->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
