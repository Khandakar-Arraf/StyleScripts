@extends('admin.app.app')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Purchase Requests</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active">Purchase Requests</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>user</th>
                                            <th>Item</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchase_requests as $data)
                                            <tr>
                                                <td>
                                                    {{ $data->id }}
                                                </td>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ $data->customDesign->title }}</td>
                                                {{-- <td>
                                                    @if ($data->image)
                                                        <img src="{{ asset('storage/app/public/' . $data->image) }}"
                                                            alt="{{ $data->title }}" width="80">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td> --}}
                                                <td>

                                                    <a class="btn btn-primary waves-effect btn-circle waves-light"
                                                        href="" data-bs-toggle="modal"
                                                        data-bs-target=".transaction-detailModal-{{ $data->id }}">
                                                        view
                                                    </a>
                                                    <form hidden
                                                        action="{{ route('purchase_requests.destroy', $data->id) }}"
                                                        id="form{{ $data->id }}" method="POST">
                                                        @csrf
                                                    </form>

                                                    <button class="btn btn-danger waves-effect btn-circle waves-light"
                                                        onclick="deleteItem({{ $data->id }});" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>



                                            <div class="modal fade bs-example-modal-lg transaction-detailModal-{{ $data->id }}"
                                                tabindex="-1" aria-labelledby="transaction-detailModalLabel"
                                                aria-modal="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="transaction-detailModalLabel">User
                                                                Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">Customer Email:
                                                                    {{ $data->user->email }}</div>
                                                                <div class="col-md-12">Customer Phone:
                                                                    {{ $data->user->phone }}</div>


                                                                <div class="col-md-12">
                                                                    <h4 class="text-center">
                                                                        Customer Design
                                                                    </h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <img src="{{ $data->image_front }}" alt="Sample Image"
                                                                        class="img-fluid">

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <img src="{{ $data->image_back }}" alt="Sample Image"
                                                                        class="img-fluid">
                                                                </div>

                                                                <div class="col-md-12">
                                                                    @php
                                                                        // Check if $data is a non-empty JSON string
                                                                        $sizes = $data->sizes;
                                                                        // dd($data);
                                                                        // $data = "{\"XL\":2,\"XXL\":3}"; // Your JSON data as a string

                                                                        // Decode the JSON string into an array
                                                                        $sizesData = json_decode($sizes, true);

                                                                        // Check if the decoding was successful
                                                                        $result = [];

                                                                        // Loop through the sizes data and structure it as an array
                                                                        foreach ($sizesData as $size => $quantity) {
                                                                            $result[] = [
                                                                                'size' => $size,
                                                                                'quantity' => $quantity,
                                                                            ];
                                                                        }
                                                                    @endphp


                                                                    <div class="live-preview">
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item active"
                                                                                aria-current="true">Ordered
                                                                                Sizes</li>
                                                                            @foreach ($sizesData as $size => $quantity)
                                                                                <li class="list-group-item">
                                                                                    {{ $size }} :
                                                                                    {{ $quantity }}</li>
                                                                            @endforeach


                                                                        </ul>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- page-content -->
    </div>
@endsection

@section('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`form${id}`).submit();
                }
            });
        }
    </script>
@endsection
