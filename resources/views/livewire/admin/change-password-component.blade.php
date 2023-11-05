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
                    <h1>Change Password</h1>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="updatepassword">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="current_password" class="label-control">Old Password</label>
                                <input type="text" name="current_password" id="current_password" class="form-control" wire:model="current_password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="label-control">New Password</label>
                                <input type="text" name="password" id="password" class="form-control" wire:model="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation" class="label-control">confirm Password</label>
                                <input type="text" name="password_confirmation" id="password_confirmation" class="form-control" wire:model="password_confirmation">
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
