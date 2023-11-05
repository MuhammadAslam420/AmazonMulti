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
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Order Detail
                                    </h3>
                                </div>
                                <div class="icons d-flex">
                                    <a href="{{ route('vendor.order') }}" class="ml-2">
                                        <span
                                            class="bg-info h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

                                            <i class="fa fa-first-order" aria-hidden="true"></i>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <section style="background-color: #eee;">
                                    <div class="container py-5">
                                        <div class="row justify-content-center mb-3">
                                            <div class="col-md-12 col-xl-10">
                                                @foreach ($items as $item)
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                            <div
                                                                class="bg-image hover-zoom ripple rounded ripple-surface">
                                                                <img src="{{ asset('assets/images') }}/{{ $item->product->front_image }}"
                                                                    class="w-100" />
                                                                <a href="#!">
                                                                    <div class="hover-overlay">
                                                                        <div class="mask"
                                                                            style="background-color: rgba(253, 253, 253, 0.15);">
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                                            <h5>{{ $item->product->name }}</h5>
                                                            <div class="d-flex flex-row">
                                                                <div class="text-danger mb-1 me-2">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <span>310</span>
                                                            </div>
                                                            <div class="mt-1 mb-0 text-muted small">
                                                                <span>{{ $item->product->category->name }}</span>
                                                            </div>
                                                            <div class="mb-2 text-muted small">
                                                                <span><b style="font-size:12px;color:darkred;">price:{{ $item->price }}</b></span>
                                                                <span><b style="font-size:12px;color:darkred;">Sell Quantity:{{ $item->quantity }}</b></span>

                                                            </div>
                                                            <p class="text-danger mb-4 mb-md-0">Buyer Information</p>
                                                            <p class="text-truncate mb-4 mb-md-0">
                                                                Name:{{ $item->order->firstname }}&nbsp;{{ $item->order->lastname }}
                                                            </p>
                                                            <p class="text-truncate mb-4 mb-md-0">
                                                                Contact:{{ $item->order->mobile }}
                                                            </p>
                                                            <p class="text-truncate mb-4 mb-md-0">
                                                                Email:{{ $item->order->email }}
                                                            </p>
                                                            <p class="text-truncate mb-4 mb-md-0">
                                                                Address:{{ $item->order->line1 }}&nbsp;{{ $item->order->line2 }}
                                                            </p>
                                                            <p class="text-truncate mb-4 mb-md-0">
                                                                City:{{ $item->order->city }}
                                                            </p>
                                                            <p class="text-truncate mb-4 mb-md-0">
                                                                Province:{{ $item->order->province }}
                                                            </p>
                                                            <p class="text-truncate mb-4 mb-md-0">
                                                                Postal Code:{{ $item->order->zipcode }}
                                                            </p>
                                                            <p class="text-truncate mb-4 mb-md-0">
                                                                Country:{{ $item->order->country }}
                                                            </p>
                                                        </div>
                                                        <div
                                                            class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                            <div class="d-flex flex-row align-items-center mb-1">
                                                                <h4 class="mb-1 me-1 text-white p-2 font-bold bg-success" style="text-transform:uppercase;">{{ $item->order->status }}</h4>

                                                            </div>
                                                            <h6 class="text-dark">Payment Mode:<b style="text-transform:uppercase;color:green;">{{ $item->order->transaction->mode }}</b></h6>
                                                            <h6 class="text-dark">Payment Status:<b style="text-transform:uppercase;color:green;">{{ $item->order->transaction->status}}</b></h6>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
