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
                <h6 class="m-0 font-weight-bold text-primary">All Available Coupons</h6>
                <a href="{{ route('admin.add-coupon') }}" class="btn btn-success bg-warning float-right">Add New Coupon</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Coupon Code
                            </th>
                            <th>
                                Coupon Type
                            </th>
                            <th>
                                Coupon value
                            </th>
                            <th>
                                Cart Value

                            </th>
                            <th>
                                Expiry Date

                            </th>
                            <th>
                                Actions

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->type}}</td>
                            @if($coupon->type == 'fixed')
                            <td>${{$coupon->value}}</td>
                            @else
                            <td>{{$coupon->value}}%</td>
                            @endif
                            <td>{{$coupon->cart_value}}</td>
                            <td>{{$coupon->expirey_date}}</td>
                            <td>
                                <a href="{{route('admin.edit-coupon',['id'=>$coupon->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                <a href="#" onclick="confirm('Are You Sure, You want to delete the Category!.') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{$coupons->links('pagination::bootstrap-4')}}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
