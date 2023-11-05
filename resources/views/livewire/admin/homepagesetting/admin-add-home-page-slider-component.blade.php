<div id="content">

    <!-- Topbar -->
    @livewire('admin.top-header-component')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            @if(Session::has('message'))
            <div class="alert alert-success bg-success text-light" rle="alert">{{ Session::get('message') }}</div>
            @endif
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add New Home Page & Bussiness Setting</div>
                </div>
                <div class="card-body">
                    <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addSlide">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Title</label>
                            <div class="col-md-12">
                                <select name="position" id="position" wire:model="position"  class="form-control">
                                    <option value="">Select Banner Position</option>
                                    <option value="1">Home Page Top Slider</option>
                                    <option value="2">Home Page Other Banners</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Link</label>
                            <div class="col-md-12">
                                <textarea  class="form-control" placeholder="link" wire:model="link"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Image</label>
                            <div class="col-md-12">
                                <input type="file" class="input-file" wire:model="banner"/>
                               @if($banner)
                               <img src="{{$banner->temporaryurl()}}" width="120">
                               @endif

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Status</label>
                            <div class="col-md-12">
                                <select name="" id="" class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button type="submit" class="btn btn-success bg-warning">Add New</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
