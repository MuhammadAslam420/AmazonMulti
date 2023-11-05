<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h2>
                            My & My Store Info
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="responsive-table">
                            <table class="table">
                                <tr>
                                    <td>

                                        <div
                                            class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                            <a href="#">
                                                <img class="rounded-t-lg" src="{{asset('assets/images/vendor')}}/{{Auth::user()->profile}}"
                                                    alt="">
                                            </a>
                                            <div class="p-5">
                                                <a href="#">
                                                    <h5
                                                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                        {{Auth::user()->name}}</h5>
                                                </a>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{Auth::user()->email}}<br>{{Auth::user()->atype}}<br><b>{{Auth::user()->vendor->mobile}}</b>.</p>
                                                
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="flex">
                                            {!! Auth::user()->vendor->map !!}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <div
                                            class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                            <a href="#">
                                                <img class="rounded-t-lg" src="{{asset('assets/images/vendor/stores')}}/{{Auth::user()->store->logo}}"
                                                    alt="">
                                            </a>
                                            <div class="p-5">
                                                <a href="#">
                                                    <h5
                                                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                        {{Auth::user()->store->name}}</h5>
                                                </a>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{Auth::user()->store->address}}<br>{{Auth::user()->store->tax_no}}<br><b>{{Auth::user()->store->registration_no}}</b><br><b>{{Auth::user()->store->tagline}}</b>.</p>
                                                
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="flex">
                                            {!! Auth::user()->vendor->map !!}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @if(Session::has('message'))
                <div class="alert alert-success text-danger font-bold" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="card p-5">
                    <form wire:submit.prevent="updateStore">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Vendor Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control" wire:model="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Store Name</label>
                                    <input type="text" name="name" id="name" class="form-control" wire:model="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Store Address</label>
                                    <input type="text" name="address" id="address" class="form-control" wire:model="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="label-control">Store Map</label>
                                    <input type="text" name="map" id="map" class="form-control" wire:model="map">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="label-control">Store Tagline</label>
                                    <input type="text" name="tagline" id="tagline" class="form-control" wire:model="tagline">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="label-control">Store Tax No</label>
                                    <input type="text" name="tax_no" id="tax_no" class="form-control" wire:model="tax_no">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="label-control">Store Registration No</label>
                                    <input type="text" name="registration_no" id="registration_no" class="form-control" wire:model="registration_no">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info bg-success">Add Store Info</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
