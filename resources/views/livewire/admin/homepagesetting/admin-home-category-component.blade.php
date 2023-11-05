@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
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
                    <div class="card-title">Select Categries to show on home page</div>
                </div>
                <div class="card-body">
                    <form  wire:submit.prevent="updateHomeCategory">
                        <div class="row">
                            <div class="col-md-6" wire:ignore>
                                <div class="form-group">
                                    <label class="control-label">Choose Category</label>
                                    <select class="form-control sel_categories " name="categories[]" multiple="multiple"
                                        wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">No Of Products</label>
                                    <input type="text" class="form-control input-md" wire:model="numberofproducts">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label"></label>

                                    <button type="submit" class="btn btn-success bg-success">Update</button>
                                </div>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js" integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('.sel_categories').select2();
        $('.sel_categories').on('change',function(e){
            var data=$('.sel_categories').select2("val");
            @this.set('selected_categories',data);
        });
    });
</script>
@endpush
