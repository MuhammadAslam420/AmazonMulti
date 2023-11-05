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
                                    <h3 class="card-label mb-0 font-weight-bold text-body">My Wallet Statement
                                    </h3>
                                </div>
                                <div class="icons d-flex">
                                    <a href="{{ route('vendor.dashboard') }}" class="ml-2">
                                        <span
                                            class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

                                            <i class="fa fa-home fa-2x text-warning"></i>
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
                                                    <th>TransactionID</th>
                                                    <th>OrderID</th>
                                                    <th>Order Total</th>
                                                    <th>Admin Commission</th>
                                                    <th>Earn</th>
                                                    <th>Status</th>
                                                    <th>Initial Balance</th>
                                                    <th>After Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody class="kt-table-tbody text-dark">
                                                @forelse($wallets as $wallet)
                                                    <tr class="kt-table-row kt-table-row-level-0">
                                                        <td>{{ $wallet->id }}</td>
                                                        <td>#{{ $wallet->id }}</td>
                                                        <td>
                                                           &nbsp;
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            {{ $wallet->payment }}
                                                        </td>
                                                        <td>
                                                            &nbsp;

                                                        </td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                        <td>
                                                           &nbsp;
                                                        </td>
                                                        <td>

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
                                        {{ $wallets->links() }}

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
