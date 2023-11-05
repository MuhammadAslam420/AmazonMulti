<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                            <div class="card-header align-items-center  border-bottom-dark px-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Orders
                                    </h3>
                                </div>
                                <div class="icons d-flex">
                                    <a href="{{ route('vendor.products') }}" class="ml-2">
                                        <span
                                            class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

                                            <i class="fa fa-product-hunt fa-2x text-warning"></i>
                                        </span>

                                    </a>
                                    <!--<a href="#" onclick="printDiv()" class="ml-2">-->
                                    <!--    <span-->
                                    <!--        class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">-->
                                    <!--        <svg width="15px" height="15px" viewBox="0 0 16 16"-->
                                    <!--            class="bi bi-printer-fill" fill="currentColor"-->
                                    <!--            xmlns="http://www.w3.org/2000/svg">-->
                                    <!--            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />-->
                                    <!--            <path fill-rule="evenodd"-->
                                    <!--                d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />-->
                                    <!--            <path fill-rule="evenodd"-->
                                    <!--                d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />-->
                                    <!--        </svg>-->
                                    <!--    </span>-->

                                    <!--</a>-->
                                    <!--<a href="#" class="ml-2">-->
                                    <!--    <span-->
                                    <!--        class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">-->
                                    <!--        <svg width="15px" height="15px" viewBox="0 0 16 16"-->
                                    <!--            class="bi bi-file-earmark-text-fill" fill="currentColor"-->
                                    <!--            xmlns="http://www.w3.org/2000/svg">-->
                                    <!--            <path fill-rule="evenodd"-->
                                    <!--                d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />-->
                                    <!--        </svg>-->
                                    <!--    </span>-->

                                    <!--</a>-->

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="row">

                    <div class="col-12 ">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header">
                                <div class="col-md-3">
                                    <x-sort name="sortBy" />
                                </div>
                                <div class="col-md-3">
                                    <x-perpage name="perPage" />
                                </div>

                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success text-danger-font-bold">{{ Session::get('message') }}
                                    </div>
                                @endif
                                <div>
                                    <div class=" table-responsive">
                                        <table id="myTable" class="table display ">

                                            <thead class="text-body">
                                                <tr>
                                                    <th>OrderID</th>
                                                    <th>ID</th>
                                                    <th>Products</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Billing / Shipping Address</th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>Update Status</th>
                                                    <th>Payment Status</th>
                                                    <th class="no-sort">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="kt-table-tbody text-dark">
                                                @forelse($items as $item)
                                                    <tr class="kt-table-row kt-table-row-level-0">
                                                        <td>{{ $item->order->id }}</td>
                                                        <td>#{{ $item->id }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="h-45px w-45px d-flex align-items-center mr-2">
                                                                    <img class="w-20 h-20 rounded"
                                                                        src="{{ asset('assets/images') }}/{{ $item->product->front_image }}"
                                                                        alt="product">
                                                                </div>
                                                                <span>{{ $item->product->name }}</span>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>${{ $item->price }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span>{{ $item->order->firstname }}&nbsp;{{ $item->order->lastname }}&nbsp;</span>
                                                                <span>{{ $item->order->email }}&nbsp;</span>
                                                                <span>{{ $item->order->mobile }}&nbsp;</span>
                                                                <span>{{ $item->product->line1 }}&nbsp;{{ $item->product->line2 }}</span>
                                                                <span>{{ $item->order->city }}&nbsp;{{ $item->order->state }}&nbsp;{{ $item->order->country }}</span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <div class=""><span
                                                                        class=" text-success">{{ $item->order->status }}</span>
                                                                </div>

                                                            </div>


                                                        </td>
                                                        <td>
                                                            <div class="card-toolbar text-right">
                                                                <button class="btn p-0 shadow-none" type="button"
                                                                    id="dropdowneditButton1" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <span class="svg-icon"
                                                                        style="text-transform:capitalize;">
                                                                        {{ $item->order->status }}
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdowneditButton1">
                                                                    <a class="dropdown-item" href="#"
                                                                        wire:click.prevent="changeStatus({{ $item->order_id }},'delivered')">Delivered</a>
                                                                    <a class="dropdown-item confirm-delete"
                                                                        title="Delete" href="#"
                                                                        wire:click.prevent="changeStatus({{ $item->order_id }},'cancel')">Canceled</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @php
                                                            $wallet=DB::table('wallets')->where('vendor_id',Auth::user()->id)->where('order_id',$item->order_id)->where('product_id',$item->product->id)->first();
                                                            @endphp
                                                            @if($wallet)
                                                            Payment Received
                                                            @else
                                                            @if($item->order->transaction === 'approved')
                                                            Online Payemnt
                                                            @else

                                                            <div class="card-toolbar text-right">
                                                                <button class="btn p-0 shadow-none" type="button"
                                                                    id="dropdowneditButton2" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <span class="svg-icon"
                                                                        style="text-transform:capitalize;">
                                                                         COD
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdowneditButton2">
                                                                    <a class="dropdown-item" href="#"
                                                                        wire:click.prevent="changePaymentStatus({{ $item->order_id }},{{ $item->product->id }},{{ $item->price }})">Received</a>
                                                                </div>
                                                            </div>

                                                            @endif
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="card-toolbar text-right">
                                                                <button class="btn p-0 shadow-none" type="button"
                                                                    id="dropdowneditButton" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <span class="svg-icon">
                                                                        <svg width="20px" height="20px"
                                                                            viewBox="0 0 16 16"
                                                                            class="bi bi-three-dots text-body"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdowneditButton">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('vendor.order-detail', ['id' => $item->order_id]) }}">Detail</a>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('assets/images/no_records.png') }}"
                                                                class="img-fluid" alt="no_records">
                                                        </td>
                                                    </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                                        {{ $items->links() }}

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
