<div id="content">

    <!-- Topbar -->
    @livewire('admin.top-header-component')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h1>All Contact form Messages</h1>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Message #</th>
                            <th>Sender Name</th>
                            <th> Email</th>
                            <th>Mobile</th>
                            <th>Message</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->mobile}}</td>
                            <td>{{$contact->message}}</td>
                            <td>{{$contact->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{$contacts->links("pagination::bootstrap-4")}}

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
