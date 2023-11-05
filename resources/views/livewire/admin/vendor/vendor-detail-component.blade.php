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
                <h6 class="m-0 font-weight-bold text-primary">
                    @if($vendor)
                    {{$vendor->name}}
                    @else
                    Vendor Not Update His profile
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="img">
                            <div class="card bg-primary">
                                @if($vendor)
                                <img src="{{asset('assets/images/vendor/avatar.png')}}" class="img-thumbnail m-3" style="border-radius:91px;" alt="img">
                                @else
                                <img src="{{asset('assets/images/vendor/avatar.png')}}" class="img-thumbnail m-3" style="border-radius:91px;">
                                @endif
                                @if($vendor)
                                <span class="text-light pl-1">{{$vendor->user->name}}</span><br>
                                <div style="display:flex;flex-direction:row;">
                                    <span class="pl-1 pr-1"><a href="{{$vendor->facebook}}"><i class="fab fa-facebook text-success"></i></a></span>
                                    <span class="pl-1 pr-1"><a href="{{$vendor->instagram}}"><i class="fab fa-instagram text-success"></i></a></span>
                                    <span class="pl-1 pr-1"><a href="{{$vendor->youtube}}"><i class="fab fa-youtube text-success"></i></a></span>
                                    <span class="pl-1 pr-1"><a href="{{$vendor->whatsapp}}"><i class="fa fa-mobile text-success"></i></a></span>
                                </div><br>
                                <span class="pl-1 pr-1"><i class="fa fa-marker text-success"></i> {{$vendor->address}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>store Location</td>
                                </tr>
                                <tr>
                                    <td>
                                        {!! $vendor->store->map !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Store Name</td>

                                </tr>
                                <tr>
                                    <td>{{$vendor->store->name}}</td>
                                </tr>
                                <tr>
                                    <td>Tag Line</td>
                                </tr>
                                <tr>
                                    <td>{{$vendor->store->tagline}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
