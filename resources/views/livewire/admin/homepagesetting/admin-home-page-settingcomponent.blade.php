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
                    <div class="card-title">Home Page & Bussiness Setting</div>
                </div>
                <div class="card-body">
                    <form action="" wire:submit.prevent="updateHomePageSetting" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="label-control">Website Name<b class="text-danger">*</b></label>
                                    <input type="text" name="name" id="name" class="form-control" wire:model="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="label-control">Email<b class="text-danger">*</b></label>
                                    <input type="text" name="email" id="email" class="form-control" wire:model="email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile" class="label-control">Mobile Contact<b class="text-danger">*</b></label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" wire:model="mobile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hot_line" class="label-control">Website Hotline Number<b class="text-danger">*</b></label>
                                    <input type="text" name="hot_line" id="hot_line" class="form-control" wire:model="hot_line">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address" class="label-control">Address<b class="text-danger">*</b></label>
                                    <input type="text" name="address" id="address" class="form-control" wire:model="address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="map" class="label-control">Office Map<b class="text-danger">*</b></label>
                                    <input type="text" name="map" id="map" class="form-control" wire:model="map">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="facebook" class="label-control">Facebook Link<b class="text-danger">*</b></label>
                                    <input type="text" name="facebook" id="facebook" class="form-control" wire:model="facebook">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="instagram" class="label-control">Instagram Link<b class="text-danger">*</b></label>
                                    <input type="text" name="instagram" id="instagram" class="form-control" wire:model="instagram">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="twitter" class="label-control">Twitter Link<b class="text-danger">*</b></label>
                                    <input type="text" name="twitter" id="twitter" class="form-control" wire:model="twitter">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tiktok" class="label-control">Tiktok Link<b class="text-danger">*</b></label>
                                    <input type="text" name="tiktok" id="tiktok" class="form-control" wire:model="tiktok">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pintrest" class="label-control">Pintreset Link<b class="text-danger">*</b></label>
                                    <input type="text" name="pintrest" id="pintrest" class="form-control" wire:model="pintrest">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="youtube" class="label-control">Youtube Link<b class="text-danger">*</b></label>
                                    <input type="text" name="youtube" id="youtube" class="form-control" wire:model="youtube">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tiktok" class="label-control">Terms Status<b class="text-danger">*</b></label>
                                    <select name="terms_status" id="terms_status" class="form-control" wire:model="terms_status">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pintreset" class="label-control">Privacy Status<b class="text-danger">*</b></label>
                                    <select name="privacy_status" id="privacy_status" class="form-control" wire:model="privacy_status">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="header_logo" class="label-control">Header logo<b class="text-danger">*</b></label>
                                    <input type="file" name="header_logo" id="header_logo" class="form-control" wire:model="new_header_logo">
                                </div>
                                @if($new_header_logo)
                                    <img src="{{$new_header_logo->temporaryUrl()}}" width="120" />
                                @else
                                <img src="{{ asset('assets/images') }}/{{ $header_logo }}" width="120">
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mobile_header_logo" class="label-control">Mobile Header Logo<b class="text-danger">*</b></label>
                                    <input type="file" name="mobile_header_logo" id="mobile_header_logo" class="form-control" wire:model="new_mobile_header_logo">
                                </div>
                                @if($new_mobile_header_logo)
                                    <img src="{{$new_mobile_header_logo->temporaryUrl()}}" width="120" >
                                @else
                                <img src="{{ asset('assets/images') }}/{{ $mobile_header_logo }}" width="120">
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="footer_logo" class="label-control">Footer Logo<b class="text-danger">*</b></label>
                                    <input type="file" name="footer_logo" id="footer_logo" class="form-control" wire:model="new_footer_logo">
                                </div>
                                @if($new_footer_logo)
                                    <img src="{{$new_footer_logo->temporaryUrl()}}" width="120" >
                                @else
                                <img src="{{ asset('assets/images') }}/{{ $footer_logo }}" width="120">
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mobile_footer_logo" class="label-control">Mobile Footer Logo<b class="text-danger">*</b></label>
                                    <input type="file" name="mobile_footer_logo" id="mobile_footer_logo" class="form-control" wire:model="new_mobile_footer_logo">
                                </div>
                                @if($new_mobile_footer_logo)
                                    <img src="{{$new_mobile_footer_logo->temporaryUrl()}}" width="120" >
                                @else
                                <img src="{{ asset('assets/images') }}/{{ $mobile_footer_logo }}" width="120">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="header_logo" class="label-control">Terms And Condition<b class="text-danger">*</b></label>
                                    <textarea name="terms" id="terms" cols="30" rows="10" class="form-control" wire:model="terms"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="privacy" class="label-control">Privacy<b class="text-danger">*</b></label>
                                    <textarea name="privacy" id="privacy" cols="30" rows="10" class="form-control" wire:model="privacy"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="copy_right" class="label-control">Copy Rights<b class="text-danger">*</b></label>
                                    <input type="text" name="copy_right" id="copy_right" class="form-control" wire:model="copy_right">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success bg-success">Update Home Page Setting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
