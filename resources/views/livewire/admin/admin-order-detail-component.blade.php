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
            <h6 class="m-0 font-weight-bold text-primary center p-2">Order {{$order->id}} Detail</h6>
            <div class="card-header py-3" style="display:flex;flex-direction:row;">
                <a href="#" class="btn btn-success mr-5">Order {{$order->status}}</a>
                
                 @if($order->status =='ordered')
                                        <a href="#" wire:click.prevent="cancelOrder('{{$order->id}}')" style="margin:0 20px;" class="btn btn-danger btn-medium pull-right">Canceled Order </a>
                                        @endif
               
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tbody>
                            <tr>
                                <td>Order Detail:&nbsp;</td>
                                <td>
                                    <div>
                                        <span class="text-success" style="font-weight:700;">{{$order->user->name}}</span><br>
                                        <span>{{$order->line1}} &nbsp; {{$order->line2}} &nbsp; {{$order->city}}</span><br>
                                        <span>{{$order->province}},&nbsp;{{$order->country}}, {{$order->zipcode}}</span><br>
                                        <span class="text-primary">{{$order->email}},&nbsp;{{$order->mobile}}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Order Total Detail:</td>
                                <td>
                                    <div>
                                        <span class="text-danger">Tax:&nbsp;{{$order->tax}}</span>
                                        <span class="text-success">Discount:&nbsp;{{$order->dsicount}}</span>
                                        <span class="text-primary">Subtotal:&nbsp;{{$order->subtotal}}</span>
                                        <span class="text-default">Grand Total:&nbsp;{{$order->total}}</span>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                    <h2 class="text-primary mt-5">Order Item Detail</h2>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Product Description</td>
                                <td>Vendor Detail</td>
                                <td>Qty</td>
                                <td>Price</td>
                                <td>Product Review</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItem as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    <div>
                                        <img src="{{asset('assets/images')}}/{{$item->product->front_image}}" style="width:50px;border-radius:51px;" alt="{{$item->product->name}}">
                                        {{$item->product->name}}
                                    </div>
                                </td>
                                @php
                                $vendor=DB::table('vendors')->where('user_id',$item->vendor_id)->first();
                                $store=DB::table('vendor_stores')->where('vendor_id',$vendor->id)->first();
                               
                                @endphp
                                <td>{{$store->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    @if($item->rstatus == 1)
                                    yes
                                    @else
                                    No
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h2 class="text-primary mt-5">Order Payment Transaction Detail</h2>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Payment Mode</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->transaction->id}}</td>
                                <td>{{$order->transaction->mode}}</td>
                                <td>{{$order->transaction->status}}</td>
                                <td><a href="#"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>