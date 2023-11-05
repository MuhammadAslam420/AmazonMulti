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
                <h6 class="m-0 font-weight-bold text-primary">All Available Categories Table</h6>
                <a href="{{ route('admin.categories') }}" class="btn btn-success bg-warnib float-right">Add New Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td>
                                    <div>
                                        <img src="{{asset('assets/images')}}/{{$category->logo}}" style="width:50px;border-radius:51px;">
                                        <span>{{$category->name}}</span>
                                    </div>
                                </td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a href="{{ route('admin.edit_category',['id'=>$category->id]) }}"><i class="fa fa-edit text-warning"></i></a>
                                    <a href="#" wire:click.prevent="deleteCategory({{$category->id}})"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <img src="{{asset('assets/images/no-records.png')}}" class="img-fluid" style="height:30vh;" alt="">
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    {{$categories->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
