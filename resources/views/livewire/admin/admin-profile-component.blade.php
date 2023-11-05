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
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h1>Update Profile</h1>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="updateAdmin">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="label-control">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" wire:model="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username" class="label-control">User Name</label>
                                <input type="text" name="username" id="username" class="form-control" wire:model="username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="label-control">email</label>
                                <input type="text" name="email" id="email" class="form-control" wire:model="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile" class="label-control">Mobile</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" wire:model="mobile">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="from-group">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
