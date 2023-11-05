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
                <h6 class="m-0 font-weight-bold text-primary">All Available Store Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>StoreName</th>
                                <th>Address</th>
                                <th>Tag Line</th>
                                <th>Tax No</th>
                                <th>Registration No</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Tag Line</th>
                                <th>Tax No</th>
                                <th>Registration No</th>
                                <th>Date</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($vendors as $user)
                            <tr>
                                <td>
                                    <div>
                                        <img src="{{asset('assets/images/vendor/store')}}/{{$user->logo}}" style="width:50px;border-radius:51px;" alt="">
                                        <span>{{$user->name}}</span>
                                    </div>
                                </td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->tagline}}</td>
                                <td>{{$user->tax_no}}</td>
                                <td>{{$user->registration_no}}</td>
                                <td>{{$user->created_at}}</td>

                            </tr>
                            @empty
                            <tr>
                                <img src="{{asset('assets/images/no-records.png')}}" class="img-fluid" style="height:30vh;" alt="">
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    {{$vendors->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
