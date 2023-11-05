<div id="content">

    <!-- Topbar -->
    @livewire('admin.top-header-component')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="{{ route('admin.add-home-slider') }}" class="btn btn-success bg-warning float-right">Add Home Page Slider & Banner</a>

            @if(Session::has('message'))
            <div class="alert alert-success bg-success text-light" rle="alert">{{ Session::get('message') }}</div>
            @endif
        </div>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Home Page Slider & Banner Setting</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Postion</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($sliders as $slider)
                          <tr>
                                <td>{{$slider->id}}</td>
                                <td>
                                <img src="{{asset('assets/images')}}/{{$slider->banner}}" width="120"></td>
                                <td>
                                    @if($slider->position == 1)
                                     <span class="text-danger">Top Slider</span>
                                     @elseif($slider->position == 2)
                                     <span class="text-primary">Home Page Banner</span>
                                     @endif
                                </td>
                                <td>{{$slider->link}}</td>
                                <td>{{$slider->status == 1 ? 'Active': 'Inactive'}}</td>
                                <td>{{$slider->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.edit-banner',['slider_id'=>$slider->id])}}" class="btn"><i class="fa fa-edit fa-2x text-info"></i></a>
                                    <a href="#" wire:click.prevent="deleteSlider({{$slider->id}})" class="btn"><i class="fa fa-times fa-2x text-danger"></i></a>

                                </td>
                            </tr>
                          @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
