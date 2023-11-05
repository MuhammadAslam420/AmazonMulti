<div id="content" wire:ignore>

    <!-- Topbar -->
    @livewire('admin.top-header-component')
    <!-- End of Topbar -->
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All In-Active Products Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sale Qty</th>
                                <th>Status</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sale Qty</th>
                                <th>Status</th>
                                <th>Date</th>
                                
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>
                                    <div>
                                        <img src="{{asset('assets/images')}}/{{$product->front_image}}" style="width:50px;border-radius:51px;" alt="">
                                        <span>{{$product->name}}</span>
                                    </div>
                                </td>
                                <td>{{$product->user->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->sale_quantity}}</td>
                                <td>
                                    @if($product->status == 1)
                                    <a href="#" wire:click="updateStatus('{{$product->id}}',0)" class="btn btn-success">Active</a>
                                    @else
                                    <a href="#" wire:click="updateStatus('{{$product->id}}',1)" class="btn btn-danger">In-Active</a>
                                    @endif
                                </td>
                                <td>{{$product->created_at}}</td>
                               
                            </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                    {{$products->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>