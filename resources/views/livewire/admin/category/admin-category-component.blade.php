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
                <h6 class="m-0 font-weight-bold text-primary">Add New Category & SubCategory</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" enctype="multipart/form-data" wire:submit.prevent="storeCategory">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Category Name</label>
                                        <input type="text" placeholder="Category Name" class="form-control" wire:model="name" wire:keyup="generateslug">
                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">Category Slug</label>
                                        <input type="text" placeholder="Category Slug" class="form-control" wire:model="slug">
                                        @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo" class="label-control">Category Image</label>
                                        <input type="file" class="form-control" wire:model="logo">
                                        @if($logo)
                                        <img src="{{ $logo->temporaryurl() }}" width="120">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success bg-warning">Add New Category</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6" style="border-left:2px solid black;">
                        <form enctype="multipart/form-data" wire:submit.prevent="addSubCategory">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">SubCategory Name</label>
                                        <input type="text" placeholder="sub Category Name" class="form-control" wire:model="s_name" wire:keyup="generateSubslug">
                                        @error('s_name') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-control">SubCategory Slug</label>
                                        <input type="text" placeholder="Category Slug" class="form-control" wire:model="s_slug">
                                        @error('s_slug') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logo" class="label-control">Parent Category</label>
                                        <select name="category_id" class="form-control" wire:model="category_id">
                                            <option value="">Select Parent Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <p class="text-danger">{{$message}}</p> @enderror

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success bg-warning">Add SubCategory</button>
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
                <div class="card-title">All Available Sub-Categories</div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Parent Category</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subcategories as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->slug}}</td>
                            <td>{{$cat->category->name}}</td>
                            <td><a href="#" wire:click.prevent="deleteSubCategory('{{$cat->id}}')" class="btn bg-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$subcategories->links()}}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
