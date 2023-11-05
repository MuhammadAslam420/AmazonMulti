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
                <h6 class="m-0 font-weight-bold text-primary">All Available Vendors Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    <div>
                                        <img src="{{asset('assets/images/users')}}/{{$user->profile}}" style="width:50px;border-radius:51px;" alt="">
                                        <span>{{$user->name}}</span>
                                    </div>
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->mobile}}</td>
                                @php
                                $vendor=DB::table('vendors')->where('user_id',$user->id)->first();
                                @endphp
                                @if($vendor)

                                <td>{{$vendor->address}}</td>

                                @else

                                <td>&nbsp;</td>


                                @endif
                                <td>
                                    @if($user->active_status == 1)
                                    <a href="#" wire:click.prevent="changeStatus({{$user->id}},0)" class="btn btn-success">Active</a>
                                    @else
                                    <a href="#" wire:click.prevent="changeStatus({{$user->id}},1)" class="btn btn-danger">In-Active</a>
                                    @endif
                                </td>
                                <td>{{$user->created_at}}</td>
                                <td>

                                    <a href="{{route('admin.vendor',['id'=>$user->id])}}" class="btn btn-success" style="display:flex;flex-direction:row;"><i class="fa fa-info text-primary pr-1"></i>Detail</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <img src="{{asset('assets/images/no-records.png')}}" class="img-fluid" style="height:30vh;" alt="">
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    {{$users->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
