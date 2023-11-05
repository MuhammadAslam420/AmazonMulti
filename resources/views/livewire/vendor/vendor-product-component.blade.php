<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card card-custom gutter-b bg-transparent shadow-none border-0" >
                            <div class="card-header align-items-center  border-bottom-dark px-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Product
                                    </h3>
                                </div>
                                <div class="icons d-flex">
                                    <a href="{{route('vendor.addproduct')}}" class="ml-2" >
                                        <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">
                                        
                                            <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                              </svg>
                                        </span>
                                    
                                    </a>
                                    <!--<a href="#" onclick="printDiv()" class="ml-2">-->
                                    <!--    <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">-->
                                    <!--        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>-->
                                    <!--            <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>-->
                                    <!--            <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>-->
                                    <!--          </svg>-->
                                    <!--    </span>-->
                                    
                                    <!--</a>-->
                                    <!--<a href="#" class="ml-2" >-->
                                    <!--    <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">-->
                                    <!--        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>-->
                                    <!--          </svg>-->
                                    <!--    </span>-->
                                    
                                    <!--</a>-->
                                
                                </div>
                            </div>
                        
                        </div>


                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-12 ">
                        <div class="card card-custom gutter-b bg-white border-0" >
                            <div class="card-header">
                                <div class="col-md-3">
                                    <x-sort name="sortBy"/>
                                </div>
                                <div class="col-md-3">
                                    <x-perpage name="perPage"/>
                                </div>
                                
                            </div>
                            <div class="card-body" >
                                @if(Session::has('message'))
                            <div class="alert alert-success text-danger-font-bold">{{Session::get('message')}}</div>
                        @endif
                                <div >
                                    <div class=" table-responsive" >
                                        <table id="myTable" class="table display ">
                                            
                                            <thead class="text-body">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Products</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>
                                                        Status	
                                                    </th>
                                                    <th class="no-sort">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="kt-table-tbody text-dark">
                                                @forelse($products as $product)
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td  >#{{$product->id}}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                         <div class="h-45px w-45px d-flex align-items-center mr-2">
                                                            <img class="w-20 h-20 rounded" src="{{asset('assets/images')}}/{{$product->front_image}}" alt="product">
                                                        </div> 
                                                            <span
                                                                >{{$product->name}}</span></div>
                                                    </td>
                                                    <td>{{$product->category->name}}</td>
                                                    <td>${{$product->price}}</td>
                                                    <td>
                                                        <div class="">
                                                            <div class=""><span
                                                                class=" text-success">{{$product->status}}</span>
                                                        </div>
                                                    
                                                        </div>
                                                    
                                                    
                                                    </td>
                                                    <td>
                                                        <div class="card-toolbar text-right">
                                                            <button class="btn p-0 shadow-none" type="button" id="dropdowneditButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="svg-icon">
                                                                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots text-body" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowneditButton" >
                                                                <a class="dropdown-item" href="{{route('vendor.editproduct',['id'=>$product->id])}}">Edit</a>
                                                                <a class="dropdown-item confirm-delete" title="Delete" href="#" onclick="confirm('Are You Sure, You want to delete the Product!.') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})">Delete</a>
                                                            </div>
                                                            </div>
                                                    </td>
                                                
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('assets/images/no_records.png')}}" class="img-fluid" alt="no_records">
                                                    </td>
                                                </tr>
                                                @endforelse
                                                
                                            </tbody>
                                        </table>
                                        {{$products->links()}}

                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>

                    </div>
                
                </div>
            </div>
        </div>
    </div>
    
</div>
