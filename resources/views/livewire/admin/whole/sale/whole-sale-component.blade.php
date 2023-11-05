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
                <h6 class="m-0 font-weight-bold text-primary">Add WholeSale</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action=""  wire:submit.prevent="addNew">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Item Qty</label>
                                        <input type="text" placeholder="Item Qty" class="form-control" wire:model="qty">
                                        @error('qty') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Percentage</label>
                                        <input type="text" placeholder="Percentage" class="form-control" wire:model="percentage">
                                        @error('percentage') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success bg-warning">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <div class="card shadow mt-5">
            <div class="card-header bg-success">
                <div class="card-title">All WholeSales</div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Item Qty</th>
                            <th>Percentage Off</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->qty}}</td>
                            <td>{{$cat->percentage}} %</td>

                            <td>
                                <a href="{{ route('admin.edit_wholesale',['id'=>$cat->id]) }}" class="btn bg-warning"><i class="fa fa-edit"></i></a>
                                <a href="#" wire:click.prevent="deleteSale('{{$cat->id}}')" class="btn bg-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$sales->links()}}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
