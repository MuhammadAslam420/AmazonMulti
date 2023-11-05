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
                <h6 class="m-0 font-weight-bold text-primary">Add New Coupon</h6>
                <a href="{{ route('admin.coupons') }}" class="btn btn-success bg-warnib float-right">All Available Coupons</a>
            </div>
            <div class="card-body">
                <form class="form-horizontal" wire:submit.prevent="updateCoupon">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="label-control">Coupon Name</label>

                                <input type="text" placeholder="Coupon Name" class="form-control input-md" wire:model="code">
                                @error('code') <p class="text-danger">{{$message}}</p> @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="label-control">Coupon type</label>

                                <select name="type" id="type" class="form-control" wire:model="type">
                                    <option value="">Select</option>
                                    <option value="fixed">fixed</option>
                                    <option value="percent">percent</option>
                                </select>
                                @error('type') <p class="text-danger">{{$message}}</p> @enderror


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="label-control">Coupon value</label>

                                <input type="text" placeholder="Coupon value" class="form-control input-md" wire:model="value">
                                @error('value') <p class="text-danger">{{$message}}</p> @enderror


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="label-control">Cart value</label>

                                <input type="text" placeholder="Cart value" class="form-control input-md" wire:model="cart_value">
                                @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="label-control">Expiry Date</label>

                                <input type="date" placeholder="expiry Date" class="form-control input-md" wire:model="expirey_date">
                                @error('expirey_date') <p class="text-danger">{{$message}}</p> @enderror


                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="label-control"></label>

                            <button type="submit" class="btn btn-info bg-warning">Edit</button>

                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
