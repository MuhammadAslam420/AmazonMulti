<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card p-5">
                    <div class="card-header">
                        <h2 class="card-title">Edit Product</h2>
                        @if(Session::has('message'))
                            <div class="alert alert-success text-danger-font-bold">{{Session::get('message')}}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Product Name</label>
                                        <input type="text" name="name" id="name" class="form-control" wire:model="name" wire:keyup="generateslug">
                                        @error('name')<p class="text-danger">{{$message}}</p>@enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Product Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" wire:model="slug">
                                        @error('slug')<p class="text-danger">{{$message}}</p>@enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Product Category</label>
                                        <select name="category_id" id="category_id" wire:model="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>    
                                        @error('category_id')<p class="text-danger">{{$message}}</p>@enderror
                                
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Short Description</label>
                                        <input type="text" name="short_description" id="short_description" class="form-control" wire:model="short_description">
                                        @error('short_description')<p class="text-danger">{{$message}}</p>@enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Description</label>
                                        <textarea name="description"  wire:model="description" cols="20" rows="2" class="form-control"></textarea>
                                        @error('description')<p class="text-danger">{{$message}}</p>@enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" class="label-control">SKU</label>
                                        <input type="text" name="SKU" id="SKU" class="form-control" wire:model="SKU">
                                        @error('SKU')<p class="text-danger">{{$message}}</p>@enderror

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Stock Status</label>
                                        <select name="stock_status" id="stock_status" class="form-control" wire:model="stock_status">
                                            <option value="">Select Stock Status</option>
                                            <option value="Instock">In-Stock</option>
                                            <option value="OutOfStock">Out-Of-Stock</option>
                                        </select>
                                        @error('stock_status')<p class="text-danger">{{$message}}</p>@enderror

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Price</label>
                                        <input type="text" name="price" id="price" class="form-control" wire:model="price">
                                        @error('price')<p class="text-danger">{{$message}}</p>@enderror

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Discount</label>
                                        <input type="text" name="discount" id="discount" class="form-control" wire:model="discount">

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Quantity</label>
                                        <input type="text" name="quantity" id="quantity" class="form-control" wire:model="quantity">
                                        @error('quantity')<p class="text-danger">{{$message}}</p>@enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="label-control">front Image</label>
                                        <input type="file" name="front_image" id="front_image" class="form-control" wire:model="nf_image">
                                        @if($nf_image)
                                       <img src="{{$nf_image->temporaryurl()}}" width="120"/>
                                       @else
                                       <img src="{{asset('assets/images')}}/{{$front_image}}" width="120"/>
                                       @endif
                                      


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Back Image</label>
                                        <input type="file" name="back_image" id="back_image" class="form-control" wire:model="nb_image">
                                        @if($nb_image)
                                       <img src="{{$nb_image->temporaryurl()}}" width="120"/>
                                       @else
                                       <img src="{{asset('assets/images')}}/{{$back_image}}" width="120"/>
                                       @endif
                                 


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Gallery</label>
                                        <input type="file" multiple name="gallery" id="gallery" class="form-control" wire:model="n_gallery">
                                        @if($n_gallery)
                                        @foreach($n_gallery as $newimage)
                                        @if($newimage)
                                        <img src="{{$newimage->temporaryurl()}}" width="120"/>

                                        @endif
                                        @endforeach
                                     
                                       @endif
 
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Deal Price</label>
                                        <input type="text" name="deals" id="deals" class="form-control" wire:model="deals">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="label-control">Special Offer Price</label>
                                        <input type="text" name="special_offer" id="special_offer" class="form-control" wire:model="special_offer">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success bg-success float-right p-1">Add New Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
