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
                    <div class="card-title">Sale ON</div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" wire:submit.prevent="updateSale">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="label-control">Sale Date</label>


                                <select name="" id="" class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="label-control">Sale Date</label>

                                <input type="text" id="sale-date" placeholder="yyyy/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date">
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="label-control"></label>

                                <button type="submit" class="btn btn-info bg-success">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
@push('scripts')
<script>
    $(function() {
        $('#sale-date').datetimepicker({
                format: 'Y-MM-DD h:m:s',
            })
            .on('dp.change', function(ev) {
                var data = $('#sale-date').val();
                @this.set('sale_date', data);
            });
    });
</script>
@endpush
