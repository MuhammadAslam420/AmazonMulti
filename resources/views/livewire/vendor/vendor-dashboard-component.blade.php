<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-lg-6  col-xl-8">
                        <div class="row">
                            <div class="col-lg-12 col-xl-4">
                                <div class="card card-custom gutter-b bg-success-light border-0 countercard">

                                    <div class="card-body">
                                        <h2 class="text-body">Sales</h2>
                                        <div class="mt-3 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-success font-weight-bold font-size-h3">
                                                        PKR.
                                                        <span
                                                            class="counter datacounter" data-target="{{ $sales }}">0</span></span>

                                                </div>
                                                <div class="text-dark mt-3">Compare to last month</div>
                                            </div>
                                            <div class="ratingarrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-success svg-base" viewBox="0 0 24 24"><path  d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z"></path></svg>
                                                <p class="rattingtext">20%</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-4">
                                <div class="card card-custom gutter-b bg-secondary-light border-0 countercard">

                                    <div class="card-body">
                                        <h2 class="text-body">Orders</h2>
                                        <div class="mt-3 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-secondary font-weight-bold font-size-h1">
                                                        #
                                                        <span
                                                            class="counter datacounter" data-target="{{ $orders }}">0</span></span>

                                                </div>
                                                <div class="text-dark mt-3">Compare to last month</div>
                                            </div>
                                            <div class="ratingarrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-secondary svg-base ratingdown" viewBox="0 0 24 24"><path  d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z"></path></svg>
                                                <p class="rattingtext">20%</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-4">
                                <div class="card card-custom gutter-b bg-info-light border-0 countercard">

                                    <div class="card-body">
                                        <h2 class="text-body">Products</h2>
                                        <div class="mt-3 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-info font-weight-bold font-size-h1">
                                                        #
                                                        <span
                                                            class="counter datacounter" data-target="{{ $products->count() }}">0</span></span>

                                                </div>
                                                <div class="text-dark mt-3">Compare to last month</div>
                                            </div>
                                            <div class="ratingarrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-info svg-base" viewBox="0 0 24 24"><path  d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z"></path></svg>
                                                <p class="rattingtext">20%</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-custom gutter-b bg-white border-0">
                                    <div class="card-header align-items-center  border-0">
                                        <div class="card-title mb-0">
                                            <h3 class="card-label font-weight-bold mb-0 text-body">Sales Chart

                                            </h3>


                                        </div>
                                    </div>
                                    <div class="card-body pt-3">
                                        {{-- <div id="chart-3">
                                        </div> --}}
                                        <canvas id="myChart" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label text-body font-weight-bold mb-0">Performance
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="progress-bar-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center progress-content">
                                                <div class="dot bg-success"></div>
                                                <div class="dotcontent">
                                                    <p>Last 7 days Sales</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center progress-content">
                                                <div class="dot bg-danger"></div>
                                                <div class="dotcontent">
                                                    <p>Cancellation Rate</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center progress-content">
                                                <div class="dot bg-secondary"></div>
                                                <div class="dotcontent">
                                                    <p>Seller Rating</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center progress-content">
                                                <div class="dot bg-info"></div>
                                                <div class="dotcontent">
                                                    <p>Order Delivered</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 responsive-div">
                                            <div class="progressBar-main">
                                                <div class="progress success">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value"><span style="font-size:9px;">PKR.</span>{{ $last_month_sale }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 responsive-div">
                                            <div class="progressBar-main">
                                                <div class="progress warning">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">67%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 responsive-div">
                                            <div class="progressBar-main">
                                                <div class="progress danger">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">67%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 responsive-div">
                                            <div class="progressBar-main">
                                                <div class="progress info">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">67%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="card card-custom gutter-b bg-white border-0" >
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Page Views
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <input type="text" class="datepicker-transparent" name="daterange" value="01/01/2020 - 01/15/2020" />
                                </div>
                            </div>
                            <div class="card-body" >
                                <div id="example1">Loading...</div>



                            </div>
                        </div>


                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="card card-custom gutter-b bg-white border-0" >
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Returns Orders
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <input type="text" class="datepicker-transparent" name="daterange" value="01/01/2020 - 01/15/2020" />
                                </div>
                            </div>
                            <div class="card-body" >
                                <div id="example2">Loading...</div>



                            </div>
                        </div>


                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-6 col-xl-4">
                        <div class="card card-custom gutter-b bg-white border-0">
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label text-body font-weight-bold mb-0">Product Stats
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="progress-bar-content">
                                    <ul class="list-unstyled m-0 p-0">
                                        <li>
                                            <div class="progressBar-main statusbar">
                                                <div class="progress success">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">{{ $active }}%</div>
                                                </div>
                                                <div class="statuscontent">
                                                     <div class="statuscontent-inner">
                                                        <h4>Active Products</h4>
                                                        <p>out of {{ $product }}</p>
                                                     </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="progressBar-main statusbar">
                                                <div class="progress warning">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">{{ $product - $active }}%</div>
                                                </div>
                                                <div class="statuscontent">
                                                    <div class="statuscontent-inner">
                                                        <h4>InActive Products</h4>
                                                        <p>out of {{ $product }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="progressBar-main statusbar">
                                                <div class="progress danger">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">{{ $out_of_stock }}%</div>
                                                </div>
                                                <div class="statuscontent">
                                                    <div class="statuscontent-inner">
                                                        <h4>Out Of Stock Products</h4>
                                                        <p>out of {{ $product }}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-8">
                        <div class="card card-custom gutter-b bg-white border-0" >
                            <div class="card-header align-items-center  border-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Most Selling Products
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body" >
                                <div >
                                    <div class="kt-table-content table-responsive">
                                        <table id="myTable" class="table ">

                                            <thead class="kt-table-thead text-body">
                                                <tr>
                                                    <th class="kt-table-cell">Order ID</th>
                                                    <th class="kt-table-cell">Product Name</th>
                                                    <th class="kt-table-cell">Quantity Sell</th>
                                                    <th class="kt-table-cell">
                                                        <div class="text-right">Sale Amount</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="kt-table-tbody text-dark">
                                                @foreach($top_sellings as $item)
                                                <tr class="kt-table-row kt-table-row-level-0">
                                                    <td class="kt-table-cell text-dark">#{{ $item->order_id }}</td>
                                                    <td class="kt-table-cell">
                                                        <div class="d-flex align-items-center">
                                                            <span
                                                                class="ml-2">{{ $item->product->name }}</span></div>
                                                    </td>

                                                    <td class="kt-table-cell">{{ $item->quantity }}</td>
                                                    <td class="kt-table-cell">
                                                        <div class="text-right"><span
                                                                class="mr-0 text-success">{{ ($item->quantity * $item->price) }}</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{ $top_sellings->links() }}
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
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">

      var labels =  {{ Js::from($labels) }};
      var users =  {{ Js::from($data) }};

      const data = {
        labels: labels,
        datasets: [{
          label: 'My sales Chart',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: users,
        }]
      };

      const config = {
        type: 'line',
        data: data,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

</script>
</html>
@endpush
